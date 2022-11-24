<?php
namespace Controllers;

use Models\Reservation as Reservation;
use DAO\GuardianDAO as GuardianDAO;
use DAO\PetDAO as PetDAO;
use DAO\ReservationDAO as ReservationDAO;


class ReservationController{
    private $reservationDAO;
    private $petDAO;
    private $guardianDAO;

    function __construct(){
        $this->reservationDAO = new ReservationDAO();
        $this->petDAO = new PetDAO();
        $this->guardianDAO = new GuardianDAO();
    }

    public function ShowRegisterView($idPerson){
        include_once(VIEWS_PATH . "register-reservation-view.php");
    }

    public function Register($idPerson, $startDate, $endDate){
        try{
            $pet = $_SESSION["reservationPet"];
            $idPet = $pet->getIdPet();
            $this->RegisterReservation($idPerson, $idPet, $startDate, $endDate);
        }catch(Exception $exc){
            $this->ShowMainView("No se pudo registrar la reserva.");
        }
    }

    private function GetReservationCost($guardian, $startDate, $endDate){
        //$stDa = new DateTime($startDate);
        //$endDa = new DateTime($endDate);
        $stDate = date('d',strtotime($startDate));
        $enDate = date('d',strtotime($endDate));
        $dateDifference = $enDate - $stDate;
        $cost = $dateDifference * $guardian->getRate();
        return $cost;
    }

    private function Add($reservation){
        try{
            $this->reservationDAO->create($reservation);
        }catch(Exception $exc){
            throw $exc;
        }
    }

    public function RegisterReservation($idPerson, $idPet, $startDate, $endDate){
        try{
            $reservation = new Reservation();
            $guardian = $this->guardianDAO->getGuardianById($idPerson);

            if($guardian->getAvailabilityStartDate() < $startDate && $endDate < $guardian->getAvailabilityEndDate()){
                $reservation->setPet($idPet);
                $reservation->setGuardian($this->guardianDAO->GetGuardianIdByPersonId($idPerson));
                $reservation->setStatus("Pending");
                $reservation->setStartDate($startDate);
                $reservation->setEndDate($endDate);
                $reservation->setCost($this->GetReservationCost($guardian, $startDate, $endDate));
                $this->Add($reservation);
                $this->ShowMainView("Se hizo la reserva correctamente.");
            }else{
                $this->ShowMainView("El guardian no se encuentra disponible para esas fechas.");
            }
        }catch(Exception $exc){
            throw $exc;
        }
    }

    
    public function ShowMainView($message = ""){
        require_once(VIEWS_PATH."main.php");
    }

}
?>
