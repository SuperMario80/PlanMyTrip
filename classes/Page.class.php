<?php
declare(strict_types=1);

abstract class Page {
    
    private string $title;
    private string $headline;
    //
    private TravellerDao $travellerDao;
    private bool $loggedIn;
    private Traveller $traveller;
    private string $email;
    private string $message;
    
    protected function __construct(string $title, string $headline) {
        $this->title = $title;
        $this->headline = $headline;
        $this->loggedIn = false;
    }
    
    public function view() : void {
        $this->initSession();
        $this->init();
        
        $this->viewHead();
//        $this->viewNavigation();
        $this->viewLogin();
        $this->viewContent();
        $this->viewFoot();
    }
    //  INIT SESSION AFTER LOGIN CHECK
    private function initSession(): void {
        // echo 'SESSION';
        // printData($_SESSION);
        $this->message = '';
        $this->email = $_SESSION['email'] ?? '';
        $this->loggedIn = $this->email != '';
        if($this->loggedIn){
            $this->traveller = unserialize($_SESSION['traveller']);
        }
        // LOGIN AND REDIRECT 
        if (isSet($_POST['login'])) {
            $this->doLogin();
             header('Location: travellerLoggedIn.php');
        }
        // LOGOUT AND REDIRECT
        if (isSet($_POST['logout'])) {
            $this->doLogout();
            header('Location: travellerLogIn.php');
        }
    }
    // LOGIN HANDLER (VALIDATION)
    private function doLogin(): void {
        $this->email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        
        $this->travellerDao = new TravellerDao();
        //VALIDATION OF THE DATA
        if ($tr = $this->travellerDao->checkLogin($this->email, $password)) {
            $this->loggedIn = true;
            $_SESSION['email'] = $this->email;
            // $_SESSION['id'] = serialize($tr);
            // $_SESSION['id'] = serialize($this->travellerDao->readOne($id));
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
    
    protected function init(): void {
        // empty
    }
    
    private function viewHead() : void {
        $title = $this->title;
        $headline = $this->headline;
        include 'html/head.html.php';
    }
    
//    private function viewNavigation() : void {
//        include 'html/navigation.html.php';
//    }

    // PROVIDES HTML FORMS
    private function viewLogin() {
        $password = "";   
        $email = $this->email;
        if ($this->loggedIn) {
            include 'html/navigation.html.php';
            include 'html/logout.html.php';

        } else {
            $message = $this->message;
            require_once 'html/login.html.php';
        }
    }
    
    protected abstract function viewContent() : void;
    
    private function viewFoot() : void {
        include 'html/foot.html.php';
    }

    public function getTraveller() :?Traveller{
        return $this->traveller;
    }
}


