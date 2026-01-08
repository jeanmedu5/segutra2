<?php
include_once "base_de_datosss.php";

function usuarioExiste($correo){
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->rowCount() > 0;
}

function obtenerUsuarioPorCorreo($correo){
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("SELECT correo, palabra_secreta FROM usuarios WHERE correo = ? LIMIT 1;");
    $sentencia->execute([$correo]);
    return $sentencia->fetchObject();
}

function nuevaContra ($correo, $palabraSecreta){
	$palabraSecreta = hashearPalabraSecreta($palabraSecreta);
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("UPDATE usuarios SET palabra_secreta= ? WHERE correo=?");
    return $sentencia->execute([$palabraSecreta,$correo]);
}

function cambiarPlaca ($correo, $placa){
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("UPDATE usuarios SET placa= ? WHERE correo=?");
    return $sentencia->execute([$placa,$correo]);
}


function registrarUsuario($correo, $nombre, $placa, $pais, $ciudad, $palabraSecreta, $wha, $fechaV){
    $palabraSecreta = hashearPalabraSecreta($palabraSecreta);
    $base_de_datos = obtenerBaseDeDatos();
    $sentencia = $base_de_datos->prepare("INSERT INTO usuarios(correo, nombre, placa, pais, ciudad, palabra_secreta, wha, fechaC) values(?, ?, ?, ?, ?, ?, ?, ?)");
    return $sentencia->execute([$correo, $nombre, $placa, $pais, $ciudad, $palabraSecreta, $wha, $fechaV]);
}

function login($correo, $palabraSecreta){
    $posibleUsuarioRegistrado = obtenerUsuarioPorCorreo($correo);
    if ($posibleUsuarioRegistrado === false) {
        return false;
    }
    $palabraSecretaDeBaseDeDatos = $posibleUsuarioRegistrado->palabra_secreta;
    $coinciden = coincidenPalabrasSecretas($palabraSecreta, $palabraSecretaDeBaseDeDatos);
    if (!$coinciden) {
        return false;
    }
    return true;
}

function numerorandom($numToken){
$numToken = rand(10, 10000);
return $numToken;
}


function coincidenPalabrasSecretas($palabraSecreta, $palabraSecretaDeBaseDeDatos){
    return password_verify($palabraSecreta, $palabraSecretaDeBaseDeDatos);
}

function hashearPalabraSecreta($palabraSecreta){
    return password_hash($palabraSecreta, PASSWORD_BCRYPT);
}