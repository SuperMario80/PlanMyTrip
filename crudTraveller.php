<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class crudTravellerPage extends Page {

    
    public function __construct() {
        parent::__construct('CRUD Location');
        $this->message = '';

    }


    protected function init() : void {

        if (isSet($_POST['back']) or !isSet($_GET['id'])) { 
            
            header('Location: travellerArea.php');
            exit;
        }

    }

    
    protected function viewContent(): void {
        
        // OPENS CREATE/UPDATE LOCATION FORM
        $id = intVal($_GET['id'] ?? 0);
        $this->locationDao = new LocationDao();
        $this->location = $this->locationDao->readOne($id);

        if ($this->location == null) {

            $this->location = new Location();
            $this->location->setIdTraveller($this->getTraveller()->getId());

        }
        
        if (isSet($_POST['save'])) {
            
            $this->save();

        }
        
        if (isSet($_POST['delete'])) {
            
            $this->delete();

        }
        
        $message = $this->message;
        $location = $this->location;
        // include 'html/showcase.html.php';
        include 'html/createLocation.html.php';

    }

    
    // SAVES CREATED OR UPDATED LOCATION IN DATABASE
    private function save() {
        
        $this->readFormData();
        
        if ($this->location->getId() == 0) {
            printData('hello');
            if($this->location->getLocation() == NULL  || $this->location->getClassification() == NULL){
            // if(empty($this->location->getLocation()) || empty($this->location->getClassification())){

            $this->message = 'Please fill out ALL required Fields'; 
            
            // create new Location
            }else{
                if($this->locationDao->create($this->location)){
                printData($this->location->getLocation());
                printData($this->location->getClassification());
                $this->message = 'New Location created';
                header('Refresh:2; url=travellerArea.php');
                // exit;
                }else{
                    $this->message = 'Location already exists';
                    }
            }

        // update existing Location
        } else {
            
                if($this->location->getLocation() == NULL  || $this->location->getClassification() == NULL){
              
                    $this->message = 'Please fill out ALL required Fields';
                }else{
                    if($this->locationDao->update($this->location)){
                $this->message = 'Location Updated';
                header('Refresh:2; url=travellerArea.php');
                    }else{
                    $this->message = 'Location NOT Updated';
                    }
            }
            // $this->message = $this->locationDao->update($this->location)
            //         ? 'Location Updated'  
            //         : 'Location NOT Updated';
        }
        
    }

    // DELETES EXISTING LOCATION
    private function delete() {
        $this->readFormData();
        //TODO double confirm 'Delete Location'
        if ($this->locationDao->delete($this->location)) {
            $this->message = 'Location removed';
            $this->location = new Location();
            header('Refresh:1; url=travellerArea.php');
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

$page = new crudLocationPage();
$page->initAll();
$page->view();

