<?php

/*
Je mets ici tout ce qui n'a pas besoin d'etre actualisé en temps réel
*/

$RAM_TOTAL = round(explode(":", explode("kB", file_get_contents('/proc/meminfo'))[0])[1] / pow(10, 6), 2);

$DISK_TOTAL = (int)(disk_total_space("/") / pow(10, 9));
$DISK_USAGE = (int)(($DISK_TOTAL) - (disk_free_space("/") / pow(10, 9)));

$DISTRIB = explode('"', file_get_contents("/etc/os-release"))[1];
