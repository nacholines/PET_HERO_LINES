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
        if(!$this->personDAO->GetByDni($dni) ){
            if(!$this->personDAO->GetByUsername($username)){
                $person = $this->CreatePerson($firstName, $lastName, $dni, $birthDate, $gender, $phone, $email, $username, $password, $userType);
                if(strcmp($userType, "Guardian") == 0){
                    $_SESSION["processedPerson"] = $person;
                    header("location:" . FRONT_ROOT . "guardian/ShowRegisterView");
                }else{
                    try{
                        $this->Add($person);
                        $this->ShowMainView("Se registró el usuario exitosamente.");
                    }catch(Exception $exc){
                        $this->ShowRegisterView("Se produjo un error al agregar el usuario.");
                    }
                }
            }else{
                $this->ShowRegisterView("El nombre de usuario ya está en uso.");
            }
        }else{
            $this->ShowRegisterView("Un usuario con ese dni ya se encuentra registrado.");
        }
    }

    public function Add($_person){
        try{
            $registeredPerson = $this->personDAO->create($_person);
            $registeredPerson = $this->personDAO->GetByDni($_person->getDni());
            $_SESSION["loggedUser"]= $registeredPerson;

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

    public function CreatePerson($firstName, $lastName, $dni, $birthDate, $gender, $phone, $email, $username, $password, $userType){
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
        
        return $person;
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
