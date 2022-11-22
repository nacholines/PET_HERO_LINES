<?php
    namespace Helpers;

    class SessionValidator{

        public static function ValidateSession(){
            if(!isset($_SESSION["loggedUser"])){
                header("location:" . FRONT_ROOT . "home/Index");
            }
        }

        public static function ValidatePersonNav(){
            if(isset($_SESSION["loggedUser"])){
                $person = $_SESSION["loggedUser"];
                if(strcmp($person->getUserType(), "Owner")){
                    require_once(VIEWS_PATH . "nav-owner.php");
                }else{
                    require_once(VIEWS_PATH . "nav-guardian.php");
                }
            }else{
                require_once(VIEWS_PATH . "nav.php");
            }
        }

        public static function ValidateGuardianView(){
            if(isset($_SESSION["loggedUser"])){
                $person = $_SESSION["loggedUser"];
                if(!strcmp($person->getUserType(), "Guardian")){
                    header("location:" . FRONT_ROOT . "index.php");
                }
            }else{
                header("location:" . FRONT_ROOT . "index.php");
            }
        }
        
        public static function ValidateOwnerView(){
            if(isset($_SESSION["loggedUser"])){
                $person = $_SESSION["loggedUser"];
                if(!strcmp($person->getUserType(), "Owner")){
                    header("location:" . FRONT_ROOT . "index.php");
                }
            }else{
                header("location:" . FRONT_ROOT . "index.php");
            }
        }
    }
?>