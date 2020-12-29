<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class locRequestPage extends Page {

   private LocationDao $locationDao;
    private array $locations;
    private Location $location;
    private ?Traveller $traveller;
    
    public function __construct() {
        parent::__construct('PlanMyTrip', 'API Location');
        $this->message = '';
        $this->locationDao = new LocationDao();
    }


    protected function init() : void {
        // if (isSet($_POST['save'])) {
        //     // Save-Button gedrückt
            // $this->saveRequestedLoc();
        // }

      
        // $this->saveLocationFromJSON();
        // printData($this->saveLocationFromJSON());
       
    }
    

    protected function viewContent(): void {
         printData($_REQUEST);
        printData($_POST);
        printData(file_get_contents('php://input'));
        // $tr = unserialize($_SESSION['traveller']);
        // $travId = $tr->getId();
        // OPENS CREATE/UPDATE LOCATION FORM
        // $id = intVal($_GET['id'] ?? 0);
        // $this->location = $this->locationDao->readOne($id);
        // if ($this->location == null) {
        //     // $this->location->getIdTraveller() = $travId;
        //     $this->location = new Location();
        //     $this->location->setIdTraveller($this->getTraveller()->getId());
        // }
        $this->saveRequestedLoc();
                
                $message = $this->message;
                $location = $this->location;
                include 'html/createLocation.html.php';
            }
            
            
     function saveRequestedLoc() {
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            //RECEIVE THE RAW POST DATA FROM app.js
            $content = file_get_contents('php://input');
            
            printData($content);
            //Decode the incoming RAW post data from JSON
            $locData = json_decode($content, true);
            //SAVING POST DATA IN VARIABLES
            $this->location = new Location();
               $this->location->setIdTraveller($this->getTraveller()->getId());
            // $this->location->setIdTraveller(1);
            $this->location->setLocation($locData['location']);
            $this->location->setClassification($locData['classification']);
            $this->location->setCountry($locData['country']);
            // $this->location->setRegion(empty($locData['region']));
            $this->location->setIntro($locData['intro']);
            $this->location->setTravelLink($locData['travelLink']);
        
            printData($this->locationDao->create($this->location));

            // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
            printData($locData);
            
        // }
    }
}


$page = new locRequestPage();
$page->view();

