<?php
	  require_once(VIEWS_PATH."header.php");
    Helpers\SessionValidator::ValidatePersonNav();
?>

<div class="container mt-5">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3"><?= $guardian->getUsername(); ?></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Nombre</h6>
                            <p>
                                <?= $guardian->getFirstName() . " " . $guardian->getLastName();?>
                            </p>
                            <h6>Fecha de nacimiento</h6>
                            <p>
                                <?= $guardian->getBirthDate(); ?>
                            </p>
                            <h6>Género</h6>
                            <p>
                                <?php echo (strcmp($guardian->getGender(), "M") == 0) ? "Masculino" : "Femenino"; ?>
                            </p>
                            <h6>DNI</h6>
                            <p>
                                <?= $guardian->getDni(); ?>
                            </p>
                            <h6>Fecha de nacimiento</h6>
                            <p>
                                <?= $guardian->getBirthDate(); ?>
                            </p>
                            <!-- TODO complete guardians data -->
                          </div>
                          <div class="col-md-6">
                            <h6>Tamaño de mascotas que cuida</h6>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> <?= $guardian->getAcceptedSize()->getSize(); ?></span>
                            <h6 class= "mt-2">Numero de telefono</h6>
                            <p>
                                <?= $guardian->getPhone(); ?>
                            </p>
                            <h6>Email</h6>
                            <p>
                                <?= $guardian->getEmail(); ?>
                            </p>
                            <h6>Fecha inicio de disponibilidad</h6>
                            <p>
                                <?= $guardian->getAvailabilityStartDate(); ?>
                            </p>
                            <h6>Fecha de fin de disponibilidad</h6>
                            <p>
                                <?= $guardian->getAvailabilityEndDate(); ?>
                            </p>
                            <h4>Remuneracion</h6>
                            <h5>
                                <?= $guardian->getRate(); ?> por dia
                            </h5>
                            <a href= "<?php echo FRONT_ROOT ?>Reservation/ShowRegisterView/?idPerson=<?= $guardian->getId(); ?>" class="btn btn-info mt-3">
                              Pedir reserva de este Guardian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 order-lg-1 text-center">
            <img src="<?=PEOPLE_IMG_PATH; ?>owner.jpg" class="mx-auto img-fluid img-circle d-block" alt="avatar">
        </div>
    </div>
</div>