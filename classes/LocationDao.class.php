<?php

declare(strict_types=1);



class LocationDao extends GenericDao {

    private $findLocationStatement;

    function __construct() {
        parent::__construct('location', 'Location');
    }

    protected function getCreateSql(): string {
        return 'INSERT INTO `' . $this->getTableName() . '` (`idTraveller`, `location`, `locationKey`, `classification`, `country`, `region`, `intro`, `travelLink`,`notes`) '
                . 'VALUES (:idTraveller, :location, :locationKey, :classification, :country, :region, :intro, :travelLink, :notes)';
    }

    protected function getCreateArray(object $location): array {
        return [
            ':idTraveller' => $location->getIdTraveller(),
            ':location' => $location->getLocation(),
            ':locationKey' => $location->getLocationKey(),
            ':classification' => $location->getClassification(),
            ':country' => $location->getCountry(),
            ':region' => $location->getRegion(),
            ':intro' => $location->getIntro(),
            ':travelLink' => $location->getTravelLink(),
            ':notes' => $location->getNotes(),
        ];
    }

    protected function getUpdateSql(): string {
        return 'UPDATE `' . $this->getTableName() . '` SET `idTraveller`=:idTraveller, '
        . '`location`=:location, `locationKey`=:locationKey,`classification`=:classification, `country`=:country, `region`=:region, '
        . '`intro`=:intro, `travelLink`=:travelLink, `notes`=:notes WHERE `id`=:id';
    }

    protected function getUpdateArray(object $location): array {
        return [
            ':idTraveller' => $location->getIdTraveller(),
            ':location' => $location->getLocation(),
            ':locationKey' => $location->getLocationKey(),
            ':classification' => $location->getClassification(),
            ':country' => $location->getCountry(),
            ':region' => $location->getRegion(),
            ':intro' => $location->getIntro(),
            ':travelLink' => $location->getTravelLink(),
            ':notes' => $location->getNotes(),
            ':id' => $location->getId(),
        ];
    }

    public function findLocation(string $locationKey): ?object {
        

        if ($this->findLocationStatement == null) {
            $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `locationKey`=:locationKey';
            //PREPARES SQL  STATEMENT
            $this->findLocationStatement = $this->getConnection()->prepare($sql);
        }

        $array = [
            ':locationKey' => $locationKey
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->findLocationStatement->execute($array);

        $dto = $this->findLocationStatement->fetchObject($this->getClassName());
        return $dto ? $dto : null;
    

    }

}
