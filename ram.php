<?php 
    require_once "App/Class/Autoloader.php";
    Autoloader::register();
    
    $ram = new RAM();
    
    require_once "App/Utils/Ram-more.php";
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

        <title>RAM</title>
    </head>

    <nav class="bg-gray-800">
        <div class="mx-6 max-w-7xl px-2 sm:px-6 lg:px-8 none-sm">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                            <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                            <a href="ram.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">RAM</a>
                            <a href="specs.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Specs</a>
                            <a href="disk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disk</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                <a href="ram.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">RAM</a>
                <a href="specs.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Specs</a>
                <a href="disk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disk</a>

            </div>
        </div>
    </nav>

    <body class="bg-slate-900">
        <section class="m-8 mt-12 flex-block">
            <div class="w-25 rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                
                <div class="px-6 py-3 mb-2">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        RAM
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-memory mr-6"></i>
                        </div>
                        <div>
                            <h1 id="used" class="text-white text-4xl font-bold my-auto"> <?= $ram -> get_usage() . " Gb" ?> </h1>
                            <p class="text-xs font-bold text-sky-600"> On <?= $ram -> get_total() ?> Gb</p>
                        </div>
                    </div>                   
                </div>
            </div>
            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-3 mb-2">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        RAM 
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-percent mr-6"></i>
                        </div>
                        <h1 id="ram-percent" class="text-white text-4xl font-bold my-auto "> <?= round($ram -> get_usage_percent()) . "%" ?></h1>
                    </div>                   
                </div>
            </div>  

            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-3 mb-2">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        Swap 
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-nvme mr-6"></i>
                        </div>
                        <div>
                            <h1 id="swap" class="text-white text-4xl font-bold my-auto "> <?= $ram -> get_swap_usage() . " Gb" ?></h1>
                            <p class="text-xs font-bold text-sky-600"> On <?= $ram -> get_swap_total() ?> Gb</p>
                        </div>
                    </div>                   
                </div>
            </div>   
            <div class="w-25 mr-mt rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="px-6 py-3 mb-2">
                    <div class="font-bold text-xl mb-2 text-indigo-400">
                        Swap 
                    </div>
                    <div class="flex">
                        <div class="flex m-auto mx-0 ">
                            <i class="text-2xl h-14 px-4 py-3 bg-slate-600 rounded-full bi bi-percent mr-6"></i>
                        </div>
                        <h1 id="swap-percent" class="text-white text-4xl font-bold my-auto "> <?= $ram -> get_swap_usage_percent() . "%" ?></h1>
                    </div>                   
                </div>
            </div>   


      
        </section>   
        
        <section class="m-8 mt-8 ram-more flex direction">

            <div class="bg-slate-800 shadow-sm overflow-hidden rounded-lg w-30">
                <table class="border-collapse table-auto w-full text-sm mt-4">
                    <thead>
                        <tr>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left" style="width: 50%">Name</th>
                            <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Value</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-slate-800">

                        <?php foreach($INFO as $name => $value): ?>
                        <tr>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?= $name ?></td>
                            <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $value ?></td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                
                </table>
            </div>



            <div class="w-70 ml-4 px-6 py-4 rounded overflow-hidden shadow-lg bg-slate-800 text-white">
                <div class="font-bold text-xl mb-2 text-indigo-400">
                    RAM
                    <span class="text-slate-500">|</span>
                    <span class="text-xs text-slate-500">Usage in %</span>
                </div>  
                <div>
                    <div>
                        <canvas style="height: 50vh;" id="ramChart"></canvas>
                    </div>
                </div>
            </div>
        </section>

        <script src="assets/js/ram.js"></script>
    </body>
</html>