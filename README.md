<div align="center">

# Monitor.php  

<div>
 <img width="54" src="https://github.com/user-attachments/assets/59de89f6-6cc0-4ebc-8208-00f8db39d323">
 
 <img width="54" src="https://github.com/user-attachments/assets/0fbab25d-8122-4913-b780-9757d9fad54e">
 
 <img width="54" src="https://github.com/user-attachments/assets/bd2b693f-659b-4da7-a9c7-d04719e65246">
 
 <img width="54" src="https://github.com/user-attachments/assets/f16fe60d-278f-4f41-af90-ff7143943614">
 
 <img width="54" src="https://github.com/user-attachments/assets/a2554b15-1528-4e29-8769-1413366eba77">
</div>



<br/>  
 
![GitHub top language](https://img.shields.io/github/languages/top/NullBrunk/Monitor.php?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/m/NullBrunk/Monitor.php?style=for-the-badge)
![repo size](https://img.shields.io/github/repo-size/NullBrunk/Monitor.php?style=for-the-badge)

</div>

https://github.com/NullBrunk/Monitor.php/assets/125673909/1ea23d5f-1619-4a48-8f1c-fa6064ace70e


# ⚒️ Installation

## Using docker
> [!TIP]
> To get a brief overview you can test the app by using the dockerfile:

```bash
git clone https://github.com/NullBrunk/Monitor.php && cd Monitor.php

# Build the docker image
docker build -t phpmonitor .

# And launch it
docker run -it -p 80:80 phpmonitor
```

## Physically

> [!IMPORTANT]
> **Install an HTTP server + PHP, then**

```bash
cd /srv/http || cd /var/www/html
sudo git clone https://github.com/NullBrunk/Monitor.php
```

> [!CAUTION]
> **Type this command for the RAM monitoring page otherwise it will not work:**

```bash
# Output ram config to a file
sudo dmidecode --type 16,17 > ./Monitor.php/App/Utils/info/raminfo.txt
```

Start your HTTP server, and go <a href="http://127.0.0.1/Monitor.php/">here</a>.
<br><br>

# 📚 Deep overview
### 💻 System

The system page displays a variety of information related to the machine hosting the monitoring website.

![image](https://github.com/NullBrunk/Monitor.php/assets/125673909/182d47c1-8a0f-4e09-aa9b-c8311605f042)


### 🔳 CPU

The CPU page displays various informations related to the CPU, including real-time updates of the frequency for each thread. You can stop this updating by clicking on the stop button, as demonstrated in this video.

https://github.com/NullBrunk/Monitor.php/assets/125673909/e68a3c16-911c-4cb4-b09e-c62ed6f2a3ad

### 💾 RAM

The RAM page displays various informations related to the volatile memory (RAM) and to the SWAP, with real-time graph and metrics as shown in this video.


https://github.com/NullBrunk/Monitor.php/assets/125673909/332354e2-87ef-494e-968e-6553bba30def


### ⚙️ TOP 

The TOP page displays various real-time informations related to the processes. You can sort theses processes by RAM/CPU consumption with the right select menu as demonstrated in the video.

https://github.com/NullBrunk/Monitor.php/assets/125673909/86e69d90-7355-4d02-954b-b1cac25f9c6f

### ✨ Responsive
All pages are responsive, meaning they adapt to the screen size accordingly.

https://github.com/NullBrunk/Monitor.php/assets/125673909/fca04462-4505-4e8d-9eb4-8265a1561033


# 🤝 Thanks
- https://github.com/dylanaraps/neofetch for the ascii logos on <a href="https://github.com/NullBrunk/Monitor.php/blob/main/system.php">the system</a> page. 
