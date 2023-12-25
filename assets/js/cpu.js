function toggle_reload() {
    if(reloading) {
        // Launch it
        inter = setInterval(reload_threads, 1000)
        document.getElementById("thread-reload").innerHTML = `<i class="text-rose-700 bi bi-stop-fill"></i>`;
    } else {
        // Stop it
        clearInterval(inter);
        document.getElementById("thread-reload").innerHTML = `<i style="color:rgb(101 163 13);" class="bi bi-caret-right-fill"></i>`;
    }
}


setInterval(() => {
    fetch("App/api.php?cpu").then((resp) => {
        resp.json().then((data) => {
            document.getElementById("cpu-info").innerHTML = data + " %"
        })
    })
}, 2000);

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
inter = setInterval(reload_threads, 1000)