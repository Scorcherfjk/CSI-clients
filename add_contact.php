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
        <form action="./update/contact.php" method="post">
            <div class="card">
                <div class="card-header h4">
                    <a class="navbar-brand" disabled>Agregar nuevo contacto</a>
                    <input class="btn btn-primary text-light float-right" type="submit" value="Guardar">
                </div>
                <div class="card-body">
                    <!--=======================================SELECCION DEL RESPONSABLE=================================-->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="name">Nombre<span class="text-danger"> (*)</span></label>
                            <input type="text" name="name" id="name" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido">Apellido<span class="text-danger"> (*)</span></label>
                            <input type="text" name="apellido" id="apellido" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cliente">Cliente<span class="text-danger"> (*)</span></label>
                            <select id="cliente" name="cliente" class="custom-select" required>
                                <?php
                                    //contruccion de las opciones
                                    $option = "SELECT idcliente, nombre FROM cliente";
                                    $optionready = mysqli_query($conexion,$option);
                                    mysqli_data_seek ($optionready, 0);
                                    while ($row = mysqli_fetch_array($optionready)){
                                        echo "<option value='".$row['idcliente']."'>".$row['nombre']."</option>";	
                                    }
                                    mysqli_free_result($optionready);
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="email">Email<span class="text-danger"> (*)</span></label>
                            <input type="email" name="email" id="email" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="tel">Telefono</label>
                            <input type="text" name="tel" id="tel" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="cel">celular<span class="text-danger"> (*)</span></label>
                            <input type="text" name="cel" id="cel" class="form-control" autocomplete="off" required>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!--=======================================FINAL DEL FORMULARIO======================================-->
        <br>
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