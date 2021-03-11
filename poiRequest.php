<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class poiRequestPage extends Page {

    public function __construct() {
        parent::__construct('Save PointOfInterest Request');
    }

    protected function init() : void {

        $this->locationDao = new LocationDao();
        $this->pointOfInterestDao = new PointOfInterestDao();
        $this->saveRequestedPoi();

    }
    
    
    protected function viewContent(): void {}
        
        
        private function saveRequestedPoi() {
            try{
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                //RECEIVE THE RAW POST DATA FROM app.js
                $poiContent = file_get_contents('php://input');
                //Decode the incoming RAW post data from JSON
                $poiData = json_decode($poiContent, true);
                //SAVING POST DATA IN VARIABLES
                $this->poi = new PointOfInterest();
 
                $l = $this->locationDao->findLocation($poiData['locationKey'],$this->getTraveller()->getId());
                    // $l auf null prüfen

                    if($l){
                        $this->poi->setIdLocation($l->getId());
                        $this->poi->setPoiName($poiData['poiName']);
                        $this->poi->setCity($poiData['city']);
                        $this->poi->setLocationKey($poiData['locationKey']);
                        $this->poi->setAttraction($poiData['attraction']);
                        $this->poi->setIntro($poiData['intro']);
                        $this->poi->setInfoLink($poiData['infoLink']);
                        $this->poi->setPoiMap($poiData['poiMap']);

                        $p = $this->pointOfInterestDao->findPoi($this->poi->getPoiName(), $this->poi->getIdLocation(),$this->poi->getLocationKey());

                        if($p == NULL){

                            if($this->pointOfInterestDao->create($this->poi)){
                                echo '{"statusText":"OK"}';
                            }
                        } else{

                            $this->poi = $p;
                            echo '{"statusText":"Error"}';
                        }
                    }
                    else{
                        echo '{"statusText":"No Location"}';
                    }
                }
  
            }catch (Exception $e){
                
                $e->getMessage();
            }
        }
}

$page = new poiRequestPage();
$page->initAll();

