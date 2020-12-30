<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class poiRequestPage extends Page {

 
    private PointOfInterestDao $pointOfInterestDao;
    private ?PointOfInterest $poi;

    
    public function __construct() {
        parent::__construct('PlanMyTrip', 'API POI');
        $this->message = '';
         $this->pointOfInterestDao = new PointOfInterestDao();
    }


    protected function init() : void {
    
    }
    

    protected function viewContent(): void {
  
        // }
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
                // $this->poi->setIdLocation($this->poi->setIdLocation(intVal($_GET['idLoc'])));
                $this->poi->setIdLocation(1);
                $this->poi->setPoiName($poiData['poiName']);
                $this->poi->setAttraction($poiData['attraction']);
                $this->poi->setIntro($poiData['intro']);
                $this->poi->setInfoLink($poiData['infoLink']);
                $this->poi->setPoiMap($poiData['poiMap']);
            
                printData($this->pointOfInterestDao->create($this->poi));
                // SAVING POST DATA IN RESPECTIVE DATABASE TABLES (USING THE DATABASE CLASS)
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

