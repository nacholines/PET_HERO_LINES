<?php
    namespace Models;
    
    class Reservation{
        private $IdReservation;
        private $pet;
        private $guardian;
        private $status;
        private $startDate;
        private $endDate;
        private $cost;

        public function __construct(){}

        public function getIdReservation(){
            return $this->idReservation;
        }
        public function setIdReservation($idReservation){
            $this->idReservation = $idReservation;
        }

        public function getPet(){
            return $this->pet;
        }
        public function setPet($pet){
            $this->pet = $pet;
        }

        public function getGuardian(){
            return $this->guardian;
        }
        public function setGuardian($guardian){
            $this->guardian = $guardian;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($status){
            $this->status = $status;
        }

        public function getStartDate(){
            return $this->startDate;
        }
        public function setStartDate($startDate){
            $this->startDate = $startDate;
        }

        public function getEndDate(){
            return $this->endDate;
        }
        public function setEndDate($endDate){
            $this->endDate = $endDate;
        }

        public function getCost(){
            return $this->cost;
        }
        public function setCost($cost){
            $this->cost = $cost;
        }

    }
?>