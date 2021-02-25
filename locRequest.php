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
        // $this->message = '';
    }
    
    
    protected function init() : void {

        $this->locationDao = new LocationDao();
        // if(!empty($this->saveRequestedLoc())){
            // include 'html/searchMyTrip.html.php';
            $this->saveRequestedLoc();
        //     header('Location: index.php');
        // exit;
        
    
    
        // }

    }
        
        
    protected function viewContent(): void {
    }
            
            
     private function saveRequestedLoc() {

        try{

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                //RECEIVE THE RAW POST DATA FROM app.js
                $content = file_get_contents('php://input');
                // printData($content);
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
               
                // $message ='';
            //    echo '{statusText:OK}';
                //Checks if locationKey + IdTraveller doesnt exist
                if($l == NULL){ 
                    if($this->locationDao->create($this->location)){
                        // $message = 'location saved';
                        echo '{"statusText":"OK"}';
                    }
                    // else{
                    //     // $message = 'location not saved';
                    //     echo '{"statusText":"NOT SAVED"}';
                    // }
                    // $message = 
                    // $this->locationDao->create($this->location)
                    // ? 'location saved'
                    // : 'location not saved';

                }else{
                    $this->location = $l;
                    // $message = 'Location already exists';
                    echo '{"statusText":"Error"}';
                }
                // $_SESSION['locationId'] = $this->location->getId();
                    
                // printData($locData);
    
            } 
            // else {
            //     // $message = 'no json data received';
            //     throw new Exception( "no json data received");
            // }
        }catch (Exception $e){
            // printData($e->getMessage());
            echo '{"statusText":"Server out of reach"}';
            $e->getMessage();
        }
        
        // $_SESSION['message'] = $message;
        // header('Location: index.php');
        // echo json_encode($l);
        // echo'12345';
        // exit;
    }
}


$page = new locRequestPage();
$page->initAll();

