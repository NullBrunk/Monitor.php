setInterval(() => {
    fetch("api/api.php?ram").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("used").innerHTML =  `${data} Gb`;
        })
    })
}, 1000)

setInterval(() => {
    fetch("api/api.php?uptime").then((resp) => {
        resp.json().then((data) => {
            if(data["days"] !== 0) {
                document.getElementById("hours").innerHTML = data["days"];
            }
            document.getElementById("time").innerHTML =  data["uptime"];
        })
    })
}, 1000)