<?php
    namespace Models;
    
    class ReservationStatus{
        private $idStatus;
        private $status;

        public function __construct(){}

        public function getIdStatus(){
            return $this->idStatus;
        }
        public function setIdStatus($idStatus){
            $this->idStatus = $idStatus;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }
    }
?>