/**
 * Enable or disable the real-time display of each thread frequency
 */
function toggle_reload() {
    if(reloading) {
        // Use an interval to reload each thread usage every second
        inter = setInterval(reload_threads, 1000)
        document.getElementById("thread-reload").innerHTML = `<i class="text-rose-700 bi bi-stop-fill"></i>`;
    } else {
        // Stop the interval
        clearInterval(inter);
        document.getElementById("thread-reload").innerHTML = `<i class="bi bi-caret-right-fill text-teal-400"></i>`;
    }
}

// Display CPU Usage real-time
setInterval(() => {
    // Get CPU usage from the API
    fetch("App/api.php?cpu").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("cpu-info").innerHTML = data + " %"
        })
    })
    // Reload each 2seconds
}, 2000);


// Update each thread frequency 
function reload_threads() {
    fetch("App/api.php?freq").then((resp) => {
        resp.json().then((data) => {
            for(let i=0; i<data.length; i++) {
                document.getElementById(`thread${i}`).innerHTML = data[i];
            }
        })
    })
}

reloading = true;
// Reload each second
inter = setInterval(reload_threads, 1000)