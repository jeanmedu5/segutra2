<?php
session_start();
if (empty($_SESSION['correo'])) {
    header("Location: index.html");
     exit();
}

include_once "base_de_datosss.php";
$corre = $_SESSION['correo'];
$con=obtenerBaseDeDatos2();

mysqli_query($con,"UPDATE usuarios SET estado='Ocupado' WHERE correo='$corre'");	
mysqli_query($con,"UPDATE usuarios SET aceptado='0' WHERE correo='$corre'");
session_destroy();
?>