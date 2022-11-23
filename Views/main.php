<?php
    require_once("Config/Autoload.php");
    use Models\Person as Person;

    //session_start();
    if(isset($_SESSION["loggedUser"])){
        $loggedUser = $_SESSION["loggedUser"];
    }else{
        header(VIEWS_PATH . "index.php");
    }
    //TODO add info message
	require_once(VIEWS_PATH."header.php");
    Helpers\SessionValidator::ValidatePersonNav();
?>
<html>
    <h3 class = "md-3">BIENVENIDO <?php echo $loggedUser->getUsername() ?></h3>
</html>