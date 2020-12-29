<?php
declare(strict_types=1);
require_once 'inc/tools.inc.php';

class IndexPage extends Page {

//    private string $message;
//    private string $email;
//    private string $password;

    // private LocationDao $locationDao;
    // private TravellerDao $travellerDao;
    // private PointOfInterestDao $pointOfInterestDao;
    // private ?Traveller $traveller;
    // private array $locations;
    // private array $pointOfInterest;
    

    public function __construct() {
        parent::__construct('PlanMyTrip Search Engine', 'Welcome to PlanMyTrip');
        $this->message = '';
        // $tr = '';
        // $this->password = '';
        // $this->travellerDao = new TravellerDao();
        // $this->locationDao = new LocationDao();
    }

    protected function init(): void {
         if (isSet($_POST['register'])){
             header('Location: createTraveller.php?id=0');
             exit;
         }

      
        //  if (isSet($_POST['login'])) {
        //     // $tr = unserialize($_SESSION['traveller']);
        //     header('Location: travellerLoggedIn.php');
        //     exit;
        // }
        // if(isSet($_POST['login'])){
        //     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //         $this->saveRequestedLoc();
        //         // header('Location: crudLocation.php?id=' . $_POST['newLocation']);
        //         // exit;
        //     }
        // }
        }
        
    

    protected function viewContent(): void {

         include 'html/triposo.html.php';

        
    }

 


}

       


$page = new IndexPage();
$page->view();


        // $this->traveller = new Traveller();

      
        // printData($this->locations);

        
        // printData($selectedLoc);
        // printData($this->locations->getId());
        // printData(serialize($this->dtos));
        // include 'html/location.html.php';
        // $loc = unserialize($this->locations);
        // printData($loc);

        // $location = new Location();
        // printData($this->location->getId());
        // private function showLocationsPois() {
        
        // printData($_SESSION['id'] = $this->id);
        // $_SESSION['location'] = serialize($this->location);
        // printData($_SESSION);   // $location = new Location();

        // printData($this->location->getId());
        