<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class CreateTravellerPage extends Page {
    
    
    public function __construct() {
        parent::__construct('Register');
        $this->message = '';
        $this->headline = '';

    }

    protected function init() : void {
        
        
        if (isSet($_POST['back']) and !empty($_GET['id'])) {
                header('Location: travellerArea.php');
                exit;
                
            }
            // else{
                if (isSet($_POST['back']) or !isSet($_GET['id'])) {
                    header('Location: index.php');
                    exit;
                }
        // }
    }
    
    protected function viewContent(): void {
        
        $id = intVal($_GET['id'] ?? 0);
        $this->travellerDao = new TravellerDao();
        $this->setTraveller($this->travellerDao->readOne($id));

        if ($this->getTraveller() == null) {
            $this->setTraveller(new Traveller());
            $this->headline = 'CREATE YOUR ACCOUT';
        }else {
            if($this->getTraveller() != null){
                $this->headline = 'VIEW / UPDATE MY ACCOUNT';
            }
        }
        
        if (isSet($_POST['save'])) {
            $this->saveTraveller();
         
        }
        
        if (isSet($_POST['delete'])) {
            $this->deleteTraveller();
        }
        $headline = $this->headline;
        $message = $this->message;
        $traveller = $this->getTraveller();
        $traveller->setPassword('');
        include 'html/createTraveller.html.php';
        
        // printData($traveller);
    }
    
    private function saveTraveller() {
        $this->readFormData();
        
        if ($this->getTraveller()->getId() == 0) {
            //  $this->headline = ' YOUR ACCOUNT';
            if($this->getTraveller()->getFirstName() == NULL ||  $this->getTraveller()->getLastName() == NULL||  $this->getTraveller()->getPassword() == NULL ||  $this->getTraveller()->getEmail() == NULL){
                    $this->message = 'Please fill out ALL data'; 
            }else {
                
                if(filter_var($this->getTraveller()->getEmail(), FILTER_VALIDATE_EMAIL) == FALSE){
                    // printData($this->getTraveller());
                    $this->message = "Email is not valid!";
                    $this->getTraveller()->setEmail('');
                    // $this->getTraveller()->setPassword('');
                }else {
                    $t = $this->travellerDao->findTraveller($this->getTraveller()->getEmail());

                    if($t == NULL){
                        if ($this->travellerDao->create($this->getTraveller())){
                        $this->message =   "New Account created";
                        header('Refresh:2; url=index.php');
                    //    $this->getTraveller()->setPassword('');
                        }
                    }else{
        
                        $this->message = "Email already exists!";
                    //  $this->getTraveller()->setPassword('');
                    }
                }
            }
              
        } else {
            // $this->getTraveller()->setPassword('');
            if($this->travellerDao->update($this->getTraveller())){
                // $this->headline = 'VIEW / UPDATE MY ACCOUNT';
                $this->message = 'Customer Updated';
                header('Refresh:2; url=travellerArea.php');
            }else{
                $this->message = 'Customer NOT Updated';
            }
        //    $this->message = $this->travellerDao->update
        //    ($this->getTraveller())
        //            ? 'Customer Saved'
        //            : 'Customer NOT Saved';
       }


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

