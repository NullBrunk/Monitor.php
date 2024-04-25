<?php  
/**
 * This file makes the link between the frontend (javascript with ajax requests)
 * and the backend (the Classes in the Class folder)
 */

header("Content-type: application/json");

require_once "./Class/Autoloader.php";
Autoloader::register();


if(isset($_GET["ram"])) {
    $ram = new RAM();
    echo $ram -> get_usage();
}

else if(isset($_GET["ram_percent"])) {
    $ram = new RAM();
    echo $ram -> get_usage_percent();
}

else if(isset($_GET["swap"])) {
    $ram = new RAM();
    echo $ram -> get_swap_usage();
}

else if(isset($_GET["swap_percent"])) {
    $ram = new RAM();
    echo $ram -> get_swap_usage_percent();
}

else if(isset($_GET["cpu"])) {
    $cpu = new CPU();
    echo $cpu -> get_usage();
}

else if(isset($_GET["freq"])) {
    $cpu = new CPU();
    echo json_encode($cpu -> get_freq());
}

else if(isset($_GET["uptime"])) {
    echo Other::get_uptime();
}

else if(isset($_GET["top"]) && isset($_GET["sort"]) && in_array($_GET["sort"], ["cpu", "mem"])) {
    echo json_encode(
        TOP::get_sorted_process($sorted=$_GET["sort"])
    );
}
?>
