<?php
declare(strict_types=1);
session_start();
require_once 'inc/tools.inc.php';

class RegisterTravellerPage extends Page {

//    private string $message;
//    private string $email;
//    private string $password;

    private LocationDao $locationDao;
    private TravellerDao $travellerDao;
    private PointOfInterestDao $pointOfInterestDao;
    private ?Traveller $traveller;
    private array $locations;
    private array $pointOfInterest;

    public function __construct() {
        parent::__construct('Traveller Login', 'Traveller Login');
        $this->message = '';
        $this->password = '';
        // $this->travellerDao = new TravellerDao();
        // $this->locationDao = new LocationDao();
    }

    protected function init(): void {
         if (isSet($_POST['register'])){
             header('Location: createTraveller.php?id=0');
             exit;
         }
    }

    protected function viewContent(): void {


        // $this->traveller = new Traveller();

        // printData($_SESSION);
        $tr = unserialize($_SESSION['traveller']);
      
        // printData($tr);
        // printData($tr->getId());

        $idValue = $tr->getId();
        $foreignId = "idTraveller";
        $this->locationDao = new LocationDao();
        $this->locations = $this->locationDao->readForeignTable($idValue, $foreignId);
        // printData($this->locations);

        $selectedLoc = $this->locations;
        // printData($selectedLoc);
        // printData($this->locations->getId());
        // printData(serialize($this->dtos));
        // include 'html/location.html.php';
        // $loc = unserialize($this->locations);
        // printData($loc);

        // $location = new Location();
        // printData($this->location->getId());

        
        // printData($_SESSION['id'] = $this->id);
        // $_SESSION['location'] = serialize($this->location);
        // printData($_SESSION);

        // $location = new Location();

        // printData($this->location->getId());

        foreach ($this->locations as $location) {
            $idValue = $location->getId();
            // $tr->getId();
            $foreignId = "idLocation";
            // intVal($_GET['id']);
            $this->pointOfInterestDao = new PointOfInterestDao();
            include 'html/location.html.php';
            $this->pointOfInterest = $this->pointOfInterestDao->readForeignTable($idValue, $foreignId);
            // printData($this->pointOfInterest);

            $selectedPoi = $this->pointOfInterest;
            // printData($selectedPoi);
            // printData($this->locations->getId());
            // printData(serialize($this->dtos));
            // include 'html/location.html.php';
            // if($idValue === $selectedPoi->idLocation()){
            include 'html/pointOfInterest.html.php';
            // }
        }
       }

}

$page = new RegisterTravellerPage();
$page->view();

