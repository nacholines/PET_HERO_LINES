<?php
    namespace Models;
    
    class PetSize{
        private $idPetSize;
        private $size;

        public function __construct(){}

        public function getIdPetSize(){
            return $this->idPetSize;
        }
        public function setIdPetSize($idPetSize){
            $this->idPetSize = $idPetSize;
            return $this;
        }

        public function getSize(){
            return $this->size;
        }
        public function setSize($size){
            $this->size = $size;
            return $this;
        }
    }
?>