<?php

namespace Controllers;

use DateInterval;
use DateTime;
use DateTimeZone;

use Models\Guardian as Guardian;
use DAO\GuardianDAO as GuardianDAO;

use Models\Disponibilidad as Disponibilidad;

class GuardianController{
    private $guardianDAO;
    private $petDAO;

    function __construct(){
        $this->guardianDAO = new GuardianDAO();
        $this->petDAO = new PetDAO();
    }

    
    public function ShowRegisterView($message = "", $type = ""){
        $petSizes = $this-> petDAO-> GetSizesData();
        require_once(VIEWS_PATH."register-guardian-view.php");
    }

    public function register($idPerson, $rate, $size, $availabilityStartDate, $availabilityEndDate){
        $this->registerGuardian($idPerson, $rate, $size, $availabilityStartDate, $availabilityEndDate);
    }

    public function registerGuardian(){
        $guardian = new Guardian();
        $guardian = $guardian->setIdPerson($idPerson);
        $guardian = $guardian->setRate($rate);
        $guardian = $guardian->setAcceptedSize($size);
        $guardian = $guardian->setAvailabilityStartDate($availabilityStartDate);
        $guardian = $guardian->setAvailabilityEndDate($availabilityEndDate);

        $this->Add();
        
    }
    
    public function Add($guardian){
        try{
            $guardianDAO->create($guardian);
        }catch(Exception $exc){
            throw $exc;
        }
    }
    
/* 
    public function guardianExist($email){
        $guardian = $this->guardianDAO->getByEmail($email);
        
        return $guardian;
    }
    public function showGuardianList(){
        $guardianList = $this->guardianDAO->getAll();
        require_once(VIEWS_PATH."validate-session.php");
        require_once(VIEWS_PATH."filter-guardianes.php");
    }


    public function showTypeOfPet(){
        if(isset($_SESSION["loggedUser"])){
            require_once(VIEWS_PATH."type-pets.php");
        }else{
            $home = new HomeController();
            $home->Index();
        }
    }

    public function setPetType($size){
       $this->KeeperDao->setPetType($size);
       if(isset($_SESSION["loggedUser"])){
            $this->showHomeView();
       }else{
            $home = new HomeController(); 
            $home->Index();
       }
    }

    public function setCompensation($compensation){
        $this->guardianDAO->setCompensation($compensation);
        $this->showHomeView();
    }

    public function addAvilability ($dateStart,$dateEnd){
        $date = $this->checkDate($dateStart,$dateEnd);
        $exist = $this->dateAlreadyExist($date);
        
        if($date && !$exist){
            $this->guardianDAO->addAvilability($date);
            $this->showHomeView("Dates uploaded succesfully");   
        }
    }

    public function checkDate ($dateStart,$dateEnd){
        $date1=date_create($dateStart)->format("Y-m-d");
        $date2=date_create($dateEnd)->format("Y-m-d");
        $today = date_create()->format("Y-m-d");

        if($date1 > $date2 ){
            $this->showHomeView("End date cant be less than start date");   
        }elseif($date1 < $today  || $date2 < $today){
            $this->showHomeView("Cant set dates in the past");  
        }else{
            $date = new Disponibilidad();
            $date->setStart($date1);
            $date->setEnd($date2);

            return $date;
        }
        return false;
    } */
/*
    public function isInsideIntevals($date){
        $keeper = $_SESSION["loggedUser"];
        
        foreach($keeper->getAvailabilityList() as $intervals){
            if($date > $intervals->getStart() && $date < $intervals->getEnd() ){
                $this->showHomeView("Cant set overlapping dates");  
            }
        }
        return false;
    }   

    public function dateIsInInterval(Disponibilidad $interval , $date){
        
        if($date >= $interval->getStart() && $date <= $interval->getEnd() ){
            return true;
        }
        return false;
    }   


    public function isInsideIntevals(TimeInterval $interval){

        $keeper = $_SESSION["loggedUser"];

        $dateStart=$interval->getStart();
        $dateEnd=$interval->getEnd();

        $newStart = new DateTime();
        $newEnd = new DateTime();

        $arrayList=array();

        
        foreach($keeper->getAvailabilityList() as $intervals){

            if($dateStart < $intervals->getStart() && $dateEnd < $intervals->getStart() ){
                // COMIENZA ANTES Y TERMINA ANTES
                $newStart=$dateStart;
                $newEnd=$dateEnd;

            }else if($dateStart > $intervals->getEnd() ){
                   // COMIENZA DESPUES QUE EL FINAL
                   $newStart=$dateStart;
                   $newEnd=$dateEnd;                
            }else if($dateStart > $intervals->getStart() && $dateStart < $intervals->getEnd() ){

                // COMIENZA EN EL MEDIO
                if($dateEnd < $intervals->getEnd()){
                       $this->showHomeView("The date already exist");
                }else if($dateEnd > $intervals->getEnd()){
                       // TERMINA MAS ADELANTE
                        $newStart=date_add($intervals->getEnd(),date_interval_create_from_date_string("1 days"));
                        $newEnd=$dateEnd;
                }
            }else if($dateStart < $intervals->getStart() && $dateEnd <= $intervals->getEnd() && $dateEnd > $interval->getStart()){
                $newStart=$dateStart;
                $newEnd=date_sub($intervals->getStart(),date_interval_create_from_date_string("1 days"));

            }else if($dateStart < $intervals->getStart() && $dateEnd > $intervals->getEnd()){


            }

          

          
        }

        $newInterval = new TimeInterval();
        $newInterval->setStart($newStart);
        $newInterval->setEnd($newEnd);

        return false;
    }




    public function dateAlreadyExist (Disponibilidad $date){

        $guardian=$_SESSION["loggedUser"];
        $exist=false;
        $list=$guardian->getAvailabilityList();
        
        foreach($list as $inter){
            $dateStart=$inter["start"];
            $dateEnd=$inter["end"];
            if($date->getStart()==$dateStart && $date->getEnd()==$dateEnd){
                $this->showHomeView("interval of time already exist");
                $exist=true;
            }
        }
        return $exist;
    }

    public function showHomeView($message = ""){
        echo $message;
        require_once(VIEWS_PATH."validate-session.php");
        require_once(VIEWS_PATH."home-guardian.php");
    }

    public function register($firstName, $lastName, $bitrhDate, $dni, $gender, $phone, $email, $password, $precio, $tipoMascota){

        $user = new Guardian();   
        
        $user->setFirstName($name);
        $user->setLastName($lastName);
        $user->setBirthDate($bitrhDate);
        $user->setDni($dni);
        $user->setGender($gender);
        $user->setEmail($email);
        $user->setPassword($password);

        $user->setPrecio($precio);
        $user->setTipoMascota($tipoMascota);
                
        $_SESSION["loggedUser"]= $user; 
        
        $this->guardianDAO->register($user);

    }
    */
}

?>