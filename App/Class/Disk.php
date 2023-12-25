<?php

class Disk {

    public function __construct()
    {    
    }


    static function to_gb($in_bytes) {
        return round((int)$in_bytes / pow(10, 9), 0);
    }
    static function get_total() {
        return self::to_gb(disk_total_space("/"));
    }
    static function get_used() {
        return self::get_total() - self::to_gb(disk_free_space("/"));
    }
}

