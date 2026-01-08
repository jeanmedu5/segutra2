<?php
session_start();

if (empty($_SESSION['correo'])) {
    header("Location: administrador.php");
     exit();}

if (empty($_SESSION['cuentaAdmin'])) {
    header("Location: administrador.php");
     exit();}

if ($_SESSION['cuentaAdmin']!= "adminjamd" ) {
    header("Location: administrador.php");
     exit();}

$corre = $_SESSION['correo'];
$correo = $_POST["correo"];
$fecha = $_POST["fecha"];

include_once "funciones.php";

$existe = usuarioExiste($correo);
if ($existe==false) {
    echo "Usuario no existe";
    exit;}

$base_de_datos = obtenerBaseDeDatos();
$sentencia = $base_de_datos->prepare("UPDATE usuarios SET fechaC= ? WHERE correo=?");
$sentencia->execute([$fecha,$correo]);
$sentencia = $base_de_datos->prepare("UPDATE usuarios SET registradoPor = ? WHERE correo=?");
$sentencia->execute([$corre, $correo]);
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
	var user = '<?php echo $correo; ?>';
	$.confirm({
	         theme: 'supervan',
             title: 'vigencia actualizada en cuenta '+user,
             content: ' ',
             buttons: {
	               Aceptar: function () {
	                   	window.history.back();
	            	},
            }
    });
	</script>
</head>
</html>
