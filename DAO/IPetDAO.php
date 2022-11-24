<?php

    namespace DAO;

    use Models\Pet as Pet;

    interface IPetDAO{
        function GetTypesData();
        function GetSizeById($idPetSize);
    }
?>