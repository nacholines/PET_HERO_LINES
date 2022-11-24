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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class='container'>
  <?php
  if ($message != ""){
  ?>
  <div class="alert alert-warning mt-3" role="alert">
      <?= $message; ?>
  </div>
  <?php
  }
  ?>
  <h2 class='mt-4'>Ingresar usuario:</h2>
  <form action=<?= FRONT_ROOT . "person/Register" ?> method="post">
    <div class="row">
      <div class="col-lg-4 mt-3">
        <div class="form-group">
          <label for = "">Nombre</label>
          <input type="text" name ="firstName" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Apellido</label>
          <input type="text" name ="lastName" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">DNI</label>
          <input type="text" name ="dni" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Fecha de nacimiento</label>
          <input type="date" name ="birthDate" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group" required>
          <label for = "">Sexo</label> <br>
          <input type="radio" name="gender" value="M" id="masculino" class="col-lg-2">
          <label for="masculino">Masculino</label>
          
          <input type="radio" name="gender" value="F" id="femenino" class="col-lg-2">
          <label for="femenino">Femenino</label>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Telefono</label>
          <input type="text" name ="phone" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Email</label>
          <input type="text" name ="email" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Nombre de usuario</label>
          <input type="text" name ="username" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group">
          <label for = "">Contraseña</label>
          <input type="password" name ="password" value="" class="form-control" required>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="form-group" required>
          <label for = "">Tipo de cuenta</label> <br>
          <input type="radio" name="userType" value="Owner" id="owner" class="col-lg-2">
          <label for="masculino">Owner</label>
          
          <input type="radio" name="userType" value="Guardian" id="guardian" class="col-lg-2">
          <label for="femenino">Guardian</label>
        </div>
      </div>
      <br>
      <div>
        <button type="submit">Registrarme</button>
      </div>

      
    </div>
</div>

</body>
</html>