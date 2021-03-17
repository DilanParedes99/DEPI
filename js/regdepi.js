$(document).ready(function() {
	$('#send').click(function(event) {
		var area="";
		var nombre=$.trim($('[id="nombre"]').val());
		var apellidos=$.trim($('[id="apellidos"]').val());
		var correo=$.trim($('[id="correo"]').val());
		var tel=$.trim($('[id="tel"]').val());
		var inst=$.trim($('[id="inst"]').val());
		var pass=$.trim($('[id="pass"]').val());
		var pass2=$.trim($('[id="pass2"]').val());
		var type="DEPI";
		var correct=true; 

		$('[id="correo"]').prev().html('');

		if(nombre.length==0)
			correct=false;
		if(apellidos.length==0)
			correct=false
		if(correo.length==0){
			$('[id="correo"]').prev().html('Ingrese un email valido');
			correct=false;
		}
		else if(!validateEmail(correo)){
			$('[id="correo"]').prev().html('Ingrese un email valido');
			correct=false;
		}

		if(inst.length==0)
			correct=false;
		if(tel.length==0){
			$('[id="tel"]').prev().html('Ingrese un numero valido');
			correct=false;
		}
		else if(isNaN(tel)){
			$('[id="tel"]').prev().html('Ingrese un numero valido');
			$('[id="tel"]').prev().css('margin-left', '52%');
			correct=false;
		}
		if(!checkPassword(pass)){
			$('[id="pass"]').prev().html('La contraseña no cumple con los requisitos');
			correct=false;
		}
		else if(pass!=pass2){
			correct=false;
			$('[id="pass2"]').prev().html('Escriba en ambos campos la misma contraseña');
		}

		if(correct==true){

			$.ajax({
				url:"ajax/AjaxRegister.php",
				method:"POST",
				data:{nombre:nombre,apellidos:apellidos,correo:correo,tel:tel,inst:inst,area:area,pass:pass,type:type},
				beforeSend:function(){
					$('.registrar').val('Registrando...');
				},
				success:function(data){
					$('#send').val('Registrar');
					console.log(data);
					if(data == "1"){
						$('[name="email"]').prev().html('email ya registrado');
					}
					else if(data == "2"){
						window.location.href = "login.php";
					}
					
					
				}
			})
		}
		else{
			alert("Campos incorrectos, revise de nuevo")
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