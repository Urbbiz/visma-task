<?php

require __DIR__.'/bootstrap.php';

use  Syllable\App\Application;

// Echo "If you want to syllable sentence press Esc and write index.php --sentence";

// if($argc > 1 && ($argv[1] == '--sentence' || $argv[1] == '--aaa')){
//     echo "Enter the date you want to see the vaccination list: ";

    
//     };
    
    // exit(0);

$runApp = new Application();
$runApp->runApp();