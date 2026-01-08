<?php

?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> SeguTra </title>
    <script languaje="JavaScript">     
    </script>
	<link rel="stylesheet"  href="assets/css/evidencias.css"   >
	<link rel='manifest' href='/manifest.json'>
</head>

<body class="todapag">
<div class="ini">
    <h1> Ver evidencias </h1>
    <p> <strong>Recuerda</strong> que se guardan las evidencias de hasta dos días antes, las mas antiguas se eliminan automáticamente</p>
</div class="cuadroini">

<form class="form1" method="post" action="mostrarEvidencia.php" name="signin-form">
    <div class="form-element">
        <input class="cedu" type="number" name="correo" placeholder="Escribe tu cedula" pattern="[0-9]" required />
        <br><br> 
        <label>Fecha</label> 
        <br>
        <input class="fech" name="fecha" type="date" required/>
        <br><br>
        <select name="hora" id="hora" required>
            <option value="">Seleccionar Hora...</option>
            <option value="0">00 am</option><option value="1">01 am</option><option value="2">02 am</option>
            <option value="3">03 am</option><option value="4">04 am</option><option value="5">05 am</option>
            <option value="6">06 am</option><option value="7">07 am</option><option value="8">08 am</option>
            <option value="9">09 am</option><option value="10">10 am</option><option value="11">11 am</option>
            <option value="12">12 pm</option><option value="13">01 pm</option><option value="14">02 pm</option>
            <option value="15">03 pm</option><option value="16">04 pm</option><option value="17">05 pm</option>
            <option value="18">06 pm</option><option value="19">07 pm</option><option value="20">08 pm</option>
            <option value="21">09 pm</option><option value="22">10 pm</option><option value="23">11 pm</option>
        </select>
        <p style="font-size: 0.6em;"> Si eres de mexico recuerda colocar una hora despues de la evidencia a obtener. Esto debido a que las evidencias se guardan con hora del servidor</p>
    </div>
    <div class="botonent1">
        <button type="submit" class="btnent" value="login">Ver</button>
    </div>
</form>
</div>
<p class="pie">Desarrollado por Gemeba</p>
</body>
</html>