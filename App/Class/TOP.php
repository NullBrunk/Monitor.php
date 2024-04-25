<?php 

/**
 * @class   TOP
 * 
 * @brief   This class is an interface that facilitates the retrieval 
 *          and the ordering of processes
 */

class TOP {

    /**
     * Static function that returns the processes ordered by x
     *
     * @param string $sorted        Sorted by cpu or ram
     * 
     * @return array                An array of the ordered processes
     */
    static function get_sorted_process($sorted = "cpu") {
        $top = shell_exec("ps -eo pid,user,pcpu,pmem,comm --no-headers --sort -p{$sorted} | awk '{gsub(\" +\", \" \", $0);gsub($4, $4\" |\",$4); print NR \" \" $0  }' ");

        $top = explode("\n", $top);
        unset($top[sizeof($top)-1]);

        return $top;
    }

}
?>