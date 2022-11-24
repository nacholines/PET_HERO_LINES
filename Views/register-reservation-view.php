<?php
  require_once(VIEWS_PATH."header.php");
  Helpers\SessionValidator::ValidatePersonNav();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class='container'>
        <h2 class='mt-4'>Ingresar reserva:</h2>
        <form action=<?php echo FRONT_ROOT . "reservation/Register" ?> method="post">
            <input type="hidden" id="idPerson" name="idPerson" value="<?php echo $idPerson; ?>">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for = "">Fecha de inicio de la reserva</label>
                    <input type="date" name ="startDate" value="" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                    <label for = "">Fecha final de la reserva</label>
                    <input type="date" name ="endDate" value="" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit">Registrar reserva</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>