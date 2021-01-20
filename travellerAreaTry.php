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
                    
            include ('crudLocation.php?id=' . $_POST['updateLocation']);
    
        }

         if (isSet($_POST['newLocation'])) {
            include ('html/createLocation.html.php?id=' . $_POST['newLocation']);
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

        $this->showTravLoc();
        $this->showLocPois();

        $id = intVal($_GET['id'] ?? 0);
        $this->locationDao = new LocationDao();
        $this->location = $this->locationDao->readOne($id);

        if ($this->location == null) {
            $this->location = new Location();
            $this->location->setIdTraveller($this->getTraveller()->getId());
        }
         $message = $this->message;
        $location = $this->location;
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

        // SAVES CREATED OR UPDATED LOCATION IN DATABASE
    private function save() {
        $this->readFormData();
        
        if ($this->location->getId() == 0) {
            if($this->location->getLocation() == NULL  || $this->location->getClassification() == NULL){

            $this->message = 'Please fill out Location and Category'; 
            
            // create new Location
            }else{
                if($this->locationDao->create($this->location)){
                printData($this->location->getLocation());
                printData($this->location->getClassification());
                $this->message = 'New Location created';

                }else{
                    $this->message = 'Location already exists';
                    }
            }

        // update existing Location
        } else {
            $this->message = $this->locationDao->update($this->location)
                    ? 'Location Updated'
                    : 'Location NOT Updated';
        }
        
    }

    // DELETES EXISTING LOCATION
    private function delete() {
        $this->readFormData();
        //TODO double confirm 'Delete Location'
        if ($this->locationDao->delete($this->location)) {
            $this->message = 'Location removed';
            $this->location = new Location();
        } else {
            $this->message = 'Location NOT Removed';
        }
    }
    // READS FORM DATA VALUES FROM "html/createLocation.html.php" FILE VIA $_POST['arrayName']  IS SAME NAME LIKE IN  <input name ="arrayName"...>
    private function readFormData() {
        $this->location->setIdTraveller(intval($_POST['idTraveller']));
        $this->location->setLocation($_POST['location']);
        $this->location->setLocationKey($_POST['locationKey']);
        $this->location->setClassification($_POST['classification']);
        $this->location->setCountry($_POST['country']);
        $this->location->setRegion($_POST['region']);
        $this->location->setIntro($_POST['intro']);
        $this->location->setTravelLink($_POST['travelLink']);
        $this->location->setNotes($_POST['notes']);
    }
}

$page = new travellerAreaPage();
$page->view();
