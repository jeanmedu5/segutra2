<?php
$correo = $_POST["correo"];
$palabra_secreta = $_POST["palabra_secreta"];

include_once "funciones.php";
$num = 0;
$numToken = numerorandom($num);
$logueadoConExito = login($correo, $palabra_secreta);
if ($logueadoConExito==true) {
    session_start();
    $_SESSION['numToken'] = $numToken;
    $_SESSION['correo'] = $correo;

    $con=obtenerBaseDeDatos();
    $con2=obtenerBaseDeDatos2();

    $fechaV = mysqli_query($con2,"SELECT fechaC FROM usuarios WHERE correo='$correo'");
    $fechaVig= mysqli_fetch_assoc($fechaV);
    $fechaVigente = implode($fechaVig); 
    $fechaVi=strtotime($fechaVigente);
    date_default_timezone_set('America/Bogota');
    $fechaActual = strtotime(date("Y-m-d",time()));

    if($fechaActual <= $fechaVi){
      $tokenT = $con->prepare("UPDATE usuarios SET token='$numToken' WHERE correo='$correo'");
	    $tokenT->execute();
	    $pais = mysqli_query($con2,"SELECT pais FROM usuarios WHERE correo='$correo'");
      $pai = mysqli_fetch_assoc($pais);
      $paiss = implode($pai);  
      $_SESSION['pais'] = $paiss;

      $sentencia = $con->prepare("UPDATE usuarios SET estado='Libre' WHERE correo='$correo'");
	    $sentencia->execute();
	    $sentencia2 = $con->prepare("UPDATE usuarios SET aceptado='0' WHERE correo='$correo'");
	    $sentencia2->execute();
	    $sentencia3 = $con->prepare("UPDATE usuarios SET whaP='no' WHERE correo='$correo'");
	    $sentencia3->execute();
   
      echo "<script> window.location='inicio.php'; </script>";
      exit;
    } 
    else {
      echo "<script> window.location='sinVigencia.php'; </script>";
      exit;
    }
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
         title: 'Cedula o contraseña no coinciden',
         content: ' Intentalo de nuevo',
         buttons: {
	           Aceptar: function () {
	           window.history.back();
	           },
         }
        });
	   </script>
</head>
</html>

	

