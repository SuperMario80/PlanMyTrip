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
        printData($tr);
            header('Location: travellerLoggedIn.php');
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
            $this->message = $this->locationDao->create($this->location)
                    ? 'New Location created'
                    : 'Location already exists';
        } else {
            $this->message = $this->locationDao->update($this->location)
                    ? 'Location Updated'
                    : 'Location NOT Updated';
        }
        
    }

    private function deleteLocation() {
        $this->readFormData();
        
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

