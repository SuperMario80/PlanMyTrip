<?php

declare(strict_types=1);



class PointOfInterestDao extends GenericDao {

    private $findPoiStatement;
    private $findDuplicateStatement;

    // private $readForKeyStatement;

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
        return 'UPDATE `' . $this->getTableName() . '` SET `poiName`=:poiName, `city`=:city, `attraction`=:attraction, `intro`=:intro, `infoLink`=:infoLink, `poiMap`=:poiMap, `notes`=:notes WHERE `id`=:id';
    }

    protected function getUpdateArray(object $poi): array {
        return [
            // ':idLocation' => $poi->getIdLocation(),
            ':poiName' => $poi->getPoiName(),
            ':city' => $poi->getCity(),
            // ':locationKey' => $poi->getLocationKey(),
            ':attraction' => $poi->getAttraction(),
            ':intro' => $poi->getIntro(),
            ':infoLink' => $poi->getInfoLink(),
            ':poiMap' => $poi->getPoiMap(),
            ':notes' => $poi->getNotes(),
            ':id' => $poi->getId(),
        ];
    }

    protected function getForKeySql(): string{
        return 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idLocation`=:idValue ORDER BY  `attraction`, `poiName`';
    }


     public function findPoi(string $poiName, int $idLocation, string $locationKey, ): ?object {
        

        if ($this->findPoiStatement == null) {
            $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idLocation`=:idLocation AND `poiName`=:poiName AND `locationKey`=:locationKey';
            //PREPARES SQL  STATEMENT
            $this->findPoiStatement = $this->getConnection()->prepare($sql);
        }

        $array = [
            ':idLocation' => $idLocation,
            ':poiName' => $poiName,
            ':locationKey' => $locationKey,
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->findPoiStatement->execute($array);

        $dto = $this->findPoiStatement->fetchObject($this->getClassName());
        return $dto ? $dto : null;
    
    }


    public function findDuplicate(int $idLocation, string $poiName): ?object {
        

        if ($this->findDuplicateStatement == null) {
            $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idLocation`=:idLocation AND `poiName`=:poiName';
            //PREPARES SQL  STATEMENT
            $this->findDuplicateStatement = $this->getConnection()->prepare($sql);
        }

        $array = [
            ':idLocation' => $idLocation,
            ':poiName' => $poiName,
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->findDuplicateStatement->execute($array);

        $dto = $this->findDuplicateStatement->fetchObject($this->getClassName());
        return $dto ? $dto : null;
    

    }

    // READS ALL STATEMENTS/ROWS IN TABLE WITH PASSED IN FOREIGN KEY VALUE($idValue) AND INDIVIDUAL COLUMN NAME($foreignId)
    // function showPoiForKey(int $idValue): array {
    //     if ($this->readForKeyStatement == null) {
    //         $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idLocation`=:idValue ORDER BY  `attraction`, `poiName`';
    //         $this->readForKeyStatement = $this->getConnection()->prepare($sql);
    //     }

    //     $array = [
    //         ':idValue' => $idValue
    //     ];
    //     $this->readForKeyStatement->execute($array);

    //     $dtos = [];
    //     while ($dto = $this->readForKeyStatement->fetchObject($this->getClassName())) {
    //         $dtos[] = $dto;
    //     }

    //     return $dtos;
    //     return $dtos[0]->getId();
    // }

}
