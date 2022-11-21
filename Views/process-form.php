<?php
require_once("../Config/Autoload.php");

use DAO\PersonDAO as PersonDAO;
use Models\Person as Person;

if($_POST)
{
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];

    $person = new Person();
    $person->setNombre($nombre);
    $person->setTipo($tipo);
    $person->setPrecio($precio);

    $personDao = new PersonDAO();

    $personDao->Add($person);

}


?>