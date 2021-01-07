<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class poiRequestPage extends Page {

    public function __construct() {
        parent::__construct('PlanMyTrip', 'API POI');
        $this->message = '';
        //    $this->location = new Location();
    }
    
    
    protected function init() : void {
        
    }
    
    
    protected function viewContent(): void {
        // include 'html/triposo.html.php';
        $this->locationDao = new LocationDao();
        $this->pointOfInterestDao = new PointOfInterestDao();
        $this->saveRequestedPoi();
        
        // $id = intVal($_GET['id'] ?? 0);
        // $this->pointOfInterestDao = new PointOfInterestDao();
        // $this->poi = $this->pointOfInterestDao->readOne($id);
        // if ($this->poi == null) {
            //     $this->poi = new PointOfInterest();
            //     $this->poi->setIdLocation(intVal($_GET['idLoc']));
            // }
            
            // }
            
        }
        
        
        private function saveRequestedPoi() {
            try{
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                
                //RECEIVE THE RAW POST DATA FROM app.js
                $poiContent = file_get_contents('php://input');
                
                printData($poiContent);
                //Decode the incoming RAW post data from JSON
                $poiData = json_decode($poiContent, true);
                //SAVING POST DATA IN VARIABLES
                $this->poi = new PointOfInterest();
                // if($this->poi->setlocationKey($poiData['locationKey']) === $locations->getLocationKey()){

                // $this->poi->setIdLocation((intVal($this->getIdLocation())));
                // $this->poi->setIdLocation($this->getLocation()->getId());
                $l = $this->locationDao->findLocation($poiData['locationKey']);

                // $this->poi->setIdLocation($_SESSION['locationId']);
                $this->poi->setIdLocation($l->getId());
                $this->poi->setPoiName($poiData['poiName']);
                $this->poi->setCity($poiData['city']);
                $this->poi->setLocationKey($poiData['locationKey']);
                $this->poi->setAttraction($poiData['attraction']);
                $this->poi->setIntro($poiData['intro']);
                $this->poi->setInfoLink($poiData['infoLink']);
                $this->poi->setPoiMap($poiData['poiMap']);

                // if($this->poi->setLocationKey($poiData['locationKey']) == $this->location->setLocationKey($l)){

                    printData($this->pointOfInterestDao->create($this->poi));
                // }
            
                // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
                printData($poiContent);
                // }
            }else{

                throw new Exception( "no json data received");
            }

        }catch (Exception $e){

            printData($e->getMessage());
        }
    }
}


$page = new poiRequestPage();
$page->view();

