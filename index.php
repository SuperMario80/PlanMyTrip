<?php
declare(strict_types=1);
require_once 'inc/tools.inc.php';

class IndexPage extends Page {

    public function __construct() {
        parent::__construct('PlanMyTrip TravelSearch Engine');
        $this->message = '';
       
    }

    protected function init(): void {
         if (isSet($_POST['register'])){
             header('Location: createTraveller.php?id=0');
             exit;
         }

        }
        
        protected function viewContent(): void {
        $message = $_SESSION['message'] ?? '';
        // printData($_SESSION);
        $_SESSION['message'] = '';
        include 'html/searchMyTrip.html.php';


        

        // $mess = isset($_REQUEST['mess']) ? $_REQUEST['mess'] : null;
        // if($mess == 1) {
        //     $message =   "New Account created";
        //    echo 'New Account created'; 
        // }

    }
}

$page = new IndexPage();
$page->view();