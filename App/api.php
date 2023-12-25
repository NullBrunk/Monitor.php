<?php 
header("Content-type: application/json");

require_once "./Class/Autoloader.php";
Autoloader::register();


if(isset($_GET["ram"])) {
    $ram = new RAM();
    echo $ram -> get_ram_used();
}

else if(isset($_GET["cpu"])) {
    $cpu = new CPU();
    echo $cpu -> get_usage();
}

else if(isset($_GET["uptime"])) {
    echo Other::get_uptime();
}
?>
