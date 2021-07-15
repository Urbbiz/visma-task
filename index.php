<?php

require __DIR__.'/bootstrap.php';

use  Syllable\App\Application;

//var_dump(function_exists('mysqli_connect'));
//mysql  Ver 8.0.25-0ubuntu0.20.04.1 for Linux on x86_64 ((Ubuntu))

//print_r(PDO::getAvailableDrivers());

$runApp = new Application();
$runApp->runApp();