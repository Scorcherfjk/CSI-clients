<?php
print_r($_POST);
/* */
// incluye la variable de la conexion a la base de datos
require("conexion.php"); 

// los id
$idproyecto = $_POST['idproyecto'];
$idresponsable = $_POST['idresponsable'];
$idcontacto = $_POST['idcontacto'];


// las fechas
$registro = $_POST['registro'];
$aceptacion = $_POST['aceptacion'];
$visita = $_POST['visita'];
$consultas = $_POST['consultas'];
$respuestas = $_POST['respuestas'];
$oferta = $_POST['oferta'];
$decision = $_POST['decision'];

// los datos extra
$enviado = $_POST['enviado'];
$cotizacion = $_POST['cotizacion'];
$monto = $_POST['monto'];
$comentario = $_POST['comentario'];




/**********************************************************************************/

// Query
$option = 
"UPDATE 
    proyecto
SET 
    responsable_idresponsable = '$idresponsable',
    contacto_idcontacto = '$idcontacto',
    enviado = '$enviado',
    cotizacion = '$cotizacion',
    monto = '$monto',
    comentario = '$comentario'
WHERE
    idproyecto = '$idproyecto'";

// Ejecutando el SQL
$optionready = mysqli_query($conexion,$option);
mysqli_commit($conexion);
mysqli_free_result($optionready);

/**********************************************************************************/

// Query2
$option2 = 
"UPDATE 
    fecha
SET 
    responsable_idresponsable = '$idresponsable',
    contacto_idcontacto = '$idcontacto',
    registro = '$registro',
    aceptacion = '$aceptacion',
    visita = '$visita',
    consultas = '$consultas',
    respuestas = '$respuestas',
    oferta = '$oferta',
    decision = '$decision'
WHERE
    proyecto_idproyecto = '$idproyecto'";

// Ejecutando el SQL 2
$optionready2 = mysqli_query($conexion,$option2);
mysqli_commit($conexion);
mysqli_free_result($optionready2);

mysqli_close($conexion);
header("location:http://localhost:8080/FTMetrics/CSI-clients/"); 
?>