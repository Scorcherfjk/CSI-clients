<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title><?php echo $_GET["var"] ?></title>
</head>
<body>
<div class="container">
<!--=======================================INICIO DE LA BARRA DE NAVEGACION==========================-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" disabled>ControlSI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost:8080/FTMetrics/CSI-clients/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <span class="nav-item" style="padding: 10px;"><?php echo("Fecha actual: ".date('Y-m-d')); ?></span>
        </div>
    </nav>
<!--=======================================FINAL DE LA BARRA DE NAVEGACION===========================-->
<!--=======================================LLAMADA A LAS DEPENDENCIAS================================-->
    <?php

    require("conexion.php"); // incluye la variable de la conexion a la base de datos
    $idproyecto = $_GET['var'];

//=========================================CONSULTA SQL PRINCIPAL====================================-->
    $consulta = "SELECT fecha.registro as registro ,
                cliente.nombre as cliente ,
                responsable.idresponsable as idresponsable ,
                responsable.nombre as rnombre ,
                responsable.apellido as rapellido ,
                proyecto.oportunidad as oportunidad ,
                contacto.idcontacto as idcontacto ,
                contacto.nombre as cnombre ,
                contacto.apellido as capellido ,
                fecha.aceptacion as aceptacion ,
                fecha.visita as visita ,
                fecha.consultas as consultas ,
                fecha.respuestas as respuestas ,
                fecha.oferta as oferta ,
                fecha.decision as decision ,
                proyecto.enviado as enviado ,
                proyecto.cotizacion as cotizacion ,
                proyecto.monto as monto ,
                concat(fecha.oferta - curdate(), ' dias restantes') as estado,
                proyecto.comentario as comentario
            FROM fecha, cliente, responsable, proyecto, contacto
            WHERE fecha.proyecto_idproyecto = proyecto.idproyecto 
            AND fecha.contacto_idcontacto = contacto.idcontacto
            AND fecha.responsable_idresponsable = responsable.idresponsable 
            AND contacto.cliente_idcliente = cliente.idcliente
            AND proyecto.idproyecto = $idproyecto
            ORDER BY proyecto.idproyecto";
    echo "<br><br><br><br>";
    $resultado = mysqli_query( $conexion, $consulta )
        or die ( "Algo ha ido mal en la consulta a la base de datos");
    while ($columna = mysqli_fetch_array( $resultado ))
    {

//=========================================ASIGNACION DE VARIABLES===================================-->
    $idcontacto = $columna['idcontacto'];
    $idresponsable = $columna['idresponsable'];
    $registro = $columna['registro'];
    $cliente = $columna['cliente'];
    $rnombre = $columna['rnombre'];
    $rapellido = $columna['rapellido'];
    $oportunidad = $columna['oportunidad'];
    $cnombre = $columna['cnombre'];
    $capellido = $columna['capellido'];
    $aceptacion = $columna['aceptacion'];
    $visita = $columna['visita'];
    $consultas = $columna['consultas'];
    $respuestas = $columna['respuestas'];
    $oferta = $columna['oferta'];
    $decision = $columna['decision'];
    $enviado = $columna['enviado'];
    $cotizacion = $columna['cotizacion'];
    $monto = $columna['monto'];
    $estado = $columna['estado'];
    $comentario = $columna['comentario'];

    ?>

<!--=======================================INICIO DEL FORMULARIO=====================================-->
    <form action="update.php" method="post">
    <div class="card">
        <div class="card-header h4">
            <a class="navbar-brand" disabled><?php echo $cliente." - ".$oportunidad ?></a>
            <input class="btn btn-primary text-light float-right" type="submit" value="Guardar">
        </div>
        <div class="card-body">
<!--=======================================SELECCION DEL RESPONSABLE=================================-->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="idresponsable">Responsable</label>
                    <select id="idresponsable" name="idresponsable" class="custom-select">
                        <?php
                            //contruccion de las opciones
                            $query = "SELECT idresponsable, nombre, apellido FROM responsable " ;
                            $resultado = mysqli_query( $conexion, $query )
                                or die ( "Algo ha ido mal en la consulta a la base de datos");
                            while ($columna = mysqli_fetch_array( $resultado )){
                                if ($idresponsable == $columna['idresponsable'] ){
                                    echo "<option value='".$columna['idresponsable']."' selected>".$columna['nombre'] ." ".$columna['apellido']."</option>";
                                }else{
                                    echo "<option value='".$columna['idresponsable']."'>".$columna['nombre'] ." ".$columna['apellido']."</option>";
                                }
                            } 
                        ?>
                    </select>
                </div>
<!--=======================================SELECCION DEL CONTACTO====================================-->
                <div class="form-group col-md-6">
                    <label for="idcontacto">Contacto</label>
                    <select id="idcontacto" name="idcontacto" class="custom-select">
                        <?php
                            //contruccion de las opciones
                            $query = "SELECT idcontacto, nombre, apellido FROM contacto " ;
                            $resultado = mysqli_query( $conexion, $query )
                                or die ( "Algo ha ido mal en la consulta a la base de datos");
                            while ($columna = mysqli_fetch_array( $resultado )){
                                if ($idcontacto == $columna['idcontacto'] ){
                                    echo "<option value='".$columna['idcontacto']."' selected>".$columna['nombre'] ." ".$columna['apellido']."</option>";
                                }else{
                                    echo "<option value='".$columna['idcontacto']."'>".$columna['nombre'] ." ".$columna['apellido']."</option>";
                                }
                            } 
                        ?>
                    </select>
                </div>
            </div>
<!--=======================================INICIO DE LA TABLA========================================-->
            <table class="table table-responsive table-bordered">
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
                        <td><input class="form-control" type="date" name="registro" id="registro" value ="<?php echo $registro ?>"></td>
                        <td><input class="form-control" type="date" name="aceptacion" id="aceptacion" value ="<?php echo $aceptacion ?>"></td>
                        <td><input class="form-control" type="date" name="visita" id="visita" value ="<?php echo $visita ?>"></td>
                        <td><input class="form-control" type="date" name="consultas" id="consultas" value ="<?php echo $consultas ?>"></td>
                        <td><input class="form-control" type="date" name="respuestas" id="respuestas" value ="<?php echo $respuestas ?>"></td>
                        <td><input class="form-control" type="date" name="oferta" id="oferta" value ="<?php echo $oferta ?>"></td>
                        <td><input class="form-control" type="date" name="decision" id="decision" value ="<?php echo $decision ?>"></td>
                    </tr>
                </tbody>
            </table>
<!--=======================================FINAL DE LA TABLA=========================================-->
<!--=======================================INICIO DE CAMPOS EXTERNOS=================================-->
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="inputEmail4">Enviado</label>
                    <input type="text" class="form-control" name="enviado" id="enviado" value="<?php echo $enviado ?>">
                </div>
                <div class="form-group col-md">
                    <label for="inputPassword4">Cotización</label>
                    <input type="text" class="form-control" name="cotizacion" id="cotizacion" value="<?php echo $cotizacion ?>">
                </div>
                <div class="form-group col-md">
                    <label for="inputPassword4">Monto</label>
                    <input type="text" class="form-control" name="monto" id="monto" value="<?php echo $monto ?>">
                </div>
                <div class="form-group col-md">
                    <label for="inputPassword4">Estado</label>
                    <input type="text" class="form-control" name="estado" id="estado" value="<?php echo $estado ?>" disabled>
                </div>
            </div>
<!--=======================================FINAL DE LOS CAMPOS EXTERNOS==============================-->
<!--=======================================INICIO DEL COMENTARIO=====================================-->
            <div class="form-group">
                <label for="inputPassword4">Comentario</label>
                <input type="text" class="form-control" name="comentario" id="comentario" value="<?php echo $comentario ?>">
            </div>
        </div>
    </div>
    </form>
<!--=======================================FINAL DEL FORMULARIO======================================-->
<br> 
<?php } mysqli_close( $conexion ); ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</div>
</body>
</html>