// Show the CPU usage curve with chart.js

// Initial RAM usage
let ram_datas = [0, 0, 0, 0, 0, 0];
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
        }]
    },
    options: {
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                suggestedMin: 0, // Valeur minimale pour l'axe Y
                suggestedMax: 100, // Valeur maximale pour l'axe Y
            }
        },
        animation: {
            duration: 0 // Désactive les animations
        }
    }
});

// Update the char every second
setInterval(() => {
    // Get the RAM usage from the API
    fetch("App/api.php?ram_percent").then((resp) => {
        resp.json().then((data) => {
            // Push it into the chart.js array
            ram_datas.shift();
            ram_datas.push(data);

            ram.update();
        })
    })
}, 1000)
