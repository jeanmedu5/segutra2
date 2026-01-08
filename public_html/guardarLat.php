<?php
session_start(); 
if (empty($_SESSION['correo'])) {
    header("Location: index.html");
     exit();
}

$corre = $_SESSION['correo'];
$lati = $_POST['latit']; 
$latid = floatval($lati);

include_once "base_de_datosss.php";
$con=obtenerBaseDeDatos2();

$estado = mysqli_query($con,"SELECT estado FROM usuarios WHERE correo=$corre");
$estad = mysqli_fetch_assoc($estado);
$esta = implode($estad); 
	
$pasajero = mysqli_query($con,"SELECT whaP FROM usuarios WHERE correo=$corre");
$pasajer = mysqli_fetch_assoc($pasajero);
$pasaje = implode($pasajer); 
		
$pais = mysqli_query($con,"SELECT solici FROM usuarios WHERE correo=$corre");
$pai = mysqli_fetch_assoc($pais);
$pa = implode($pai); 

if($esta=='Libre'){
	mysqli_query($con,"UPDATE usuarios SET lat='$latid' WHERE correo='$corre'");
	if($pa=='Colombia'){
	$whatConca='57'.$pasaje;
	}
	if($pa=='Mexico'){
	$whatConca='52'.$pasaje;
	}
		
	if($pasaje=='no'){
	mysqli_query($con,"UPDATE usuarios SET whaP='no' WHERE correo='$corre'");
    echo $pasaje;
	}
	else{
	mysqli_query($con,"UPDATE usuarios SET whaP='no' WHERE correo='$corre'");
	echo $pasaje;
	}
}
else {
	mysqli_query($con,"UPDATE usuarios SET whaP='no' WHERE correo='$corre'");
 echo $pasaje;
}
		
?>