<?php

namespace Models;

class Pet{
    //TODO add gender and birthdate. Change idPerson by a Person object
    private $idPet;
    private $idPerson;
    private $name;
    private $photo;
    private $size;
    private $vaccines;
    private $comment;
    private $video;
    private $petType;
    private $breed;

    public function __constructor(){}

    public function getIdPet(){
        return $this->idPet;
    }
    public function setIdPet($idPet){
        $this->idPet = $idPet;
        return $this;
    }

    //TODO replace the id with the actual person instance 
    public function getIdPerson(){
        return $this->idPerson;
    }
    public function setIdPerson($idPerson){
        $this->idPerson = $idPerson;
        return $this;
    }

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getPhoto(){
        return $this->photo;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
        return $this;
    }

    public function getSize(){
        return $this->size;
    }
    public function setSize($size){
        $this->size = $size;
        return $this;
    }

    public function getVaccines(){
        return $this->vaccines;
    }
    public function setVaccines($vaccines){
        $this->vaccines = $vaccines;
        return $this;
    }

    public function getComment(){
        return $this->comment;
    }
    public function setComment($comment){
        $this->comment = $comment;
        return $this;
    }

    public function getVideo(){
        return $this->video;
    }
    public function setVideo($video){
        $this->video = $video;
        return $this;
    }

    public function getPetType(){
        return $this->petType;
    }
    public function setPetType($petType){
        $this->petType = $petType;
        return $this;
    }

    public function getBreed(){
        return $this->breed;
    }
    public function setBreed($breed){
        $this->breed = $breed;
        return $this;
    }
}

?>