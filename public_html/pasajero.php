<?php

?>

<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SeguTra</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet"  href="assets/css/pasajero.css"   >
	  <link rel='manifest' href='/manifest.json'>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	  <style type="text/css">
      .menu2, .menu2 ul, .menu2 li, .menu2 a {
      text-align: center;
      margin: 0;
      padding: 0;
      border: none;
      outline: none;
      }

      .menu2 {
      text-align: center;
      height: 40px;
      width: 270px;
      background-color: #000000;
      border-radius: 7px;
      }

      .menu2 li {
      text-align: center;
      position: relative;
      list-style: none;
      float: center;
      display: block;
      height: 40px;
      }

      .menu2 a {
      text-align: center;
      display: block;
      padding: 0 16px;
      margin: 6px 0;
      line-height: 28px;
      text-decoration: none;
      font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
      font-weight: bold;
      font-size: 1.5em;
      color: #ffcb0b;
      border-left: 1px solid #393942;
      border-right: 1px solid #4f5058;
      transition: color .2s ease-in-out;
      }

      .menu2 li:firs-child a {border-left: none;}
      .menu2 li:last-child a {border-right: none;}
      .menu2 li:hover > a {color: #0C0}
      .menu2 ul {
      text-align: center;
      position: absolute;
      top: 40px;
      left: 0px;
      opacity: 0;
      background: #222;
      border-radius: 0 0 5px 5px;
      transition: opacity .20s ease .1s;
      }

      .menu2 li:hover > ul {opacity: 1;}
      .menu2 ul li {
      text-align: center;
      height: 0;
      overflow: hidden;
      padding: 0;
      transition: height .25s ease .1s;
      }

      .menu2 li:hover > ul li {
      height: 36px;
      overflow: visible;
      padding: 0;
      }

      .menu2 ul li a {
      text-align: center;
      width: 250px;
      padding: 4px 10px;
      margin: 0;
      border: none;
      border-bottom: 1px solid #353539;
      }
      .menu2 ul li:last-child a { border: none; }
    </style>

	  <script language="javascript">
	
    function clicSalir(){
	   window.history.back();
    }
	
    function clicSolicitar(){
      var output = document.getElementById("out"); 
      function success(position) { 
        var latitude = position.coords.latitude; 
        var longitude = position.coords.longitude; 
        document.getElementById('out').value =latitude;
        var latit = document.getElementById("out").value;
        document.getElementById('out2').value =longitude;
        var longit = document.getElementById("out2").value;
        var wh = document.getElementById("numWha").value;
        var pais = document.getElementById("pais").value;
     
        function aj(){
          $.ajax({
          type: "POST",
          url: "/solicitarConductor.php",
          data: {latit:latit,wh:wh,longit:longit,pais:pais},
          dataType:"json"
          })
	       .done(function(data){
            var dato = data;
            if(dato=="confirmado"){
	          window.location.href="conductorAsignado.php";     
	          } else {
              $.alert({
	             animation: 'zoom',
	             theme: 'dark',
               title: 'Buscando conductor mas cercano',
               content: '...espera unos segundos...',
              }); 
              }
          }) 
         .fail(function(){
          $.alert({
	         animation: 'zoom',
           title: 'Buscando conductor mas cercano',
           content: '...espera unos segundos...',
          }); 
         });
        }
        aj();
        setInterval(aj,15000);
        var output = document.getElementById("erro"); 
        output.innerHTML = " ";
      }; 
      function error() { 
        var output = document.getElementById("erro"); 
        output.innerHTML = "GPS desactivado o permiso denegado. En \"Preguntas Frecuentes\" en la seccion de contactanos se encuentra como solucionar";
      }; 

      navigator.geolocation.getCurrentPosition(success, error); 
    }
</script>
</head>

<body class=todapag>
<div class="nav">
  <input type="checkbox">
  <span></span>
  <span></span>
  <div class="menu">
      <li><a href="https://segutra.webnode.es/">Quienes somos</a></li>
      <li><a href="https://segutra.webnode.es/copia-de-politicas-y-condiciones/">Politicas y condiciones</a></li>
      <li><a href="https://segutra.webnode.es/contacto/">Contacto</a></li>
  </div>
</div>

<div>
  <div class="contenedor">
    <p style="font-size:0.8em;">"Por tu seguridad y la del conductor los vehiculos registrados en Segutra cuentan con vigilancia, al ingresar al vehiculo autorizas su uso"</p>
    <select id="pais" required> 
      <option value="0">Seleccionar pais...</option>
      <option value="Colombia">Colombia</option>
      <option value="Mexico">Mexico</option>
    </select>
    <input type="number" placeholder="Escribe tu whatsapp" name="numeroWha" id="numWha" required/>
    <a><input id="botonSol" class="btnSolicitar" type="button" value="Solicitar conductor" onclick="clicSolicitar()"></a> 
  </div>
<div id="erro"></div> 

<div class="contenedor2">
    <p style="font-size:0.8em;">Una vez se te asigne conductor te contactara por Whatsapp para que compartas tu ubicacion.</p>
    <a><input id="botonSal" class="btnSalir" type="button" value="Salir" onclick="clicSalir()"></a> 
</div>
<br>

<div>
  <button  class="boton" onclick="location.href= 'https://api.whatsapp.com/send?phone=573155298257&text=Hola'  "><video width="380" height="180" muted autoplay loop><source src="img/publicidadV.mp4" type="video/mp4"></video></button>
</div>
<input style="visibility:hidden" type="number" name="latit" id="out" disabled/>
<input style="visibility:hidden" type="number" name="longi" id="out2" disabled/>
</div>
<p>Desarrollado por Gemeba</p>
</body>
</html>