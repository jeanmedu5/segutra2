<?php
$numWhat = $_POST['wh']; 
$lati = $_POST['latit']; 
$long = $_POST['longit'];
$pais = $_POST['pais'];

include_once "base_de_datosss.php";
$con=obtenerBaseDeDatos2();
  
$numWha=strval($numWhat);
   if($pais=='Colombia'){
	$numWhatCom="57".$numWha;
	}
	if($pais=='Mexico'){
	$numWhatCom="52".$numWha;
	}

$acep = mysqli_query($con,"SELECT aceptado FROM usuarios WHERE aceptado='$numWhatCom'");
$ace = mysqli_fetch_assoc($acep);
$ac = implode($ace); 
if($ac==$numWhatCom){
	$acepta="confirmado";
	mysqli_query($con,"UPDATE usuarios SET aceptado='0' WHERE aceptado='$numWhatCom'");
  	echo json_encode($acepta);
} 
else{
	$cercano=mysqli_query($con, "SELECT id, (((acos(sin((".$lati."*pi()/180)) * sin((lat*pi()/180)) + cos((".$lati."*pi()/180)) * cos((lat*pi()/180)) * cos(((".$long."- lon) * pi()/180)))) * 180/pi()) * 60 * 1.1515 * 1.609344) as distance FROM usuarios WHERE estado='Libre' HAVING distance <= 3 ORDER BY distance ASC LIMIT 1" );

	$cercan = mysqli_fetch_row($cercano);
	$cerca = $cercan[0];
	mysqli_query($con,"UPDATE usuarios SET latP='$lati' WHERE id='$cerca'");
    mysqli_query($con,"UPDATE usuarios SET lonP='$long' WHERE id='$cerca'");
	mysqli_query($con,"UPDATE usuarios SET solici='$pais' WHERE id='$cerca'");
	mysqli_query($con,"UPDATE usuarios SET estado='Ocupado' WHERE id='$cerca'");
	mysqli_query($con,"UPDATE usuarios SET whaP='$numWhatCom' WHERE id='$cerca'");
  	echo json_encode($cerca);
}
?>