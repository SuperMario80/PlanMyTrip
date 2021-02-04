<?php
declare(strict_types=1);
require_once 'inc/tools.inc.php';

class travellerAreaPage extends Page {

    public function __construct() {
        parent::__construct('Traveller Tables');
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
        include_once 'html/showcase.html.php';
        include 'html/modal.html.php';

        
        $this->showTravLoc();
        $this->showLocPois();

        
}
        //SHOWS ALL SAVED LOCATIONS FROM LOGGED-IN TRAVELLER
        private function showTravLoc() {

            // gets data from logged-in Traveller
            $tr = unserialize($_SESSION['traveller']);

            //id from current traveller
            $idValue = $tr->getId();

            //variable for database column 'idTraveller'
            $foreignId = "idTraveller";
            $this->locationDao = new LocationDao();

            //compares all data from Location-Table where idTraveller matches current Travellers Id
            $this->locations = $this->locationDao->readForeign($idValue, $foreignId);
        }
        //SHOWS ALL SAVED POINTS OF INTEREST TO EVERY LOCATION FROM LOGGED-IN TRAVELLER
        private function showLocPois() {
            //Shows every Poi for saved Location
            foreach ($this->locations as $location) {
                
                //id from Travellers saved Location
                $idValue = $location->getId();

                //variable for database column 'idLocation' in PointOfInterest
                $foreignId = "idLocation";
                
                
                $this->pointOfInterestDao = new PointOfInterestDao();

                //compares all data from PointOfInterest-Table where idPoi matches Location Id
                $this->pointOfInterest = $this->pointOfInterestDao->readForeign($idValue, $foreignId);
                

                $selectedPoi = $this->pointOfInterest;

                include 'html/location.html.php';

                //shows html for PointOfINterst only when data exists
                if($selectedPoi != NULL){
                include 'html/pointOfInterest.html.php';
                }
            }
        }
}

$page = new travellerAreaPage();
$page->view();
