<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$consulta = "SELECT nombre, apellido FROM responsable";
$resultado = mysqli_query( $conexion, $consulta )
    or die ( "Algo ha ido mal en la consulta a la base de datos");

echo "<table borde='2'>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>apellido</th>";
echo "</tr>";
while ($columna = mysqli_fetch_array( $resultado ))
{
    echo "<tr>";
    echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['apellido'] . "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close( $conexion );
?>