<?php

    namespace DAO;

    use Models\Person as Person;

    interface IPersonDAO{
        function Add(Person $person);
        function GetByDni($dni);
        function GetByUsername($username);
        function GetById($personId);
        function create($_person);
    }
?>