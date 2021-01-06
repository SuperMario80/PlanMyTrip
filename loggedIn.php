<?php
declare(strict_types=1);
require_once 'inc/tools.inc.php';

class loggedInPage extends Page {

    public function __construct() {
        parent::__construct('Traveller Area', 'Traveller Area');
        $this->message = '';
        $this->password = '';
       
    }

    protected function init(): void {
        // $this->showTravLoc();
        // $this->showLocPois();
        //  if (isSet($_POST['logout'])){
        //      header('Location: travellerLogin.php');
        //      exit;
        //  }
        // $tr = unserialize($_SESSION['traveller']);
        // $travId = $tr->getId();
        if (isSet($_POST['updateLocation'])) {
                    
            header('Location: crudLocation.php?id=' . $_POST['updateLocation']);
            exit;
        }

         if (isSet($_POST['newLocation'])) {
            header('Location: crudLocation.php?id=' . $_POST['newLocation']);
            exit;
        }

           if (isSet($_POST['newPoi'])) {
            header('Location: crudPoi.php?id=0&idLoc=' . $_POST['newPoi']);
            exit;
        }
        
        if (isSet($_POST['updatePoi'])) {
            header('Location: crudPoi.php?id=' . $_POST['updatePoi']);
            exit;
        }
    }

    protected function viewContent(): void {

        $this->showTravLoc();
        $this->showLocPois();
}

        private function showTravLoc() {
            // printData($_SESSION);
            $tr = unserialize($_SESSION['traveller']);

            $idValue = $tr->getId();
            $foreignId = "idTraveller";
            $this->locationDao = new LocationDao();
            $this->locations = $this->locationDao->readForeign($idValue, $foreignId);
        }

        private function showLocPois() {
            foreach ($this->locations as $location) {
                $selectedLoc = $this->locations;
                $idValue = $location->getId();
                $foreignId = "idLocation";
                // intVal($_GET['id']);
                include 'html/location.html.php';
                // $idLocValue = $idValue;
                // printData($idLocValue);
                
                $this->pointOfInterestDao = new PointOfInterestDao();
                $this->pointOfInterest = $this->pointOfInterestDao->readForeign($idValue, $foreignId);

                $selectedPoi = $this->pointOfInterest;
                // include 'html/location.html.php';
                // if($idValue === $selectedPoi->idLocation()){
                if($selectedPoi != NULL){
                include 'html/pointOfInterest.html.php';
                }
            }
        }
}

$page = new loggedInPage();
$page->view();
