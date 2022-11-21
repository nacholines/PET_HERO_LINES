<?php

namespace Models;

class Owner extends Person{
    private $idPerson;
    private $petList;

    public function __constructor($firstName, $lastName, $bitrhDate, $dni, $gender, $phone, $email, $password, $disponibilidad, $precio, $tipo){
        super($firstName, $lastName, $bitrhDate, $dni, $gender, $phone, $email, $password);

        $this->idPerson = $this::$numberOwner+1;

        $this->petList = array();

        MyClass::$numberOwner++;
    }

    /* Agregar una mascota a la lista de mascotas*/

    public function addPet($pet){
        array_push($this->petList, $pet);
    }

    /**
     * Get the value of petList
     */
    public function getPetList()
    {
        return $this->petList;
    }

    /**
     * Get the value of idPerson
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }

    /**
     * Set the value of idPerson
     */
    public function setIdPerson($idPerson): self
    {
        $this->idPerson = $idPerson;

        return $this;
    }
}
?>