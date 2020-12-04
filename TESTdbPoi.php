<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class dbPoiPage extends Page {

    public function __construct() {
        parent::__construct('Database', 'POI');
    }
    
    protected function init() : void {
        
        // if (isSet($_POST['new'])) {
        //     header('Location: showLocation.php?id=0');
        //     exit;
        // }
        
        // if (isSet($_POST['old'])) {
        //     header('Location: showLocation.php?id=' . $_POST['old']);
        //     exit;
        // }
        
    }

    protected function viewContent(): void {


        $pointOfInterestDao = new PointOfInterestDao();
        $pointOfInterest = $pointOfInterestDao->readAll();
        printData($pointOfInterest);
        // include 'html/pointOfInterest.html.php';

    }

}

$page = new dbPoiPage();
$page->view();