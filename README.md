<div align="center">
   
# PHPMonitor  
<br/>    
 
![GitHub top language](https://img.shields.io/github/languages/top/NullBrunk/PHPMonitor?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/NullBrunk/PHPMonitor?style=for-the-badge)
![repo size](https://img.shields.io/github/repo-size/NullBrunk/PHPMonitor?style=for-the-badge)

Display system metrics in real-time with a PHP backend, a JavaScript client side, and a Tailwind frontend.
</div>


https://github.com/NullBrunk/PHPMonitor/assets/125673909/b2e38b22-786f-4272-970f-25ef20b8e78c

# 💻 Specs
The specs page displays a variety of information related to the machine hosting the monitoring website.

![image](https://github.com/NullBrunk/PHPMonitor/assets/125673909/bc6eb743-6a87-4956-970e-a7ed0034f5e0)


# 🔳 CPU

The CPU pages displays a variety of informations linked with the CPU, as well as the frequency of every thread actualized in realtime. You can stop this actualization by clicking on the stop button like shown in this video.

https://github.com/NullBrunk/PHPMonitor/assets/125673909/7e5a01b2-fd67-4a9a-847b-89287921b6cb


# ✨ Responsive
All pages of this project are responsive, meaning they adapt to the screen size accordingly.


https://github.com/NullBrunk/PHPMonitor/assets/125673909/6f9abaaa-a5c2-4f90-a2f6-ab6b9ba9eac4

# ⚒️ Installation

Install an HTTP server and PHP on your machine then, 

```bash
cd /srv/http || cd /var/www/html
sudo git clone https://github.com/NullBrunk/PHPMonitor
```

Configure your HTTP server to execute PHP, then start it, then go to
<a href="http://127.0.0.1/PHPMonitor/">http://127.0.0.1/PHPMonitor</a>


# ⚙️ Doc
Class files are in /App/Class

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
| Method            | Description                     | 
|---                |:--                              | 
| get_total         | Get total amont of RAM in Gb    |
| get_usage         | Get RAM used in Gb              |
| get_usage_percent | Get RAM used in %               |


### Disk
| Method         | Description                           | 
|---             |:--                                    | 
| get_total      | Get total amount of disk space in Gb  |
| get_usage      | Get disk used in Gb                   |


### Other
| Method               | Description                          | 
|---                   |:--                                   | 
| get_distrib          | Get the linux distribution name      |
| get_linux_version    | Get the linux kernel version         |
| get_uptime           | Get the machine uptme                |



# Thanks

- https://github.com/dylanaraps/neofetch for the ascii logos on <a href="https://github.com/NullBrunk/PHPMonitor/blob/main/specs.php">the specs</a> page.
