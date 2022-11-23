<?php

namespace DAO;


use DAO\IGuardianDAO as IGuardianDAO;
use DAO\PetDAO as PetDAO;
use Models\Guardian as Guardian;

class GuardianDAO implements IGuardianDAO{
    private $connection;
    private $tableName = "guardians";
    private $petDAO;

    private $guardianList = array();
    private $fileName;
    
    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/Data/guardianes.json";
    
    }

    public function create($guardian, $idPerson){
        $query = "INSERT INTO guardians (IdPerson, rate, acceptedSizeId, availabilityStartDate, availabilityEndDate) 
                  VALUES (:IdPerson, :rate, :acceptedSizeId, :availabilityStartDate, :availabilityEndDate)";

        $parameters['IdPerson'] = $idPerson;
        $parameters['rate'] = $guardian->getRate();
        $parameters['acceptedSizeId'] = $guardian->getAcceptedSize()->getIdPetSize();
        $parameters['availabilityStartDate'] = $guardian->getAvailabilityStartDate();
        $parameters['availabilityEndDate'] = $guardian->getAvailabilityEndDate();
        try{
            $this->connection = Connection::getInstance();
            return $this->connection->Execute($query, $parameters);
        }catch(Exception $exc){
            throw $exc;
        }
    }


    public function GetGuardianById($personId){
        $guardians = $this->GetData();
        foreach($guardians as $guardian=>$value){
            if($value->getId() == $personId){
                return $value;
            }
        }
        return null;
    }

    public function GetData(){
        $guardians = array();
        $petDAO = new PetDAO();

        try{
            $query = "SELECT * FROM people p JOIN guardians g ON IdPerson = Id";
            $this->connection = Connection::GetInstance();
            $resultSet = $this->connection->Execute($query);

            foreach($resultSet as $value){
                $guardian = new Guardian();
                $guardian->setFirstName($value["firstName"]);
                $guardian->setLastName($value["lastName"]);
                $guardian->setBirthDate($value["birthDate"]);
                $guardian->setDni($value["dni"]);
                $guardian->setGender($value["gender"]);
                $guardian->setPhone($value["phone"]);
                $guardian->setEmail($value["email"]);
                $guardian->setUsername($value["username"]);
                $guardian->setPassword($value["password"]);
                $guardian->setUserType($value["userType"]);
                $guardian->setRate($value["rate"]);
                $guardian->setAcceptedSize($petDAO->GetSizeById($value["acceptedSizeId"]));
                $guardian->setAvailabilityStartDate($value["availabilityStartDate"]);
                $guardian->setAvailabilityEndDate($value["availabilityEndDate"]);

                array_push($guardians, $guardian);

            }
        }catch(Exception $exc){
            throw $exc;
        }
        return $guardians;
    }

/* 
    private function SaveData(){

        $arrayToEncode = array();

        foreach($this->guardianList as $guardian){

            $valuesArray["nombre"] = $guardian->getNombre();
            $valuesArray["dni"] = $guardian->getDni();
            $valuesArray["direccion"] = $guardian->getDireccion();
            $valuesArray["telefono"] = $guardian->getTelefono();
            $valuesArray["disponibilidad"] = $guardian->getDisponibilidad();
            $valuesArray["precio"] = $guardian->getPrecio();
            $valuesArray["tipo"] = $guardian->getTipo();

            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        file_put_contents($this->fileName, $jsonContent);
    }


    private function RetrieveData(){
        
        $this->guardianList = array();

        if(file_exists($this->fileName)){

            $jsonContent = file_get_contents($this->fileName);

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach($arrayToDecode as $valuesArray){

                $guardian = new Guardian();
                $guardian->setNombre($valuesArray["nombre"]);
                $guardian->setDni($valuesArray["dni"]);
                $guardian->setDireccion($valuesArray["direccion"]);
                $guardian->setTelefono($valuesArray["telefono"]);
                $guardian->setDisponibilidad($valuesArray["disponibilidad"]);
                $guardian->setPrecio($valuesArray["precio"]);
                $guardian->setTipo($valuesArray["tipo"]);

                array_push($this->guardianList, $guardian);

            }
        }
    } */

}



?>