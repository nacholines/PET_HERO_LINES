<div class="container">
  <div class="row m-5">
    <div class="col-sm">
    </div>
    <div class="col-sm">
    <div class="card" style="width: 18rem;">
    <!-- TODO change hardcoded image by path in the object -->
  <img class="card-img-top" src="<?= IMG_PATH."Leia.jpeg"/* IMG_PATH . $guardian-> getPhoto(); */ ?>" alt="<?= $guardian-> getUsername(); ?>">
  <div class="card-body">
    <h5 class="card-title"><?= $guardian-> getName(); $guardian->getLastName() ?></h5>
  </div>
</div>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>