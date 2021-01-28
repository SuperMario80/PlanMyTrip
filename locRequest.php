<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class locRequestPage extends Page {

//    private LocationDao $locationDao;
    // private array $locations;
    // private Location $location;


    // private ?Traveller $traveller;
    
    public function __construct() {
        parent::__construct('Save Location Request');
        $this->message = '';
    }
    
    
    protected function init() : void {}
        
        
    protected function viewContent(): void {

        $this->locationDao = new LocationDao();
        $this->saveRequestedLoc();
    }
            
            
     private function saveRequestedLoc() {

        try{

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                //RECEIVE THE RAW POST DATA FROM app.js
                $content = file_get_contents('php://input');
                printData($content);
                //Decode the incoming RAW post data from JSON
                $locData = json_decode($content, true);
                // $locData=  preg_replace('/_/', ' ', $locData);
                //SAVING POST DATA IN VARIABLES
                $this->location = new Location();


                //gets Id from logged in Traveller
                // $travId = 
                $this->location->setIdTraveller($this->getTraveller()->getId());

                $this->location->setLocation($locData['location']);
                $this->location->setLocationKey($locData['locationKey']);
                $this->location->setClassification($locData['classification']);
                $this->location->setCountry($locData['country']);
                $this->location->setIntro($locData['intro']);
                $this->location->setTravelLink($locData['travelLink']);

                // Variable for LocationKey+IdTraveller
                $l = $this->locationDao->findLocation($this->location->getLocationKey(),$this->location->getIdTraveller());
               
                $message ='';
                
                //Checks if locationKey + IdTraveller doesnt exist
                if($l == NULL){ 
                    $message = 
                    $this->locationDao->create($this->location)
                    ? 'location saved'
                    : 'location not saved';

                }else{
                    $this->location = $l;
                    $message = 'Location already exists';
                }
                // $_SESSION['locationId'] = $this->location->getId();
                    
                printData($locData);
    
            } 
            else {
                $message = 'no json data received';
                // throw new Exception( "no json data received");
            }
        }catch (Exception $e){
            printData($e->getMessage());
        }

        $_SESSION['message'] = $message;
        header('Location: index.php');
        exit;
    }
}


$page = new locRequestPage();
$page->view();

