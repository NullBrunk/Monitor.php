<?php

/**
 * This class is an interface that facilitates the retrieval 
 * of various Disk-related information.
 */
class Disk {

    /**
     * Convert bytes to gigabytes and round it to 0 after the ,
     *
     * @param int|string $in_bytes     The thing to convert in GB
     * 
     * @return int
     */
    static private function to_gb($in_bytes) {
        return round((int)$in_bytes / pow(10, 9), 0);
    }


    /**
     * Get the total space of the disk in GB
     *
     * @return int
     */
    static function get_total() {
        return self::to_gb(disk_total_space("/"));
    }


    /**
     * Get the used space in GB
     *
     * @return int
     */
    static function get_usage() {
        // Total space - Free space = Used space
        return self::get_total() - self::to_gb(disk_free_space("/"));
    }


    
}

