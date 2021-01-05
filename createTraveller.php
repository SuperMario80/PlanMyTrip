<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class CreateTravellerPage extends Page {
    
    private string $message;
    // private TravellerDao $travellerDao;
    // private ?Traveller $traveller;

    public function __construct() {
        parent::__construct('Database', 'Create Traveller');
        $this->message = '';
    }

    protected function init() : void {
        
        
        
        if (isSet($_POST['back']) or !isSet($_GET['id'])) {
            header('Location: index.php');
            exit;
        }
    }
    
    protected function viewContent(): void {
        
        $id = intVal($_GET['id'] ?? 0);
        $this->travellerDao = new TravellerDao();
        $this->traveller = $this->travellerDao->readOne($id);
        if ($this->traveller == null) {
            $this->traveller = new Traveller();
        }
        
        if (isSet($_POST['save'])) {
            // Save-Button gedrückt
            $this->saveTraveller();
         
        }
        
        if (isSet($_POST['delete'])) {
            // Delete-Button gedrückt
            $this->deleteTraveller();
        }
        
        $message = $this->message;
        $traveller = $this->traveller;
        include 'html/createTraveller.html.php';
    }
    
    private function saveTraveller() {
        $this->readFormData();
        
        if ($this->traveller->getId() == 0) {
             if ($this->travellerDao->create($this->traveller)){
                $this->message =   "New Account created";
               
        //    } elseif($this->traveller->setEmail($_POST['email']) == false) {
        //        printData('hello');
               
        //         $this->message = "Please enter a valid email";
           }else {
                $this->message = "Account already exists! No Traveller created";
           }
           
                
           
            // $this->message = $this->travellerDao->create($this->traveller)
            //         ? "New Account created"
                    
            //         : "Account already exists! No Traveller created";
            
        } 
//        else {
//            $this->message = $this->customerDao->update($this->customer)
//                    ? 'Customer Saved'
//                    : 'Customer NOT Saved';
//        }
         
    }

    private function deleteTraveller() {
        $this->readFormData();
        
        if ($this->travellerDao->delete($this->traveller)) {
            $this->message = 'Account Removed';
            $this->traveller = new Traveller();
        } else {
            $this->message = 'Account NOT Removed';
        }
    }
    
    private function readFormData() {
        $this->traveller->setFirstName($_POST['firstName']);
        $this->traveller->setLastName($_POST['lastName']);
        $this->traveller->setEmail($_POST['email']);
        $this->traveller->setPassword($_POST['password']);
    }

}

$page = new CreateTravellerPage();
$page->view();

