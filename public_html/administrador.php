<?php

?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> ADMINISTRADOR SEGUTRA </title>
    <link rel="stylesheet"  href="assets/css/Index.css"   >
	<link rel='manifest' href='/manifest.json'>
</head>

<body class="todapag">
<div class="ini">
<h1> BIENVENIDO ADMINISTRADOR SEGUTRA </h1>
</div>

<form method="post" action="administradorLogin.php" name="signin-form">  
    <div class="form-element">
        <label>Usuario</label>
        <br>
        <input class="input1" type="text" name="correo" placeholder="Escribe tu cuenta" required />
        <br><br> 
        <label>Contraseña</label>
        <br>
        <input class="input1" name="palabra_secreta" type="password" placeholder="Contraseña" pattern="[A-Za-z0-9]{4,25}">
        <br><br> 
    </div>
    <div class="botonent1">
        <button type="submit" class="btnent" value="login">ENTRAR</button>
    </div>
</form>
</body>
</html>