<?php
    namespace Controllers;

    use Models\Guardian as Guardian;
    use Models\Owner as Owner;
    use DAO\GuardianDAO as GuardianDAO;

    class OwnerController{
        private $guardianDAO;

        function __construct(){
            $this->guardianDAO = new GuardianDAO();
        }

        public function ShowGuardiansView($message = "", $type = ""){
            $guardians = $this->guardianDAO->getData();
            include_once(VIEWS_PATH . "list-guardians-view.php");
        }

        public function ShowGuardianDetailsView($personId){
            $guardian = $this->guardianDAO->GetGuardianById($personId);
            include_once(VIEWS_PATH . "view-guardian-details.php");

        }

    }
?>