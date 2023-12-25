<?php

// Cause we'll include it in the /specs.php
require_once "App/Class/Autoloader.php";
Autoloader::register();

$cpu = new CPU();

$SPECS = [
    "Name" => ucfirst(file_get_contents('/etc/hostname')),  
    "Host" => file_get_contents("/sys/devices/virtual/dmi/id/product_name"), 
    "OS" => explode('"', file_get_contents("/etc/os-release"))[1], 
    "Kernel" => "Linux " . Other::get_linux_version(), 
    "CPU" => $cpu -> get_model(),
    "Core" => $cpu -> get_cores(),
    "Threads" => $cpu -> get_threads(),
    "IP" => $_SERVER["REMOTE_ADDR"],
];


?>