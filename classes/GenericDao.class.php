<?php

declare(strict_types=1);

// allgemeingültiges Super-Dao
// Basis-Klasse aller tabellenspezifischen daos
abstract class GenericDao {

    private PDO $connection;
    //
    private string $tableName;
    private string $className;
    //
    private $readAllStatement;  // : PDOstatement
    private $readOneStatement;  // : PDOstatement
    private $readForeignStatement;  // : PDOstatement
    private $createStatement;   // : PDOstatement
    private $updateStatement;   // : PDOstatement
    private $deleteStatement;   // : PDOstatement

    function __construct(string $tableName, string $className) {
        $this->connection = DbConnection::getInstance()->getConnection();
        $this->tableName = $tableName;
        $this->className = $className;
    }

    function readAll(): array {

        if ($this->readAllStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '`';
            $this->readAllStatement = $this->connection->prepare($sql);
        }

        $this->readAllStatement->execute();

    // data transfer objects  der Tabelle anzeigen als Array 
        $dtos = [];
        while ($dto = $this->readAllStatement->fetchObject($this->className)) {
            $dtos[] = $dto;
        }

        return $dtos;
    }

    function readOne(int $id): ?object {

        if ($this->readOneStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `id`=:id';
            $this->readOneStatement = $this->connection->prepare($sql);
        }

        $array = [
            ':id' => $id
        ];
        $this->readOneStatement->execute($array);

        $dto = $this->readOneStatement->fetchObject($this->className);
        return $dto ? $dto : null;
    }




    function readForeignTable(int $idValue, string $foreignId): array {


        // $idValue='';

        if ($this->readForeignStatement == null) {
            $sql = 'SELECT * FROM `' . $this->tableName . '` WHERE `' . $foreignId . '`=:idValue';
            $this->readForeignStatement = $this->connection->prepare($sql);
        }

        $array = [
            ':idValue' => $idValue
        ];
        $this->readForeignStatement->execute($array);

        $dtos = [];
        while ($dto = $this->readForeignStatement->fetchObject($this->className)) {
            $dtos[] = $dto;
        }

        return $dtos;
        return $dtos[0]->getId();
    }




    function create(object $dto): bool {

        if ($this->createStatement == null) {
            $sql = $this->getCreateSql();
            $this->createStatement = $this->connection->prepare($sql);
        }

        $array = $this->getCreateArray($dto);
        $this->createStatement->execute($array);

        return $this->createStatement->rowCount() == 1;
    }

    protected abstract function getCreateSql(): string;

    protected abstract function getCreateArray(object $dto): array;

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

//    abstract function checkLogin();

    // -------------------------------------------------------------------------

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
