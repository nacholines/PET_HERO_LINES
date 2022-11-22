<?php
namespace Controllers;

use Models\Person as Person;
use DAO\PersonDAO as PersonDAO;

use Models\Guardian as Guardian;
use DAO\GuardianDAO as GuardianDAO;

use Models\Owner as Owner;
use DAO\OwnerDAO as OwnerDAO;


class HomeController{
    private $ownerDAO;  
    private $guardianDAO;  
    private $personDAO;

    function __construct(){
        $this->personDAO = new PersonDAO();
        $this->guardianDAO = new GuardianDao();
        $this->ownerDAO = new OwnerDao();
    }

    public function Index($message = ""){
        require_once(VIEWS_PATH."login.php");
    }

    public function ShowMainView($message = ""){
        require_once(VIEWS_PATH."main.php");
    }

    public function login($username = "", $pass = ""){    
        //$user = $this->userExist($email);
        if($username != "" || $password != ""){
            $person = $this->personDAO->GetByUsername($username);
            if($person!=null && $person->getPassword() == $pass){
                $_SESSION["loggedUser"]= $person;
                
                $this->ShowMainView();
                /*/if($user instanceof Guardian){
                    $guardianC = new GuardianController();
                    $guardianC->showHomeView();
                }else if($user instanceof Owner){
                    $OwnerC = new OwnerController();
                    $OwnerC->showHomeView();
                }/*/
            }else{
                //echo '<script>alert("Credentials dont match, try again")</script>';
                session_destroy(); 
                $this->Index("Credentials don't match, try again.");
            }
        }
    }

    public function Message($message = "", $type = "")
    {
        require_once(VIEWS_PATH . "message.php");
    }

}
?>
