<?php

/**
 * @class   Other
 * 
 * @brief   This class is an interface that facilitates the retrieval 
 *          of various information.
 */

class Other {

    /**
     * Get the linux distribution name
     *
     * @return string
     */
    public static function get_distrib() {
        return explode('"', file_get_contents("/etc/os-release"))[1];
    }


    /**
     * Get the current uptime of the machine
     *
     * @return string 
     */
    public static function get_uptime() {
        $time = floatval(file_get_contents('/proc/uptime'));
    
        $secs = $time % 60;
        $mins = (int)($time / 60) % 60;
        $hours = (int)($time / 3600) % 24;
        $days = (int)($time / 86400);
    
        $to_pr = "";
    
        if($hours != 0) {
            if($hours >= 10)
                $to_pr .= $hours . "h ";
            else
                $to_pr .= "0" . $hours . "h ";     
        }
    
        if($mins != 0) {
            if($mins >= 10)
                $to_pr .= $mins . "min ";
            else
                $to_pr .= "0" . $mins . "min ";
        }
    
        if($secs != 0) {
            if($secs >= 10)
                $to_pr .= $secs . "sec ";
            else
                $to_pr .= "0" . $secs . "sec ";
        }
    
    
        echo json_encode([
            "days" =>  $days . " days, ",
            "uptime" => $to_pr
        ]);
    }


    /**
     * Get the linux kernel version
     *
     * @return string
     */
    static function get_linux_version() {
        preg_match(
            '/Linux version ([^\s]+)/', 
            file_get_contents("/proc/version"), 
            $matches
        );
        return $matches[1];
    }
}