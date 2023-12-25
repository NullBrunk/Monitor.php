Chart.defaults.backgroundColor = '#9BD0F5';
Chart.defaults.borderColor = '#555555';
Chart.defaults.color = '#FFFFFF';  

setInterval(() => {
    fetch("App/api.php?ram").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("used").innerHTML =  `${data} Gb`;
        })
    })
}, 1000)

setInterval(() => {
    fetch("App/api.php?uptime").then((resp) => {
        resp.json().then((data) => {
            if(data["days"] !== 0) {
                document.getElementById("hours").innerHTML = data["days"];
            }
            document.getElementById("time").innerHTML =  data["uptime"];
        })
    })
}, 1000)




