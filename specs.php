<?php 
    include "App/Class/Other.php";
    require_once "App/Utils/Specs.php"; 
    $content = file_get_contents("/etc/os-release");
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

        <title>Specs</title>
    </head>


    <nav class="bg-gray-800">
        <div class="mx-6 max-w-7xl px-2 sm:px-6 lg:px-8 none-sm">
            <div class="relative flex h-16 items-center justify-between">
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="index.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Dashboard</a>
                            <a href="specs.php" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Specs</a>
                            <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                            <a href="ram.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">RAM</a>
                            <a href="disk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disk</a>
                         </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="sm:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <a href="index.php"  class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Dashboard</a>
                <a href="specs.php" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Specs</a>
                <a href="cpu.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">CPU</a>
                <a href="ram.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">RAM</a>
                <a href="disk.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Disk</a>
            </div>
        </div>
    </nav>


    <body class="bg-slate-900">
        <div class="flex-block" style="margin-top: 3%;">
            <section class="mt-8 ml-8 mr-4 ascii-logo rounded  bg-slate-900 text-white overflow-scroll">

                <?php if(strpos($content, "arch") !== false): ?>
                    <pre class="text-fuchsia-400">
                  -`
                 .o+`
                `ooo/
               `+oooo:
              `+oooooo:
              -+oooooo+:
            `/:-:++oooo+:
           `/++++/+++++++:
          `/++++++++++++++:
         `/+++ooooooooooooo/`
        ./ooosssso++osssssso+`
       .oossssso-````/ossssss+`
      -osssssso.      :ssssssso.
     :osssssss/        osssso+++.
    /ossssssss/        +ssssooo/-
  `/ossssso+/:-        -:/+osssso+-
 `+sso+:-`                 `.-/+oso:
`++:.                           `-/+/
.`                                 `/
                        </pre>
    
                <?php elseif(strpos($content, "debian") !== false): ?>
                        <pre class="text-fuchsia-400">
       _,met$$$$$gg.
    ,g$$$$$$$$$$$$$$$P.
  ,g$$P"     """Y$$.".
 ,$$P'              `$$$.
',$$P       ,ggs.     `$$b:
`d$$'     ,$P"'   .    $$$
 $$P      d$'     ,    $$P
 $$:      $$.   -    ,d$$'
 $$;      Y$b._   _,d$P'
 Y$$.    `.`"Y$$$$P"'
 `$$b      "-.__
  `Y$$
   `Y$$.
     `$$b.
       `Y$$b.
          `"Y$b._
              `"""
                        </pre>

                    <?php elseif(strpos($content, "rhel") !== false || strpos($osReleaseContent, 'centos') !== false): ?>
                        <pre class="text-fuchsia-400">
           .MMM..:MMMMMMM
          MMMMMMMMMMMMMMMMMM
          MMMMMMMMMMMMMMMMMMMM.
         MMMMMMMMMMMMMMMMMMMMMM
        ,MMMMMMMMMMMMMMMMMMMMMM:
        MMMMMMMMMMMMMMMMMMMMMMMM
  .MMMM'  MMMMMMMMMMMMMMMMMMMMMM
 MMMMMM    `MMMMMMMMMMMMMMMMMMMM.
MMMMMMMM      MMMMMMMMMMMMMMMMMM .
MMMMMMMMM.       `MMMMMMMMMMMMM' MM.
MMMMMMMMMMM.                     MMMM
`MMMMMMMMMMMMM.                 ,MMMMM.
 `MMMMMMMMMMMMMMMMM.          ,MMMMMMMM.
    MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
      MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM:
         MMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
            `MMMMMMMMMMMMMMMMMMMMMMMM:
                ``MMMMMMMMMMMMMMMMM'
                        </pre>   

                    <?php else: ?>
                        <pre class="text-fuchsia-400">
                              ......
                           ,,+++++++,.
                         .,,,....,,,+**+,,.
                       ............,++++,,,
                      ...............
                    ......,,,........
                  .....+*#####+,,,*+.
              .....,*###############,..,,,,,,..
           ......,*#################*..,,,,,..,,,..
         .,,....*####################+***+,,,,...,++,
       .,,..,..*#####################*,
     ,+,.+*..*#######################.
   ,+,,+*+..,########################*
.,++++++.  ..+##**###################+
.....      ..+##***#################*.
           .,.*#*****##############*.
           ..,,*********#####****+.
     .,++*****+++*****************+++++,.
      ,++++++**+++++***********+++++++++,
     .,,,,++++,..  .,,,,,.....,+++,.,,
                        </pre>
                    <?php endif; ?>

            </section>


            <section class="mt-8 mr-4 rounded overflow-scroll shadow-lg bg-slate-800 text-white specs">
                <div class="font-bold text-xl m-4 text-indigo-400">
                    MACHINE
                    <span class="text-slate-500">|</span>
                    <span class="text-xs text-slate-500">Specs</span>
                </div>

                <div class="relative rounded-xl overflow-auto">
                    <div class="shadow-sm overflow-hidden my-8">
                        <table class="border-collapse table-auto w-full text-sm">
                            <thead>
                            <tr>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left" style="width: 50%">Name</th>
                                <th class="border-b dark:border-slate-600 font-medium p-4 pt-0 pb-3 text-slate-400 dark:text-slate-200 text-left">Value</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-slate-800">
                                <?php foreach($SPECS as $name => $value): ?>
                                <tr>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400"><?= $name ?></td>
                                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 text-slate-500 dark:text-slate-400"><?= $value ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>
        </div>
    </body>
</html>