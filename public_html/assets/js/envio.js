    function envio2(){
	var ced = document.getElementById('correo2').value;
	var mensaje = "Hola, envio mis datos para activar cuenta. \n Cedula: "+ced ;
	

	var miurl = "https://api.whatsapp.com/send?phone=573155298257&text="+ mensaje;
	window.open(miurl);
	
	}