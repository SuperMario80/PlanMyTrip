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

        //  if ($this->loggedIn == true){
        //     echo 'test';
        // $travellerId = $this->travellerDao->getId();
        //  }
        // $travellerDao->getCreateArray();
        // $id = intVal($_GET['id'] ?? 0);
        // $this->travellerDao = new TravellerDao();
        // $this->traveller = $this->travellerDao->readOne($id);
        $this->traveller = new Traveller();

        // printData($_SESSION);
        // printData(unserialize($_SESSION['id']));
        $tr = unserialize($_SESSION['traveller']);
        // printData($this->traveller->getId());
        // $currentId = $tr['id'];
        // printData($tr);
        // printData($tr->getId());

        // $idLogin = $this->id;
        // printData($idLogin);

        // $logId = $tr['id'];
        // printData($logId);
        

        $idValue = $tr->getId();
        $foreignId = "idTraveller";
        // intVal($_GET['id']);
        $this->locationDao = new LocationDao();
        $this->locations = $this->locationDao->readForeignTable($idValue, $foreignId);
        printData($this->locations);

        $selectedLoc = $this->locations;
        // printData($this->locations->getId());
        // printData(serialize($this->dtos));
        include 'html/location.html.php';
        // $loc = unserialize($this->locations);
        // printData($loc);

        // $location = new Location();
        // printData($this->location->getId());

        
        // printData($_SESSION['id'] = $this->id);
        // $_SESSION['location'] = serialize($this->location);
        // printData($_SESSION);

        // $location = new Location();

        // printData($this->location->getId());

        $idValue = 2;
        // $tr->getId();
        $foreignId = "idLocation";
        // intVal($_GET['id']);
        $this->pointOfInterestDao = new PointOfInterestDao();
        $this->pointOfInterest = $this->pointOfInterestDao->readForeignTable($idValue, $foreignId);
        printData($this->pointOfInterest);
        





    //    $password = ''; 
       }

    //    function readTravellerLocation(int $id): ?Location {

    //     if ($this->readOneTraveller == null) {
    //         $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `idTraveller`=:id';
    //         $this->readOneStatement = $this->connection->prepare($sql);
    //     }

}

$page = new RegisterTravellerPage();
$page->view();

