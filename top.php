<?php 
    require_once "App/Class/Autoloader.php";
    Autoloader::register();

    $top = new TOP();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/tailwind.css">

        <title>TOP</title>
    </head>

    <nav class="bg-gray-800">
        <div class="mx-6 max-w-7xl px-2 sm:px-6 lg:px-8 none-sm">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                            <a href="system.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">System</a>
                            <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>                            
                            <a href="ram.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">RAM</a>
                            <a href="top.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">TOP</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                <a href="system.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">System</a>
                <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                <a href="ram.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">RAM</a>
                <a href="top.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">TOP</a>
            </div>
        </div>
    </nav>

    <body class="bg-slate-900">

        <section class="m-8 w-100 rounded overflow-scroll shadow-lg bg-slate-800 text-white system">
                <div class="font-bold text-xl m-4 text-indigo-400 flex justify-between">
                    <div>
                        TOP
                        <span class="text-slate-500">|</span>
                        <span class="text-xs text-slate-500">Processes</span>

                    </div>

                    <div>
                        <span class="text-xs text-slate-500">Sorted by:</span>
                        <select id="sort-input" class="text-xs text-white bg-indigo-400 rounded-full p-1">
                            <option value="cpu">CPU</option>
                            <option value="mem">MEM</option>
                        </select>
                    </div>

                </div>

                <div class="relative rounded-xl overflow-auto" style="height: 75vh;">
                    <div class="shadow-sm overflow-hidden my-8">
                        <table class="border-collapse table-auto w-full text-sm" >
                            <thead>
                            <tr>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">#</th>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">PID</th>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Command</th>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">User</th>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">CPU</th>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">MEM</th>
                            </tr>
                            </thead>
                            <tbody id="top" class="bg-white dark:bg-slate-800">

                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
      
    </body>
    <script src="assets/js/top.js"></script>
</html>