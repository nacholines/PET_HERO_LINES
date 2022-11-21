<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <div class="container mt-5">
    <div class="alert alert-info text-center" role="alert">
      <h4 class="alert-heading">Mascota eliminada exitosamente.</h4>
      <p>Se eliminó a tu mascota <?= $pet-> getName(); ?>. De todas formas, la información sigue en nuestro sistema.</p>
      <hr>
      <a type="button" class="btn btn-info text-white" href= "<?php echo FRONT_ROOT ?>Pet/ShowPetsView">Volver a <b>Mis mascotas</b></a>
    </div>
  </div>
</body>
</html>