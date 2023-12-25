let datas = [0, 0, 0, 0, 0, 0];
const cvs = document.getElementById('myChart');

Chart.defaults.backgroundColor = '#9BD0F5';
Chart.defaults.borderColor = '#555555';
Chart.defaults.color = '#FFFFFF';    

let ch = new Chart(cvs, {
    type: 'line', 
    data: {
        labels: ["12 sec ago","10 sec ago","8 sec ago","6 sec ago","4 sec ago","2 sec ago"],
        datasets: [{
            label: 'CPU Usage',
            data: datas,
            borderWidth: 1,
            fill: false,
            tension: 0.5
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        animation: {
            duration: 0 // Désactive les animations
        }
    }
});

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

setInterval(() => {
    fetch("App/api.php?cpu").then((resp) => {
        resp.json().then((data) => {
            datas.shift();
            datas.push(data);
            ch.data.datasets[0].data = datas;
            ch.update();
        })
    })
}, 2000)

