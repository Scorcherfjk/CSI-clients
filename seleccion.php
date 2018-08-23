<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos
$hoy = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Seleccion para edicion</title>
</head>
<body>
<div class="container">

 
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
                <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_contact.html">Contacto</a>
                <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_proyect.php">Proyecto</a>
                <a class="dropdown-item" href="http://localhost:8080/FTMetrics/CSI-clients/add_resp.html">Responsable</a>
            </div>
        </li>
        </ul>
        <span class="nav-item" style="padding: 10px;"><?php echo "Fecha actual: ".$hoy; ?></span>
    </div>

</nav>

<?php

require("conexion.php"); // incluye la variable de la conexion a la base de datos

$consulta = "SELECT proyecto.idproyecto as idproyecto,
                fecha.registro as registro ,
                cliente.nombre as cliente ,
                responsable.nombre as rnombre ,
                responsable.apellido as rapellido ,
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
                proyecto.monto as monto ,
                concat(fecha.oferta - curdate(), ' dias restantes') as estado,
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


<?php
while ($columna = mysqli_fetch_array( $resultado ))
{

    $idproyecto = $columna['idproyecto'];
    $registro = $columna['registro'];
    $cliente = $columna['cliente'];
    $rnombre = $columna['rnombre'];
    $rapellido = $columna['rapellido'];
    $oportunidad = $columna['oportunidad'];
    $cnombre = $columna['cnombre'];
    $capellido = $columna['capellido'];
    $aceptacion = $columna['aceptacion'];
    $visita = $columna['visita'];
    $consultas = $columna['consultas'];
    $respuestas = $columna['respuestas'];
    $oferta = $columna['oferta'];
    $decision = $columna['decision'];
    $enviado = $columna['enviado'];
    $cotizacion = $columna['cotizacion'];
    $monto = $columna['monto'];
    $estado = $columna['estado'];
    $comentario = $columna['comentario'];
    ?>
    <div class="card">
        <div class="card-header h4">
            <a class="navbar-brand" disabled><?php echo $cliente." - ".$oportunidad ?></a>
            <a class="btn btn-primary text-light float-right" href="<?php echo "http://localhost:8080/FTMetrics/CSI-clients/tarjeta.php?var=".$idproyecto ?>">modificar</a>
        </div>
        <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Responsable</label>
                    <input type="text" class="form-control" name="rnombre" id="rnombre" value="<?php echo $rnombre ." ".$rapellido ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputPassword4">Contacto</label>
                    <input type="text" class="form-control" name="cnombre" id="cnombre" value="<?php echo $cnombre ." ".$capellido ?>" disabled>
                </div>
            </div>
            <table class="table table-responsive-sm table-bordered">
                <thead class="text-center thead-light">
                    <tr>
                            <th scope="col">Registro</th>
                            <th scope="col">Aceptacion</th>
                            <th scope="col">Visita</th>
                            <th scope="col">Consultas</th>
                            <th scope="col">Respuestas</th>
                            <th scope="col">Oferta</th>
                            <th scope="col">Decision</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr><?php
                    if($registro < $hoy && $registro != null ){echo "<td class='alert alert-danger'>".$registro."</td>";    }else{echo "<td>".$registro."</td>"; }
                    if($aceptacion < $hoy && $aceptacion != null ){echo "<td class='alert alert-danger'>".$aceptacion."</td>";  }else{echo "<td>".$aceptacion."</td>";}
                    if($visita < $hoy && $visita != null ){echo "<td class='alert alert-danger'>".$visita."</td>";      }else{echo "<td>".$visita."</td>";}
                    if($consultas < $hoy && $consultas != null ){echo "<td class='alert alert-danger'>".$consultas."</td>";   }else{echo "<td>".$consultas."</td>";}   
                    if($respuestas < $hoy && $respuestas != null ){echo "<td class='alert alert-danger'>".$respuestas."</td>";  }else{echo "<td>".$respuestas."</td>";}   
                    if($oferta < $hoy && $oferta != null ){echo "<td class='alert alert-danger'>".$oferta."</td>";      }else{echo "<td>".$oferta."</td>";}   
                    if($decision < $hoy && $decision != null ){echo "<td class='alert alert-danger'>".$decision."</td>";    }else{echo "<td>".$decision."</td>";}
                    ?></tr>
                </tbody>
            </table>
            <div class="form-row">
                <div class="form-group col-md">
                    <label for="inputEmail4">Enviado</label>
                    <input type="text" class="form-control" id="inputEmail4" value="<?php echo $enviado ?>" disabled>
                </div>
                <div class="form-group col-md">
                    <label for="inputPassword4">Cotización</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $cotizacion ?>" disabled>
                </div>
                <div class="form-group col-md">
                    <label for="inputPassword4">Monto</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $monto ?>" disabled>
                </div>
                <div class="form-group col-md">
                    <label for="inputPassword4">Estado</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $estado ?>" disabled>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4">Comentario</label>
                <input type="text" class="form-control" id="inputPassword4" value="<?php echo $comentario ?>" disabled>
            </div>
        </div>
    </div>
    <br>
    
    
    
    <?php
}

mysqli_close( $conexion );
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
</div>
</body>
</html>