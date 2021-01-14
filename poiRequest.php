<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class poiRequestPage extends Page {

    public function __construct() {
        parent::__construct('Save PointOfInterest Request');
        $this->message = '';
    }

    protected function init() : void {}
    
    
    protected function viewContent(): void {
        
        $this->locationDao = new LocationDao();
        $this->pointOfInterestDao = new PointOfInterestDao();
        $this->saveRequestedPoi();
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
 
                $l = $this->locationDao->findLocation($poiData['locationKey'],$this->getTraveller()->getId());
                    // $l auf null prüfen

                // $this->poi->setIdLocation($_SESSION['locationId']);
                $this->poi->setIdLocation($l->getId());
                $this->poi->setPoiName($poiData['poiName']);
                $this->poi->setCity($poiData['city']);
                $this->poi->setLocationKey($poiData['locationKey']);
                $this->poi->setAttraction($poiData['attraction']);
                $this->poi->setIntro($poiData['intro']);
                $this->poi->setInfoLink($poiData['infoLink']);
                $this->poi->setPoiMap($poiData['poiMap']);

                printData($this->pointOfInterestDao->create($this->poi));

                printData($poiContent);
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

