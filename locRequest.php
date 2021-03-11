<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class locRequestPage extends Page {

    
    public function __construct() {
        parent::__construct('Save Location Request');
    }
    
    
    protected function init() : void {

        $this->locationDao = new LocationDao();
            $this->saveRequestedLoc();
    }
        
    protected function viewContent(): void {}
            
            
     private function saveRequestedLoc() {

        try{

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                //RECEIVE THE RAW POST DATA FROM app.js
                $content = file_get_contents('php://input');
                //Decode the incoming RAW post data from JSON
                $locData = json_decode($content, true);
                // $locData=  preg_replace('/_/', ' ', $locData);
                //SAVING POST DATA IN VARIABLES
                $this->location = new Location();


                //gets Id from logged in Traveller
                $this->location->setIdTraveller($this->getTraveller()->getId());

                $this->location->setLocation($locData['location']);
                $this->location->setLocationKey($locData['locationKey']);
                $this->location->setClassification($locData['classification']);
                $this->location->setCountry($locData['country']);
                $this->location->setIntro($locData['intro']);
                $this->location->setTravelLink($locData['travelLink']);

                // Variable for LocationKey+IdTraveller
                $l = $this->locationDao->findLocation($this->location->getLocationKey(),$this->location->getIdTraveller());
               
                if($l == NULL){ 
                    if($this->locationDao->create($this->location)){
                        echo '{"statusText":"OK"}';
                    }
                }else{
                    $this->location = $l;
                    echo '{"statusText":"Error"}';
                }
            } 
            
        }catch (Exception $e){
            echo '{"statusText":"Server out of reach"}';
            $e->getMessage();
        }
    }
}


$page = new locRequestPage();
$page->initAll();

