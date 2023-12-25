<?php

class Disk {

    static function to_gb($in_bytes) {
        return round((int)$in_bytes / pow(10, 9), 0);
    }
    static function get_total() {
        return self::to_gb(disk_total_space("/"));
    }
    static function get_usage() {
        return self::get_total() - self::to_gb(disk_free_space("/"));
    }
    
    static function get_usage_percent() {
        $percent = self::get_usage() / self::get_total() * 100;
        return round($percent, 2);
    }

    static function type() {
        $device = scandir("/sys/block")[2];
        if(str_contains($device, "nvme")) {
            return "NVME";
        } else {
            $to_parse = file_get_contents("/sys/block/" . $device . "/queue/rotational");
            return ($to_parse == "0") ? "SSD" : "HDD";
        }
    }
    
}

