<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH ?>estilos.css">

    <title>Carga de GUARDIAN</title>
</head>

<?php
    //TODO delete this file
    require_once(VIEWS_PATH."header.php");
  Helpers\SessionValidator::ValidatePersonNav();
?>

<body>
    <div id="carga-guardian"></div>
        <br>

        <h3 class="text-center display-4" style="margin-top: 70px">Registro:</h3>
        <div class="container">
            <div id="add-user-row" class="row justify-content-center align-items-center">
                
                <div id="add-user-col" class="col-md-6">

                    <div id="add-user-box" style="height: 325px"class="userAdd-box col-md-12 bg-light text-dark">
                        <form action="<?php echo FRONT_ROOT ?>LoginRegister/Register" method="post">

                            <h3 class="text-center" style="padding-top:10px">Ingrese sus datos por favor:</h3>

                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>    

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>                                                      
                                
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-lg btn-block">Registrarse</button>
                            </div>

                            <span class="badge badge-danger" style="font-size: 15px;"><?php echo $message ?></span>

                        </form>

                    </div>
                    <div style="margin-top: 10px">
                    
                        <span class="badge badge-info" style="font-size: 15px;"><a style="color: white" href="<?php echo FRONT_ROOT ?>Home">Ya tiene cuenta? Inicie sesión</a>  </span>
                    </div>
                            
                </div>

            </div>
        </div>
</body>
</html>