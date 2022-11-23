<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<?php
	  require_once(VIEWS_PATH."header.php");
    Helpers\SessionValidator::ValidatePersonNav();
?>

<div class='container'>
  <h2 class='mt-4'>Ingresar usuario:</h2>
  <form action=<?= FRONT_ROOT . "Guardian/Register" ?> method="post">
    <div class="row">
      <div class="col-lg-4 mt-3">
        <div class="form-group">
          <label for = "">Tarifa por dia</label>
          <input type="text" name ="rate" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="col-lg-6">
            <div class="form-group">
                <label for = "">Tamaño de la mascota a cuidar: </label>
                <select name="acceptedSize" id="acceptedSize">
                    <?php
                        foreach ($petSizes as $pet => $value) {
                            echo '<option value="' . $value-> getIdPetSize() .'">' . $value-> getSize() .'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Fecha de inicio de disponibilidad</label>
          <input type="date" name ="availabilityStartDate" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Fecha de fin de disponibilidad</label>
          <input type="date" name ="availabilityEndDate" value="" class="form-control" required>
        </div>
      </div>
      <div>
        <button type="submit">Registrar datos de Guardian</button>
      </div>

      
    </div>
</div>

</body>
</html>