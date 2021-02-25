<?php
declare(strict_types=1);
require_once 'inc/tools.inc.php';

class IndexPage extends Page {

    public function __construct() {
        parent::__construct('PlanMyTrip TravelSearch Engine');
        $this->message = '';
       
    }

    protected function init(): void {

        // if (isSet($_POST['updateTraveller'])) {
            
        //     header('Location: createTraveller.php?id=' . $_POST['updateTraveller']);
        //     exit;
        // }
        if (isSet($_POST['register'])){
            header('Location: createTraveller.php?id=0');
            exit;
        }


       

        }
        
        protected function viewContent(): void {
            // $tr = unserialize($_SESSION['traveller']);
            // $this->showTraveller();
            include 'html/modal.html.php';
            $message = $_SESSION['message'] ?? '';
            // $_SESSION['message'] = '';
            include 'html/searchMyTrip.html.php';
            // showTraveller();
            
            // printData($message);


    

        // $mess = isset($_REQUEST['mess']) ? $_REQUEST['mess'] : null;
        // if($mess == 1) {
        //     $message =   "New Account created";
        //    echo 'New Account created'; 
        // }

    }

    // private function showTraveller() {
  

    //         // gets data from logged-in Traveller
    //         $tr = unserialize($_SESSION['traveller']);
    //         printData($tr);
    // }


}

$page = new IndexPage();
$page->initAll();
$page->view();