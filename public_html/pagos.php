<?php

?>
<html>
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SeguTra</title>
    <link rel="stylesheet"  href="assets/css/comReg.css"   >
	<link rel='manifest' href='/manifest.json'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
	function mostrar(id) { 
	if (id == "todos") { 
	$("#todos").show();		
	$("#1primA").hide(); 
	$("#1primB").hide();
	}
	
	if (id == "1primA") { 
	$("#todos").hide();		
	$("#1primA").show(); 
	$("#1primB").hide();		
	}	
	
	if (id == "1primB") { 
	$("#todos").hide();		
	$("#1primA").hide(); 
	$("#1primB").show();		
	}	
	} 
	</script>
</head>

<body class=todapag>
<h1>  Planes de pago</h1>
<div class="contenedorP">
	<p> Elige el plan que mejor se ajuste a tu necesidad, una vez realizado el pago sigue con el punto 3. Enviar datos y comprobante </p>
</div>
<br>
<select id="status" name="status" onChange="mostrar(this.value);"> 
	<option selected value="todos">Selecciona tu pais</option>
 	<option value="1primA">Colombia</option>
 	<option value="1primB">Mexico</option> 
</select>
<br><br>

<div id= "todos" style="display: show;"> </div>

<div id= "1primA" style="display: none;">
<div class="caja">
	<button  class="boton" onclick="location.href='https://mpago.li/2tcAakV'"><img class="imag" src="img/precio1.png" /></button>
</div><br>
<div class="caja">
	<button  class="boton" onclick="location.href='https://mpago.li/2ve3QCt'"><img class="imag" src="img/precio2.png" /></button>
</div><br>
<div class="caja">
	<button  class="boton" onclick="location.href='https://mpago.li/1pTq2bz'"><img class="imag" src="img/precio3.png" /></button>
</div><br>
</div>

<div id= "1primB" style="display: none;">
<div class="caja">
	<button  class="boton" onclick="location.href='https://mpago.la/1NEY8bL'"><img class="imag" src="img/precio1mex.png" /></button>
</div><br>
<div class="caja">
	<button  class="boton" onclick="location.href='https://mpago.la/1cHsjBb'"><img class="imag" src="img/precio2mex.png" /></button>
</div><br>
<div class="caja">
	<button  class="boton" onclick="location.href='https://mpago.la/1ZeqSNg'"><img class="imag" src="img/precio3mex.png" /></button>
</div><br>
</div> 

<br><br>
<p class="pie">Desarrollado por Gemeba</p>
</body>
</html>