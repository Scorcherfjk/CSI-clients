<?php 

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$nombre = $_POST['name'];

$option = "INSERT INTO table ( n columns) values('n values')";
$optionready = mysqli_query($conexion,$option);
mysqli_commit($conexion);
mysqli_free_result($optionready);
mysqli_close($conexion);
header("location:http://localhost:8080/FTMetrics/CSI-clients/add_proyect.php");

?>