<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class showLocationPage extends Page {
    
    private string $message;
    private LocationDao $locationDao;
    private ?Location $location;

    public function __construct() {
        parent::__construct('PlanMyTrip', 'Location');
        $this->message = '';
    }

    protected function init() : void {
        
        if (isSet($_POST['back']) or !isSet($_GET['id'])) {
            header('Location: dbOO.php');
            exit;
        }
    }
    
    protected function viewContent(): void {
        
        $id = intVal($_GET['id']);
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
        include 'html/location.html.php';
    }
    
    private function saveLocation() {
        $this->readFormData();
        
        if ($this->location->getId() == 0) {
            $this->message = $this->locationDao->create($this->location)
                    ? 'New Point Of Interest created'
                    : 'Point Of Interest already exists';
        } else {
            $this->message = $this->locationDao->update($this->location)
                    ? 'Point Of Interest Updated'
                    : 'Point Of Interest NOT Updated';
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
        $this->location->setIdTraveller($_POST['idTraveller']);
        $this->location->setLocation($_POST['location']);
        $this->location->setClassification($_POST['classification']);
        $this->location->setCountry($_POST['country']);
        $this->location->setRegion($_POST['region']);
        $this->location->setIntro($_POST['intro']);
        $this->location->setTravelLink($_POST['travelLink']);
        $this->location->setNotes($_POST['notes']);
    }

}

$page = new showLocationPage();
$page->view();

