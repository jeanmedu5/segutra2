<?php
session_start();
if (empty($_SESSION['correo'])) {
    header("Location: index.html");
    exit();
}

include_once "base_de_datosss.php";
$corre = $_SESSION['correo'];
$whatpp = $_POST['mens']; 
$con=obtenerBaseDeDatos2();
$paisCon = mysqli_query($con,"SELECT pais FROM usuarios WHERE correo='$corre'");
$paisC = mysqli_fetch_assoc($paisCon);
$pais = implode($paisC); 

if($pais=='Colombia'){
	date_default_timezone_set('America/Bogota');
	$time = time();
    $fechaHoraPhp = date("Y-m-d (H:i:s)",$time);
	}
if($pais=='Mexico'){
	date_default_timezone_set('America/Mexico_City');
	$time = time();
    $fechaHoraPhp = date("Y-m-d (H:i:s)",$time);
	}
	
 $base_de_datos = obtenerBaseDeDatos();
 $sentencia = $base_de_datos->prepare("INSERT INTO registros(fecha, whatsappP, conductor, pais) values(?, ?, ?, ?)");
 $sentencia->execute([$fechaHoraPhp, $whatpp, $corre, $pais]);

mysqli_query($con,"UPDATE usuarios SET aceptado='$whatpp' WHERE correo='$corre'");
echo $whatpp;
?>