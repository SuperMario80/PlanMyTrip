<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class CreateTravellerPage extends Page {
    
    
    public function __construct() {
        parent::__construct('Register');
        $this->message = '';
        // $this->headline = 'Create your Account';

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
        $this->setTraveller($this->travellerDao->readOne($id));
        if ($this->getTraveller() == null) {
            $this->setTraveller(new Traveller());
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
        $traveller = $this->getTraveller();
        include 'html/createTraveller.html.php';
        
        printData($traveller);
    }
    
    private function saveTraveller() {
        $this->readFormData();
        $t = $this->travellerDao->findTraveller($this->getTraveller()->getEmail());
        
        if ($this->getTraveller()->getId() == 0) {
            
            // try{
                if($this->getTraveller()->getFirstName() == NULL ||  $this->getTraveller()->getLastName() == NULL||  $this->getTraveller()->getPassword() == NULL || $this->getTraveller()->getEmail() == NULL){
                    $this->message = 'Please fill out ALL data'; 
                }
                if($t == NULL){

                    if ($this->travellerDao->create($this->getTraveller())){
                        $this->message =   "New Account created";
                        //   printData($this->traveller->getPassword());
                        // printData(" show $this->email");
                        // header('Refresh:2; url=index.php');
                    }else{

                        if($t != NULL){
                        // printData($e->getMessage());
                        $this->message = "Email already exists!";
                        }
        
                        
                    }
                }else{

                    printData($this->getTraveller());
                        // printData($this->traveller->getEmail());
                        $this->message = "Email is not valid!";
                }
            // }
            // else{
            // catch (PDOException $e) {

                // $_POST['password'] = "";
                // $password = "";
                // $this->getTraveller()->setEmail('');
                // $this->getTraveller()->setPassword('');
            // }
        } else {
           $this->message = $this->travellerDao->update($this->getTraveller())
                   ? 'Customer Saved'
                   : 'Customer NOT Saved';
       }







        //      if ($this->travellerDao->create($this->traveller)){
        //         $this->message =   "New Account created";
               
        // //    } elseif($this->traveller->setEmail($_POST['email']) == false) {
        // //        printData('hello');
               
        // //         $this->message = "Please enter a valid email";
        //    }else {
        //         $this->message = "Account already exists! No Traveller created";
        //    }
           
                
           
            // $this->message = $this->travellerDao->create($this->traveller)
            //         ? "New Account created"
                    
            //         : "Account already exists! No Traveller created";
            
//        else {
//            $this->message = $this->customerDao->update($this->customer)
//                    ? 'Customer Saved'
//                    : 'Customer NOT Saved';
//        }
         
    }

    private function deleteTraveller() {
        $this->readFormData();
        
        if ($this->travellerDao->delete($this->getTraveller())) {
            $this->message = 'Account Removed';
            $this->setTraveller(new Traveller());
        } else {
            $this->message = 'Account NOT Removed';
        }
    }
    
    private function readFormData() {
        $this->getTraveller()->setFirstName($_POST['firstName']);
        $this->getTraveller()->setLastName($_POST['lastName']);
        $this->getTraveller()->setEmail($_POST['email']);
        $this->getTraveller()->setPassword($_POST['password']);
    }

}

$page = new CreateTravellerPage();
$page->initAll();
$page->view();

