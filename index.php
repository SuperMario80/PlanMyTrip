<?php
declare(strict_types=1);
require_once 'inc/tools.inc.php';

class IndexPage extends Page {

    public function __construct() {
        parent::__construct('PlanMyTrip Search Engine', 'Welcome to PlanMyTrip');
        $this->message = '';
        // $tr = '';
        // $this->password = '';
    }

    protected function init(): void {
         if (isSet($_POST['register'])){
             header('Location: createTraveller.php?id=0');
             exit;
         }
    }
     
    protected function viewContent(): void {
     
         include 'html/triposo.html.php';
    }
}

$page = new IndexPage();
$page->view();