<?php

namespace Models;

class Guardian extends Person{
    private $rate;
    private $acceptedSize;
    private $availabilityStartDate;
    private $availabilityEndDate;

    public function __constructor(){
    }

    public function getRate(){
        return $this->rate;
    }
    public function setRate($rate){
        $this->rate = $rate;
    }

    public function getAcceptedSize(){
        return $this->acceptedSize;
    }
    public function setAcceptedSize($acceptedSize){
        $this->acceptedSize = $acceptedSize;
    }

    public function getAvailabilityStartDate(){
        return $this->availabilityStartDate;
    }
    public function setAvailabilityStartDate($availabilityStartDate){
        $this->availabilityStartDate = $availabilityStartDate;
    }

    public function getAvailabilityEndDate(){
        return $this->availabilityEndDate;
    }
    public function setAvailabilityEndDate($availabilityEndDate){
        $this->availabilityEndDate = $availabilityEndDate;
    }

}

?>