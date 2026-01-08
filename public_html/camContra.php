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
	<link rel="stylesheet"  href="assets/css/camContra.css"   >
	<link rel='manifest' href='/manifest.json'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
	function mostrar(id) { 
	if (id == "todos") { 
	$("#todos").show();		
	$("#1primA").hide(); 
	$("#1primB").hide();
	$("#1primC").hide();
	}
	
	if (id == "1primA") { 
	$("#todos").hide();		
	$("#1primA").show(); 
	$("#1primB").hide();		
	$("#1primC").hide()
	}	
	
	if (id == "1primB") { 
	$("#todos").hide();		
	$("#1primA").hide(); 
	$("#1primB").show();		
	$("#1primC").hide()
	}	
	
	if (id == "1primC") { 
	$("#todos").hide();		
	$("#1primA").hide(); 
	$("#1primB").hide();
	$("#1primC").show();		
	}	
	} 
	</script>
</head>

<body class="todapag">
	<select id="status" name="status" onChange="mostrar(this.value);"> 
		<option selected value="todos">Selecciona una opcion...</option>
 		<option value="1primA">Cambiar contraseña</option>
 		<option value="1primB">Olvide contraseña</option> 
 		<option value="1primC">Actualizar placa vehícular</option> 
 	</select>
	<br>

	<div id= "todos" style="display: show;"> </div>

	<div id= "1primA" style="display: none;">
		<h1> Cambiar Contraseña </h1>
		<form class="form1" method="post" action="camContraLogin.php" name="signin-form">   
    		<div class="form-element">
        	<label>Cuenta  </label> <br>
       		<input type="number" name="correo" placeholder="Escribe tu cedula" pattern="[0-9]" required />
       		<br><br> 
        	<label>Contraseña actual</label> 
        	<input name="palabra_secreta" type="password" placeholder="Contraseña actual"  required pattern="[A-Za-z0-9]{4,25}" />
        	<br><br>
        	<label>Contraseña nueva</label> 
        	<input name="palabra_secreta_nueva" type="password" placeholder="Contraseña nueva" required pattern="[A-Za-z0-9]{4,25}"/>
        	<br>
    		</div>
   			<div class="botonent1">
   		 	<button type="submit" class="btnent" value="login">CAMBIAR</button>
     		</div>
		</form>
	</div>
	<br>

	<div id= "1primB" style="display: none;">
		<h1> Olvide la Contraseña </h1>
		<form class="form2" method="post" action="olviCon.php" name="signin-form">  
    		<div class="form-element">
        	<label>Cuenta  </label> <br>
        	<input type="number"  name="correo" placeholder="Escribe tu cedula" pattern="[0-9]" required />
        	<br>
    		</div>
   			<div class="botonent1">
    		<button type="submit" class="btnent" value="login">Solicitar</button>
     		</div>
		</form>
	</div>
	<br>

	<div id= "1primC" style="display: none;">
		<h1> Actualizar placas del vehículo </h1>
		<form class="form1" method="post" action="actualizarPlaca.php" name="signin-form">  
    		<div class="form-element">
        	<label>Cuenta  </label> <br>
        	<input type="number" name="correo" placeholder="Escribe tu cedula" pattern="[0-9]" required />
        	<br><br> 
        	<label>Contraseña actual</label> 
        	<input name="palabra_secreta" type="password" placeholder="Contraseña actual"  required pattern="[A-Za-z0-9]{4,25}" />
        	<br><br>
       		<label>Nueva placa</label> 
        	<input name="placa" type="text" placeholder="Placa vehícular" required pattern="[A-Za-z0-9\s]{4,10}"/>
        	<br>
    		</div>
   			<div class="botonent1">
    		<button type="submit" class="btnent" value="login">CAMBIAR</button>
     		</div>
		</form>
	</div>

	<br><br>
	<p>Desarrollado por Gemeba</p>
</body>
</html>