<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class locationApiRequestPage extends Page {
    
    public function __construct() {
        parent::__construct('PlanMyTrip', 'API Location');
        $this->message = '';
    }


    protected function init() : void {

      
        // $this->saveLocationFromJSON();
        // printData($this->saveLocationFromJSON());
       
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
            $this->saveLocationApi();
        }
        
        // if (isSet($_POST['delete'])) {
        //     // Delete-Button gedrückt
        //     $this->deleteLocation();
        // }
        
        $message = $this->message;
        $location = $this->location;
        include 'html/createLocation.html.php';
    }
    
//  private function saveLocationApi() {
//         $this->readFormData();

//         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
//     //RECEIVE THE RAW POST DATA FROM main.js
//     $content = file_get_contents("php://input");
    
//     //Decode the incoming RAW post data from JSON
//     $array = json_decode($content, true);
//     printData($array);
    
//     $this->locationDao->create($this->array);
//    //SAVING POST DATA IN VARIABLES
//     $location = $array['name'];
//     $classification = $array['type'];
//     $country = $array['country_id'];
//     $region = $array['part_of'];
//     $intro = $array['intro'];
    
//     // $_POST(['name']);
//     // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
                        
            
//         // }
//         // else{
//         //             throw new Exception( "no json data received");
            
//         // }
// }
        
//         if ($this->location->getId() == 0) {
//             if($this->location->getLocation() == NULL  || $this->location->getClassification() == NULL){
//             // if(empty($this->location->getLocation()) || empty($this->location->getClassification())){
//                 $this->message = 'Please fill out Location and Category'; 
    
//             }else{
//                 if($this->locationDao->create($this->location)){
//                 printData($this->location->getLocation());
//                 printData($this->location->getClassification());
//                 $this->message = 'New Location created';

//                 }else{
//                     $this->message = 'Location already exists';
//                     }
//                 }


//         } else {
//             $this->message = $this->locationDao->update($this->location)
//                     ? 'Location Updated'
//                     : 'Location NOT Updated';
//         }
        
//     }


//  private function readFormData() {
//         $this->location->setIdTraveller(intval($_POST['idTraveller']));
//         $this->location->setLocation($_POST['location']);
//         $this->location->setClassification($_POST['classification']);
//         $this->location->setCountry($_POST['country']);
//         $this->location->setRegion($_POST['region']);
//         $this->location->setIntro($_POST['intro']);
//         $this->location->setTravelLink($_POST['travelLink']);
//         $this->location->setNotes($_POST['notes']);
//     }
    
private function saveLocationApi() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //RECEIVE THE RAW POST DATA FROM main.js
    $content = file_get_contents("php://input");
    
    //Decode the incoming RAW post data from JSON
    $array = json_decode($content, true);
    printData($array);
 }
}
    
    
}
//  private function saveLocationFromJSON() {
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
//     //RECEIVE THE RAW POST DATA FROM main.js
//     $content = file_get_contents("php://input");
    
//     //Decode the incoming RAW post data from JSON
//     $array = json_decode($content, true);
    
//     $this->locationDao->create($this->array);
//    //SAVING POST DATA IN VARIABLES
//     $location = $array['name'];
//     $classification = $array['type'];
//     $country = $array['country_id'];
//     $region = $array['part_of'];
//     $intro = $array['intro'];
    
//     // $_POST(['name']);
//     // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
                        
            
//         // }
//         // else{
//         //             throw new Exception( "no json data received");
            
//         // }
// }

$page = new locationApiRequestPage();
$page->view();

