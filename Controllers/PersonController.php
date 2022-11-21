<?php
namespace Controllers;

use Models\Person as Person;
use DAO\PersonDAO as PersonDAO;


class PersonController{
    private $personDAO;

    function __construct(){
        $this->personDAO = new PersonDAO();
    }

    public function Register($firstName, $lastName, $dni, $birthDate, $gender, $phone, $email, $username, $password, $userType){
        if(!$this->personDAO->getByUsername($username)){
            $this->RegisterPerson($firstName, $lastName, $dni, $birthDate, $gender, $phone, $email, $username, $password, $userType);
            $this->ShowMainView("Se registró el usuario exitosamente.");
        }else{
            $this->ShowRegisterView("El nombre de usuario ya está en uso.");
        }
    }

    //TODO delete this function
    public function Register1(){
        $this->RegisterPerson(
            "Fede", 
            "Skl", 
            "41000027", 
            "1998-03-24", 
            "M", 
            "111", 
            "federico@gmail.com", 
            "fedefefede", 
            "1111", 
            "Owner"
        );
        $this->ShowMainView("Se registró el usuario exitosamente.");
        
    }

    public function Add($_person){
        $personDAO = new PersonDAO();

        //$fileController = new FileController();
        
        try{
            $registeredPerson = $personDAO->create($_person);
            //TODO finish DNI verification
            $registeredPerson = $personDAO->GetByDni($_person->getDni());
            $_SESSION["loggedUser"]= $registeredPerson;
            //echo $this->ToString($registeredPerson);
            require_once(VIEWS_PATH."main.php");

        }catch(Exception $exc){
            throw $exc;
        }
    }

    public function ToString($person){
        echo $person->getId() . '<br>';
        echo $person->getFirstName() . '<br>';
        echo $person->getLastName() . '<br>';
        echo $person->getBirthDate() . '<br>';
        echo $person->getDni() . '<br>';
        echo $person->getGender() . '<br>';
        echo $person->getPhone() . '<br>';
        echo $person->getEmail() . '<br>';
        echo $person->getUsername() . '<br>';
        echo $person->getPassword() . '<br>';
        echo $person->getUserType() . '<br>';
    }

    public function RegisterPerson($firstName, $lastName, $dni, $birthDate, $gender, $phone, $email, $username, $password, $userType){
        $person = new Person();
        $person = $person->setFirstName($firstName);
        $person = $person->setLastName($lastName);
        $person = $person->setDni($dni);
        $person = $person->setBirthDate($birthDate);
        $person = $person->setGender($gender);
        $person = $person->setPhone($phone);
        $person = $person->setEmail($email);
        $person = $person->setUsername($username);
        $person = $person->setPassword($password);
        $person = $person->setUserType($userType);
        
        $this->Add($person);
    }

    public function ShowRegisterView($message = "", $type = ""){
        session_destroy();
        require_once(VIEWS_PATH."register.php");
    }

    public function ShowMainView($message = ""){
        require_once(VIEWS_PATH."main.php");
    }

}
?>
