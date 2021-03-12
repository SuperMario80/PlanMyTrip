<?php

declare(strict_types=1);

// GENERAL SUPER_DAO
// BASIC CLASS FOR ALL DATABASE TABLES
abstract class GenericDao {

    private PDO $connection;
    //
    private string $tableName;
    private string $className;
    //
    private $readAllStatement;  // : PDOstatement
    private $readOneStatement;  // : PDOstatement
    private $readForKeyStatement;  // : PDOstatement
    private $createStatement;   // : PDOstatement
    private $updateStatement;   // : PDOstatement
    private $deleteStatement;   // : PDOstatement

    function __construct(string $tableName, string $className) {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->tableName = $tableName;
        $this->className = $className;
    }

    //READS ALL STATEMENTS IN TABLE 
    function readAll(): array {

        if ($this->readAllStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '`';
            $this->readAllStatement = $this->connection->prepare($sql);
        }
        $this->readAllStatement->execute();
        
        $dtos = [];
        // DISPLAYS ALL DATA TRANSFER OBJECTS FROM TABLE AS ARRAY 
        while ($dto = $this->readAllStatement->fetchObject($this->className)) {
            // Saves every single dto in Array
            $dtos[] = $dto;
        }
        return $dtos;
    }

    //READS ONE STATEMENT/ROW IN TABLE CHECKING ID(PRIMARY KEY)
    function readOne(int $id): ?object {

        if ($this->readOneStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `id`=:id';
            //PREPARES SQL  STATEMENT
            $this->readOneStatement = $this->connection->prepare($sql);
        }

        $array = [
            ':id' => $id
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->readOneStatement->execute($array);

        $dto = $this->readOneStatement->fetchObject($this->className);
        return $dto ? $dto : null;
    }

    // READS ALL STATEMENTS/ROWS IN TABLE WITH PASSED IN FOREIGN KEY VALUE($idValue)
    function readForeign(int $idValue): array {
        if ($this->readForKeyStatement == null) {
            $sql = $this->getForKeySql();
            $this->readForKeyStatement = $this->connection->prepare($sql);
        }

        $array = [
            ':idValue' => $idValue
        ];
        $this->readForKeyStatement->execute($array);

        $dtos = [];
        while ($dto = $this->readForKeyStatement->fetchObject($this->className)) {
            $dtos[] = $dto;
        }

        return $dtos;
        return $dtos[0]->getId();
    }



    //CREATES NEW ARRAY AND SUBMIT DATABASE AS OBJECT
    function create(object $dto): bool {

        if ($this->createStatement == null) {
            $sql = $this->getCreateSql();
            //creates SQL Statement, declared in Subclass (abstract function getCreateSql())
            $this->createStatement = $this->connection->prepare($sql);
        }
        //creates new database array from passed in object, declared in subclass
        $array = $this->getCreateArray($dto);
        $this->createStatement->execute($array);

        return $this->createStatement->rowCount() == 1;
    }

    protected abstract function getCreateSql(): string;

    protected abstract function getCreateArray(object $dto): array;


    //UPDATES AN EXISTING ENTITY/ROW IN DATABASE
    function update(object $dto): bool {

        if ($dto->getId() == 0) {
            return false;
        }

        if ($this->updateStatement == null) {
            $this->updateStatement = $this->connection->prepare($this->getUpdateSql());
        }
        $this->updateStatement->execute($this->getUpdateArray($dto));

        return $this->updateStatement->rowCount() == 1;
    }

    protected abstract function getUpdateSql(): string;
    
    protected abstract function getUpdateArray(object $dto): array;
    
    protected abstract function getForKeySql(): string;

    //DELETES AN EXISTING ENTITY AND REMOVES IT FROMDATABASE
    function delete(object $dto): bool {

        if ($dto->getId() == 0) {
            return false;
        }

        if ($this->deleteStatement == null) {
            $sql = 'DELETE FROM `' . $this->tableName . '` WHERE `id`=:id';
            $this->deleteStatement = $this->connection->prepare($sql);
        }

        $this->deleteStatement->execute([':id' => $dto->getId()]);
        return $this->deleteStatement->rowCount() == 1;
    }



    function getConnection(): PDO {
        return $this->connection;
    }

    function getTableName(): string {
        return $this->tableName;
    }

    function getClassName(): string {
        return $this->className;
    }

}
