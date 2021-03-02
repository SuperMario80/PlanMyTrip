<?php

declare(strict_types=1);



class LocationDao extends GenericDao {

    // private $readForKeyStatement;
    private $findLocationStatement;
    private $findDuplicateStatement;

    function __construct() {
        parent::__construct('location', 'Location');
    }

    protected function getCreateSql(): string {
        return 'INSERT INTO `' . $this->getTableName() . '` (`idTraveller`, `classification`, `location`, `locationKey`, `country`, `region`, `intro`, `travelLink`,`notes`) '
                . 'VALUES (:idTraveller, :classification, :location, :locationKey,  :country, :region, :intro, :travelLink, :notes)';
    }

    protected function getCreateArray(object $location): array {
        return [
            ':idTraveller' => $location->getIdTraveller(),
            ':classification' => $location->getClassification(),
            ':location' => $location->getLocation(),
            ':locationKey' => $location->getLocationKey(),
            ':country' => $location->getCountry(),
            ':region' => $location->getRegion(),
            ':intro' => $location->getIntro(),
            ':travelLink' => $location->getTravelLink(),
            ':notes' => $location->getNotes(),
        ];
    }

    protected function getUpdateSql(): string {
        return 'UPDATE `' . $this->getTableName() . '` SET `classification`=:classification, `location`=:location, `country`=:country, `region`=:region, '
        . '`intro`=:intro, `travelLink`=:travelLink, `notes`=:notes WHERE `id`=:id';
    }

    protected function getUpdateArray(object $location): array {
        return [
            // ':idTraveller' => $location->getIdTraveller(),
            ':classification' => $location->getClassification(),
            ':location' => $location->getLocation(),
            // ':locationKey' => $location->getLocationKey(),
            ':country' => $location->getCountry(),
            ':region' => $location->getRegion(),
            ':intro' => $location->getIntro(),
            ':travelLink' => $location->getTravelLink(),
            ':notes' => $location->getNotes(),
            ':id' => $location->getId(),
        ];
    }


      // READS ALL STATEMENTS/ROWS IN TABLE WITH PASSED IN FOREIGN KEY VALUE($idValue) AND INDIVIDUAL COLUMN NAME($foreignId)
    // function showLocForKey(int $idValue): array {
    //     if ($this->readForKeyStatement == null) {
    //         $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idTraveller`=:idValue ORDER BY  `classification`, `location`';
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

    protected function getForKeySql(): string{
        return 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idTraveller`=:idValue ORDER BY `classification`, `location`';
    }

    public function findLocation(string $locationKey, int $idTraveller): ?object {
        

        if ($this->findLocationStatement == null) {
            $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `locationKey`=:locationKey AND `idTraveller`=:idTraveller ORDER BY `classification`';
            //PREPARES SQL  STATEMENT
            $this->findLocationStatement = $this->getConnection()->prepare($sql);
        }

        $array = [
            ':locationKey' => $locationKey,
            ':idTraveller' => $idTraveller,
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->findLocationStatement->execute($array);

        $dto = $this->findLocationStatement->fetchObject($this->getClassName());
        return $dto ? $dto : null;
    

    }

    public function findDuplicate(int $idTraveller, string $location, string $classification): ?object {
        

        if ($this->findDuplicateStatement == null) {
            $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `idTraveller`=:idTraveller AND `location`=:location AND `classification`=:classification';
            //PREPARES SQL  STATEMENT
            $this->findDuplicateStatement = $this->getConnection()->prepare($sql);
        }

        $array = [
            ':idTraveller' => $idTraveller,
            ':location' => $location,
            ':classification' => $classification,
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->findDuplicateStatement->execute($array);

        $dto = $this->findDuplicateStatement->fetchObject($this->getClassName());
        return $dto ? $dto : null;
    

    }

}
