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
        $to_pr .= ($hours >= 10 ?  $hours : "0" . $hours) . "h ";     
    }

    if($mins != 0) {
        $to_pr .= ($mins >= 10 ?  $mins : "0" . $mins) . "min ";
    }

    if($secs != 0) {
        $to_pr .= ($secs >= 10 ?  $secs : "0" . $secs) . "sec ";
    }


    echo json_encode([
        "days" =>  $days . " days, ",
        "uptime" => $to_pr
    ]);
}

else if(isset($_GET["cpu_usage"])) {
    
}

?>