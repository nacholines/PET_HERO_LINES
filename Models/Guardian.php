<?php

namespace Models;

class Guardian extends Person{
    private static $numberGuardian = 0;
    private $idGuardian;
    private $listaDisponibilidad;
    private $precio;
    private $tipoMascota;

    public function __constructor($firstName, $lastName, $bitrhDate, $dni, $gender, $phone, $email, $password, $precio, $tipoMascota){
        super($firstName, $lastName, $bitrhDate, $dni, $gender, $phone, $email, $password);

        $this->idGuardian = $this::$numberGuardian+1;

        $this->listaDisponibilidad = array();
        $this->precio=$precio;
        $this->tipoMascota=$tipoMascota;

        MyClass::$numberGuardian++;
    }

    public function getListaDisponibilidad(){
        return $this->listaDisponibilidad;
    }

    public function setListaDisponibilidad($disponibilidad){
        $this->listaDisponibilidad = $disponibilidad;
    }

    public function addDisponibilidad($dateDisponible){
        array_push($this->listaDisponibilidad, $dateDisponible);
    }

    public function getPrecio(){
        return $this->precio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getTipoMascota(){
        return $this->tipo;
    }

    public function setTipoMascota($tipo){
        $this->tipo = $tipo;
    }


}

?>