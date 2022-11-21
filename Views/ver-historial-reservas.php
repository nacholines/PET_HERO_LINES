<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ver-guardianes.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet"/>
    <title>Table</title>
  </head>

  <body>

    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Pet Hero</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">Mi Perfil</a>
                    <a class="nav-item nav-link" href="#">Contratá tu guardian</a>
                    <a class="nav-item nav-link" href="#">Nosotros</a>
                </div>
            </div>
        </nav>

    </header>


        <div class="container">
            <div class="table-header">
            <h2>Historial de reservas</h2>
            <select name="" id="">
                <option value="" selected>Tipo</option>
                <option value="">Tipo1</option>
                <option value="">Tipo2</option>
            </select>
            <div class="input-search">
                <input type="search" placeholder="Buscar" />
                <i class="bi bi-search" id="search"></i>
            </div>
            </div>
            <table>
            <thead>
                <tr>
                <th>Tipo</th>
                <th>Nombre del Dueño</th>
                <th>Fecha</th>
                <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Pequeño</td>
                <td>Pol Fernandez</td>
                <td>27/09/22</td>
                <td>
                    <a class="btn btn-outline-primary" href="#" role="button">Ver reseña</a>
                </td>
                </tr>
                <tr>
                <td>Mediano</td>
                <td>Erling Haaland</td>
                <td>15/09/22</td>
                <td>
                    <a class="btn btn-outline-primary" href="#" role="button">Ver reseña</a>
                </td>
                </tr>
                <tr>
                <td>Grande</td>
                <td>Carlos Tevez</td>
                <td>10/09/22</td>
                <td>
                    <a class="btn btn-outline-primary" href="#" role="button">Ver reseña</a>
                </td>
                </tr>
                <tr>
                <td>Pequeño - Grande</td>
                <td>Juan Gomez</td>
                <td>25/08/22</td>
                <td>
                    <a class="btn btn-outline-primary" href="#" role="button">Ver reseña</a>
                </td>
                </tr>
            </tbody>
            </table>
            <div class="table-footer">
            </div>
        </div>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"/>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 

    </body>
</html>