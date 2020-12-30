<?php
session_start();


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


function myOwnAutoloader($classname) {
    $classfile = "classes/$classname.class.php";
    if (file_exists($classfile)) {
        require_once $classfile;
    }
}
spl_autoload_register('myOwnAutoloader');

