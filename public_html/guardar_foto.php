<?php
session_start();
$corre = $_SESSION['correo'];

if (count($_FILES) <= 0 || empty($_FILES["video"])) {
    exit("No hay archivos");
}

date_default_timezone_set('America/Bogota');
$time = time();
$fecha = date("Y-m-d (H:i:s)",$time);
$fechas = date("Ymd ",$time);


# De dónde viene el vídeo y en dónde lo ponemos
$rutaVideoSubido = $_FILES["video"]["tmp_name"];
$nuevoNombre = "$fecha"."$corre".".webm";

$dire=$fechas;
$micarpeta = 'imag'+$dire; 
//si no existe carpeta de fecha-crearla
if (!file_exists($micarpeta)) { 
mkdir($micarpeta, 0777, true); 
}
$estru='$micarpeta.'/'.$corre';
$estructura= 'imag'+$estru; 
//si no existe carpeta de usuario dentro de carpeta fecha-crearla
if (!file_exists($estructura)) { 
	mkdir($micarpeta.'/'.$corre, 0755, true); 
}


$rutaDeGuardado =__DIR__."/".$nuevoNombre;
// Mover el archivo subido a la ruta de guardado
move_uploaded_file($_FILES["video"]["tmp_name"], $rutaDeGuardado);
rename("$nuevoNombre", "$micarpeta/$corre/$nuevoNombre");

// Imprimir el nombre para que la petición lo lea
echo $nuevoNombre;
