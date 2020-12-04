<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class dbOOPage extends Page {

    public function __construct() {
        parent::__construct('Database', 'Location');
    }
    
    protected function init() : void {
        
        // if (isSet($_POST['new'])) {
        //     header('Location: showLocation.php?id=0');
        //     exit;
        // }
        
        if (isSet($_POST['old2'])) {
            header('Location: showLocation.php?id=' . $_POST['old2']);
            exit;
        }
        
    }

    protected function viewContent(): void {


        $locationDao = new LocationDao();
        $locations = $locationDao->readAll();
        printData($locations);
        include 'html/location.html.php';

    }

}

$page = new dbOOPage();
$page->view();