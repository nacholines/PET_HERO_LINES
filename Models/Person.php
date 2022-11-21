<?php

namespace Models;
 
class Person{
    //private static $numberUser = 0;
    private $Id;
    private $firstName;
    private $lastName;
    private $birthDate;
    private $dni;
    private $gender;
    private $phone;
    private $email;
    private $username;
    private $password;
    private $userType;

    public function __construct(){}    

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getFirstName(){
        return $this->firstName;
    }
    public function setFirstName($firstName){
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(){
        return $this->lastName;
    }
    public function setLastName($lastName){
        $this->lastName = $lastName;
        return $this;
    }
    
    public function getBirthDate(){
        return $this->birthDate;
    }
    public function setBirthDate($bd){
        $this->birthDate = $bd;
        return $this;
    }

    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
        return $this;
    }

    public function getGender(){
        return $this->gender;
    }
    public function setGender($gender){
        $this->gender = $gender;
        return $this;
    }

    public function getPhone(){
        return $this->phone;
    }
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
        return $this;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email = $email;
        return $this;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    public function getUserType(){
        return $this->userType;
    }
    public function setUserType($userType){
        $this->userType = $userType;
        return $this;  
    }
}

?>