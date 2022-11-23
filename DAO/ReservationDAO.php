<?php

namespace DAO;

///require_once("../Config/Autoload.php");

use DAO\IOwnerDAO as IOwnerDAO;
use Models\Owner as Owner;

class OwnerDAO implements IOwnerDAO{

    private $ownerList = array();
    private $fileName;

    public function __construct()
    {
        $this->fileName = dirname(__DIR__)."/Data/owners.json";

    }

    public function Add(Owner $owner){

        $this->RetrieveData();

        array_push($this->ownerList, $owner);

        $this->SaveData();

    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->ownerList;
    }
}

