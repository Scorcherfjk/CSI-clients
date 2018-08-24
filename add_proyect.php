<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <title>agregar reponsable</title>
</head>

<body>
    <div class="container">
        <!--=======================================INICIO DE LA BARRA DE NAVEGACION==========================-->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="http://localhost:8080/FTMetrics/CSI-clients/"><img src="./img/controlsi.png" alt="logo de ControlSI" style="width:110px; height:50px;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="http://localhost:8080/FTMetrics/CSI-clients/">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            Agregar
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_client.html">Cliente</a>
                            <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_contact.php">Contacto</a>
                            <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_proyect.php">Proyecto</a>
                            <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_resp.html">Responsable</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!--=======================================FINAL DE LA BARRA DE NAVEGACION===========================-->
        <!--=======================================INICIO DEL FORMULARIO=====================================-->
        <br><br><br><br>
        <form action="./update/proyect.php" method="post">
            <div class="card">
                <div class="card-header h4">
                    <a class="navbar-brand" disabled>Agregar nuevo proyecto</a>
                    <input class="btn btn-primary text-light float-right" type="submit" value="Guardar">
                </div>
                <div class="card-body">
                    <!--=======================================SELECCION DEL RESPONSABLE=================================-->
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="name">Nombre<span class="text-danger"> (*)</span></label>
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="responsable">Responsable<span class="text-danger"> (*)</span></label>
                                <select id="responsable" name="responsable" class="form-control" required>
                                    <?php
                                        //contruccion de las opciones
                                        $option = "SELECT idresponsable, nombre, apellido FROM responsable ";
                                        $optionready = mysqli_query($conexion,$option);
                                        mysqli_data_seek ($optionready, 0);
                                        while ($row = mysqli_fetch_array($optionready)){
                                            echo "<option value='".$row['idresponsable']."'>".$row['nombre']." ".$row['apellido']."</option>";	
                                        }
                                        mysqli_free_result($optionready);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contacto">Contacto<span class="text-danger"> (*)</span></label>
                                <select id="contacto" name="contacto" class="form-control" required>
                                    <?php
                                        //contruccion de las opciones
                                        $option = "SELECT idcontacto, nombre, apellido FROM contacto";
                                        $optionready = mysqli_query($conexion,$option);
                                        mysqli_data_seek ($optionready, 0);
                                        while ($row = mysqli_fetch_array($optionready)){
                                            echo "<option value='".$row['idcontacto']."'>".$row['nombre']." ".$row['apellido']."</option>";	
                                        }
                                        mysqli_free_result($optionready);
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-center thead-light">
                                    <tr>
                                        <th scope="col">Registro</th>
                                        <th scope="col">Aceptaci&oacuten</th>
                                        <th scope="col">Visita</th>
                                        <th scope="col">Consultas</th>
                                        <th scope="col">Respuestas</th>
                                        <th scope="col">Oferta</th>
                                        <th scope="col">Decisi&oacuten</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td><input class="form-control" type="date" name="registro" id="registro"></td>
                                        <td><input class="form-control" type="date" name="aceptacion" id="aceptacion"></td>
                                        <td><input class="form-control" type="date" name="visita" id="visita"></td>
                                        <td><input class="form-control" type="date" name="consultas" id="consultas"></td>
                                        <td><input class="form-control" type="date" name="respuestas" id="respuestas"></td>
                                        <td><input class="form-control" type="date" name="oferta" id="oferta"></td>
                                        <td><input class="form-control" type="date" name="decision" id="decision"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="cotizacion">Cotizaci&oacuten</label>
                                <input id="cotizacion" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="monto">Monto</label>
                                <input id="monto" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="enviado">Enviado</label>
                                <select id="enviado" class="form-control">
                                    <option value="0">NO</option>
                                    <option value="1">SI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <input id="estado" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="comentario">Comentario</label>
                        <textarea id="comentario" class="form-control" rows="3"></textarea>
                    </div>
                    <!--=======================================FINAL DEL FORMULARIO======================================-->
                    <br>
                </div>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>

</html>