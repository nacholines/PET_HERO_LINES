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
        <h2 class='mt-4'>Ingresar mascota:</h2>
        <form action=<?php echo FRONT_ROOT . "pet/Register" ?> method="post">
            <input type="hidden" id="idPerson" name="idPerson" value="<?php echo $_SESSION["loggedUser"]-> getId(); ?>">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for = "">Tipo de mascota: </label>
                        <select name="petType" id="petType">
                            <?php
                                foreach ($petTypes as $pet => $value) {
                                    echo '<option value="' . $value-> getIdType() .'">' . $value-> getName() .'</option>';
                                }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for = "">Tamaño de la mascota: </label>
                        <select name="size" id="size">
                            <?php
                                foreach ($petSizes as $pet => $value) {
                                    echo '<option value="' . $value-> getIdPetSize() .'">' . $value-> getSize() .'</option>';
                                }

                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for = "">Nombre</label>
                        <input type="text" name="name" value="" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for = "">Observaciones (hasta 512 caracteres)</label>
                        <input type="text" name="comment" value="" maxlength="512" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for = "">Raza de la mascota (hasta 50 caracteres)</label>
                        <input type="text" name="breed" value="" maxlength="50" class="form-control" required>
                    </div>
                </div>
                <div class="col-lg-12">
                    <button type="submit">Registrar mascota</button>
                </div>
            </div>
        </form>
    </div>

</body>
</html>