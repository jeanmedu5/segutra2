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

$cedula = $_POST["cedula"]; 

include_once "base_de_datosss.php";
include_once "funciones.php";
$con=obtenerBaseDeDatos2();

$existe = usuarioExiste($cedula);
if ($existe==false) {
    echo "noExiste";
    exit; }

$whatCond = mysqli_query($con,"SELECT wha FROM usuarios WHERE correo='$cedula'");
$whatCon = mysqli_fetch_assoc($whatCond);
$whatC = implode($whatCon); 
echo $whatC;	
?>