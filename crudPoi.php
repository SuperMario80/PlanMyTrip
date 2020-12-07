<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class showPoiPage extends Page {
    
    private string $message;
    private PointOfInterestDao $pointOfInterestDao;
    private ?PointOfInterest $poi;

    public function __construct() {
        parent::__construct('PlanMyTrip', 'PointOfInterest');
        $this->message = '';
    }

    protected function init() : void {
        
        if (isSet($_POST['back']) or !isSet($_GET['id'])) {
            header('Location: travellerLoggedIn.php');
            exit;
        }
    }
    
    protected function viewContent(): void {
        
        $id = intVal($_GET['id'] ?? 0);
        $this->pointOfInterestDao = new PointOfInterestDao();
        $this->poi = $this->pointOfInterestDao->readOne($id);
        if ($this->poi == null) {
            $this->poi = new PointOfInterest();
        }
        
        if (isSet($_POST['save'])) {
            // Save-Button gedrückt
            $this->savePoi();
        }
        
        if (isSet($_POST['delete'])) {
            // Delete-Button gedrückt
            $this->deletePoi();
        }
        
        $message = $this->message;
        $poi = $this->poi;
        include 'html/poi.html.php';
    }
    
    private function savePoi() {
        $this->readFormData();
        
        if ($this->poi->getId() == 0) {
            $this->message = $this->pointOfInterestDao->create($this->poi)
                    ? 'New Point Of Interest created'
                    : 'Point Of Interest already exists';
        } else {
            $this->message = $this->pointOfInterestDao->update($this->poi)
                    ? 'Point Of Interest Updated'
                    : 'Point Of Interest NOT Updated';
        }
        
    }

    private function deletePoi() {
        $this->readFormData();
        
        if ($this->pointOfInterestDao->delete($this->poi)) {
            $this->message = 'Point Of Interest Removed';
            $this->poi = new PointOfInterest();
        } else {
            $this->message = 'Point Of Interest NOT Removed';
        }
    }
    
    private function readFormData() {
        $this->poi->setIdLocation(intval($_POST['idLocation']));
        $this->poi->setPoiName($_POST['poiName']);
        $this->poi->setAttraction($_POST['attraction']);
        $this->poi->setIntro($_POST['intro']);
        $this->poi->setInfoLink($_POST['infoLink']);
        $this->poi->setPoiMap($_POST['poiMap']);
        $this->poi->setNotes($_POST['notes']);
    }

}

$page = new showPoiPage();
$page->view();

