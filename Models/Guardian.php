<?php

namespace Models;

class Guardian extends Person{
    private $rate;
    private $acceptedSize;
    private $avilabilityStartDate;
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
        return $this->avilabilityStartDate;
    }
    public function setAvailabilityStartDate($avilabilityStartDate){
        $this->avilabilityStartDate = $avilabilityStartDate;
    }

    public function getAvailabilityEndDate(){
        return $this->availabilityEndDate;
    }
    public function setAvailabilityEndDate($availabilityEndDate){
        $this->availabilityEndDate = $availabilityEndDate;
    }

}

?>