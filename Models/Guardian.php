<?php

namespace Models;

class Guardian extends Person{
    private $IdPerson;
    private $rate;
    private $acceptedSize;
    private $avilabilityStartDate;
    private $availabilityEndDate;

    public function __constructor(){
    }

    //TODO replace the id with the actual person instance 
    public function getIdPerson(){
        return $this->IdPerson;
    }
    public function setIdPerson($IdPerson){
        $this->IdPerson = $IdPerson;
        return $this;
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
        return $this;
    }

    public function getAvailabilityEndDate(){
        return $this->availabilityEndDate;
    }
    public function setAvailabilityEndDate($availabilityEndDate){
        $this->availabilityEndDate = $availabilityEndDate;
        return $this;
    }

}

?>