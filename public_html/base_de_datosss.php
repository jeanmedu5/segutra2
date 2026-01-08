<?php
function obtenerBaseDeDatos()
{
   
    $nombre_base_de_datos = "u762367730_segutra";
    $usuario = "u762367730_segutrajamd";
    $contraseña = "1121883262Ja";
    try {

        $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
        $base_de_datos->query("set names utf8;");
        $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $base_de_datos;
    } catch (Exception $e) {
        
        echo "Error obteniendo BD: " . $e->getMessage();
        return null;
    }
}
function obtenerBaseDeDatos2(){
$con=mysqli_connect("localhost","u762367730_segutrajamd","1121883262Ja","u762367730_segutra");
return $con;
}