<?php
declare(strict_types=1);

abstract class Page extends Logic {
    

    // private bool $loggedIn;
    // private string $email;
    
    
    protected function __construct(string $title) {
        $this->title = $title;
        $this->loggedIn = false;
        $this->logStart();
        $this->getTraveller();
         $this->email = '';
        }
        
        
        
        
        public function view() : void {
            
        $this->viewHead();
        $this->viewNavigation();
        $this->viewLogin();
        $this->viewContent();
        $this->viewFoot();
        printData('hello');
    }

   
   

    
    private function viewHead() : void {
        $title = $this->title;
        require_once 'html/head.html.php';
    }
    
    private function viewNavigation() : void {
        if($this->loggedIn == true){
            include 'html/navigation.html.php';
        }
     //    else {
     //        printData('Doesnt work!');
     //    }
    }
    
    private function viewLogin() {
     $password = "";   
     $email = $this->email;
     printData($email);
     if ($this->loggedIn) {
         include 'html/logout.html.php';
 
     } else {
         $message = $this->message;
         include 'html/login.html.php';
     }
 }




    
    protected abstract function viewContent() : void;
    

    private function viewFoot() : void {
        require_once 'html/foot.html.php';
    }

}
// $page = new Page();
// $page->logStart();