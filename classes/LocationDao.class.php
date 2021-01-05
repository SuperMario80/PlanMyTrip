<?php

declare(strict_types=1);



class LocationDao extends GenericDao {

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

}
