<?php
$correo = $_POST["correo"];
$nombre = $_POST["nombre"];
$placa = $_POST["placa"];
$pais = $_POST["pais"];
$ciudad = $_POST["ciudad"];
$palabra_secreta = $_POST["palabra_secreta"];
$palabra_secreta_confirmar = $_POST["palabra_secreta_confirmar"];
$wha = $_POST["wha"];
$box =  $_POST["box"];
date_default_timezone_set('America/Bogota');
$fechaV = strtotime(date("Y-m-d",time()));
	
if ($box == false) {
	$vacio= 'vacio';
	session_start();
    $_SESSION['dato'] = $vacio;
    echo "<script> window.location='errorRegistro1.php'; </script>";
    exit;
}

if ($palabra_secreta !== $palabra_secreta_confirmar) {
	$noCoinciden= 'noCoinciden';
	session_start();
    $_SESSION['dato'] = $noCoinciden;
    echo "<script> window.location='errorRegistro1.php'; </script>";
    exit;
}

include_once "funciones.php";

$existe = usuarioExiste($correo);
if ($existe) {
	$exist= 'existeUsuario';
	session_start();
    $_SESSION['dato'] = $exist;
    echo "<script> window.location='errorRegistro1.php'; </script>";
    exit; 
}

$registradoCorrectamente = registrarUsuario($correo, $nombre, $placa, $pais, $ciudad, $palabra_secreta, $wha, $fechaV);
if ($registradoCorrectamente==false) {
	$noReg= 'noRegistro';
	session_start();
    $_SESSION['dato'] = $noReg;
    echo "<script> window.location='errorRegistro1.php'; </script>";
    exit;
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SeguTra</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel='manifest' href='/manifest.json'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script language="javascript">
	$.confirm({
	         theme: 'supervan',
             title: 'Cedula Registrada',
             content: ' Te invitamos a enviar soporte de pago para finalizar',
             buttons: {
	               Aceptar: function () {
	                   	window.history.back();
	            	},
             }
     });
	</script>
</head>
</html>