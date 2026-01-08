<?php
session_start();
if (empty($_SESSION['correo'])) {
    header("Location: administrador.php");
     exit();
    }

if (empty($_SESSION['cuentaAdmin'])) {
    header("Location: administrador.php");
     exit();
    }

if ($_SESSION['cuentaAdmin']!= "adminjamd" ) {
    header("Location: administrador.php");
     exit();
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"  href="assets/css/enviarPago.css"   >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <title>Registro para administradores</title>
   <script language="javascript">
	
    function consultar(){
         var cedula = document.getElementById("cedul").value;
          $.ajax({
          type: "POST",
          url: "/verVigencia.php",
          data: {cedula:cedula}
          })
	.done(function(data){
            var dato = data;
            if(dato=="noExiste"){
	       $.alert({
	        animation: 'zoom',
            title: 'No hay registros de esa cedula',
            content: ' contacta al usuario para confirmar cedula de registro.',
}); 
	}
             else{
            document.getElementById('fechVig').value ="vence: "+dato;     
  }
          }) 
        .fail(function(){
          $.alert({
	animation: 'zoom',
title: 'algo fallo',
content: '...',
}); 
 });          
    }

 function consultarW(){
         var cedula = document.getElementById("cedul2").value;
          $.ajax({
          type: "POST",
          url: "/verWhat.php",
          data: {cedula:cedula}
          })
	.done(function(data){
            var dato = data;
            if(dato=="noExiste"){
	       $.alert({
	        animation: 'zoom',
            title: 'No hay registros de esa cedula',
            content: ' contacta al usuario para confirmar cedula de registro.',
}); 
	}
             else{
            document.getElementById('what').value ="whatsapp: "+dato;     
  }
          }) 
        .fail(function(){
          $.alert({
	animation: 'zoom',
title: 'algo fallo',
content: '...',
}); 
 });
           
    }
</script>
</head>

<body class="todapag">
    __________________________________________
    <br><br>
    <h2>Nueva vigencia cuenta</h2>
    <form action="eliminarCuenta.php" method="post">   
        <input required id="cedul" name="correo" type="number" placeholder="cedula " pattern="[0-9]" required />
        <br>
         <a><input style="font-size:1.2em;" type="button" class="btnopci" value="Consultar Vigencia" onclick="consultar()"/></a>
        <br>
       <input class="fechVig" name="fechVig" id="fechVig" disabled/>
        <br>    
        <input id="fecha" class="fech" name="fecha" type="date" required/>
        <br>
        <input type="submit" value="Actualizar" class="btnopci"  >
    </form>
    __________________________________________
     <br><br>
    <h2>Actualizar contraseña de usuarios</h2>
    <form action="olvidoContra.php" method="post">   
        <input required id="cedul2" name="correo" type="number" placeholder="cedula " pattern="[0-9]" required />
        <br>    
        <input id ="palabra_secreta" name="palabra_secreta" type="text" placeholder="Contraseña nueva"pattern="[A-Za-z0-9]{4,25}" required />
        <br>
        <input type="submit" value="Actualizar" class="btnopci"  >
        <br>
         <a><input style="font-size:1.2em;" type="button" class="btnopci" value="Consultar whatsapp" onclick="consultarW()"/></a>
        <br>
      <input class="what" name="what" id="what" disabled/>
    </form>
    __________________________________________
      
</body>
</html>