<?php

namespace DAO;


///require "Config/Autoload.php";
///require_once("../Config/Autoload.php");

use DAO\IGuardianDAO as IGuardianDAO;
use Models\Guardian as Guardian;

class GuardianDAO implements IGuardianDAO{
    private $connection;
    private $tableName = "guardians";

    private $guardianList = array();
    private $fileName;

    public function create($guardian){
        $query = "INSERT INTO guardians (IdPerson, rate, tamanio, availabilityStartDate, availabilityEndDate) VALUES (:IdPerson, :rate, :tamanio, :availabilityStartDate, :availabilityEndDate)";

        $parameters['IdPerson'] = $guardian->getIdPerson();
        $parameters['rate'] = $guardian->getRate();
        $parameters['tamanio'] = $guardian->getSize();
        $parameters['availabilityStartDate'] = $guardian->getAvailabilityStartDate();
        $parameters['availabilityEndDate'] = $guardian->getAvailabilityEndDate();

        try{
            $this->connection = Connecion::getInstance();
            return $this->connection->Execute($query, $parameters);
        }catch(Exception $exc){
            throw $exc;
        }
    }

    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/Data/guardianes.json";

    }

    public function Add(Guardian $guardian){

        $this->RetrieveData();

        array_push($this->guardianList, $guardian);

        $this->SaveData();

    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->guardianList;
    }


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
    }

}



?>