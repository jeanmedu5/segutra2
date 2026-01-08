<?php
session_start();
$error = $_SESSION['dato'];
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>SeguTra</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel='manifest' href='/manifest.json'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"> <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
	<script language="javascript">
		var erro = '<?php echo $error; ?>';
	
		if (erro == 'vacio'){
		$.confirm({
	         theme: 'supervan',
             title: 'No aceptaste politicas y condiciones',
             content: ' ',
             buttons: {
	               Aceptar: function () {
	                   	window.history.back(-2);
	            	},
			}
		});
		}

		if (erro == 'noCoinciden'){
		$.confirm({
	         theme: 'supervan',
             title: 'Las contraseñas no coinciden, intente de nuevo',
             content: ' ',
             buttons: {
	               Aceptar: function () {
	                   	window.history.back(-2);
	            	},
			}
		});
		}

		if (erro == 'existeUsuario'){
		$.confirm({
	         theme: 'supervan',
             title: 'Lo sentimos, la cedula digitada ya se encuentra registrada',
             content: '  ',
             buttons: {
	               Aceptar: function () {
	                   	window.history.back(-2);
	            	},
			}
		});
		}

		if (erro == 'noRegistro'){
		$.confirm({
	         theme: 'supervan',
             title: 'Error al registrarte. Intenta más tarde',
             content: ' ',
             buttons: {
	               Aceptar: function () {
	                   	window.history.back(-2);
	            	},
			}
		});
		}

	</script>
</head>
</html>