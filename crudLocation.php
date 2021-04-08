<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class crudLocationPage extends Page {

    
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
            $this->update();

        }
        
        if (isSet($_POST['delete'])) {
            
            $this->delete();

        }
        
        $message = $this->message;
        $location = $this->location;
        include 'html/createLocation.html.php';

    }

    
    // SAVES CREATED LOCATION IN DATABASE
    private function save() {

        
        $this->readFormData();
        
        
        if($this->location->getLocation() == NULL  || $this->location->getClassification() == NULL){
            
            $this->message = 'Please fill out ALL required Fields'; 
            
        }
        else {
            //creates new Location 
            if ($this->location->getId() == 0) {
                    //Variable to check for Duplicates
                    $duplicate = $this->locationDao->findDuplicate($this->location->getIdTraveller(), $this->location->getLocation(), $this->location->getClassification());
                    if($duplicate == NULL){
                    
                    
                    if($this->locationDao->create($this->location)){
                        printData("hello $duplicate");

                        $this->message = 'New Location created';
                        header('Refresh:2; url=travellerArea.php');
                    }
                }else{

                        $this->message = 'Location already exists';
                    }
            }
       
        }
    }
    // SAVES UPDATED LOCATION IN DATABASE
    private function update() {

         $this->readUpdateData();

         if ($this->location->getId() != 0) {
         if($this->locationDao->update($this->location)){
                    printData($this->location);
                    
                    $this->message = 'Location updated';
                    
                    header('Refresh:2; url=travellerArea.php');
                    
                }else{
                    printData($this->location);
                    $this->message = 'Location NOT Updated';

                }
            }


    }

    // DELETES EXISTING LOCATION
    private function delete() {
        $this->readFormData();
    
        if ($this->locationDao->delete($this->location)) {

            $this->message = 'Location removed';
            $this->location = new Location();
            header('Refresh:1; url=travellerArea.php');

        } else {

            $this->message = 'Location NOT Removed';
        }
    }
    // READS FORM DATA VALUES
    private function readFormData() {

        $this->location->setIdTraveller($this->location->getIdTraveller());
        $this->location->setLocation($_POST['location']);
        $this->location->setClassification($_POST['classification']);
        $this->location->setCountry($_POST['country']);
        $this->location->setRegion($_POST['region']);
        $this->location->setIntro($_POST['intro']);
        $this->location->setTravelLink($_POST['travelLink']);
        $this->location->setNotes($_POST['notes']);
    }

    
    private function readUpdateData() {

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

