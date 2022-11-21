<?php
    namespace Models;
    
    class PetType{
        private $idType;
        private $name;

        public function __construct(){}

        public function getIdType(){
            return $this->idType;
        }
        public function setIdType($idType){
            $this->idType = $idType;
            return $this;
        }

        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
            return $this;
        }
    }
?>