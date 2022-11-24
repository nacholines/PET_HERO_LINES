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
<div class="card text-center">
  <div class="card-header">
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-detalles-tab" data-toggle="tab" href="#nav-detalles" role="tab" aria-controls="nav-detalles" aria-selected="true">Detalles</a>
    </div>
  </div>
  <div class="tab-content" id="nav-tabContent">
    <div class="container">
      <div class="row m-5">
        <div class="col-sm">
        </div>
        <div class="col-sm">
        <div class="card" style="width: 18rem;">
        <!-- TODO change hardcoded image by path in the object -->
      <img class="card-img-top" src="<?= PET_IMG_PATH."Leia.jpeg"/* IMG_PATH . $pet-> getPhoto(); */ ?>" alt="<?= $pet-> getName(); ?>">
      <div class="card-body">
        <h5 class="card-title"><?= $pet-> getName(); ?></h5>
        <p class="card-text text-secondary mb-0">Comentarios:</p>
        <p class="card-text"><?= $pet-> getComment(); ?></p>
        <p class="card-text text-secondary mb-0">Raza:</p>
        <p class="card-text"><?= $pet-> getBreed(); ?></p>
        <p class="card-text text-secondary mb-0">Tamaño:</p>
        <p class="card-text"><?= $pet-> getSize()-> getSize(); ?></p>
        <a href= "<?php echo FRONT_ROOT ?>Owner/ShowFilteredGuardiansView/?pet=<?php echo $pet->getIdPet();?>" class="btn btn-info">Ver posibles Guardians</a>
        <a href= "<?php echo FRONT_ROOT ?>Pet/DeletePet/?petId=<?php echo $pet->getIdPet();?>" class="btn btn-danger mt-2">Borrar</a>
      </div>
    </div>
        </div>
        <div class="col-sm">
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

