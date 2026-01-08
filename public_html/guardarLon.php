<?php
session_start();
if (empty($_SESSION['correo'])) {
    header("Location: index.html");
    exit();
}

$corre = $_SESSION['correo'];
$long = $_POST['longi']; 
$longit = floatval($long);

include_once "base_de_datosss.php";
$con=obtenerBaseDeDatos2();

$estado = mysqli_query($con,"SELECT estado FROM usuarios WHERE correo=$corre");
$estad = mysqli_fetch_assoc($estado);
$esta = implode($estad); 
if($esta=='Libre'){
mysqli_query($con,"UPDATE usuarios SET lon='$longit' WHERE correo='$corre'");
echo $longit;
}
else{
	echo $longit;
}
?>