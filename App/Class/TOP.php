<?php 

class TOP {

    static function get_process_sorted_by_cpu($sorted = "cpu") {
        $top = shell_exec("ps -eo pid,user,pcpu,pmem,comm --no-headers --sort -p{$sorted} | awk '{gsub(\" +\", \" \", $0);gsub($4, $4\" |\",$4); print NR \" \" $0  }' ");

        $top = explode("\n", $top);
        unset($top[sizeof($top)-1]);

        return $top;
    }

}
?>