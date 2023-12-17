<?php 

if($_SERVER["REQUEST_METHOD"] !== "GET" ) die("There is only one HTTP supported method: GET");


if(isset($_GET["ram"])) {

    // Getting informations from /proc/meminfo
    $values = explode("kB", file_get_contents('/proc/meminfo'));

    // Splitting and splitting to obtain MemTotal and MemFree
    $mem_used_kb = explode(":", $values[0])[1] - explode(":", $values[1])[1];
    $mem_used_gb = round($mem_used_kb / pow(10, 6), 2);

    echo $mem_used_gb;
    die;
}

else if(isset($_GET["uptime"])) {
   
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

else if(isset($_GET["cpu"])) {

    function cpu_info() {
        preg_match(
            '/^cpu\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)\s+(\d+)/', 
            file_get_contents("/proc/stat"), 
            $matches
        );

        return array_slice($matches, 1);
    }

    $stats1 = cpu_info();
    sleep(1);
    $stats2 = cpu_info();
        
    $usage = array_map(function($x, $y) {
        return $y - $x;
    }, $stats1, $stats2);

    // Calculer le temps total
    $total = array_sum($usage);

    // Calculer le pourcentage d'utilisation du CPU
    $percentage = ($total - $usage[3]) / $total * 100;

    echo(round($percentage, 0));
}
?>
