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
        // if (isSet($_POST['delete'])) {
        //     header('Location: crudLocation.php?id=' . $_POST['delete']);
        //     exit;
        // }
        // $travId = $tr->getId();
        if (isSet($_POST['updateTraveller'])) {
                
            header('Location: createTraveller.php?id=' . $_POST['updateTraveller']);
            exit;
        }


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
        include_once 'html/locationList.html.php';
        // include_once 'html/createLocBtn.html.php';
        // include_once 'html/showcase.html.php';
        include_once 'html/modal.html.php';
        
        // $this->showTraveller();
        $this->showTravLoc();
        $this->showLocPois();
        
        // if($this->showTravLoc() == NULL){
            
        // }
        // include_once 'html/locationList.html.php';

        
}
    //     private function showTraveller(){

    //     if(view()->initSession() != NULL){

    //         $tr = unserialize($_SESSION['traveller']);
    //         printData($tr);
       
    //                id from current traveller
    //                $idTr = $tr->getId();
    //     }
    // }






        //SHOWS ALL SAVED LOCATIONS FROM LOGGED-IN TRAVELLER
        private function showTravLoc() {
  

            // gets data from logged-in Traveller
            $tr = unserialize($_SESSION['traveller']);
            printData($tr);

            //id from current traveller
            $idValue = $tr->getId();

            //variable for database column 'idTraveller'
            // $foreignId = "idTraveller";
            // $yourColumn = "classification";
            $this->locationDao = new LocationDao();

            //compares all data from Location-Table where idTraveller matches current Travellers Id
           
            // $this->locations = $this->locationDao->readForeign($idValue, $foreignId, $yourColumn);
            // $this->locations = $this->locationDao->showLocForKey($idValue);
            $this->locations = $this->locationDao->readForeign($idValue);

            // include_once 'html/locationList.html.php';
        }
        //SHOWS ALL SAVED POINTS OF INTEREST TO EVERY LOCATION FROM LOGGED-IN TRAVELLER
        private function showLocPois() {
            //Shows every Poi for saved Location
            foreach ($this->locations as $location) {
                
                //id from Travellers saved Location
                $idValue = $location->getId();

                //variable for database column 'idLocation' in PointOfInterest
                // $foreignId = "idLocation";
                // $yourColumn = "poiName";
                
                
                $this->pointOfInterestDao = new PointOfInterestDao();

                //compares all data from PosintOfInterest-Table where idPoi matches Location Id
                // $this->pointOfInterest = $this->pointOfInterestDao->readForeign($idValue, $foreignId, $yourColumn);
                // $this->pointOfInterest = $this->pointOfInterestDao->showPoiForKey($idValue);
                $this->pointOfInterest = $this->pointOfInterestDao->readForeign($idValue);
                

                $selectedPoi = $this->pointOfInterest;

                // include_once 'html/locationList.html.php';
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
