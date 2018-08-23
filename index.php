<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos
$tabla = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <style>
        tbody{
            font-size:0.8em;
        }
    </style>
    <title>Inicio</title>
</head>
<body>

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
        <a class="btn btn-primary text-light" href="http://localhost:8080/FTMetrics/CSI-clients/seleccion.php">modificar</a>
    </div>

</nav>

<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$consulta = "SELECT fecha.registro as registro ,
                cliente.nombre as cliente ,
                responsable.iniciales as iniciales,
                proyecto.oportunidad as oportunidad ,
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
                concat(fecha.oferta - curdate(), ' dias para la entrega') as estado,
                proyecto.comentario as comentario
            FROM fecha, cliente, responsable, proyecto, contacto
            WHERE fecha.proyecto_idproyecto = proyecto.idproyecto 
            AND fecha.contacto_idcontacto = contacto.idcontacto
            AND fecha.responsable_idresponsable = responsable.idresponsable 
            AND contacto.cliente_idcliente = cliente.idcliente 
            AND fecha.oferta - curdate() > -1
            ORDER BY proyecto.idproyecto";
$resultado = mysqli_query( $conexion, $consulta )
    or die ( "Algo ha ido mal en la consulta a la base de datos");
?>
<br><br><br><br>
<table class="table table-bordered">
  <thead class="text-center thead-light">
    <tr>
        <th scope="col">Cliente</th>
        <th scope="col">Resp.</th>
        <th scope="col">Oportunidad</th>
        <th scope="col">Contacto</th>
        <th scope="col">Aceptacion</th>
        <th scope="col">Visita</th>
        <th scope="col">Consultas</th>
        <th scope="col">Respuestas</th>
        <th scope="col">Oferta</th>
        <th scope="col">Decision</th>
        <th scope="col">Enviado</th>
        <th scope="col">Cotizacion</th>
        <th scope="col">Estado</th>
        <th scope="col">Comentarios</th>
    </tr>
  </thead>
  <tbody>

<?php
while ($columna = mysqli_fetch_array( $resultado )) { $tabla[] = $columna; }
foreach ($tabla as $columna) {

    $cliente = $columna['cliente'];
    $iniciales = $columna['iniciales'];
    $oportunidad = $columna['oportunidad'];
    $cnombre = $columna['cnombre'];
    $capellido = $columna['capellido'];
    $aceptacion = substr($columna['aceptacion'],5);
    $visita = substr($columna['visita'],5);
    $consultas = date("d-m" , strtotime($columna['consultas']));
    $respuestas = substr($columna['respuestas'],5);
    $oferta = substr($columna['oferta'],5);
    $decision = substr($columna['decision'],5);
    $enviado = $columna['enviado'];
    $cotizacion = $columna['cotizacion'];
    $estado = $columna['estado'];
    $comentario = $columna['comentario'];


    echo "<tr>";
    $html = "<td>".$cliente."</td>";
    $html .= "<td>".$iniciales."</td>";
    $html .= "<td>".$oportunidad."</td>";
    $html .= "<td>".$cnombre." ".$capellido."</td>";
    $html .= "<td>".$aceptacion."</td>";
    $html .= "<td>".$visita."</td>";
    $html .= "<td>".$consultas."</td>";
    $html .= "<td>".$respuestas."</td>";
    $html .= "<td>".$oferta."</td>";
    $html .= "<td>".$decision."</td>";
    $html .= "<td>".$enviado."</td>";
    $html .= "<td>".$cotizacion."</td>";
    $html .= "<td>".$estado."</td>";
    $html .= "<td>".$comentario."</td>";
    echo $html;
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

mysqli_close( $conexion );
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</body>
</html>