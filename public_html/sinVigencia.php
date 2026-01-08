<?php

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
	$.confirm({
	         theme: 'supervan',
             title: 'Tu cuenta no esta habilitada',
             content: ' Realiza el pago en "Escoger plan de pago", si ya lo hiciste envia comprobante en "Enviar datos y comprobante"',
             buttons: {
	               Aceptar: function () {
	               window.location.href="/comReg.php";
	               },
			 }
	 });
	</script>
</head>
</html>
