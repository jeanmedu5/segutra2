<?php

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title></title>
    <script src="assets/js/envio.js"></script>
    <link rel="stylesheet"  href="assets/css/enviarPago.css"   >
	  <link rel='manifest' href='/manifest.json'>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>

<body class=todapag>
  <h1> Enviar datos y comprobante</h1>
  <p> <b>Si te habias registrado antes pasa a enviar el comprobante de pago <a href="#correo2"> AQUI. </a></b> si es tu primera vez en registrarte diligencia los siguientes datos.</p>

  <form action="registrar.php" method="post" class="contenedor">
      <input id="correo" name="correo" type="number" placeholder="Numero de cedula"pattern="[0-9]"required/>
      <br>
      <input id ="nombre" name="nombre" type="text" placeholder="Nombre completo"pattern="[A-Za-z\s]{4,40}" required />
      <br>
      <input id ="placa" name="placa" type="text" placeholder="Placa del vehículo"pattern="[A-Za-z0-9\s]{4,10}" required />
      <br><br>
      <select id="pais" name="pais" required>
        <option value="0">Seleccionar pais...</option>
        <option value="Colombia">Colombia</option>
        <option value="Mexico">Mexico</option>
      </select>
      <input id ="ciudad" name="ciudad" type="text" placeholder="Ciudad"pattern="[A-Za-z\s]{4,30}" required />
      <br>
      <input id ="palabra_secreta" name="palabra_secreta" type="text" placeholder="Contraseña nueva"pattern="[A-Za-z0-9]{4,25}" required />
      <br>
      <input id="palabra_secreta_confirmar" name="palabra_secreta_confirmar" type="text" placeholder="Confirma tu contraseña" pattern="[A-Za-z0-9]{4,25}" required/>
      <br>
      <input name="wha" type="number" placeholder="Whatsapp" pattern="[0-9]" required />
      <br>
      <label><input type="checkbox" id="condiciones" name="box" required> Acepto politicas y condiciones de Segutra</label>
      <br>
      <input type="submit" class="btnopci" value="Registrar" />
  </form>

<p> Para activar tu cuenta registrada envianos el comprobante de pago.</p>
<div class="contenedor2">
      <input id="correo2" name="correo2" type="number" placeholder="Numero de cedula"pattern="[0-9]"required/>
      <br>
      <input style="font-size:1.2em;" type="submit" class="btnopci" value="Enviar comprobante" onclick="envio2()"/>
      <br>
</div>
<br>
<br></br>
<p>Desarrollado por Gemeba</p>
</body>
</html>