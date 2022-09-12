<?php
require_once 'assets/conexion/servidor.php';

$tallerista_seleccionado = $_GET['tallerista'];
 $taller_seleccionado = $_GET["taller"];
 $calendario_seleccionado = $_GET['calendario'];
 $turno_seleccionado = $_GET['turno'];
$dia_seleccionado = $_GET['dia'];

//print_r($taller_seleccionado);

$conexion = mysqli_connect($host, $db_username, $db_password,$db_name );
$query =$conexion->prepare("SELECT * FROM usuarios_talleres WHERE Ingreso = '$calendario_seleccionado' AND NombreTaller = '$taller_seleccionado' AND Dia = '$dia_seleccionado' AND Turno = '$turno_seleccionado';");

$sql = "SELECT * FROM usuarios_talleres WHERE Ingreso = '$calendario_seleccionado' AND NombreTaller = '$taller_seleccionado' AND Dia = '$dia_seleccionado' AND Turno = '$turno_seleccionado';";

$result = mysqli_query($conexion,$sql);

//$query->execute();
//$resultado =$query->fetchAll();

//echo "<script> console.log('$taller_seleccionado') </script>";

?>
<!DOCTYPE html>
<html lang="en">
<head>

<header>
    <title>Talleres</title>
</header>

<div class="titulo_pagina"><h1 class="titulo">TALLERES</h1></div>
<link rel="stylesheet" href="assets/css/estilo_taller1.2.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    


<div class="fondo">

<h1 class="titulo_taller">Alumnos registrados</h1>
<div class="taller_informacion">
<p id="subtitulo"> TALLERISTA: <p><?php echo "$tallerista_seleccionado"?></p> </p>
<p id="subtitulo">  TALLER: <p><?php echo "$taller_seleccionado"?></p> </p>
<p id="subtitulo">  CALENDARIO: <p> <?php echo "$calendario_seleccionado"?></p></p>
<p id="subtitulo">  TURNO: <p> <?php echo "$turno_seleccionado "?></p></p>
<p id="subtitulo">  DIA: <p> <?php echo " $dia_seleccionado" ?></p></p>
</div>


<table>
    <thead>
<tr class="fila_principal">
    <td>Codigo</td>
    <td>Nombre Completo</td>
    <td>Carrera</td>
    <td>Calendario</td>
    <td>NombreTaller</td>
    <td>Dia</td>
    <td>Turno</td>
</tr>
</thead>
<?php  
while($fila = mysqli_fetch_array($result)){
//foreach($resultado as $taller):  
 $id = $fila['Codigo'];

echo '<tr class="filas_secundarias" id="color_gris" >';
    echo '<td>'.$fila['Codigo'].'</td>';
   echo '<td>'.$fila['Nombre'].'</td>';
   echo '<td>'.$fila['Carrera'].'</td>';
   echo '<td>'.$fila['Ingreso'].'</td>';
   echo '<td>'.$fila['NombreTaller'].'</td>';
   echo '<td>'.$fila['Turno'].'</td>';
  echo  '<td>'.$fila['Dia'].'</td>';
  echo  "<td><button class='boton_editar' data-toggle='modal' data-target='#exampleModal'>Editar</button></td>";
  echo  "<td><button class='boton_borrar'><a href = 'borrar_usuario.php?codigo=$id'>Eliminar</a></button></td>";
echo "</tr>";
}
?>


</table>

<!--Seccion del modal de la informacion de la persona-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre Completo:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Carrera:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <!--<div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>-->
          <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"  data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" id="editar" name="editar">Editar</button>
      </div>
        </form>
      </div>
     

    </div>
  </div>
</div>

<?php

if(isset($_POST['editar'])){

    sleep(2);
   
}

?>

</div>
<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>
<?php $conexion = null;?>