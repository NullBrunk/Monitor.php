<?php

$SPECS = [
    "Host" => file_get_contents("/sys/devices/virtual/dmi/id/product_name"), 
    "Kernel" => "Linux " . Other::get_linux_version(), 
    "OS" => Other::get_distrib(), 
    "Name" => ucfirst(file_get_contents('/etc/hostname')),  
    "IP" => $_SERVER["REMOTE_ADDR"],
];


?>