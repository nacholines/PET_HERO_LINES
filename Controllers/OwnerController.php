<?php
    namespace Controllers;

    use Models\Guardian as Guardian;
    use Models\Owner as Owner;
    use Models\Pet as Pet;
    use DAO\GuardianDAO as GuardianDAO;
    use DAO\PetDAO as PetDAO;

    class OwnerController{
        private $guardianDAO;
        private $petDAO;

        function __construct(){
            $this->guardianDAO = new GuardianDAO();
            $this->petDAO = new PetDAO();
        }

        public function ShowGuardiansView($message = "", $type = ""){
            $guardians = $this->guardianDAO->getData();
            include_once(VIEWS_PATH . "list-guardians-view.php");
        }

        public function ShowGuardianDetailsView($personId){
            $guardian = $this->guardianDAO->GetGuardianById($personId);
            include_once(VIEWS_PATH . "view-guardian-details.php");
        }

        public function ShowFilteredGuardiansView($petId){
            $pet = $this->petDAO->GetPetById($petId);
            $_SESSION["reservationPet"] = $pet;
            $guardians = $this->guardianDAO->GetAvailableGuardiansBySize($pet->getSize()->getIdPetSize());
            include_once(VIEWS_PATH . "list-guardians-view.php");
        }

    }
?>