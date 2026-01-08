<?php
$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];
$placa = $_POST["placa"];

include_once "funciones.php";

$logueadoConExito = login($correo, $palabra_secreta);
if ($logueadoConExito==true) {
	cambiarPlaca($correo, $placa);
	header("location:actualizarPlaca2.php");
    exit();
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
             title: 'Cedula o contraseña incorrecta',
             content: ' ',
             buttons:{
	               		Aceptar: function () {
	                   	window.history.back();
	            		},
					}
			});
	</script>
	</head>
	</html>