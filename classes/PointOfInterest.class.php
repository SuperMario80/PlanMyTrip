<?php declare(strict_types=1);


class PointOfInterest {

    private int $id;
    private int $idLocation;
    private string $poiName;
    private string $attraction;
    private string $intro;
    private string $infoLink;
    private string $poiMap;
    private string $notes;
    
    
    function __construct(string $poiName ='', string $attraction ='', string $intro ='', string $infoLink ='', string $poiMap ='', string $notes ='', int $id = 0, int $idLocation =0) {
         if (isSet($this->id)) {
            return;
        }
        $this->id = $id;
        $this->idLocation = $idLocation;
        $this->poiName = $poiName;
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


    function getAttraction(): string {
        return $this->attraction;
    }
    function setAttraction(string $attraction): void {
        $this->attraction = $attraction;
    }


    function getIntro(): string {
        return $this->intro;
    }
    function setIntro(string $intro): void {
        $this->intro = $intro;
    }
    
    
    function getInfoLink(): string {
        return $this->infoLink;
    }
    function setInfoLink(string $infoLink): void {
        $this->infoLink = $infoLink;
    }


    function getPoiMap(): string {
        return $this->poiMap;
    }
    function setPoiMap(string $poiMap): void {
        $this->poiMap = $poiMap;
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
