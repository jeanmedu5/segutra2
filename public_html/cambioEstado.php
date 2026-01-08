<?php
session_start();
if (empty($_SESSION['correo'])) {
    header("Location: index.html");
     exit();
	}

$corre = $_SESSION['correo'];
$nuevoEstado = $_SESSION['esta'];
include_once "base_de_datosss.php";
$con=obtenerBaseDeDatos();

if($nuevoEstado == "Libre"){
	$sentencia = $con->prepare("UPDATE usuarios SET estado='Ocupado' WHERE correo='$corre'");
	$sentencia->execute();	
	header('Location:'.getenv('HTTP_REFERER'));
	}
else{
	$sentencia = $con->prepare("UPDATE usuarios SET estado='Libre' WHERE correo='$corre'");
	$sentencia->execute();
	$sentencia2 = $con->prepare("UPDATE usuarios SET aceptado='0' WHERE correo='$corre'");
	$sentencia2->execute();
	$sentencia3 = $con->prepare("UPDATE usuarios SET whaP='no' WHERE correo='$corre'");
	$sentencia3->execute();
	header('Location:'.getenv('HTTP_REFERER'));
	}
?>