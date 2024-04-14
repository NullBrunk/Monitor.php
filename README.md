<div align="center">

# PHPMonitor  
<br/>     
 
![GitHub top language](https://img.shields.io/github/languages/top/NullBrunk/PHPMonitor?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/NullBrunk/PHPMonitor?style=for-the-badge)
![repo size](https://img.shields.io/github/repo-size/NullBrunk/PHPMonitor?style=for-the-badge)

Display real-time system metrics with a PHP backend and JavaScript & Tailwind for the UI.
</div>


https://github.com/NullBrunk/PHPMonitor/assets/125673909/1ea23d5f-1619-4a48-8f1c-fa6064ace70e


# 💻 System

The system page displays a variety of information related to the machine hosting the monitoring website.

![image](https://github.com/NullBrunk/PHPMonitor/assets/125673909/182d47c1-8a0f-4e09-aa9b-c8311605f042)


# 🔳 CPU

The CPU page displays various informations related to the CPU, including real-time updates of the frequency for each thread. You can stop this updating by clicking on the stop button, as demonstrated in this video.

https://github.com/NullBrunk/PHPMonitor/assets/125673909/e68a3c16-911c-4cb4-b09e-c62ed6f2a3ad

# 💾 RAM

The RAM page displays various informations related to the volatile memory (RAM) and to the SWAP, with real-time graph and metrics as shown in this video.


https://github.com/NullBrunk/PHPMonitor/assets/125673909/332354e2-87ef-494e-968e-6553bba30def


# ⚙️ TOP 

The TOP page displays various real-time informations related to the processes. You can sort theses processes by RAM/CPU consumption with the right select menu as demonstrated in the video.

https://github.com/NullBrunk/PHPMonitor/assets/125673909/86e69d90-7355-4d02-954b-b1cac25f9c6f



# ✨ Responsive
All pages of this project are responsive, meaning they adapt to the screen size accordingly.

https://github.com/NullBrunk/PHPMonitor/assets/125673909/fca04462-4505-4e8d-9eb4-8265a1561033




# ⚒️ Installation

## Using docker
To get a brief overview, there is a Dockerfile here if you want to test the application locally:

```bash
git clone https://github.com/NullBrunk/PHPMonitor
cd PHPmonitor

# Build the docker image
docker build -t phpmonitor .

# And launch it
docker run -it -p 80:80 phpmonitor
```

## Install it to monitor a server

Install an HTTP server and PHP on your machine then, configure your HTTP server to execute PHP

```bash
cd /srv/http || cd /var/www/html
sudo git clone https://github.com/NullBrunk/PHPMonitor
```

The program needs to get the output of certain root command, but we cannot give the root permission to the program or to the apache/nginx user cause this would constitute a lack of security.

So after installing type these commands:
```bash
cd PHPMonitor/App/Utils/info/

sudo dmidecode --type 16,17 > raminfo.txt
```


Start your HTTP servet, and go to http://127.0.0.1/PHPMonitor/


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


# 🤝 Thanks

- https://github.com/dylanaraps/neofetch for the ascii logos on <a href="https://github.com/NullBrunk/PHPMonitor/blob/main/system.php">the system</a> page.
