Chart.defaults.backgroundColor = '#9BD0F5';
Chart.defaults.borderColor = '#555555';
Chart.defaults.color = '#FFFFFF';  

let ram_datas = [0, 0, 0, 0, 0, 0]
let swap_datas = [0, 0, 0, 0, 0, 0]

const ram_cvs = document.getElementById('ramChart');  

let ram = new Chart(ram_cvs, {
    type: 'line', 
    data: {
        labels: ["12 sec ago","10 sec ago","8 sec ago","6 sec ago","4 sec ago","2 sec ago"],
        datasets: [{
            label: 'RAM Usage',
            data: ram_datas,
            borderWidth: 1,
            fill: false,
            tension: 0.5
        }, {
            label: 'SWAP Usage',
            data: swap_datas,
            borderWidth: 1,
            fill: false,
            tension: 0.5
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                suggestedMin: 0, // Valeur minimale pour l'axe Y
                suggestedMax: 100, // Valeur maximale pour l'axe Y
                beginAtZero: true
            }
        },
        animation: {
            duration: 0 // Désactive les animations
        }
    }
});

setInterval(() => {
    fetch("App/api.php?ram_percent").then((resp) => {
        resp.json().then((data) => {
            ram_datas.shift();
            ram_datas.push(data);
            ram.update();
        })
    });

    fetch("App/api.php?swap_percent").then((resp) => {
        resp.json().then((data) => {
            swap_datas.shift();
            swap_datas.push(data);  
            ram.update();
        })
    });

}, 1000)


setInterval(() => {
    fetch("App/api.php?ram").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("used").innerHTML =  `${data} Gb`;
        })
    })
}, 1000)


setInterval(() => {
    fetch("App/api.php?ram_percent").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("ram-percent").innerHTML =  `${Math.round(data)}%`;
        })
    })
}, 1000)


setInterval(() => {
    fetch("App/api.php?swap").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("swap").innerHTML =  `${data} Gb`;
        })
    })

// The swap doesn't change values often, so we can wait longer between each reload.
}, 5000)

setInterval(() => {
    fetch("App/api.php?swap_percent").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("swap-percent").innerHTML =  `${data}%`;
        })
    })

// The swap doesn't change values often, so we can wait longer between each reload.
}, 5000)