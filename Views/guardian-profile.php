<?php
    require_once('nav.php');
?>

<div class="card">
  <img src= <?php echo FRONT_ROOT.VIEWS_PATH ?>img ?>
  <div class="card-body">
    <h5 class="card-title">Información del Guardián</h5>
  </div>
  <ul class="list-group list-group-flush">
    <?php
      foreach($guardianList as $guardian)
      {
        if($guardian->getEmail() == $email)
        {
          ?>
          <li class="list-group-item">Nombre: <?php echo $guardian->getFirstName(); ?></li>
          <li class="list-group-item">Apellido: <?php echo $guardian->getLastName(); ?></li>
          <li class="list-group-item">DNI: <?php echo $guardian->getDni(); ?></li>
          <li class="list-group-item">Género: <?php echo $guardian->getGender(); ?></li>
          <li class="list-group-item">Fecha de Nacimiento: <?php echo $guardian->getBirthDate(); ?></li>
          <li class="list-group-item">Teléfono: <?php echo $guardian->getPhone(); ?></li>
          <li class="list-group-item">Email: <?php echo $stuguardiandent->getEmail(); ?></li>
          <li class="list-group-item">Disponibilidad: <?php echo $guardian->getDisponibilidad(); ?></li>
          <li class="list-group-item">Precio: <?php echo $guardian->getPrecio(); ?></li>
          <li class="list-group-item">Tipo: <?php echo $guardian->getTipo(); ?></li>

          <?php
        }
      }


      
    ?>
    
  </ul>
</div>



