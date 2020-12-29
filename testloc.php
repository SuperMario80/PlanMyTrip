<?php
declare(strict_types=1);
// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
require_once 'inc/tools.inc.php';

// print_r($_REQUEST);
// print_r($_POST);
// print_r($_GET);
// print_r(file_get_contents('php://input'));
// print_r(file_get_contents('php://input'));
// print_r(file_get_contents('php://input'));



// class locRequestPage extends Page {

//     private LocationDao $locationDao;
//     private array $locations;
//     private Location $location;
//     private ?Traveller $traveller;
    
//     public function __construct() {
//         parent::__construct('PlanMyTrip', 'API Location');
//         $this->message = '';
//         $this->locationDao = new LocationDao();
//     }


//     protected function init() : void {
      

      
//         // $this->saveLocationFromJSON();
//         // printData($this->saveLocationFromJSON());
       
//     }
    

//     protected function viewContent(): void {
//         printData($_REQUEST);
//         printData($_POST);
//         printData(file_get_contents('php://input'));
//         // $tr = unserialize($_SESSION['traveller']);
//         // $travId = $tr->getId();
//         // OPENS CREATE/UPDATE LOCATION FORM
//         $id = intVal($_GET['id'] ?? 0);
//         $this->location = $this->locationDao->readOne($id);
//         if ($this->location == null) {
//             // $this->location->getIdTraveller() = $travId;
//             $this->location = new Location();
//             $this->location->setIdTraveller($this->getTraveller()->getId());
//         }
//         $this->saveRequestedLoc();
           
//         // printData($this->saveRequestedLoc());
        
//         // if (isSet($_POST['save'])) {
//             //     // Save-Button gedrückt
//             //     $this->saveRequestedLoc();
//             // }
            
//             // if (isSet($_POST['delete'])) {
//                 //     // Delete-Button gedrückt
//                 //     $this->deleteLocation();
//                 // }
                
//                 $message = $this->message;
//                 $location = $this->location;
//                 include 'html/createLocation.html.php';
//             }
            
            
//     function saveRequestedLoc() {
//         // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
//             // $this->readFormData();
//             //RECEIVE THE RAW POST DATA FROM main.js
//             $content = file_get_contents('php://input');
            
//             printData($content);
//             //Decode the incoming RAW post data from JSON
//             $locData = json_decode($content, true);
//             //SAVING POST DATA IN VARIABLES
//             $this->location = new Location();
//                $this->location->setIdTraveller($this->getTraveller()->getId());
//             // $this->location->setIdTraveller(1);
//             $this->location->setLocation($locData['location']);
//             $this->location->setClassification($locData['classification']);
//             $this->location->setCountry($locData['country']);
//             // $this->location->setRegion($locData['region']);
//             $this->location->setIntro($locData['intro']);
//             $this->location->setTravelLink($locData['travelLink']);
//             // // $_POST(['name']);
//             // $this->locationDao->create($location);
//             printData($this->locationDao->create($this->location));
//             // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
//             printData($locData);
            
//         // }
//     }

    // private function readFormData() {
    //     $this->location->setIdTraveller(intval($_POST['idTraveller']));
    //     $this->location->setLocation($_POST['location']);
    //     $this->location->setClassification($_POST['classification']);
    //     $this->location->setCountry($_POST['country']);
    //     $this->location->setRegion($_POST['region']);
    //     $this->location->setIntro($_POST['intro']);
    //     $this->location->setTravelLink($_POST['travelLink']);
    //     $this->location->setNotes($_POST['notes']);
    // }

//         // }
//         // else{
//         //             throw new Exception( "no json data received");
            
//         // }
// }


    // private function readFormData() {
    //     $this->location->setIdTraveller(intval($_POST['idTraveller']));
    //     $this->location->setLocation($_POST['location']);
    //     $this->location->setClassification($_POST['classification']);
    //     $this->location->setCountry($_POST['country']);
    //     $this->location->setRegion($_POST['region']);
    //     $this->location->setIntro($_POST['intro']);
    //     $this->location->setTravelLink($_POST['travelLink']);
    //     $this->location->setNotes($_POST['notes']);
    // }
    
}


$page = new locRequestPage();
$page->saveRequestedLoc();

