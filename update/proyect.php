<?php 

require("conexion.php"); // incluye la variable de la conexion a la base de datos

/*********************************************************************************/
// nombre
$nombre = $_POST['name'];

// los id
$idresponsable = $_POST['responsable'];
$idcontacto = $_POST['contacto'];

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
"INSERT INTO 
    proyecto
    (idproyecto, oportunidad, responsable_idresponsable, contacto_idcontacto, enviado, cotizacion, monto, comentario)
values
    ('','$nombre','$idresponsable', '$idcontacto', '$enviado', '$cotizacion', '$monto', '$comentario')";

// Ejecutando el SQL
$optionready = mysqli_query($conexion,$option);
mysqli_commit($conexion);
mysqli_free_result($optionready);


/**********************************************************************************/

// Query
$id = "SELECT MAX(idproyecto) FROM proyecto";

// Ejecutando el SQL
$idready = mysqli_query($conexion,$id);
$row = mysqli_fetch_array($idready);
$idproyecto = $row[0];
mysqli_free_result($idready);


/**********************************************************************************/

// Query2
$option2 = 
"INSERT INTO 
    fecha
    (idfecha, proyecto_idproyecto, responsable_idresponsable, contacto_idcontacto, registro, aceptacion, visita, consultas, respuestas, oferta, decision)
VALUES
    ('','$idproyecto','$idresponsable', '$idcontacto', '$registro', '$aceptacion', '$visita', '$consultas', '$respuestas', '$oferta', '$decision')";

// Ejecutando el SQL 2
$optionready2 = mysqli_query($conexion,$option2);
mysqli_commit($conexion);
mysqli_free_result($optionready2);



mysqli_close($conexion);
header("location:http://localhost:8080/FTMetrics/CSI-clients/add_proyect.php");

?>