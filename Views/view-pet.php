<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="card text-center">
  <div class="card-header">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-detalles-tab" data-toggle="tab" href="#nav-detalles" role="tab" aria-controls="nav-detalles" aria-selected="true">Detalles</a>
        <a class="nav-item nav-link" id="nav-editar-tab" data-toggle="tab" href="#nav-editar" role="tab" aria-controls="nav-editar" aria-selected="false">Editar</a>
        <a class="nav-item nav-link" id="nav-reservar-tab" data-toggle="tab" href="#nav-reservar" role="tab" aria-controls="nav-reservar" aria-selected="false">Hacer una reserva</a>
    </div>
  </div>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-detalles" role="tabpanel" aria-labelledby="nav-detalles-tab"><?php require_once(VIEWS_PATH."view-pet-details.php"); ?></div>
    <div class="tab-pane fade" id="nav-editar" role="tabpanel" aria-labelledby="nav-editar-tab">Editar</div>
    <div class="tab-pane fade" id="nav-reservar" role="tabpanel" aria-labelledby="nav-reservar-tab">Hacer una reserva</div>
  </div>
</div>
</body>
</html>