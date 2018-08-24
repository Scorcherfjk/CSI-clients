<?php 

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$nombre = $_POST['name'];
$apellido = $_POST['lastname'];
$iniciales = substr($nombre,0,1).substr($apellido,0,1);
$email = $_POST['email'];
$telefono = $_POST['tel'];
$celular = $_POST['cel'];
$cliente = $_POST['cliente'];

$option = "INSERT INTO responsable (idresponsable,iniciales,nombre,apellido,email,telefono,celular) values ('','$iniciales','$nombre','$apellido','$email','$telefono','$celular')";

$optionready = mysqli_query($conexion,$option);
mysqli_commit($conexion);
mysqli_free_result($optionready);
mysqli_close($conexion);
header("location:http://localhost:8080/FTMetrics/CSI-clients/add_resp.html");

?>