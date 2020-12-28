<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class crudLocationPage extends Page {
    
    public function __construct() {
        parent::__construct('PlanMyTrip', 'Location');
        $this->message = '';
    }


    protected function init() : void {

        if (isSet($_POST['back']) or !isSet($_GET['id'])) { 
            // $travId = $this->location->getTravellerId();
        // printData($tr);
            header('Location: loggedIn.php');
            exit;
        }
        $this->saveRequestedLoc();
        printData($this->saveRequestedLoc());
       
    }
    

    protected function viewContent(): void {
        // $tr = unserialize($_SESSION['traveller']);
        // $travId = $tr->getId();
        // OPENS CREATE/UPDATE LOCATION FORM
        $id = intVal($_GET['id'] ?? 0);
        $this->locationDao = new LocationDao();
        $this->location = $this->locationDao->readOne($id);
        if ($this->location == null) {
            // $this->location->getIdTraveller() = $travId;
            $this->location = new Location();
            $this->location->setIdTraveller($this->getTraveller()->getId());
        }
        
        if (isSet($_POST['save'])) {
            // Save-Button gedrückt
            $this->saveLocation();
        }
        
        if (isSet($_POST['delete'])) {
            // Delete-Button gedrückt
            $this->deleteLocation();
        }
        
        $message = $this->message;
        $location = $this->location;
        include 'html/createLocation.html.php';
    }
    
    private function saveLocation() {
        $this->readFormData();
        
        if ($this->location->getId() == 0) {
            if($this->location->getLocation() == NULL  || $this->location->getClassification() == NULL){
            // if(empty($this->location->getLocation()) || empty($this->location->getClassification())){
                $this->message = 'Please fill out Location and Category'; 
    
            }else{
                if($this->locationDao->create($this->location)){
                printData($this->location->getLocation());
                printData($this->location->getClassification());
                $this->message = 'New Location created';

                }else{
                    $this->message = 'Location already exists';
                    }
                }


        } else {
            $this->message = $this->locationDao->update($this->location)
                    ? 'Location Updated'
                    : 'Location NOT Updated';
        }
        
    }
//  private function saveRequestedLoc() {
//     //  $this->readFormData();
//     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
//         //RECEIVE THE RAW POST DATA FROM main.js
//         $content = file_get_contents("php://input");
        
//         //Decode the incoming RAW post data from JSON
//         $array = json_decode($content, true);
        
//         $this->locationDao->create($this->array);
//        //SAVING POST DATA IN VARIABLES
//         $getLocation = $array['location'];
//         $getClassification = $array['classification'];
//         $getCountry = $array['country'];
//         $getRegion = $array['region'];
//         $getIntro = $array['intro'];
//         $getTravelLink = $array['travelLink'];
        
//         // $_POST(['name']);
//         // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
                            
                
//             }
//             // else{
//             //             throw new Exception( "no json data received");
                
//             // }
 }
      



    private function deleteLocation() {
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
        $this->location->setClassification($_POST['classification']);
        $this->location->setCountry($_POST['country']);
        $this->location->setRegion($_POST['region']);
        $this->location->setIntro($_POST['intro']);
        $this->location->setTravelLink($_POST['travelLink']);
        $this->location->setNotes($_POST['notes']);
    }
}

$page = new crudLocationPage();
$page->view();

