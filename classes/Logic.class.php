<?php
declare(strict_types=1);

abstract class Logic {
    
    private string $title;
    private bool $loggedIn;
    private string $email;
    private string $message;
    
    // private Traveller $traveller;
    private Location $location;

    private ?PointOfInterest $poi;
    
    private TravellerDao $travellerDao;
    private LocationDao $locationDao;
    private PointOfInterestDao $pointOfInterestDao;
    private array $locations;
    private array $pointOfInterest;

    
    protected function __construct() {
        $this->logStart();
    }
    
    
    public function logStart() : void {
        
        $this->initSession();
        $this->init();
        
    }
    public function getTraveller() :?Traveller{
        return $this->traveller;
    }
    
    
    //  INIT SESSION AFTER LOGIN CHECK
    private function initSession(): void {
       
        $this->message = '';
        $this->email = $_SESSION['email'] ?? '';
        $this->loggedIn = $this->email != '';
        if($this->loggedIn){
            //converts serialised traveller data back to readable php value
            $this->traveller = unserialize($_SESSION['traveller']);

             if (isSet($_POST['login'])) {
            $this->doLogin();
        }
        // LOGOUT AND REDIRECT
        if (isSet($_POST['logout'])) {
            $this->doLogout();
            header('Location: index.php');
        }
        }
        // LOGIN AND REDIRECT 
    }

    // LOGIN HANDLER (VALIDATION)
    private function doLogin(): void {
        $this->email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $this->travellerDao = new TravellerDao();
        //DATA VALIDATION
        if ($tr = $this->travellerDao->checkLogin($this->email, $password)) {
            $this->loggedIn = true;
            $_SESSION['email'] = $this->email;
            //Generates a storable representation from traveller-session
            $_SESSION['traveller'] = serialize($tr);
        } else {
            $this->loggedIn = false;
            $this->message = 'Login failed!';
        }
    }


    // DESTROYS SESSION AFTER LOGOUT
    private function doLogout(): void {
        session_destroy();
        $_SESSION = [];
        $this->loggedIn = false;
        $this->email = '';
    }
    

    protected function init(): void {}


    // PROVIDES HTML FORMS


}
