<?php

declare(strict_types=1);
require_once 'inc/tools.inc.php';

class RequestPage extends Page {

    // private Traveller $traveller;
    // private Location $location;

    // private TravellerDao $travellerDao;
    // private LocationDao $locationDao;
    // private array $locations;
   
    
    public function __construct() {
        parent::__construct('Request', 'Request');
    }

    protected function init() : void {}

    protected function viewContent(): void {
        $this->crudData();
    }



    public function crudData() : void {
        $this->saveRequestedData();
        $this->save();
        $this->delete();
        $this->readFormData();
    }


    protected function saveRequestedData(){}

    protected function save() {}

    protected function delete() {}

    protected function readFormData() {}

}

