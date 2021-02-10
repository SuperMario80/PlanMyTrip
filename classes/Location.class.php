<?php declare(strict_types=1);


class Location {

    private int $id;
    private int $idTraveller;
    private string $classification;
    private string $location;
    private string $locationKey;
    private string $country;
    private string $region;
    private string $intro;
    private string $travelLink;
    private string $notes;
    
    
    function __construct(string $classification='', string $location='', string $locationKey='', string $country='',string $region='',string $intro='', string $travelLink='', string $notes='',int $id=0, int $idTraveller=0) {
         if (isSet($this->id)) {
            return;
        }
        $this->id = $id;
        $this->idTraveller = $idTraveller;
        $this->classification = $classification;
        $this->location = $location;
        $this->locationKey = $locationKey;
        $this->country = $country;
        $this->region = $region;
        $this->intro = $intro;
        $this->travelLink = $travelLink;
        $this->notes = $notes;
 
    }
    
    function getIdTraveller(): int {
        return $this->idTraveller;
    }
    function setIdTraveller(int $idTraveller): void {
        $this->idTraveller = $idTraveller;
    }
    function getlocation(): string {
        return $this->location;
    }
    function setlocation(string $location): void {
        $this->location = $location;
    }
    function getlocationKey(): string {
        return $this->locationKey;
    }
    function setlocationKey(string $locationKey): void {
         if (empty($locationKey)){
            $this->locationKey = '';
        }else{
            $this->locationKey = $locationKey;
        }
    }
  
    function getClassification(): string {
        return $this->classification;
    }
    function setClassification(string $classification): void {
        $this->classification=  preg_replace('/_/', ' ', $classification);
    }
    
    
    function getCountry(): string {
        if($this->country == $this->getLocation()){
            return $this->country = '';
        }else{
            return $this->country;
        }
    }
    function setCountry(string $country): void {
        if (empty($country)){
            $this->country = '';
        }else{
            // $this->country = $country;
             $this->country=  preg_replace('/_/', ' ', $country);
        }
    }
      function getRegion(): string {
        return $this->region;
    }
    function setRegion(string $region): void {
        if (empty($region)){
            $this->region = '';
        }else{
            $this->region = $region;
        }
        printData($this->region);
    }

      function getIntro(): string {
        return $this->intro;
    }
    function setIntro(string $intro): void {
         if (empty($intro)){
            $this->intro = 'No Info available';
        }else{
            $this->intro = $intro;
        }
    }
      function getTravelLink(): string {
        return $this->travelLink;
    }
    function setTravelLink(string $travelLink): void {
        if (empty($travelLink)){
            $this->travelLink = '';
        }else{
            $this->travelLink = $travelLink;
        }
    }
      function getNotes(): string {
        return $this->notes;
    }
    function setNotes(string $notes): void {
        $this->notes = $notes;
    }
    function getId(): int {
        return $this->id;
    }
    function setId(int $id): void {
        $this->id = $id;
    }
    
}

