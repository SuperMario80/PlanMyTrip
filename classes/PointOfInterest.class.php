<?php declare(strict_types=1);


class PointOfInterest {

    private int $id;
    private int $idLocation;
    private string $poiName;
    private string $city;
    private string $locationKey;
    private string $attraction;
    private string $intro;
    private string $infoLink;
    private string $poiMap;
    private string $notes;
    
    
    function __construct(string $poiName ='',string $city ='', string $locationKey ='', string $attraction ='', string $intro ='', string $infoLink ='', string $poiMap ='', string $notes ='', int $id = 0, int $idLocation =0) {
         if (isSet($this->id)) {
            return;
        }
        $this->id = $id;
        $this->idLocation = $idLocation;
        $this->poiName = $poiName;
        $this->city = $city;
        $this->locationKey = $locationKey;
        $this->attraction = $attraction;
        $this->intro = $intro;
        $this->infoLink = $infoLink;
        $this->poiMap = $poiMap;
        $this->notes = $notes;
 
    }
    
    
    // getter and setter methods
    function getIdLocation(): int {
        return $this->idLocation;
    }
    function setIdLocation(int $idLocation): void {
        $this->idLocation = $idLocation;
    }


    function getPoiName(): string {
        return $this->poiName;
    }
    function setPoiName(string $poiName): void {
        $this->poiName = $poiName;
    }

    function getCity(): string {
        return $this->city;
    }
    function setCity(string $city): void {
        if (empty($city)){
            $this->city = 'Unknown';
        }else{
            $this->city = $city;
        }
    }
    
    function getLocationKey(): string {
        return $this->locationKey;
    }
    function setLocationKey(string $locationKey): void {
        if (empty($locationKey)){
            $this->locationKey = '';
        }else{
            $this->locationKey = $locationKey;
        }
      
    }


    function getAttraction(): string {
        return $this->attraction;
    }
    function setAttraction(string $attraction): void {
         if (empty($attraction) || $attraction == 'person'){
            $this->attraction = 'Sightseeing';
        }else{
            $this->attraction = $attraction;
        }
        
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
    
    
    function getInfoLink(): string {
        return $this->infoLink;
    }
    
    function setInfoLink(string $infoLink): void {
        if (empty($infoLink)){
            $this->infoLink = '';
        }else{
            $this->infoLink = $infoLink;
        }
    }


    function getPoiMap(): string {
        return $this->poiMap;
    }
    function setPoiMap(string $poiMap): void {
         if (empty($poiMap)){
            $this->poiMap = '';
        }else{
            $this->poiMap = $poiMap;
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
