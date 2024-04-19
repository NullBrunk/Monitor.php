// Show the CPU usage curve with chart.js

// Initial CPU usage
let cpu_datas = [0, 0, 0, 0, 0, 0];
const cpu_cvs = document.getElementById('cpuChart');  

let cpu = new Chart(cpu_cvs, {
    type: 'line', 
    data: {
        labels: ["12 sec ago","10 sec ago","8 sec ago","6 sec ago","4 sec ago","2 sec ago"],
        datasets: [{
            label: 'CPU Usage',
            data: cpu_datas,
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

// Update the Chart every second
setInterval(() => {
    // Get the CPU usage from the API
    fetch("App/api.php?cpu").then((resp) => {
        resp.json().then((data) => {
            // Push it into the char.js
            cpu_datas.shift();
            cpu_datas.push(data);

            cpu.update();
        })
    })
}, 1000)
