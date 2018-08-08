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

<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$consulta = "SELECT nombre, apellido, email FROM contacto";
$resultado = mysqli_query( $conexion, $consulta )
    or die ( "Algo ha ido mal en la consulta a la base de datos");
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

<?php
while ($columna = mysqli_fetch_array( $resultado ))
{
    echo "<tr>";
    echo "<td>" . $columna['nombre'] . "</td><td>" . $columna['apellido'] . "</td><td>" . $columna['email'] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

mysqli_close( $conexion );
?>

</body>
</html>