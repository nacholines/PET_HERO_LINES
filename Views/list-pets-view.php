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
        <?php
        if ($message != ""){
        ?>
        <div class="alert alert-success mt-3" role="alert">
            <?= $message; ?>
        </div>
        <?php
        }
        ?>
        <h2 class='mt-4'>Mis mascotas:</h2>
        <ul class="list-group">
            <?php
            //TODO change to a table with more info
                foreach ($pets as $pet => $value) {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                    ' . $value-> getName() .'
                    <a class="badge badge-primary badge-pill text-white" href="' . FRONT_ROOT . 'Pet/ShowPetDetailsView/?petID=' . $value->getIdPet() . '">Ver Mascota</a>
                    </li>';
                }
            ?>
        </ul>
        <a type="button" class="btn btn-info mt-3 btn-lg btn-block" href= "<?php echo FRONT_ROOT ?>Pet/ShowRegisterView">Agregar mascota</a>
    </div>

</body>
</html>