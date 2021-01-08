<?php

declare(strict_types=1);

class TravellerDao extends GenericDao {

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
        return 'UPDATE `' . $this->getTableName() . '` SET `firstName`=:firstName, `lastName`=:lastName, `email`=:email, '
                . '`password`=:password WHERE `id`=:id';
    }
    //UPDATES AN EXISTING ENTITY/ROW
    protected function getUpdateArray(object $traveller): array {
        return [
            ':firstName' => $traveller->getFirstName(),
            ':lastName' => $traveller->getlastName(),
            ':email' => $traveller->getEmail(),
            ':password' => $traveller->getPassword(),
            ':id' => $traveller->getId(),
        ];
    }
    
//    // user-tabellen-spezifisch
    function checkLogin($email, $password): ?Traveller {
        
////         Login-Prüfung mit echter DB-Tabelle
//        $sql = 'SELECT * FROM `customer` WHERE `email`=:email';
//        $checkLoginStatement = $pdo->prepare($sql);
//        $checkLoginStatement->execute([':email' => $e]);
//        $email = $checkLoginStatement->fetchObject('email');
//        if ($email) {
//            if (password_verify($p, $email->getPassword())) {
//                
////                if (password_needs_rehash($email->getPassword(), PASSWORD_DEFAULT)) {
////                    $user->setPasswordImKlartext($p);
//                    $this->update($email);
////                }
//
//                return true;
//            }
//        }
//        return false;



            //CHECKS IF EMAIL AND PASSWORD MATCH WITH 
            //EXISTING TRAVELLER IN DATABASE
            $travellers = $this->readAll();
            foreach ($travellers as $traveller) {
                if ($traveller->getEmail() == $email){
                    //  if(password_needs_rehash($traveller->getPassword(), PASSWORD_DEFAULT) == $password) {
                    if($traveller->getPassword() == $password) {
                    return $traveller;
                    }
                }
                    
            }
            return null;
            
    }
    



}
