<?php declare(strict_types=1);


class Location {

    private int $id;
    private int $idTraveller;
    private string $location;
    private string $classification;
    private string $country;
    private string $region;
    private string $intro;
    private string $travelLink;
    private string $notes;
    
    
    function __construct(string $location='', string $classification='', string $country='',string $region='',string $intro='', string $travelLink='', string $notes='',int $id=0, int $idTraveller=0) {
         if (isSet($this->id)) {
            return;
        }
        $this->id = $id;
        $this->idTraveller = $idTraveller;
        $this->location = $location;
        $this->classification = $classification;
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
  
    function getClassification(): string {
        return $this->classification;
    }
    function setClassification(string $classification): void {
        $this->classification = $classification;
    }
    
    
    function getCountry(): string {
        return $this->country;
    }
    function setCountry(string $country): void {
        $this->country = $country;
    }
      function getRegion(): string {
        return $this->region;
    }
    function setRegion(string $region): void {
        $this->region = $region;
    }

      function getIntro(): string {
        return $this->intro;
    }
    function setIntro(string $intro): void {
        $this->intro = $intro;
    }
      function getTravelLink(): string {
        return $this->travelLink;
    }
    function setTravelLink(string $travelLink): void {
        $this->travelLink = $travelLink;
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

