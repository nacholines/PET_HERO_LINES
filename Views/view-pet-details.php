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
    <a href= "<?php echo FRONT_ROOT ?>Pet/DeletePet/?petId=<?php echo $pet->getIdPet();?>" class="btn btn-danger">Borrar</a>
  </div>
</div>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>