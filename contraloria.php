<?php session_start(); ?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NEGOCIOS LOCALES</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'>
	<!--<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500&display=swap" rel="stylesheet"> -->
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600&display=swap" rel="stylesheet">  
    <script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>

	<!-- CSS -->

    <link rel="stylesheet" href="css/iconos.css" />
    <link rel="stylesheet" href="css/style.css" />

    <style>
		.bg-tecnm{ background-color: #1B396A; }
		.bg-secundario{ background-color: #6576B4; }
		.text-tecnm{ color: #1B396A; }
		
		@media screen and (max-width: 800px) {
			.smobile{
				font-size: 10px;
			}
		}
	</style>

    <?php 
    include "./includes/navbar.php";
    ?>
</head>
<body>

    <nav class='navbar navbar-white navbar-expand' id='main_posgrado' style='z-index: 1; margin-top: 50px;' id='PRODEP'>
	  <div class='container mx-0'>
		<div class='collapse navbar-collapse mb-2'>
			<ul class='navbar-nav m-auto align-items-center'>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_PRODEP accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					PRODEP
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Contraloria accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Contralor??a Social
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Documentos accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Documentos Normativos
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Informes accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Informes Trimestrales
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Quejas accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Quejas, Denuncias o Petici??n
				</li>
			</ul>
		</div>
	  </div>
	</nav>

    <!-- PRODEP -->
    <div class='container mx-0 m-md-auto collapse show Ocultar Mostrar_PRODEP' id='PRODEP' style="margin-bottom: 200px;">
		<div class='row justify-content-center mx-4 mx-sm-0'>
			
			<div class='col-12 h4 text-left text-white font-weight-bold mt-2 mt-md-0  py-1 bg-secundario' data-toggle='collapse' data-target='#Grupo1' aria-expanded='false' style="cursor:pointer; font-family: 'Montserrat', sans-serif;">
				<span class='icon-menu'></span>
				PRODEP
			</div>
			
			<div class='col-12 collapse show' id='Grupo1'>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#que_es' aria-expanded='false'>
					<span class='icon-menu'></span>
					??Qu?? es el Programa para el Desarrollo Profesional Docente (PRODEP)?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='que_es'>
					Es el Programa para el Desarrollo Profesional Docente (PRODEP), que tiene como objetivo contribuir para que el personal docente y personal con funciones de direcci??n, de supervisi??n, de asesor??a t??cnico pedag??gica y cuerpos acad??micos accedan y/o concluyan programas de formaci??n, actualizaci??n acad??mica, capacitaci??n y/o proyectos de investigaci??n para fortalecer el perfil necesario para el desempe??o de sus funciones.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PTS' aria-expanded='false'>
					<span class='icon-menu'></span>
					Para el Tipo Superior
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PTS'>
					Profesionalizar a las/los Profesores de Tiempo Completo, ofreciendo las mismas oportunidades a mujeres y hombres para acceder a los apoyos que otorga el Programa, a fin de que alcancen las capacidades de investigaci??n-docencia, desarrollo tecnol??gico e innovaci??n y con responsabilidad social; se articulen y consoliden en Cuerpos Acad??micos y con ello generen una nueva comunidad acad??mica capaz de transformar su entorno.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#POP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Poblaci??n Objetivo del Programa
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='POP'>
					El Programa est?? dirigido a Profesores de Tiempo Completo (PTC) que pertenecen a los Institutos Tecnol??gicos del TecNM (Federales y Descentralizados).
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#CGA' aria-expanded='false'>
					<span class='icon-menu'></span>
					Caracter??sticas generales de los apoyos (tipo, monto, periodo de ejecuci??n y fecha de entrega).
				</div>
				
				<div style="cursor:pointer;" class='tz-gallery col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='CGA'>
					<a href='img/tabla.png' target='_blank'>
						<img src='img/tabla.png' alt='' class='img-fluid w-100' />
					</a>
					<table class='text-center d-none' style="border-collapse:collapse;">
						<tbody>
							<tr>
								<td style="background-color:#008080; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:1px solid black; height:48px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="color:white"><span style="font-family:Montserrat">Convocatorias</span></span></span></td>
								<td style="background-color:#008080; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="color:white"><span style="font-family:Montserrat">Dirigido a:</span></span></span></td>
								<td style="background-color:#008080; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:middle; white-space:normal; width:115px"><span class='h6'><span style="color:white"><span style="font-family:Montserrat">Periodo de emisi&oacute;n</span></span></span></td>
								<td style="background-color:#008080; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="color:white"><span style="font-family:Montserrat">Monto de recursos</span></span></span></td>
								<td style="background-color:#008080; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:1px solid black; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="color:white"><span style="font-family:Montserrat">Periodo de ejecuci&oacute;n</span></span></span></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:72px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Reconocimiento a PTC con perfil deseable.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC</span></span></span></td>
								<td rowspan="6" style="background-color:#d9e1f2; border-bottom:.7px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:115px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">ENERO <br /> - <br />FEBRERO</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">No obtiene recursos</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Tienen vigencia de tres a&ntilde;os.</span></span></span></td>
							</tr>
							<tr>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:48px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo a PTC con perfil deseable.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">M = 20 mil pesos <br />D = 30 mil pesos.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Tienen vigencia de tres a&ntilde;os.</span></span></span></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:96px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo a la reincorporaci&oacute;n de exbecarios PROMEP.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Hasta por un monto de 500 mil pesos.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">El proyecto se desarrolla en 12 meses.</span></span></span></td>
							</tr>
							<tr>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:96px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo a la incorporaci&oacute;n de nuevos PTC.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Hasta por un monto de 500 mil pesos.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">El proyecto se desarrolla en 12 meses.</span></span></span></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:144px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyos para estudios de posgrado de alta calidad.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Esto depender&aacute; de las necesidades del apoyo.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Este depender&aacute; del tipo de estudios que se realicen.</span></span></span></td>
							</tr>
							<tr>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:120px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo para redacci&oacute;n de tesis de doctorado y de maestr&iacute;a.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Esto depender&aacute; de las necesidades del apoyo.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">M=6 meses <br /> D=12 meses.</span></span></span></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:336px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo para el fortalecimiento de los CA, la integraci&oacute;n de redes rem&aacute;ticas de colaboraci&oacute;n de cuerpos acad&eacute;micos, gastos de publicaci&oacute;n, registro de patentes y apoyos postdoctorales.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">CA</span></span></span></td>
								<td style="background-color:#d9e1f2; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:115px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">JUNIO <br /> - <br /> SEPTIEMBRE</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Hasta por un monto de 500 mil pesos.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">El proyecto se desarrolla en 12 meses.</span></span></span></td>
							</tr>
							<tr>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:72px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo para gastos de publicaci&oacute;n.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC/CA</span></span></span></td>
								<td rowspan="4" style="background-color:#d9e1f2; border-bottom:.7px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:115px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">ENERO <br /> - <br /> SEPTIEMBRE</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Esto depender&aacute; de las necesides del apoyo.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">&nbsp;</span></span></span></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:96px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Apoyo para registro de patentes.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">PTC/CA</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Esto depender&aacute; de las necesidades del apoyo.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">&nbsp;</span></span></span></td>
							</tr>
							<tr>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:72px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Estudios posdoctorales.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">CA</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Hasta por un monto de 212 mil pesos.</span></span></span></td>
								<td style="background-color:#e2efda; border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">El proyecto se desarrolla en 12 meses.</span></span></span></td>
							</tr>
							<tr>
								<td style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black; border-top:none; height:72px; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Estancias cortas de investigaci&oacute;n.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:90px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">CA</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:136px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">Hasta por un monto de 212 mil pesos.</span></span></span></td>
								<td style="border-bottom:1px solid black; border-left:none; border-right:1px solid black; border-top:none; text-align:center; vertical-align:middle; white-space:normal; width:112px"><span class='h6'><span style="font-family:Montserrat"><span style="color:black">El proyecto se desarrolla en 12 meses.</span></span></span></td>
							</tr>
						</tbody>
					</table>
					
					<p class='m-2'>
						Los apoyos normalmente son entregados en el ??ltimo trimestre de cada ejercicio presupuestal.
					</p>

				</div>
			
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#SDTB' aria-expanded='false'>
					<span class='icon-menu'></span>
					Son derechos de todos/as los/as beneficiarios/as:
				</div>
				
				<div style="cursor:pointer;" class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='SDTB'>
					<ul class="abc h6">
						<li> Recibir un trato atentento, digno y respetuoso, sin discriminaci??n alguna. </li> <br/>
						<li> Recibir asesor??a y apoyo sobre la operaci??n del mismo de manera gratuita. </li> <br/>
						<li> 
							Tener acceso a la informaci??n necesaria de manera clara y oportuna, para resolver sus dudas respecto de las acciones del Programa. 
						</li> <br/>
						<li> 
							Recibir el comunicado por parte de las instancas ejecutoras sobra la asignaci??n del recurso
						</li> <br/>
						<li> 
							Tener la reserva y privacidad de sus datos personales en los t??rminos de lo establecido en la Ley General de Transparencia y Acceso a la Informaci??n P??blica, la Ley Federal de Transparencia y Acceso a la Informaci??n P??blica, su Reglamento y dem??s normativa jur??dica aplicable. 
						</li>
					</ul>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#TS' aria-expanded='false'>
					<span class='icon-menu'></span>
					Tipo Superior:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='TS'>
					<ul class="abc h6">
					<li> 
						Recibir la informaci??n correspondiente a las diferentes convocatorias que emite el Programa; y recibir la notificaci??n de los resultados de las solicitudes presentadas por los/as PTC. 
					</li> <br/>
					<li> 
						Recibir la aportaci??n de los recursos para el pago de los apoyos con base en la disponibilidad presupuestal de las Unidades Responsables. 
					</li> <br/>
				</ul>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#DB' aria-expanded='false'>
					<span class='icon-menu'></span>
					De los beneficiarios:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='DB'>
					<ul class="abc h6">
						<li> Recibir la notificaci??n de los resultados de las solicitudes que presenten. </li> <br/>
						<li> Manifestar su inconformidad ante los resultados emitidos a sus solicitudes. </li> <br/>
						<li> Recibir los recursos autorizados de acuerdo a lo establecido en las cartas de liberaci??n de recursos. Con base en la disponibilidad presupuestal de las UR. </li> <br/>
					</ul>
				</div>
				
				<div class='col-12 h4 font-italic col-12 text-center text-tecnm mt-2 mt-md-0 py-1'>
					OBLIGACIONES, PARA EL TIPO SUPERIOR
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#TS2' aria-expanded='false'>
					<span class='icon-menu'></span>
					Las personas beneficiarias:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='TS2'>
				
					<ul class="abc h6">
						<li> 
							Hacer uso de los recursos de acuerdo con los rubros, montos aprobados y disposiciones establecidas en las presentes RO. 
						</li> <br/>
						<li> 
							Cumplir con las actividades comprometidas seg??n el apoyo autorizado (proyectos de investigaci??n o plan de trabajo). 
						</li> <br/>
						<li> 
							Presentar a la DSA y a su IES de adscripci??n los informes semestrales que reflejen el avance en actividades y ejercicio de los recursos autorizados, considerando los informes a partir de la fecha de notificaci??n de los resultados, as?? como el informe final del impacto acad??mico logrado con el apoyo recibido, mediante el formato electr??nico establecido que se encuentra en el SISUP. 
						</li> <br/>
						<li> 
							Entregar a la IPES de adscripci??n la evidencia de las actividades realizadas durante el periodo del apoyo durante los primeros 15 d??as posteriores a la conclusi??n de la vigencia o bien, al presentar el informe final si el recurso se ejerce antes de este per??odo. 
						</li> <br/>
					</ul>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#EOP' aria-expanded='false' id='CS'>
					<span class='icon-menu'></span>
					Estructura Operativa del programa:
				</div>
				
				<div class='tz-gallery col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse text-center' id='EOP'>
					<a href='img/estructura_operativa_programa.png' target='_blank'>
						<img src='img/estructura_operativa_programa.png' alt='' class='img-fluid w-25' />
					</a>
				</div>
			</div>
		</div>
	</div>

    <!-- Contraloria -->
    <div class='container mx-0 m-md-auto collapse Ocultar Mostrar_Contraloria' style="margin-bottom: 200px;">
		<div class='row justify-content-center mx-4 mx-sm-0'>
			
			<div style="cursor:pointer; font-family: 'Montserrat', sans-serif;" class='col-12 h4 text-left text-white font-weight-bold mt-2 mt-md-0  py-1 bg-secundario' data-toggle='collapse' data-target='#Grupo2' aria-expanded='false'>
				<span class='icon-menu'></span>
				Contralor??a Social del Programa Presupuestario S247
			</div>
			
			<div class='col-12 collapse show' id='Grupo2'>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#que_es_cs' aria-expanded='false'>
					<span class='icon-menu'></span>
					??Qu?? es la Contralor??a Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='que_es_cs'>
					La Contralor??a Social es un grupo de beneficiarios, que, de manera organizada, verificaran el cumplimiento de las metas y la correcta aplicaci??n de los recursos p??blicos asignados al Programa PRODEP.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#VCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					??Qu?? vigila la contralor??a Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='VCS'>
					<ul>
						<li> 
							Que se difunda la informaci??n suficiente, veraz y oportuna sobre la operaci??n del programa. 
						</li> <br/>
						<li> 
							Que los otorgamientos de los apoyos sean con calidad, calidez, eficiente, eficaz, oportuno y de manera transparente. 
						</li> <br/>
						<li> 
							Que las autoridades competentes brinden atenci??n a las quejas o denuncias, relacionadas al programa.
						</li>
					</ul>
				</div>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#QCCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					??Qu?? es un Comit?? de Contralor??a Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='QCCS'>
					Las formas de organizaci??n social constituidas por los beneficiarios referidas en el art??culo 67 del Reglamento de la Ley General de Desarrollo Social, que llevan a cabo el seguimiento, supervisi??n y vigilancia de la ejecuci??n, cumplimiento de las metas y acciones comprometidas, as?? como de la correcta aplicaci??n de los recursos asignados a los mismos. 
				</div>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#OCCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					Objetivo de los Comit??s de Contralor??a Social.
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='OCCS'>
					Colaborar en forma VOLUNTARIA ACTIVA y de manera representativa con organismos oficiales, seguimiento, supervisi??n y vigilancia de la ejecuci??n, cumplimiento de las metas y acciones comprometidas en el Programa, as?? como de la correcta aplicaci??n de los recursos asignados. 
				</div>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#CFDCCCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					??Cu??les son las funciones que deber??n de cumplir los Comit??s de Contralor??a Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='CFDCCCS'>
					<ul>
						<li> 
							Representar los intereses y actuar como grupo de enlace entre la comunidad, las autoridades locales y autoridades centrales. 
						</li> <br/>
						<li>
							Vigilar el adecuado manejo de los recursos financieros y que cumplan con el objetivo para el que fueron otorgados. 
						</li> <br/>
						<li> 
							Capturar y canalizar las Quejas o Denuncias a las ??reas correspondientes. 
						</li> <br/>
						<li> 
							Reportar cualquier anomal??a que se presente durante el proceso de la ejecuci??n y culminaci??n de los recursos Financieros. 
						</li>
					</ul>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#DRCSDP' aria-expanded='false' id='DN'>
					<span class='icon-menu'></span>
					Medidas para promover la equidad de g??nero entre hombres y mujeres en la integraci??n de los Comit??s
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='DRCSDP'>
					Dentro del Programa para el Desarrollo Profesional Docente (PRODEP) mismo que se rige por Reglas de operaciones emitidas por la Secretar??a de Hacienda y Cr??dito P??blico, donde menciona en el objetivo para el Tipo superior, ???Profesionalizar a las/los PTC, ofreciendo las mismas oportunidades a mujeres y hombres para acceder a los apoyos que otorga el Programa, a fin de que alcancen las capacidades de investigaci??n-docencia, desarrollo tecnol??gico e innovaci??n y con responsabilidad social?????? 
					<br /><br />
					Por lo anterior, podemos mencionar que para la formaci??n de los comit??s deber??n de ser de manera equitativa.

				</div>
				
			</div>
			
		</div>	
	</div>

    <!-- Documento -->
    <div class='container mx-0 m-md-auto collapse Ocultar Mostrar_Documento' style="margin-bottom: 200px;">
		<div class='row justify-content-center mx-4 mx-sm-0'>
			
			<div style="cursor:pointer; font-family: 'Montserrat', sans-serif;" class='col-12 h4 text-left text-white mt-2 mt-md-0  py-1 bg-secundario' data-toggle='collapse' data-target='#Grupo3' aria-expanded='false' id='QDP'>
				<span class='icon-menu'></span>
				Documentos Normativos
			</div>
			
			<div class='col-12 collapse show' id='Grupo3'>

				<div style="cursor:pointer;" class='col-12 h5 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#documentos_normativos' aria-expanded='false'>
					<span class='icon-menu'></span>
					Documentos Normativos
				</div>
				
				<div class='col-12 h6 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='documentos_normativos'>
					
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Lineamientos_CS_28-10-2016.pdf" target="_blank"> 
							Lineamientos
						</a>
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Esquema_de_Contraloria_Social_2021.pdf" target="_blank"> 
							Esquema de Contralor??a Social 2021
						</a>
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Formato_1_PATCS_CS_2021.pdf" target="_blank"> 
							 Programa Anual de Trabajo de Contralor??a Social "PATCS" 2021
						</a>
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Guia_Contraloria_Social_2021.pdf" target="_blank"> 
							Gu??a operativa de Contralor??a Social 2021
						</a>
					</div>
					
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#FGP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Formatos de Gu??a Operativa
				</div>
				
				<div class='col-12 h6 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='FGP'>
					
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-excel text-success'></span>
						<a href="doc_contraloria/Formato_2_PITCS_CS_2021.xlsx" target="_blank"> 
							FORMATO 2 "PITCS" 2021 
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_3_Acta_de_Registro_de_Comite.docx" target="_blank"> 
							FORMATO 3 "Acta de Registro de Comit??"
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_4_Minuta_de_Reunion_de_Comite.docx" target="_blank"> 
							FORMATO 4 "Minuta de Reuni??n del Comit??" 
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_5_Escrito_Libre.docx" target="_blank"> 
							FORMATO 5 "Escrito Libre"
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-excel text-success'></span>
						<a href="doc_contraloria/Formato_6_Informe_de_Comite_CS_2021.xlsx" target="_blank"> 
							FORMATO 6 "Informe de Comit?? de Contralor??a Social" 
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_7_Acta_Sustitucion_de_Integrante_de_Comite.docx" target="_blank"> 
							FORMATO 7 "Acta Sustituci??n de Integrante de Comit??"
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_8_Quejas_Denuncias_Peticiones_o_Irregularidad.docx" target="_blank"> 
							FORMATO 8 "Queja, Denuncias, Peticiones o Irregularidades"
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-excel text-success'></span>
						<a href="doc_contraloria/Formato_9_Infome_de_Quejas_Denuncias_o_Peticiones.xlsx" target="_blank"> 
							FORMATO 9 "Informe de Queja, Denuncias, Peticiones o Irregularidades"
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-excel text-success'></span>
						<a href="doc_contraloria/Formato_10_Entrega_de_Material_Difusion_y_Capacitacion_Impartidas.xlsx" target="_blank"> 
							FORMATO 10 "Entrega de Material de Difusi??n y Capacitaci??n Impartidas" 
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-excel text-success'></span>
						<a href="doc_contraloria/Formato_11_Registro_Integrantes_de_Comites_2021(DIRECTORIO).xlsx" target="_blank"> 
							FORMATO 11 "Registro de Integrantes de Comit??s 2021"
						</a> 
					</div>
				</div>
			
			</div>
			
		</div>
	</div>

	<!-- Informes -->
    <div class='container mx-0 m-md-auto collapse Ocultar Mostrar_Informe' style="margin-bottom: 200px; font-family: 'Montserrat', sans-serif;">
		<div class='row justify-content-center mx-4 mx-sm-0'>
			
			<div style="cursor:pointer;" class='col-12 h4 text-left text-white mt-2 mt-md-0  py-1 bg-secundario' data-toggle='collapse' data-target='#Grupo3' aria-expanded='false' id='QDP'>
				<span class='icon-menu'></span>
				Informes Trimestrales
			</div>
			
			<div class='col-12 collapse show' id='Grupo3'>

				<div style="cursor:pointer;" class='col-12 h5 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#documentos_normativos' aria-expanded='false'>
					<span class='icon-menu'></span>
					A??o 2021
				</div>
				
				<div class='col-12 h6 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='documentos_normativos'>
					
					<div class="alert alert-warning">No se ha cargado informaci??n.</div>

				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#FGP' aria-expanded='false'>
					<span class='icon-menu'></span>
					A??o 2020
				</div>
				
				<div class='col-12 h6 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='FGP'>
					
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Informe_Trimestral-oct-dic-20_TecNM.pdf" target="_blank"> 
							Informe Trimestral Octubre-Diciembre de 2020 TecNM
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Informe_Trimestral_jul-sep-20_TecNM.pdf" target="_blank"> 
							Informe Trimestral Julio-Septiembre de 2020 TecNM 
						</a> 
					</div>
				
				</div>
			
			</div>
			
		</div>
	</div>

    <!-- Quejas -->
    <div class='container mx-0 m-md-auto collapse Ocultar Mostrar_Quejas' style="margin-bottom: 200px; font-family: 'Montserrat', sans-serif;">
		<div class='row justify-content-center mx-4 mx-sm-0'>
			
			<div style="cursor:pointer;" class='col-12 h4 text-left text-white font-weight-bold mt-2 mt-md-0  py-1 bg-secundario' data-toggle='collapse' data-target='#Grupo4' aria-expanded='false'>
				<span class='icon-menu'></span>
				Quejas, Denuncias, Peticiones o Irregularidades
			</div>
			
			<div class='col-12 collapse show' id='Grupo4'>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#CCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					Los Comit??s de Contralor??a Social podr??n recibir de los beneficiarios del Programa para el Desarrollo Profesional Docente (PRODEP) las quejas y denuncias, de acuerdo a lo siguiente:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='CCS'>
					??? Sobre la aplicaci??n, ejecuci??n y/o asistencia t??cnica del Programa, que puedan dar lugar al fincamiento de responsabilidades administrativas, civiles y/o penales, y turnarlas a las autoridades competentes para su atenci??n.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PQDI' aria-expanded='false'>
					<span class='icon-menu'></span>
					Para alguna Queja o Denuncia interpuesta deber?? de realizar el siguiente procedimiento:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PQDI'>
					<div class='tz-gallery text-center'>
						<a href="img/procedimiento_quejas_denuncias.png" target="_blank">
							<img src="img/procedimiento_quejas_denuncias.png" alt="Diagrama" class="img-fluid w-100" />
						</a>
						<br />
						<br />
						<p class='small text-tecnm font-weight-bold'>
							Diagrama 2 Procesos para la Atenci??n o Canalizaci??n de Queja o Denuncia de Contralor??a Social del PRODEP 
						</p>
						<p class='h6 font-weight-bold text-left'>
							(Para la descripci??n del diagrama anterior, favor de remitirse a la Gu??a Operativa de Contralor??a Social en la p??gina 31).
						</p>
						
					</div>
				</div>
		
				<div class='col-12 h5 font-italic col-12 text-center text-tecnm mt-2 mt-md-0 py-1'>
					Por lo anterior, y con el prop??sito de facilitar la comunicaci??n con los beneficiarios del programa, el TecNM, ha dispuesto al personal responsable de acuerdo a lo siguiente:
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PTecNM' aria-expanded='false'>
					<span class='icon-menu'></span>
					Para el TecNM:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PTecNM'>
					Lic. Miguel ??ngel Andrade Herrera, Enlace de Contralor??a Social del TecNM: 
					<a href="/cdn-cgi/l/email-protection#e68589889294878a89948f879589858f878ab99689958194878289a6928385888bc88b9e">
						<span class="__cf_email__" data-cfemail="54373b3a202635383b263d35273b373d35380b243b27332635303b142031373a397a392c">[email&#160;protected]</span>
					</a>
					<br />
					<br />
					Las oficinas del Tecnol??gico Nacional de M??xico, se encuentran ubicadas en Avenida Universidad N??m. 1200, piso 5 sector 5-3, Colonia Xoco, Alcald??a Benito Ju??rez, C.P. 03330, Ciudad de M??xico, M??xico o bien comunicarse al tel??fono (01 55) 36-00-25-11, ext. 65083.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#ATSEP' aria-expanded='false'>
					<span class='icon-menu'></span>
					A trav??s de la SEP:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='ATSEP'>
					Para presentar quejas, denuncias, reconocimientos y sugerencias respecto a tr??mites correspondientes a la Secretar??a de Educaci??n P??blica relacionados con la Educaci??n Superior puede consultar la siguiente liga correspondiente al ??rgano Interno de Control de la propia Secretar??a:
					<br /><br />
					<a href='http://www.oic.sep.gob.mx/portal3/quejas2.php' target='_blank'>
						http://www.oic.sep.gob.mx/portal3/quejas2.php
					</a>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PSFP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Por medio de la Secretar??a de Funci??n P??blica:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PSFP'>
					Para presentar quejas y denuncias, por el posible incumplimiento de las obligaciones de los servidores p??blicos pueden realizarse a trav??s del portal del Sistema de Denuncia Ciudadana, <a href='https://sidec.funcionpublica.gob.mx/#!/' target='_blank'>https://sidec.funcionpublica.gob.mx/#!/,</a> de la Secretar??a de la Funci??n P??blica.
					<br /><br />
					???	La aplicaci??n para tel??fono celular "Denuncia ciudadana de la Corrupci??n".
					<br /><br />
					???	V??a telef??nica: En el interior de la Rep??blica al 800 11 28 700 y en la Ciudad de M??xico, 55 2000 2000.
					<br /><br />
					???	Presencial: En el m??dulo 3 de la Secretar??a de la Funci??n P??blica ubicado en Av. Insurgentes Sur 1735, PB, Guadalupe Inn, ??lvaro Obreg??n, C??digo Postal 01020, Ciudad de M??xico.
					<br /><br />
					???	V??a correspondencia: Env??a tu escrito a la Direcci??n General de Denuncias e Investigaciones de la Secretar??a de la Funci??n P??blica en Av. Insurgentes Sur No. 1735, Piso 2 Ala Norte, Guadalupe Inn, ??lvaro Obreg??n, CP 01020, Ciudad de M??xico. 
					<br /><br />
					???	V??a correo electr??nico: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c2f2322383e2d20233e252d3f232f252d200c2a39222f2523223c392e20252f2d622b232e62213462">[email&#160;protected]</a>
					<br /><br />
					???	Plataforma: Ciudadanos Alertadores Internos y Externos de la Corrupci??n. La plataforma de alertadores est?? dise??ada para atender casos graves de corrupci??n y/o en los que se requiere confidencialidad: <a href='https://alertadores.funcionpublica.gob.mx' target='_blank'>https://alertadores.funcionpublica.gob.mx</a> 
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#ERAI' aria-expanded='false'>
					<span class='icon-menu'></span>
					En caso de requerir atenci??n inmediata:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='ERAI'>
					Si desea hacer una consulta o recibir asesor??a inmediata respecto a las actividades del ??rgano Interno de Control en la SEP o en cuanto a la presentaci??n de peticiones ciudadanas, usted puede:
					<br /><br />
					??? Acudir de manera personal, a las oficinas que ocupa el ??rea de Quejas de este ??rgano Fiscalizador, ubicado en: Av. Universidad 1074, Col. Xoco, C.P. 03330, Alcald??a Benito Ju??rez, Ciudad de M??xico, en un horario 9:00 a 15:00 y de 16:00 a 18:00 horas, de lunes a viernes.
					<br /><br />
					??? De igual forma puede ingresar su escrito en Oficial??a de Partes Com??n, localizada en el referido domicilio de 9:00 a 15:00 horas o enviarla a trav??s del correo electr??nico: <a href="/cdn-cgi/l/email-protection#f8898d9d92998bb88b9d88d69f979ad69580"><span class="__cf_email__" data-cfemail="fa8b8f9f909b89ba899f8ad49d9598d49782">[email&#160;protected]</span></a>

				</div>
				
			</div>
		
		</div>
	</div>	

    <!-- Script -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script data-cfasync="false" src="./js/email-decode.min.js"></script><script>
		$(document).ready(function(){

			$(".btn_PRODEP").css({'color':'#fff','background':'#7D2C5A'});
			
			$(".btn_PRODEP").click(function(){
				$(".Ocultar").collapse('hide');
				$(".Mostrar_PRODEP").collapse('show');
				$(".accion").css({'color':'#fff','background':'#6576B4'});
				$(".btn_PRODEP").css({'color':'#fff','background':'#7D2C5A'});
			});
			
			$(".btn_Contraloria").click(function(){
				$(".Ocultar").collapse('hide');
				$(".Mostrar_Contraloria").collapse('show');
				$(".accion").css({'color':'#fff','background':'#6576B4'});
				$(".btn_Contraloria").css({'color':'#fff','background':'#7D2C5A'});
			});
			
			$(".btn_Documentos").click(function(){
				$(".Ocultar").collapse('hide');
				$(".Mostrar_Documento").collapse('show');
				$(".accion").css({'color':'#fff','background':'#6576B4'});
				$(".btn_Documentos").css({'color':'#fff','background':'#7D2C5A'});
			});

			$(".btn_Informes").click(function(){
				$(".Ocultar").collapse('hide');
				$(".Mostrar_Informe").collapse('show');
				$(".accion").css({'color':'#fff','background':'#6576B4'});
				$(".btn_Informes").css({'color':'#fff','background':'#7D2C5A'});
			});
			
			$(".btn_Quejas").click(function(){
				$(".Ocultar").collapse('hide');
				$(".Mostrar_Quejas").collapse('show');
				$(".accion").css({'color':'#fff','background':'#6576B4'});
				$(".btn_Quejas").css({'color':'#fff','background':'#7D2C5A'});
			});
		  
		});
	</script>

    <?php 
        include "./includes/footer.php";
    ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js" integrity="sha256-dHf/YjH1A4tewEsKUSmNnV05DDbfGN3g7NMq86xgGh8=" crossorigin="anonymous"></script>

</body>
</html>