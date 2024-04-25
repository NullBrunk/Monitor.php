<?php 

/**
 * Hashmap that contains several utils informations linked with the RAM
 */
$INFO = [
    "Speed: " => $ram -> get_speed(),
    "Max Capacity: " => $ram -> get_max_capa_ram(),
    "Capacity: " => $ram -> get_theorical_capacity(),
    "Type: " => $ram -> get_ddr_version(),
    "Slots: " => $ram -> get_number_of_slots(),
];

?>