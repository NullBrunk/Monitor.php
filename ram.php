<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/tailwind.css">

        <title>RAM</title>
    </head>


    <nav class="bg-gray-800">
        <div class="mx-6 max-w-7xl px-2 sm:px-6 lg:px-8 none-sm">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                            <a href="specs.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Specs</a>
                            <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                            <a href="ram.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">RAM</a>
                            <a href="disk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disk</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                <a href="specs.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Specs</a>
                <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                <a href="ram.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">RAM</a>
                <a href="disk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disk</a>
            </div>
        </div>
    </nav>

    <body class="bg-slate-900">
        <section class="m-8 mt-12 flex-block">
            <div class="w-25 rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        Model
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-cpu  mr-6"></i>
                        </div>
                        <div>
                            <h1 class="text-white text-2xl font-bold"><?= $cpu -> get_name() ?></h1>
                            <a target="_blank" href="https://www.google.com/search?&q=<?= $cpu -> get_model() ?>" class="text-xs font-bold text-sky-600"><?= $cpu -> get_model() ?></a>
                        </div>
                    </div>                   
                </div>
            </div>

            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        Usage
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-activity mr-6"></i>
                        </div>
                        <h1 id="cpu-info" class="text-white text-4xl font-bold my-auto">...</h1>

                    </div>                   
                </div>
            </div>

            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        Cores
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-heart-pulse mr-6"></i>
                        </div>
                        <h1 class="text-white text-4xl font-bold my-auto "><?= $cpu -> get_cores() ?></h1>
                    </div>                   
                </div>
            </div>

            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        Threads
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-fullscreen-exit mr-6"></i>
                        </div>
                        <h1 class="text-white text-4xl font-bold my-auto "><?= $cpu -> get_threads() ?></h1>
                    </div>                   
                </div>
            </div>            
        </section>   
        

        <section class="m-8 px-6 py-4 rounded overflow-hidden shadow-lg bg-slate-800 text-white ">
            <div class="flex justify-end">
                <button id="thread-reload" onclick="reloading=!reloading; toggle_reload()"><i class="text-rose-700 bi bi-stop-fill"></i></button>
            </div>  

            <section class="flex">
                
                <table class="border-collapse table-auto w-full text-sm" style="width: 50%">
                    <thead>
                    <tr>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left" >Freq</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        <?php for($i = 0; $i < count($cpu -> get_freq()) / 2; $i++) : ?>
                        <tr>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 font-bold text-indigo-400">Thread n°<?= $i ?></td>
                            <td id="thread<?=$i?>" class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $cpu -> get_freq()[$i] ?></td>
                        </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
                <p style="width: 1px; background: #414f63;"></p>
                <table class="border-collapse table-auto w-full text-sm" style="width: 50%">
                    <thead>
                    <tr>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Name</th>
                        <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left" >Freq</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">
                        <?php for($i = count($cpu -> get_freq()) / 2; $i < count($cpu -> get_freq()); $i++) : ?>
                            <tr>
                                <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 font-bold text-indigo-400 ">Thread n°<?= $i ?></td>
                                <td id="thread<?=$i?>" class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $cpu -> get_freq()[$i] ?></td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </section>
            
            
                

        </section>
      
    </body>

</html>