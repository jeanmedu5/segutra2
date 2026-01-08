<?php
$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];

include_once "administradorFunciones.php";
  
$logueadoConExito = login($correo, $palabra_secreta);
if ($logueadoConExito==true) {
    session_start();
    $_SESSION['correo'] = $correo;
	$cuenAdmin = "adminjamd";
    $_SESSION['cuentaAdmin'] = $cuenAdmin;
    header("Location: registro.php");
    exit;
} else {
   echo "Usuario o contraseña incorrecta";
  }
?>
