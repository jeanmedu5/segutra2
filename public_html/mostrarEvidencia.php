<?php
$corre = $_POST["correo"];
$fecha = $_POST["fecha"];
$hora = $_POST["hora"];

$fechap = str_replace("-", "", $fecha);

if (!file_exists($fechap)) { 
  echo '<script language="javascript">alert("No hay registros en esa fecha");</script>';
  echo "<script>window.history.back();</script>"; 
  exit();
}

$estru="$fechap/$corre";
if (!file_exists($estru)) { 
	echo '<script language="javascript">alert("No hay registros  de su cedula ese dia");</script>';
    echo "<script>window.history.back();</script>"; 
	exit();
}
?>

<html>
<head> 
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 	<title>Evidencias</title> 
	<link rel="stylesheet"  href="assets/css/mostrarEvidencia.css"   >
	<link rel='manifest' href='/manifest.json'>
</head> 

<body class="todapag">
	<?php 
	$directory="$estru"; 
	$dirint = dir($directory); 
	echo '<h1> Evidencias </h1>';
	$list2=array();
  	while (($archivo = $dirint->read()) !== false) {
	if (preg_match("/webm$/", $archivo)){
		$list2[]=$archivo;
	}
	}

	sort($list2);
	$mensaje=null;
	$iden = 0;
	for($cont2=0;$cont2<count($list2);$cont2++){
			$horaExtraida = substr("$list2[$cont2]", 12, 14);
			$horaExtraidaNum = intval($horaExtraida);
			
			if($iden == 0){	
	         	$mensaje = "<h3>No se encontraron evidencias en la hora seleccionada</h3>";
	         }        
			
			if($horaExtraidaNum == $hora){	
				$iden++;
				$mensaje=null;
	      		$str = substr("$list2[$cont2]", 0, 21); 
             	echo '<a href="'.$directory."/".$archivo."/".$list2[$cont2].'">'.$str.'</a>'."\n"." -            -"; 
	         }	
	}

	if($iden !=0 ){
		echo "<p style='position:fixed; bottom: 0px; margin:1px; border: 1px solid; border-color:#ffcb0b; color:#ffcb0b;  background-color: black;'>Se encontraron $iden evidencias</p>";
	}
	echo $mensaje;
	$dirint->close();
 ?> 
</body> 
</html>
