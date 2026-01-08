<?php
session_start();

if (empty($_SESSION['correo'])) {
    header("Location: index.html");
     exit();}

$corre = $_SESSION['correo'];
$pais = $_SESSION['pais'];
include_once "base_de_datosss.php";
$con=obtenerBaseDeDatos2();

$tokens = mysqli_query($con,"SELECT token FROM usuarios WHERE correo='$corre'");
$toke = mysqli_fetch_assoc($tokens);
$ok = implode($toke);  

$time = time();
$fechaHoraPhp = date("Y-m-d (H:i:s)",$time);
mysqli_query($con,"UPDATE usuarios SET estado='Ocupado' WHERE correo='$corre'");
?>

<!DOCTYPE html>
<html lang="es">
 
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SeguTra</title>
	<link rel="stylesheet"  href="assets/css/vigitax.css"   >
	<link rel='manifest' href='/manifest.json'>
  <script language="javascript">
  if(<?php echo $_SESSION['numToken']; ?>!=<?php echo $ok; ?>){
	$.confirm({
	         theme: 'supervan',
           title: 'cuenta usada por otra persona!!! cambia tu contraseña',
           content: ' ',
           buttons: {
	               Aceptar: function () {
	               window.location='index.html';
	            	},
           }
   });
	}

  function clicDetener(){window.history.back();}
</script>
<script type="text/javascript">
	 function showModal() { document.getElementById('openModal').style.display = 'block'; } function CloseModal() { document.getElementById('openModal').style.display = 'none'; }
</script>
<script type="text/javascript">
  function mueveReloj(){
	var paisP = '<?php echo $pais; ?>'
	
	if (paisP == 'Colombia') {
    var momentoActual = new Date()
    dia = momentoActual.getDate()
    año = momentoActual.getFullYear()
    mes = momentoActual.getMonth() + 1
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
  if (hora < 10 ){
      hora = "0" + hora}
    if (minuto < 10 ){
      minuto = "0" + minuto}
    if (segundo < 10 ){
      segundo = "0" + segundo}
    if (dia < 10 ){
      dia = "0" + dia}
    if (mes < 10 ){
      mes = "0" + mes}

    horaImprimible = "Hora servidor: "+ año + "-" + mes + "-" + dia + " " + hora + ":" + minuto + ":" + segundo
    document.getElementById('fechaout').value = horaImprimible
    timeout = setTimeout("mueveReloj()",1000)
  }

  if(paisP == 'Mexico'){
    var momentoActual = new Date()
    dia = momentoActual.getDate()
    año = momentoActual.getFullYear()
    mes = momentoActual.getMonth() + 1
    hora = momentoActual.getHours() + 1
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
  if (hora < 10 ){
      hora = "0" + hora}
    if (minuto < 10 ){
      minuto = "0" + minuto}
    if (segundo < 10 ){
      segundo = "0" + segundo}
    if (dia < 10 ){
      dia = "0" + dia}
    if (mes < 10 ){
      mes = "0" + mes}

    horaImprimible = "Hora servidor: "+ año + "-" + mes + "-" + dia + " " + hora + ":" + minuto + ":" + segundo
    document.getElementById('fechaout').value = horaImprimible
    timeout = setTimeout("mueveReloj()",1000)
  }
  }
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
 
<body class="todapag" onload="mueveReloj()">
<div class="ini">
<h1> SeguTra </h1></div>
<p > Seguridad en tu transporte </p>
<div class="caja">
	<h3>No cerrar esta ventana, ni ocultar para una vigilancia exitosa</h3>
</div>

<div style="background-color: #ffcb0b; width:370px; height:415px; text-align: center; box-shadow:2px 2px 10px; margin-left:auto; margin-right:auto;">
		<button style="display:none" name="listaDeDispositivos" id="listaDeDispositivos"></button>
		<a > <input id="botondet" class="btnDetener" type="button" value="Detener Vigilancia" onclick="clicDetener()"></a>
	  <div>
	  <p  id="duracion" style="display:none;"></p>
	<p id="estado"></p>
        <select style="display:none;" name="dispositivosDeAudio" id="dispositivosDeAudio"></select>
        <select style="display:none;" name="dispositivosDeVideo" id="dispositivosDeVideo"></select>
        <video width="80%" height="200" muted="muted" id="video"></video>
        <button style="display:none;" id="btnComenzarGrabacion">Comenzar</button>
        <button id="btnDetenerGrabacion" style="display:none;">Detener</button>
    </div>
	  <br>
    <input style="text-align: center; width: 320px; background-color: black; color:#ffcb0b; box-shadow:2px 2px 10px;" disabled id="fechaout" />
    
 </div>
 <br><br>
	
 <div class="container"> 
 <div class="botonN">
    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogo1">Navegacion GPS</button>
 </div>
  <div class="modal fade" id="dialogo1">
  <div class="modal-dialog">
  <div class="modal-content">
    
          <!-- cabecera -->
          <div class="modal-header">
            <h4 class="modal-title">Importante!!! ... Tener en cuenta</h4>
            <button type="button" class="close" data-dismiss="modal" onclick="location.href='https://www.google.com/maps/dir/?api=1&zoom=17&hl=es_419'">X</button>
          </div>
    
          <!-- cuerpo  -->
          <div class="modal-body">
           <p> Al iniciar tu ruta en google Maps. Oprime el botón inicio de tu celular</p>
           <img class="imag" src="img/nav1.jpg" width="200" height="200"/>
           <p> al minimizar el mapa dirigete a la app de Segutra, tu pantalla debe quedar asi: </p>
           <img class="imag" src="img/nav2.jpg" width="200" height="350"/>
           <p><strong> Se recomienda no ampliar mapa o cerrar la app de Segutra para una vigilancia exitosa</strong></p>
          </div>
    
          <!-- pie -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"onclick="location.href='https://www.google.com/maps/dir/?api=1&zoom=17&hl=es_419'">Cerrar</button>
          </div>
    
  </div>
  </div>
  </div> 
  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<script src="assets/js/script.js"></script>
</html>