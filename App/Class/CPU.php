<?php

/**
 * This class is an interface that facilitates the retrieval 
 * of various CPU-related information.
 */

class CPU {
   
    // This attribute contains the content of the /proc/cpuinfo file
    private string $cpuinfo;

    public function __construct() {
        $this -> cpuinfo = file_get_contents("/proc/cpuinfo");    
    }


    /**
     * This method retrieves the usage of each thread of the CPU 
     * in the /proc/stat file
     *
     * @return array     The array of matches
     */
    private function apply_regex_on_proc_stat() {
        preg_match('/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/', file_get_contents("/proc/stat"), $matches);
        return $matches;
    }


    /**
     * This function slices the array provided by the apply_regex_on_proc_stat() 
     * method to only retrieve the useful information.
     *
     * @return array
     */
    private function cpu_info() {
        $matches = $this -> apply_regex_on_proc_stat();
        return array_slice($matches, 1);
    }


    /**
     * This method returns the usage in percent of the CPU globally (All threads)
     *
     * @return int
     */
    public function get_usage() {

        // We save 2 CPU usage by threads
        $stats1 = $this -> cpu_info();
        sleep(1);
        $stats2 = $this -> cpu_info();
            
        // We substract every usage from every thread
        $usage = array_map(function($x, $y) {
            return $y - $x;
        }, $stats1, $stats2);
    
        // We add the consumption of all the threads and put it in the total variable
        $total = array_sum($usage);
    
        // We convert this to a percentage
        $percentage = ($total - $usage[3]) / $total * 100;
    
        return round($percentage, 0);
    }


    /**
     * Get the model name from the /proc/cpuinfo file
     *
     * @return string
     */
    public function get_model() {
        preg_match(
            '/model name\s+:\s+(.+)/i', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }
    


    /**
     * Get the number of cores from the /proc/cpuinfo file
     *
     * @return string
     */
    public function get_cores() {
        preg_match(
            '/cpu\s*cores\s*:\s*(\d+)/i', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }



    /**
     * Get the number of threads from the /proc/cpuinfo file
     *
     * @return string
     */
    public function get_threads() {
        preg_match(
            '/siblings\s*:\s*(\d+)/i', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }



    /**
     * Get the vendor name from the /proc/cpuinfo file (for ex: AMD, Intel)
     *
     * @return string
     */
    public function get_name() {
        preg_match(
            '/vendor_id\s*:\s*[A-Z][a-z]+([A-Z]*[a-z]*)/', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }



    /**
     * Get the frequency of every thread from the /proc/cpuinfo file
     *
     * @return array
     */

    public function get_freq() {
        preg_match_all(
            '/cpu MHz\s*:\s*([\d.]+)/', 
            $this -> cpuinfo, $matches
        );

        return array_map(fn($freq_in_mhz) => round($freq_in_mhz / 1000, 2) . " GHz", $matches[1]);
    }


    /**
     * Try to get the maximal frequency of the CPU
     *
     * @return string
     */
    public function get_max_freq() {
 
        // First we try to get the content of this file
        $max_freq = file_get_contents("/sys/devices/system/cpu/cpu0/cpufreq/scaling_max_freq");
        if($max_freq) {
            return round($max_freq / pow(10, 6), 2);
        }

        // If this file doesnt exists we try to use somme shell commands
        else {
            try {
                $max_freq_mhz = shell_exec("lscpu | grep MHz | head -2 | tail -1 | cut -d':' -f2");
                return round($max_freq_mhz / pow(10, 3), 2);
            } catch(Exception) {

                // It is possible that shell command exec is disabled on the server, 
                // so we display a question mark
                return "? GHz"; 
            }
        } 
    }

}