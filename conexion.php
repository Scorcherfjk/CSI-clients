<?php

$conexion = mysqli_connect("127.0.0.1", "root", "")
    or die ("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db( $conexion, "controlsi" )
    or die ( "No se ha podido conectar a la base de datos" );

?>