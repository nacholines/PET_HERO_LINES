<?php

namespace Models;

class Disponibilidad{
    public $inicio;
    public $fin;

    public function __constructor($inicio, $fin){
        $this->inicio = $inicio;
        $this->fin = $fin;
    }

    /**
     * Get the value of inicio
     */
    public function getInicio()
    {
        return $this->inicio;
    }

    /**
     * Set the value of inicio
     */
    public function setInicio($inicio): self
    {
        $this->inicio = $inicio;

        return $this;
    }

    /**
     * Get the value of fin
     */
    public function getFin()
    {
        return $this->fin;
    }

    /**
     * Set the value of fin
     */
    public function setFin($fin): self
    {
        $this->fin = $fin;

        return $this;
    }
}






?>