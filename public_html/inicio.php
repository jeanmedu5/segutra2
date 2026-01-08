<?php
session_start();

if (empty($_SESSION['correo'])) {
    header("Location: index.html");
     exit();
}

include_once "base_de_datosss.php";
$corre = $_SESSION['correo'];
$con=obtenerBaseDeDatos2();

$tokens = mysqli_query($con,"SELECT token FROM usuarios WHERE correo='$corre'");
$toke = mysqli_fetch_assoc($tokens);
$ok = implode($toke);  

$placaBD = mysqli_query($con,"SELECT placa FROM usuarios WHERE correo='$corre'");
$placaB = mysqli_fetch_assoc($placaBD);
$placaa = implode($placaB);  
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SeguTra</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet"  href="assets/css/inicio.css"   >
	  <link rel='manifest' href='/manifest.json'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="assets/js/push.min.js"></script>
	  <script language="javascript">
      Push.Permission.request();
	   
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

      function clicSalir(){
	     $.ajax({
        url: "/salirInicio.php",
        });
        window.location.href="index.html";
      }

      function carga(){
      <?php
        $con=obtenerBaseDeDatos2();
        $esta = mysqli_query($con,"SELECT estado FROM usuarios WHERE correo='$corre'");
        $est = mysqli_fetch_assoc($esta);
        $es = implode($est); 
        $_SESSION['esta'] = $es;
      ?>
      document.getElementById('mostrarEstado').value ='<?php echo $es; ?>';        
      var est = '<?php echo $es; ?>';
      $('#mostrarEstado').css('color', 'black');
      if(est=='Libre'){
        $('#mostrarEstado').css('background-color', 'green');
      }else{
	     $('#mostrarEstado').css('background-color', 'red');
	     }   
      }

      function obtenerPosicion(){
      var output = document.getElementById("out");

        function success(position) { 
        var latitude = position.coords.latitude; 
        var longitude = position.coords.longitude; 
        document.getElementById('out').value =latitude;
        var latit = document.getElementById("out").value;
          $.ajax({
            data: {latit:latit},
            url: "/guardarLat.php",
            type: "POST",
          })
          .done(function(data){
            var mensW = data;
            if(mensW=="no"){
            console.log("no hay pasajeros");
            } else {
	            Push.Permission.request();
              Push.create('Un pasajero necesita conductor!', {
              body: 'Acepta en Segutra.',
              timeout: 5000,               
              vibrate: [200, 100, 200, 100, 200, 100, 200],    
              onClick: function() {
                this.close();
              }  
              });
              var aud=document.getElementById("audio");
              aud.play();
              var plac='<?php echo $placaa; ?>';
              var mensaje = "Hola, Soy tu conductor mas cercano con placa "+plac+", Enviame tu ubicacion para recogerte";
              var opcion = $.confirm({
	                         theme: 'supervan',
                           title: 'Un pasajero necesita conductor',
                           content: ' ',
                           buttons: {
	                         confirmar: function () {
	                   	       $.ajax({
		                         data: {mens:mensW},
                             url: "/pasajeroAceptado.php",
                             type: "POST",
                             });
	                           function actualizar(){
	                             location.reload();
                  	         }
                             var miurl="https://api.whatsapp.com/send?phone="+mensW+"&text="+mensaje;
                             window.open(miurl);
                             setTimeout(actualizar,10000);
	            	            },
	            	           cancelar: function () {            
                            location.reload();
                           }
                           }
                          });
              }
          }) 
          .fail(function(){
            alert("Algo fallo");
          });

        document.getElementById("out2").value =longitude;
        var longi = document.getElementById("out2").value;
          $.ajax({
          data: {longi:longi},
          url: "/guardarLon.php",
          type: "POST",
          });
        var output = document.getElementById("erro"); 
        output.innerHTML = " ";
        }; 

        function error() { 
          var output = document.getElementById("erro"); 
          output.innerHTML = "GPS desactivado o permiso denegado. En \"Preguntas Frecuentes\" en la seccion de contactanos se encuentra como solucionar";
          var latit = 0.0;
            $.ajax({
            data: {latit:latit},
            url: "/guardarLat.php",
            type: "POST",
            });
          var longi = 0.0;
            $.ajax({
            data: {longi:longi},
            url: "/guardarLon.php",
            type: "POST",
            }); 
      }; 

      navigator.geolocation.getCurrentPosition(success, error);       
      }
      obtenerPosicion();
      setInterval(obtenerPosicion,7000);
</script>
</head>

<body class=todapag onload="carga()">
<audio id="audio" style="display:none" controls><source type="audio/mp3" src="img/alarm-clock"></audio>
    <div>
        <a href="vigitax.php"> <input id="botonini" class="btniniciar" type="button" value="iniciar vigilancia"></a>
        <a > <input id="botonini" class="btniniciar" type="button" value="Salir" onclick="clicSalir()"></a>
    </div>

    <form class="contenedor" method="post" action="cambioEstado.php" name="signin-form">
        <div>
          <input class="inEstado" name="estadoActual" id="mostrarEstado" disabled/>
          <button name="" id="botonEstado" class="btnEstado" type="submit"> Cambiar Estado</button>   
        </div>
    </form>

    <p> En estado "Libre" <b>No minimices pantalla</b> para recibir solicitudes de transporte.</p>
    <div id="erro"></div>
    <div>
      <button  class="boton" onclick="location.href= 'https://api.whatsapp.com/send?phone=573155298257&text=Hola'  "><video width="350" height="250" muted autoplay loop><source src="img/publicidadInicio.mp4" type="video/mp4"></video></button>
  </div>
  <li style="font-size:0.8em; text-align:left; margin-top:3px;">Recuerda cada mes solicitar tu PIN de seguridad social al whatsapp de Segutra (Aplica en Colombia)
  <li style="font-size:0.8em; text-align:left;">Coloca en tu vehículo uno de los anexos ubicados en politicas y condiciones
  <input style="visibility:hidden" id="out" disabled/>
  <input style="visibility:hidden" id="out2" disabled/> 
</body>
</html>

