<?php

class CPU {
    
    public string $REGEX = '/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/';
    public string $cpuinfo;

    public function __construct()
    {
        $this -> cpuinfo = file_get_contents("/proc/cpuinfo");    
    }

    public function apply_regex_on_proc_stat() {
        preg_match($this -> REGEX, file_get_contents("/proc/stat"), $matches);
        return $matches;
    }

    public function cpu_info() {
        $matches = $this -> apply_regex_on_proc_stat();
        return array_slice($matches, 1);
    }

    public function get_usage() {
    
        $stats1 = $this -> cpu_info();
        sleep(1);
        $stats2 = $this -> cpu_info();
            
        $usage = array_map(function($x, $y) {
            return $y - $x;
        }, $stats1, $stats2);
    
        // Calculer le temps total
        $total = array_sum($usage);
    
        // Calculer le pourcentage d'utilisation du CPU
        $percentage = ($total - $usage[3]) / $total * 100;
    
        return round($percentage, 0);
    }

    public function get_model() {
        preg_match(
            '/model name\s+:\s+(.+)/i', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }
    
    public function get_cores() {
        preg_match(
            '/cpu\s*cores\s*:\s*(\d+)/i', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }

    public function get_threads() {
        preg_match(
            '/siblings\s*:\s*(\d+)/i', 
            $this -> cpuinfo, 
            $matches
        );

        return $matches[1];
    }
}