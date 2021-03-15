<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class crudPoiPage extends Page {
    

    public function __construct() {
        parent::__construct('CRUD PointOfInterest');
        $this->message = '';
    }

    protected function init() : void {
        
        if (isSet($_POST['back']) or !isSet($_GET['id'])) {
            header('Location: travellerArea.php');
            exit;
        }
    }
    
    protected function viewContent(): void {
        
        $id = intVal($_GET['id'] ?? 0);
        $this->pointOfInterestDao = new PointOfInterestDao();
        $this->poi = $this->pointOfInterestDao->readOne($id);

        if ($this->poi == null) {
            $this->poi = new PointOfInterest();
            $this->poi->setIdLocation(intVal($_GET['idLoc']));
        }
        
        if (isSet($_POST['savePoi'])) {
            $this->savePoi();
            
        }
        
        if (isSet($_POST['deletePoi'])) {
            $this->deletePoi();
        }
        
        $message = $this->message;
        $poi = $this->poi;
        include 'html/createPoi.html.php';
    }

    // SAVES CREATED OR UPDATED POI IN DATABASE
    private function savePoi() {
        //Variable to check for Duplicates
        $duplicate = $this->pointOfInterestDao->findDuplicate($this->poi->getIdLocation(), $this->poi->getPoiName());

        $this->readFormData();

        if($this->poi->getPoiName() == NULL){

            $this->message = 'Please fill out ALL required Fields';

        }else{
            //creates new POI 
            if ($this->poi->getId() == 0) {

                if($duplicate == NULL){

                    if($this->pointOfInterestDao->create($this->poi)){

                        $this->message = 'New Point Of Interest created';
                        header('Refresh:2; url=travellerArea.php');
                    }
                }else {

                    $this->message = 'Point Of Interest already exists';
                }
            }else{
                //updates POI
                if($this->pointOfInterestDao->update($this->poi)){

                    $this->message = 'PointOfInterest Updated';
                    header('Refresh:2; url=travellerArea.php');
                }
            }
        }
    }


    private function deletePoi() {
        $this->readFormData();
        
        if ($this->pointOfInterestDao->delete($this->poi)) {

            $this->message = 'Point Of Interest Removed';
            $this->poi = new PointOfInterest();
            header('Refresh:1; url=travellerArea.php');
 
        } else {

            $this->message = 'Point Of Interest NOT Removed';
        }
    }
    

    private function readFormData() {
        // $this->poi->setIdLocation(intval($_POST['idLocation']));
        $this->poi->setIdLocation($this->poi->getIdLocation());
        $this->poi->setPoiName($_POST['poiName']);
        $this->poi->setCity($_POST['city']);
        // $this->poi->setLocationKey($_POST['locationKey']);
        $this->poi->setLocationKey($this->poi->getLocationKey());
        $this->poi->setAttraction($_POST['attraction']);
        $this->poi->setIntro($_POST['intro']);
        $this->poi->setInfoLink($_POST['infoLink']);
        $this->poi->setPoiMap($_POST['poiMap']);
        $this->poi->setNotes($_POST['notes']);
    }

}

$page = new crudPoiPage();
$page->initAll();
$page->view();

