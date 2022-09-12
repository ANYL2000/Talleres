<?php

include 'assets/conexion/servidor.php';

$codigo = $_GET['codigo'];

mysqli_query($conexion, "DELETE FROM usuarios_talleres WHERE Codigo = $codigo");

echo "<script> window.history.back();</script>"


?>