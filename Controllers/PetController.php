<?php
namespace Controllers;

use Models\Pet as Pet;
use DAO\PetDAO as PetDAO;


class PetController{
    private $petDAO;

    function __construct(){
        $this->petDAO = new PetDAO();
    }

    public function Register($idPerson, $petType, $size, $name, $comment, $breed){
        $this->RegisterPet($idPerson, $petType, $size, $name, $comment, $breed);
    }

    public function RegisterPet($idPerson, $petType, $size, $name, $comment, $breed){
        $pet = new Pet();
        $pet = $pet->setIdPerson($idPerson);
        $pet = $pet->setPetType($petType);
        $pet = $pet->setSize($size);
        $pet = $pet->setName($name);
        $pet = $pet->setComment($comment);
        $pet = $pet->setBreed($breed);

        $this->Add($pet);
        $this->ShowPetsView("Se registró a " . $pet->getName() . " correctamente." );
    }
    
    public function Add($_pet){
        try{
            $this->petDAO->create($_pet);
        }catch(Exception $exc){
            throw $exc;
        }
    }

    public function DeletePet($idPet){
        //TODO verify owner
        $pet = $this-> petDAO-> GetPetById($idPet);
        $this-> petDAO-> DeletePet($idPet);
        require_once(VIEWS_PATH."delete-pet-successful-view.php");

    }

    public function FillPetData($pet){
        $sizeId = $this-> petDAO-> getSizeIdByPetId($pet-> getIdPet());
        $size = $this->petDAO->GetSizeById($sizeId);
        $pet->setSize($this->petDAO->GetSizeById($pet->getSize()));
        $typeId = $this->petDAO->getTypeIdByPetId($pet->getIdPet());
        $type = $this->petDAO->GetTypeById($typeId);
        $pet->setPetType($this->petDAO->GetTypeById($pet->getPetType()));
    }

    public function ShowRegisterView($message = "", $type = ""){
        $petTypes = $this-> petDAO-> GetTypesData();
        $petSizes = $this-> petDAO-> GetSizesData();
        require_once(VIEWS_PATH."register-pet-view.php");
    }

    //TODO move to OwnerController
    public function ShowPetsView($message = "", $type = ""){
        $pets = $this-> petDAO-> GetPetsByPersonId($_SESSION["loggedUser"]-> getId());
        foreach ($pets as $pet => $value) {
            $this-> FillPetData($value);
        }
        require_once(VIEWS_PATH."list-pets-view.php");
    }

    public function ShowPetDetailsView($petId){
        $pet = $this-> petDAO-> GetPetById($petId);
        $this-> FillPetData($pet);
        require_once(VIEWS_PATH."view-pet.php");
    }

}
?>
