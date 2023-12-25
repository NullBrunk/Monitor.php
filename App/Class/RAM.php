<?php

class RAM {
    
    public string $meminfo;
    public array $parsable_meminfo;
    public string $mem_type;


    public function __construct()
    {
        $this -> meminfo = file_get_contents('/proc/meminfo');
        $this -> parsable_meminfo = explode("kB", $this -> meminfo);
    }

    private function kb_to_gb($unit_in_kb) {
        return round((int)$unit_in_kb / pow(10, 6), 2);
    }

    public function get_ram_total() {
        $kb_ram_total = explode(":", $this -> parsable_meminfo[0])[1];
        return $this -> kb_to_gb($kb_ram_total);
    }

    public function get_ram_used() {
        $kb_ram_used = explode(":", $this -> parsable_meminfo[2])[1];
        $used = $this -> get_ram_total() - $this -> kb_to_gb($kb_ram_used); 

        return $used;
    }

    public function get_ram_used_percent() {
        return $this -> get_ram_used() / $this -> get_ram_total() * 100;
    }
}
