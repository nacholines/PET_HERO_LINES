<?php

namespace DAO;

use Models\Guardian as Guardian;

interface IGuardianDAO{
    function create($guardian, $idPerson);
    function GetGuardianById($personId);
    function GetData();
}


?>