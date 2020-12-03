<?php declare(strict_types=1);


class Traveller {

    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    
    
    function __construct(string $firstName='', string $lastName='', string $email='', string $password='',int $id=0) {
         if (isSet($this->id)) {
            return;
        }
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        
 
    }
    
    
    
    function getFirstName(): string {
        return $this->firstName;
    }
    function setFirstName(string $firstName): void {
        $this->firstName = $firstName;
    }
    function getLastName(): string {
        return $this->lastName;
    }
    function setLastName(string $lastName): void {
        $this->lastName = $lastName;
    }
    function getEmail(): string {
        return $this->email;
    }
    function setEmail(string $email): void {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->email = $email;
        }
        
    }
    
    function getPassword(): string {
        return $this->password;
    }
    function setPassword(string $password): void {
        $this->password = $password;
    }
    
    function getId(): int {
        return $this->id;
    }
    function setId(int $id): void {
        $this->id = $id;
    }
    
//     function setPasswordImKlartext(string $klartextPassword): void {
//        $this->password = password_hash($klartextPassword, PASSWORD_DEFAULT);
//    }
//    
//    public function __toString() {
//        return 'Name ' . $this->firstName . ' ' . $this->lastName;
//    }
    
}
