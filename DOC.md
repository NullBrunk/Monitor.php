# ⚙️ Doc
All the classes provided in <a href="https://github.com/NullBrunk/PHPMonitor/tree/main/App/Class" target="_blank">App/Class</a> are independent of each other, which means that if you need the services offered by any of these classes, feel free to retrieve the code and use it in your project.


### CPU
| Method         | Description                          | 
|---             |:--                                   | 
| get_usage      | Get CPU usage in %                   |
| get_model      | Get the CPU model                    |
| get_cores      | Get the number of cores              |
| get_threads    | Get the number of threads            |
| get_name       | Get the vendor name                  |
| get_freq       | Get the frequency of every thread    |


### RAM
| Method                 | Description                                    | 
|---                     |:--                                             | 
| get_total              | Get total amont of RAM in Gb                   |
| get_usage              | Get RAM used in Gb                             |
| get_usage_percent      | Get RAM used in %                              |
| get_speed              | Get RAM speed in MT/s                          |
| get_ddr_version        | Get type of RAM (ddr3/ddr4/ddr5)               |
| get_swap_total         | Get SWAP capacity in Gb                        |
| get_swap_usage         | Get SWAP Used in Gb                            |
| get_swap_usage_percent | Get SWAP used in %                             |
| get_max_capa_ram       | Get maximum installable RAM                    |
| get_number_of_slots    | Get the number of slots                        |
| get_theorical_capacity | Get amount of RAM in Gb that the RAM stick has |


### Disk
| Method         | Description                           | 
|---             |:--                                    | 
| get_total      | Get total amount of disk space in Gb  |
| get_usage      | Get disk used in Gb                   |


### TOP
| Method                       | Description                           | 
|---                           |:--                                    | 
| get_sorted_process           | Get processes sorted by CPU or RAM    |


### Other
| Method               | Description                          | 
|---                   |:--                                   | 
| get_distrib          | Get the linux distribution name      |
| get_linux_version    | Get the linux kernel version         |
| get_uptime           | Get the machine uptme                |
