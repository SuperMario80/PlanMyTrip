<?php
session_start();

// Hier kommen zentrale Inhalte rein, die für alle PHP-Seiten gleichermassen 
// relevant sind.
// Diese Seite wird als ERSTES in jeder PHP-Seite includiert


// Konstanten-Deklaration mit dem Schlüsselwort 'const'
const BR = '<br>';
const NL = "\n";

// Konstanten-Deklaration mit der Funktion 'define'
define('BRNL', BR . NL);



function printData($data, $varDump = false) {
    echo '<pre>';
    if ($varDump) {
        var_dump($data);
    } else {
        print_r($data);
    }
    echo '</pre>';
}


// 
// Zentraler Autoload-Mechanismus für das gesamte Projekt
// 

// für das inkludieren der Klassen-Dateien bietet PHP einen autoload-mechanismus
//function __autoload($classname) {
////    echo $classname, BRNL;
//    $classfile = "classes/$classname.class.php";
//    echo $classfile, BRNL;
//    include $classfile;
//}

function myOwnAutoloader($classname) {
    $classfile = "classes/$classname.class.php";
    if (file_exists($classfile)) {
        require_once $classfile;
    }
}
spl_autoload_register('myOwnAutoloader');

