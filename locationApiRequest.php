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
            $this->saveLocationFromJSON();
        }
        
        if (isSet($_POST['delete'])) {
            // Delete-Button gedrückt
            $this->deleteLocation();
        }
        
        $message = $this->message;
        $location = $this->location;
        include 'html/createLocation.html.php';
    }
    
 private function saveLocationFromJSON() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        //RECEIVE THE RAW POST DATA FROM main.js
        $content = file_get_contents("php://input");
        
        //Decode the incoming RAW post data from JSON
        $array = json_decode($content, true);
        
        $this->locationDao->create($this->array);
       //SAVING POST DATA IN VARIABLES
        $location = $array['name'];
        $classification = $array['type'];
        $country = $array['country_id'];
        $region = $array['part_of'];
        $intro = $array['intro'];
        
        // $_POST(['name']);
        // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
                            
                
            }
            // else{
            //             throw new Exception( "no json data received");
                
            // }
 }
      




}

$page = new locationApiRequestPage();
$page->view();

