<?php

use function PHPSTORM_META\map;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class RAM {
    
    public string $meminfo;
    public array $parsable_meminfo;
    public string $mem_type;
    public string $dmidecode;
    

    public function __construct()
    {
        $this -> meminfo = file_get_contents('/proc/meminfo');
        $this -> parsable_meminfo = explode("kB", $this -> meminfo);
        $this -> dmidecode = file_get_contents(__DIR__ . "/../Utils/info/raminfo.txt" );
    }

    private function kb_to_gb($unit_in_kb) {
        return round((int)$unit_in_kb / pow(10, 6), 2);
    }

    public function get_total() {
        $kb_ram_total = explode(":", $this -> parsable_meminfo[0])[1];
        return $this -> kb_to_gb($kb_ram_total);
    }

    public function get_usage() {
        $kb_ram_used = explode(":", $this -> parsable_meminfo[2])[1];
        $used = $this -> get_total() - $this -> kb_to_gb($kb_ram_used); 

        return $used;
    }

    public function get_usage_percent() {
        return $this -> get_usage() / $this -> get_total() * 100;
    }

    // Get the speed of the RAM in MT/s
    public function get_speed() {
        preg_match(
            '/Speed: (.*)/', 
            $this -> dmidecode,
            $matches
        );

        return $matches[1];
    }

    // Get the DDR type of the RAM
    public function get_ddr_version() {
        preg_match(
            '/DDR./', 
            $this -> dmidecode,
            $matches
        );

        return $matches[0];
    }

    public function get_swap_total() {
        preg_match(
            '/SwapTotal:\s+(.*)/', 
            $this -> meminfo,
            $matches
        );
        
        return $this -> kb_to_gb($matches[1]);
    }

    public function get_swap_usage() {
        $swapinfo = file_get_contents("/proc/swaps");
        $swapinfo = explode("\n", $swapinfo);

        // Unset the first element of this array because it's is a header 
        // (he looks like : Filename Type Size Used)
        unset($swapinfo[0]);

        // Unset the last elem cause it is an empty line that is auto added at the end of file
        unset($swapinfo[sizeof($swapinfo)]);

        $used_swap = 0;
        foreach($swapinfo as $line) {
            // As we saw in the header, the 4th elem is the "used" section. 
            // Arrays are starting at 0, so the 4th elem is the [3] of our array 
            $used_swap += (int)explode("\t", $line)[3];
        }

        return $this -> kb_to_gb($used_swap);
    }

    public function get_max_capa_ram() {
        preg_match(
            '/Maximum Capacity: (.*)/', 
            $this -> dmidecode,
            $matches
        );

        return $matches[1];
    }

    public function get_number_of_slots() {
        preg_match(
            '/Number Of Devices: (.*)/', 
            $this -> dmidecode,
            $matches
        );

        return $matches[1];
    }

    public function get_theorical_capacity() {
        preg_match(
            '/Size: (.*)/', 
            $this -> dmidecode,
            $matches
        );

        return $matches[1];
    }
}
