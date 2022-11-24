<?php

namespace DAO;

use DAO\IReservationDAO as IReservationDAO;
use Models\Reservation as Reservation;

class ReservationDAO implements IReservationDAO{
    private $reservations = array();
    private $connection;
    private $tableName = "reservations";

    public function __construct()
    {

    }

    public function create($reservation){
        $query = "INSERT INTO reservations (IdPet, IdGuardian, status, startDate, endDate, cost) VALUES (:IdPet, :IdGuardian, :status, :startDate, :endDate, :cost)";

        $parameters["IdPet"] = $reservation->getPet();
        $parameters["IdGuardian"] = $reservation->getGuardian();
        $parameters["status"] = $reservation->getStatus();
        $parameters["startDate"] = $reservation->getStartDate();
        $parameters["endDate"] = $reservation->getEndDate();
        $parameters["cost"] = $reservation->getCost();
        
        try{
            $this->connection = Connection::GetInstance();
            return $this->connection->Execute($query, $parameters);
        }catch(Exception $exc){
            throw $exc;
        }
    }

    public function Add(Reservation $reservation){

        $this->RetrieveData();

        array_push($this->reservationList, $reservation);

        $this->SaveData();

    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->reservationList;
    }
}

