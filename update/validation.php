<?php

$i = 0;
$index = 'http://localhost:8080/FTMetrics/CSI-clients/';
$login = 'http://localhost:8080/FTMetrics/CSI-clients/seleccion.php';

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$usuariop = $_POST['usuario'];
$clavep = $_POST['clave'];

$consulta = "SELECT usuario, clave FROM usuarios";
$resultado = mysqli_query( $conexion, $consulta )
    or die ( "Algo ha ido mal en la consulta a la base de datos");
while ($columna = mysqli_fetch_array( $resultado ))
{   
    $ff [] = $columna;
}

foreach ($ff as $f) {
    $usuariob = $f['usuario'];
    $claveb = $f['clave'];
    if( $usuariop == $usuariob && $clavep == $claveb){
        $i = 1;
        session_start();
        $_SESSION['usuario']=$usuariop;
    }
}

if($i == 1){
    header('location:'.$index);
}else{
    header('location:'.$login);
}
?>

