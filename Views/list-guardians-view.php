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
        <h2 class='mt-4'>Guardianes:</h2>
        <ul class="list-group">
            <?php
                foreach ($guardians as $guardian => $value) {
                    echo '<li class="list-group-item d-flex justify-content-between align-items-center">
                    ' . $value-> getUsername() .'
                    <a class="badge badge-primary badge-pill text-white" href="' . FRONT_ROOT . 'Owner/ShowGuardianDetailsView/?personId=' . $value->getId() . '">Ver Guardian</a>
                    </li>';
                }
            ?>
        </ul>
    </div>

</body>
</html>