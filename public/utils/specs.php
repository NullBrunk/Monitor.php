<?php

preg_match(
    '/Linux version ([^\s]+)/', 
    file_get_contents("/proc/version"), 
    $matches
);

$cpu_info = file_get_contents("/proc/cpuinfo");

preg_match(
    '/model name\s+:\s+(.+)/i', 
    $cpu_info, 
    $matches_cpu
);


preg_match(
    '/cpu\s*cores\s*:\s*(\d+)/i', 
    $cpu_info, 
    $matches_core
);

preg_match(
    '/siblings\s*:\s*(\d+)/i', 
    $cpu_info, 
    $matches_threads
);


$SPECS = [
    "Name" => file_get_contents('/etc/hostname'),  
    "Host" => file_get_contents("/sys/devices/virtual/dmi/id/product_name"), 
    "OS" => explode('"', file_get_contents("/etc/os-release"))[1], 
    "Kernel" => "Linux " . $matches[1], 
    "CPU" => $matches_cpu[1], 
    "Core" => $matches_core[1],
    "Threads" => $matches_threads[1],
    "IP" => $_SERVER["REMOTE_ADDR"],
];


?>