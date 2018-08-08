<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>inicio</title>
</head>
<body>
<div class="container">

 
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <span class="navbar-brand h1"><?php echo("Fecha actual: ".date('Y-m-d')); ?></span>
</nav>

<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$consulta = "SELECT fecha.registro as registro ,
                cliente.nombre as cliente ,
                responsable.nombre as rnombre ,
                responsable.apellido as rapellido ,
                proyecto.oportunidad as oportunidad ,
                contacto.nombre as rnombre ,
                contacto.apellido as rapellido ,
                fecha.aceptacion as aceptacion ,
                fecha.visita as visita ,
                fecha.consultas as consultas ,
                fecha.respuestas as respuestas ,
                fecha.oferta as oferta ,
                fecha.decision as decision ,
                proyecto.enviado as enviado ,
                proyecto.cotizacion as cotizacion ,
                concat(fecha.oferta - curdate(), ' dias restantes') as estado,
                proyecto.comentario as comentario
            FROM fecha, cliente, responsable, proyecto, contacto
            WHERE fecha.proyecto_idproyecto = proyecto.idproyecto 
            AND fecha.contacto_idcontacto = contacto.idcontacto
            AND fecha.responsable_idresponsable = responsable.idresponsable 
            AND contacto.cliente_idcliente = cliente.idcliente 
            order by proyecto.idproyecto";
$resultado = mysqli_query( $conexion, $consulta )
    or die ( "Algo ha ido mal en la consulta a la base de datos");
?>
<br><br><br><br>
<table class="table">
  <thead>
    <tr>
        <th scope="col">registro</th>
        <th scope="col">cliente</th>
        <th scope="col">R.nombre</th>
        <th scope="col">R.apellido</th>
        <th scope="col">oportunidad</th>
        <th scope="col">C.nombre</th>
        <th scope="col">C.apellido</th>
        <th scope="col">aceptacion</th>
        <th scope="col">visita</th>
        <th scope="col">consultas</th>
        <th scope="col">respuestas</th>
        <th scope="col">oferta</th>
        <th scope="col">decision</th>
        <th scope="col">enviado</th>
        <th scope="col">cotizacion</th>
        <th scope="col">estado</th>
        <th scope="col">comentarios</th>
    </tr>
  </thead>
  <tbody>

<?php
while ($columna = mysqli_fetch_array( $resultado ))
{

    $registro = $columna['registro'];
    $cliente = $columna['cliente'];
    $rnombre = $columna['rnombre'];
    $rapellido = $columna['rapellido'];
    $oportunidad = $columna['oportunidad'];
    $rnombre = $columna['rnombre'];
    $rapellido = $columna['rapellido'];
    $aceptacion = $columna['aceptacion'];
    $visita = $columna['visita'];
    $consultas = $columna['consultas'];
    $respuestas = $columna['respuestas'];
    $oferta = $columna['oferta'];
    $decision = $columna['decision'];
    $enviado = $columna['enviado'];
    $cotizacion = $columna['cotizacion'];
    $estado = $columna['estado'];
    $comentario = $columna['comentario'];


    echo "<tr>";
    $html = "<td>".$registro."</td>";
    $html .= "<td>".$cliente."</td>";
    $html .= "<td>".$rnombre."</td>";
    $html .= "<td>".$rapellido."</td>";
    $html .= "<td>".$oportunidad."</td>";
    $html .= "<td>".$rnombre."</td>";
    $html .= "<td>".$rapellido."</td>";
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
    
</div>
</body>
</html>