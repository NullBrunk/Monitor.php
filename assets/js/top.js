sort = "cpu"

document.getElementById("sort-input").addEventListener("change", (event) => {
    sort = event.target.value
})

setInterval(() => {
    fetch(`App/api.php?top&sort=${sort}`).then((resp) => {
        resp.json().then((data) => {
            let top_all = "";

            data.forEach((item) => {
                item = item.split(" ");
                console.log(item)
                top_all += `<tr>
                    
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">${item[0]}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">${item[1]}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">${item[6]}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">${item[2]}</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">${item[3]}%</td>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400">${item[4]}%</td>
                </tr>`
            })

            document.getElementById("top").innerHTML = top_all;
        })
    })
}, 1000)