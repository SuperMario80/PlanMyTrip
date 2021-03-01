<?php

declare(strict_types=1);

class TravellerDao extends GenericDao {

    private $findTravellerStatement;

    function __construct() {
        parent::__construct('traveller', 'Traveller');
    }
    
    //CREATES PREPARED SQL STATEMENT
    protected function getCreateSql(): string {
        return 'INSERT INTO `' . $this->getTableName() . '` (`firstName`, `lastName`, `email`, `password`) '
                . 'VALUES (:firstName, :lastName, :email, :password)';
    }

    //CREATES A NEW DATABASE ENTITY/ROW
    protected function getCreateArray(object $traveller): array {
        return [
            ':firstName' => $traveller->getFirstName(),
            ':lastName' => $traveller->getlastName(),
            ':email' => $traveller->getEmail(),
            ':password' => $traveller->getPassword(),
        ];
    }

    //CREATES PREPARED SQL STATEMENT FOR UPDATING EXISTING ENTITIES
    protected function getUpdateSql(): string {
        return 'UPDATE `' . $this->getTableName() . '` SET `firstName`=:firstName, `lastName`=:lastName, `email`=:email WHERE `id`=:id';
    }

    //UPDATES AN EXISTING ENTITY/ROW
    protected function getUpdateArray(object $traveller): array {
        return [
            ':firstName' => $traveller->getFirstName(),
            ':lastName' => $traveller->getlastName(),
            ':email' => $traveller->getEmail(),
            // ':password' => $traveller->getPassword(),
            ':id' => $traveller->getId(),
        ];
    }
    

    function checkLogin($email, $pw): ?Traveller {
            
            //CHECKS IF EMAIL AND PASSWORD MATCH WITH EXISTING TRAVELLER IN DATABASE
            $travellers = $this->readAll();
            foreach ($travellers as $traveller) {
                if ($traveller->getEmail() == $email){
                    // reads and checks hashed password
                    if(password_verify($pw, $traveller->getPassword())) {
                        // checks if hash algorithm is still PASSWORD_DEFAULT (can change due to new security standards)
                        if(password_needs_rehash($traveller->getPassword(), PASSWORD_DEFAULT)) {
                            $traveller->setPasswordRead($password);
                            $this->update($traveller);
                        }
                        return $traveller;
                    }
                    
                }
            }
            return Null;
        }
    
        protected function getForKeySql(): string{
            
        }

        public function findTraveller(string $email): ?object {
        

        if ($this->findTravellerStatement == null) {
            $sql = 'SELECT * FROM `' . $this->getTableName() . '` WHERE `email`=:email';
            //PREPARES SQL  STATEMENT
            $this->findTravellerStatement = $this->getConnection()->prepare($sql);
        }

        $array = [
            ':email' => $email,
        ];
        //EXECUTES STATEMENT WITH PASSED-IN PARAMETER
        $this->findTravellerStatement->execute($array);

        $dto = $this->findTravellerStatement->fetchObject($this->getClassName());
        return $dto ? $dto : null;
    

    }


}
