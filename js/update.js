$(document).ready(function() {
	$('#send').click(function(event) {
		var tipo=$.trim($('[id="tipo"]').val());
		//var tipo = "A";
		var nombre=$.trim($('[id="nombre"]').val());
		var apellidos=$.trim($('[id="apellidos"]').val());
		var correo=$.trim($('[id="correo"]').val());
		var tel=$.trim($('[id="tel"]').val());
		var inst=$.trim($('[id="inst"]').val());
		var area=$.trim($('[id="area"]').val());
		var gen=$.trim($('[id="gen"]').val());
		//var control=$.trim($('[id="Control"]').val());
		var fecha=$.trim($('[id="fecha"]').val());
		var pass=$.trim($('[id="pass"]').val());
		var pass2=$.trim($('[id="pass2"]').val());
		var password_error = document.getElementById("password_error");
		var p;
		var x = document.getElementById("PassSec");
		if (x.style.display === "none") {
			 p=0;
		}
		else{
			p=1;
		}
		//var name_error = document.getElementById("name_error");
		var type="Contribuidor";
		var correct=true;
		var error="";
		var clase="";
		var operacion=0;

		$('[id="correo"]').prev().html('');

		if (tipo=="E") {
			var control=$.trim($('[id="Control"]').val());
			if(control.length==0){
				password_error.innerHTML=error+"Ingrese un numero de control valido";
				error=error+"Ingrese un numero de control valido<br>";
				correct=false;
			}
			else if(isNaN(control)){
				password_error.innerHTML=error+"Ingrese un numero de control valido";
				error=error+"Ingrese un numero de control valido<br>";
				correct=false;
			}
			//clase="E";
		}
		else{
			var exp=$.trim($('[id="Expediente"]').val());
			var cvu=$.trim($('[id="CVU"]').val());
			//clase="A"
		}

		if(nombre.length==0){
			correct=false;
			name_error.innerHTML="Ingrese un nombre";
			document.getElementById("nombre").style.border="1px solid red";
			name_error.style.color="red";
		}
		if(apellidos.length==0){
			correct=false
			lname_error.innerHTML="Ingrese sus apellidos";
			document.getElementById("apellidos").style.border="1px solid red";
			lname_error.style.color="red";
		}
		if(correo.length==0){
			//$('[id="correo"]').prev().html('Ingrese un email valido');
			email_error.innerHTML="Ingrese un correo";
			document.getElementById("correo").style.border="1px solid red";
			email_error.style.color="red";
			correct=false;
		}
		else if(!validateEmail(correo)){
			$('[id="correo"]').prev().html('Ingrese un email valido');
			email_error.innerHTML="Ingrese un correo valido";
			document.getElementById("correo").style.border="1px solid red";
			email_error.style.color="red";
			correct=false;
		}

		if(inst.length==0){
			inst_error.innerHTML="Ingrese su institucion";
			document.getElementById("inst").style.border="1px solid red";
			inst_error.style.color="red";
			correct=false;
		}
		if(area.length==0){
			area_error.innerHTML="Ingrese su area";
			document.getElementById("area").style.border="1px solid red";
			area_error.style.color="red";
			correct=false;
		}
		if(tel.length==0){
			//$('[id="tel"]').prev().html('Ingrese un numero valido');
			tel_error.innerHTML="Ingrese su telefono";
			document.getElementById("tel").style.border="1px solid red";
			tel_error.style.color="red";
			correct=false;
		}
		else if(isNaN(tel)){
			//$('[id="tel"]').prev().html('Ingrese un numero valido');
			tel_error.innerHTML="Ingrese un numero valido";
			document.getElementById("tel").style.border="1px solid red";
			tel_error.style.color="red";
			//$('[id="tel"]').prev().css('margin-left', '52%');
			correct=false;
		}

		if (p==1) {
			if(!checkPassword(pass)){
				//password_error.innerHTML="La Contraseña no cumple con los requisitos";
				pass_error.innerHTML="La Contraseña no cumple con los requisitos";
				document.getElementById("pass").style.border="1px solid red";
				pass_error.style.color="red";
				//password_error.style.color = "red";	
				correct=false;
			}
			else if(pass!=pass2){
				repass_error.innerHTML="Las Contraseñas no coinciden";
				document.getElementById("pass").style.border="1px solid red";
				document.getElementById("pass2").style.border="1px solid red";
				pass_error.style.color="red";
				correct=false;
			}
		}

		

		if(correct==true){
			if (tipo=="E") {
				$.ajax({
					url:"ajax/updateuser.php",
					method:"POST",
					data:{tipo:tipo,nombre:nombre,apellidos:apellidos,correo:correo,tel:tel,inst:inst,area:area,pass:pass,type:type,control:control,clase:clase,operacion:operacion,gen:gen,fecha:fecha},
					beforeSend:function(){
						$('.registrar').val('Registrando...');
					},
					success:function(data){
						$('#send').val('Registrar');
						console.log(data);
						if(data == "1"){
							//document.getElementById("correo").style.border="1px solid red";
							email_error.innerHTML="Correo ya usado";
							alert("Correo Ya registrado")
						}
						else if(data == "2"){
							window.location.href = "modifyuser.php";
						}
						
						
						
					}
				})			
		}
		if (tipo=="A") {
				$.ajax({
					url:"ajax/updateuser.php",
					method:"POST",
					data:{tipo:tipo,nombre:nombre,apellidos:apellidos,correo:correo,tel:tel,inst:inst,area:area,pass:pass,type:type,exp:exp,cvu:cvu,clase:clase,operacion:operacion,gen:gen,fecha:fecha},
					beforeSend:function(){
						$('.registrar').val('Registrando...');
					},
					success:function(data){
						$('#send').val('Registrar');
						console.log(data);
						if(data == "1"){
							lcorreo.innerHTML="Correo";
							document.getElementById("correo").style.border="1px solid red";
							email_error.innerHTML="Correo ya usado";
							alert("Correo Ya registrado")
						}
						else if(data == "2"){
							window.location.href = "modifyuser.php";
						}
						
						
						
					}
				})			
		}
	}
		else{
			alert("Ingrese los datos que se le piden")
		}
	});
});





function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());

}


function checkPassword(str)
  {
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
    return re.test(str);
  }

  function changepass(){
			var x = document.getElementById("PassSec");
			if (x.style.display === "none") {
    			x.style.display = "block";
    			document.getElementById("shpass").innerHTML="Cancelar";
  			} else {
    			x.style.display = "none";
    			document.getElementById("shpass").innerHTML="Cambiar contraseña";
  			}
			
		}






