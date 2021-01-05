<?php

declare(strict_types=1);



class PointOfInterestDao extends GenericDao {

    function __construct() {
        parent::__construct('pointofinterest', 'PointOfInterest');
    }

    protected function getCreateSql(): string {
        return 'INSERT INTO `' . $this->getTableName() . '` (`idLocation`, `poiName`, `city`,`locationKey`, `attraction`, `intro`, `infoLink`, `poiMap`, `notes`) '
                . 'VALUES (:idLocation, :poiName, :city, :locationKey, :attraction, :intro, :infoLink, :poiMap, :notes)';
    }

    protected function getCreateArray(object $poi): array {
        return [
            ':idLocation' => $poi->getIdLocation(),
            ':poiName' => $poi->getPoiName(),
            ':city' => $poi->getCity(),
            ':locationKey' => $poi->getLocationKey(),
            ':attraction' => $poi->getAttraction(),
            ':intro' => $poi->getIntro(),
            ':infoLink' => $poi->getInfoLink(),
            ':poiMap' => $poi->getPoiMap(),
            ':notes' => $poi->getNotes(),
        ];
    }

    protected function getUpdateSql(): string {
        return 'UPDATE `' . $this->getTableName() . '` SET `idLocation`=:idLocation, '
        . '`poiName`=:poiName, `city`=:city, `locationKey`=:locationKey, `attraction`=:attraction, `intro`=:intro, `infoLink`=:infoLink, `poiMap`=:poiMap, `notes`=:notes WHERE `id`=:id';
    }

    protected function getUpdateArray(object $poi): array {
        return [
            ':idLocation' => $poi->getIdLocation(),
            ':poiName' => $poi->getPoiName(),
            ':city' => $poi->getCity(),
            ':locationKey' => $poi->getLocationKey(),
            ':attraction' => $poi->getAttraction(),
            ':intro' => $poi->getIntro(),
            ':infoLink' => $poi->getInfoLink(),
            ':poiMap' => $poi->getPoiMap(),
            ':notes' => $poi->getNotes(),
            ':id' => $poi->getId(),
        ];
    }

}
