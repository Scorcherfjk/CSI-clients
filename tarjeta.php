<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title><?php echo $_GET["variable"] ?></title>
</head>
<body>
<div class="container">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
        <span class="navbar-brand h1">Cientes <i>"Control Sistems"</i></span>
    </nav>
    <br><br><br>
    <div class="card">
        <div class="card-header">
            Chinalco - Tableros de Control y Comunicaciones
        </div>
        <div class="card-body">
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Responsable</label>
                        <input type="text" class="form-control" id="inputEmail4" value="Carlos Diaz" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Contacto</label>
                        <input type="text" class="form-control" id="inputPassword4" value="Juan Pacheco" disabled>
                    </div>
                </div>
                <table class="table table-responsive-sm table-bordered">
                        <thead class="text-center thead-light">
                          <tr>
                              <th scope="col">Registro</th>
                              <th scope="col">Aceptacion</th>
                              <th scope="col">Visita</th>
                              <th scope="col">Consultas</th>
                              <th scope="col">Respuestas</th>
                              <th scope="col">Oferta</th>
                              <th scope="col">Decision</th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          <tr>
                            <td>2018-07-26</td>
                            <td>2018-07-30</td>
                            <td>2018-08-08</td>
                            <td>2018-08-15</td>
                            <td>2018-08-24</td>
                            <td>2018-08-17</td>
                            <td>15 dias restantes</td>
                          </tr>
                        </tbody>
                      </table>
            </form>
        </div>
    </div>
</div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>