<?php

namespace DAO;

///require_once("../Config/Autoload.php");

use DAO\IOwnerDAO as IOwnerDAO;
use Models\Owner as Owner;

class OwnerDAO implements IOwnerDAO{

    private $ownerList = array();
    private $fileName;

    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/Data/owners.json";

    }

    public function Add(Owner $owner){

        $this->RetrieveData();

        array_push($this->ownerList, $owner);

        $this->SaveData();

    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->ownerList;
    }


    private function SaveData(){

        $arrayToEncode = array();

        foreach($this->ownerList as $owner){

            $valuesArray["nombre"] = $owner->getNombre();
            $valuesArray["dni"] = $owner->getDni();
            $valuesArray["direccion"] = $owner->getDireccion();
            $valuesArray["telefono"] = $owner->getTelefono();
            $valuesArray["disponibilidad"] = $owner->getDisponibilidad();
            $valuesArray["precio"] = $owner->getPrecio();
            $valuesArray["tipo"] = $owner->getTipo();

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

