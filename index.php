<?php 
    require_once "App/Class/Autoloader.php";
    Autoloader::register();

    $ram = new RAM();
    $other = new Other();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/tailwind.css">

        <title>Dashboard</title>
    </head>


    <nav class="bg-gray-800">
        <div class="mx-6 max-w-7xl px-2 sm:px-6 lg:px-8 none-sm">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="index.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>
                            <a href="specs.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Specs</a>
                            <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="index.php" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a>
                <a href="specs.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Specs</a>
                <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                
            </div>
        </div>
    </nav>

    <body class="bg-slate-900">


        <section class="m-8 flex-block mb-0">

            <div class="w-25 rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        OS
                        <span class="text-slate-500">|</span>
                        <span class="text-xs text-slate-500">Info</span>
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full  bi bi-laptop  mr-6"></i>
                        </div>
                        <div>
                            <h1 class="text-white text-2xl font-bold">Linux</h1>
                            <p class="text-xs font-bold text-slate-500"><?= Other::get_distrib() ?></p>
                        </div>
                    </div>                   
                </div>
            </div>


            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        RAM
                        <span class="text-slate-500">|</span>
                        <span class="text-xs text-slate-500">Usage</span>
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full  bi bi-memory  mr-6"></i>
                        </div>
                        <div>
                            <h1 id="used" class="text-white text-2xl font-bold"><?= $ram -> get_usage() . " Gb" ?></h1>
                            <p id="total" class="text-xs font-bold text-slate-500">On <?= $ram -> get_total() ?> Gb</p>
                        </div>
                    </div>                   
                </div>
            </div>

            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        DISK
                        <span class="text-slate-500">|</span>
                        <span class="text-xs text-slate-500">Usage</span>
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full  bi bi-hdd  mr-6"></i>
                        </div>
                        <div>
                            <h1 class="text-white text-2xl font-bold"><?= Disk::get_usage() ?> Gb</h1>
                            <p class="text-xs font-bold text-slate-500">On <?= Disk::get_total() ?> Gb</p>
                        </div>
                    </div>                   
                </div>
            </div>

            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        UP
                        <span class="text-slate-500">|</span>
                        <span class="text-xs text-slate-500">Since</span>
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full  bi bi-clock  mr-6"></i>
                        </div>
                        <div>
                            <h1 id="hours" class="text-white text-2xl font-bold"></h1>    
                            <p id="time" class="text-xs font-bold text-slate-500"></p>
                        </div>
                    </div>                   
                </div>
            </div>
        </section>        
        

        <section class="flex-block">
            <div class="w-50 m-8 mr-1 px-6 py-4 rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="font-bold text-xl mb-2 text-indigo-400">
                    CPU
                    <span class="text-slate-500">|</span>
                    <span class="text-xs text-slate-500">Usage in %</span>
                </div>  
                <div>
                    <div>
                        <canvas style="height: 53vh;" id="cpuChart"></canvas>
                    </div>
                </div>
            </div>


            <div class="w-50 m-8 ml-1 px-6 py-4 rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="font-bold text-xl mb-2 text-indigo-400">
                    RAM
                    <span class="text-slate-500">|</span>
                    <span class="text-xs text-slate-500">Usage in %</span>
                </div>  
                <div>
                    <div>
                        <canvas style="height: 53vh;" id="ramChart"></canvas>
                    </div>
                </div>
            </div>
        </section>
       
    </body>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/dashboard_cpu.js"></script>
    <script src="assets/js/dashboard_ram.js"></script>

</html>