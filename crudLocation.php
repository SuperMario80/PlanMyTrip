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
    }
    

    protected function viewContent(): void {
        // $tr = unserialize($_SESSION['traveller']);
        // $travId = $tr->getId();
        // printData($travId);
          
       
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
            // $this->message = $this->locationDao->create($this->location)
            // //TODO Unterteilung 'Please fill out Name  of location' hinzufügen
            //         ? 'New Location created'
            //         : 'Location already exists';
            if($this->locationDao->create($this->location)){

            // printData($this->location->getClassification());
            // if($this->location->getLocation() != NULL  && $this->location->getClassification() != NULL){
            if(!empty($this->location->getLocation()) && !empty($this->location->getClassification())){
                    printData($this->location->getLocation());
                    printData($this->location->getClassification());
                    $this->message = 'New Location created';


                     
                }elseif ($this->location->getLocation() == "" || $this->location->getClassification() == "") {

                    $this->message = 'Please fill out Location and Category'; 
                    printData($this->location->getLocation());
                    printData($this->location->getClassification());
                
                }
            
            }
            else{
                $this->message = 'Location already exists';
            }  
            
            
               
           
        

        } else {
            $this->message = $this->locationDao->update($this->location)
                    ? 'Location Updated'
                    : 'Location NOT Updated';
        }
        
    }
 private function saveLocationFromJSON() {
     $this->readFormData();
    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->locationDao->create($this->JSONdata);
        
        //RECEIVE THE RAW POST DATA FROM main.js
        $content = file_get_contents("php://input");
    
        //Decode the incoming RAW post data from JSON
        $JSONdata = json_decode($content, true);

       //SAVING POST DATA IN VARIABLES
        $location = $JSONdata['name'];
        $classification = $JSONdata['type'];
        $country = $JSONdata['country_id'];
        $region = $JSONdata['part_of'];
        $userLoggedIn = $JSONdata['intro'];
  
        //SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
                            
                
            }
            else{
                        throw new Exception( "no json data received");
                
            }
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

