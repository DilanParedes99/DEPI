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
					Contraloría Social
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Documentos accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Documentos Normativos
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Informes accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Informes Trimestrales
				</li>
				<li class='nav-item bg-secundario mr-1 text-center text-lg-left text-white font-weight-bold px-2 btn_Quejas accion smobile' style="cursor:pointer; padding: 10px 5px; border-radius: 5px; font-family: 'Montserrat', sans-serif;">
					Quejas, Denuncias o Petición
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
					¿Qué es el Programa para el Desarrollo Profesional Docente (PRODEP)?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='que_es'>
					Es el Programa para el Desarrollo Profesional Docente (PRODEP), que tiene como objetivo contribuir para que el personal docente y personal con funciones de dirección, de supervisión, de asesoría técnico pedagógica y cuerpos académicos accedan y/o concluyan programas de formación, actualización académica, capacitación y/o proyectos de investigación para fortalecer el perfil necesario para el desempeño de sus funciones.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PTS' aria-expanded='false'>
					<span class='icon-menu'></span>
					Para el Tipo Superior
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PTS'>
					Profesionalizar a las/los Profesores de Tiempo Completo, ofreciendo las mismas oportunidades a mujeres y hombres para acceder a los apoyos que otorga el Programa, a fin de que alcancen las capacidades de investigación-docencia, desarrollo tecnológico e innovación y con responsabilidad social; se articulen y consoliden en Cuerpos Académicos y con ello generen una nueva comunidad académica capaz de transformar su entorno.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#POP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Población Objetivo del Programa
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='POP'>
					El Programa está dirigido a Profesores de Tiempo Completo (PTC) que pertenecen a los Institutos Tecnológicos del TecNM (Federales y Descentralizados).
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#CGA' aria-expanded='false'>
					<span class='icon-menu'></span>
					Características generales de los apoyos (tipo, monto, periodo de ejecución y fecha de entrega).
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
						Los apoyos normalmente son entregados en el último trimestre de cada ejercicio presupuestal.
					</p>

				</div>
			
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#SDTB' aria-expanded='false'>
					<span class='icon-menu'></span>
					Son derechos de todos/as los/as beneficiarios/as:
				</div>
				
				<div style="cursor:pointer;" class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='SDTB'>
					<ul class="abc h6">
						<li> Recibir un trato atentento, digno y respetuoso, sin discriminación alguna. </li> <br/>
						<li> Recibir asesoría y apoyo sobre la operación del mismo de manera gratuita. </li> <br/>
						<li> 
							Tener acceso a la información necesaria de manera clara y oportuna, para resolver sus dudas respecto de las acciones del Programa. 
						</li> <br/>
						<li> 
							Recibir el comunicado por parte de las instancas ejecutoras sobra la asignación del recurso
						</li> <br/>
						<li> 
							Tener la reserva y privacidad de sus datos personales en los términos de lo establecido en la Ley General de Transparencia y Acceso a la Información Pública, la Ley Federal de Transparencia y Acceso a la Información Pública, su Reglamento y demás normativa jurídica aplicable. 
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
						Recibir la información correspondiente a las diferentes convocatorias que emite el Programa; y recibir la notificación de los resultados de las solicitudes presentadas por los/as PTC. 
					</li> <br/>
					<li> 
						Recibir la aportación de los recursos para el pago de los apoyos con base en la disponibilidad presupuestal de las Unidades Responsables. 
					</li> <br/>
				</ul>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#DB' aria-expanded='false'>
					<span class='icon-menu'></span>
					De los beneficiarios:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='DB'>
					<ul class="abc h6">
						<li> Recibir la notificación de los resultados de las solicitudes que presenten. </li> <br/>
						<li> Manifestar su inconformidad ante los resultados emitidos a sus solicitudes. </li> <br/>
						<li> Recibir los recursos autorizados de acuerdo a lo establecido en las cartas de liberación de recursos. Con base en la disponibilidad presupuestal de las UR. </li> <br/>
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
							Cumplir con las actividades comprometidas según el apoyo autorizado (proyectos de investigación o plan de trabajo). 
						</li> <br/>
						<li> 
							Presentar a la DSA y a su IES de adscripción los informes semestrales que reflejen el avance en actividades y ejercicio de los recursos autorizados, considerando los informes a partir de la fecha de notificación de los resultados, así como el informe final del impacto académico logrado con el apoyo recibido, mediante el formato electrónico establecido que se encuentra en el SISUP. 
						</li> <br/>
						<li> 
							Entregar a la IPES de adscripción la evidencia de las actividades realizadas durante el periodo del apoyo durante los primeros 15 días posteriores a la conclusión de la vigencia o bien, al presentar el informe final si el recurso se ejerce antes de este período. 
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
				Contraloría Social del Programa Presupuestario S247
			</div>
			
			<div class='col-12 collapse show' id='Grupo2'>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#que_es_cs' aria-expanded='false'>
					<span class='icon-menu'></span>
					¿Qué es la Contraloría Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='que_es_cs'>
					La Contraloría Social es un grupo de beneficiarios, que, de manera organizada, verificaran el cumplimiento de las metas y la correcta aplicación de los recursos públicos asignados al Programa PRODEP.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#VCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					¿Qué vigila la contraloría Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='VCS'>
					<ul>
						<li> 
							Que se difunda la información suficiente, veraz y oportuna sobre la operación del programa. 
						</li> <br/>
						<li> 
							Que los otorgamientos de los apoyos sean con calidad, calidez, eficiente, eficaz, oportuno y de manera transparente. 
						</li> <br/>
						<li> 
							Que las autoridades competentes brinden atención a las quejas o denuncias, relacionadas al programa.
						</li>
					</ul>
				</div>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#QCCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					¿Qué es un Comité de Contraloría Social?
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='QCCS'>
					Las formas de organización social constituidas por los beneficiarios referidas en el artículo 67 del Reglamento de la Ley General de Desarrollo Social, que llevan a cabo el seguimiento, supervisión y vigilancia de la ejecución, cumplimiento de las metas y acciones comprometidas, así como de la correcta aplicación de los recursos asignados a los mismos. 
				</div>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#OCCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					Objetivo de los Comités de Contraloría Social.
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='OCCS'>
					Colaborar en forma VOLUNTARIA ACTIVA y de manera representativa con organismos oficiales, seguimiento, supervisión y vigilancia de la ejecución, cumplimiento de las metas y acciones comprometidas en el Programa, así como de la correcta aplicación de los recursos asignados. 
				</div>

				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#CFDCCCS' aria-expanded='false'>
					<span class='icon-menu'></span>
					¿Cuáles son las funciones que deberán de cumplir los Comités de Contraloría Social?
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
							Capturar y canalizar las Quejas o Denuncias a las áreas correspondientes. 
						</li> <br/>
						<li> 
							Reportar cualquier anomalía que se presente durante el proceso de la ejecución y culminación de los recursos Financieros. 
						</li>
					</ul>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#DRCSDP' aria-expanded='false' id='DN'>
					<span class='icon-menu'></span>
					Medidas para promover la equidad de género entre hombres y mujeres en la integración de los Comités
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='DRCSDP'>
					Dentro del Programa para el Desarrollo Profesional Docente (PRODEP) mismo que se rige por Reglas de operaciones emitidas por la Secretaría de Hacienda y Crédito Público, donde menciona en el objetivo para el Tipo superior, “Profesionalizar a las/los PTC, ofreciendo las mismas oportunidades a mujeres y hombres para acceder a los apoyos que otorga el Programa, a fin de que alcancen las capacidades de investigación-docencia, desarrollo tecnológico e innovación y con responsabilidad social…” 
					<br /><br />
					Por lo anterior, podemos mencionar que para la formación de los comités deberán de ser de manera equitativa.

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
							Esquema de Contraloría Social 2021
						</a>
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Formato_1_PATCS_CS_2021.pdf" target="_blank"> 
							 Programa Anual de Trabajo de Contraloría Social "PATCS" 2021
						</a>
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-pdf text-danger'></span>
						<a href="doc_contraloria/Guia_Contraloria_Social_2021.pdf" target="_blank"> 
							Guía operativa de Contraloría Social 2021
						</a>
					</div>
					
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#FGP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Formatos de Guía Operativa
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
							FORMATO 3 "Acta de Registro de Comité"
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_4_Minuta_de_Reunion_de_Comite.docx" target="_blank"> 
							FORMATO 4 "Minuta de Reunión del Comité" 
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
							FORMATO 6 "Informe de Comité de Contraloría Social" 
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-word text-primary'></span>
						<a href="doc_contraloria/Formato_7_Acta_Sustitucion_de_Integrante_de_Comite.docx" target="_blank"> 
							FORMATO 7 "Acta Sustitución de Integrante de Comité"
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
							FORMATO 10 "Entrega de Material de Difusión y Capacitación Impartidas" 
						</a> 
					</div>
					<div class='w-100 py-1 border-bottom'>
						<span class='icon-file-excel text-success'></span>
						<a href="doc_contraloria/Formato_11_Registro_Integrantes_de_Comites_2021(DIRECTORIO).xlsx" target="_blank"> 
							FORMATO 11 "Registro de Integrantes de Comités 2021"
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
					Año 2021
				</div>
				
				<div class='col-12 h6 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='documentos_normativos'>
					
					<div class="alert alert-warning">No se ha cargado información.</div>

				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#FGP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Año 2020
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
					Los Comités de Contraloría Social podrán recibir de los beneficiarios del Programa para el Desarrollo Profesional Docente (PRODEP) las quejas y denuncias, de acuerdo a lo siguiente:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='CCS'>
					• Sobre la aplicación, ejecución y/o asistencia técnica del Programa, que puedan dar lugar al fincamiento de responsabilidades administrativas, civiles y/o penales, y turnarlas a las autoridades competentes para su atención.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PQDI' aria-expanded='false'>
					<span class='icon-menu'></span>
					Para alguna Queja o Denuncia interpuesta deberá de realizar el siguiente procedimiento:
				</div>
				
				<div class='col-12 h6 col-12 text-dark  mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PQDI'>
					<div class='tz-gallery text-center'>
						<a href="img/procedimiento_quejas_denuncias.png" target="_blank">
							<img src="img/procedimiento_quejas_denuncias.png" alt="Diagrama" class="img-fluid w-100" />
						</a>
						<br />
						<br />
						<p class='small text-tecnm font-weight-bold'>
							Diagrama 2 Procesos para la Atención o Canalización de Queja o Denuncia de Contraloría Social del PRODEP 
						</p>
						<p class='h6 font-weight-bold text-left'>
							(Para la descripción del diagrama anterior, favor de remitirse a la Guía Operativa de Contraloría Social en la página 31).
						</p>
						
					</div>
				</div>
		
				<div class='col-12 h5 font-italic col-12 text-center text-tecnm mt-2 mt-md-0 py-1'>
					Por lo anterior, y con el propósito de facilitar la comunicación con los beneficiarios del programa, el TecNM, ha dispuesto al personal responsable de acuerdo a lo siguiente:
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PTecNM' aria-expanded='false'>
					<span class='icon-menu'></span>
					Para el TecNM:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PTecNM'>
					Lic. Miguel Ángel Andrade Herrera, Enlace de Contraloría Social del TecNM: 
					<a href="/cdn-cgi/l/email-protection#e68589889294878a89948f879589858f878ab99689958194878289a6928385888bc88b9e">
						<span class="__cf_email__" data-cfemail="54373b3a202635383b263d35273b373d35380b243b27332635303b142031373a397a392c">[email&#160;protected]</span>
					</a>
					<br />
					<br />
					Las oficinas del Tecnológico Nacional de México, se encuentran ubicadas en Avenida Universidad Núm. 1200, piso 5 sector 5-3, Colonia Xoco, Alcaldía Benito Juárez, C.P. 03330, Ciudad de México, México o bien comunicarse al teléfono (01 55) 36-00-25-11, ext. 65083.
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#ATSEP' aria-expanded='false'>
					<span class='icon-menu'></span>
					A través de la SEP:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='ATSEP'>
					Para presentar quejas, denuncias, reconocimientos y sugerencias respecto a trámites correspondientes a la Secretaría de Educación Pública relacionados con la Educación Superior puede consultar la siguiente liga correspondiente al Órgano Interno de Control de la propia Secretaría:
					<br /><br />
					<a href='http://www.oic.sep.gob.mx/portal3/quejas2.php' target='_blank'>
						http://www.oic.sep.gob.mx/portal3/quejas2.php
					</a>
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#PSFP' aria-expanded='false'>
					<span class='icon-menu'></span>
					Por medio de la Secretaría de Función Pública:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='PSFP'>
					Para presentar quejas y denuncias, por el posible incumplimiento de las obligaciones de los servidores públicos pueden realizarse a través del portal del Sistema de Denuncia Ciudadana, <a href='https://sidec.funcionpublica.gob.mx/#!/' target='_blank'>https://sidec.funcionpublica.gob.mx/#!/,</a> de la Secretaría de la Función Pública.
					<br /><br />
					•	La aplicación para teléfono celular "Denuncia ciudadana de la Corrupción".
					<br /><br />
					•	Vía telefónica: En el interior de la República al 800 11 28 700 y en la Ciudad de México, 55 2000 2000.
					<br /><br />
					•	Presencial: En el módulo 3 de la Secretaría de la Función Pública ubicado en Av. Insurgentes Sur 1735, PB, Guadalupe Inn, Álvaro Obregón, Código Postal 01020, Ciudad de México.
					<br /><br />
					•	Vía correspondencia: Envía tu escrito a la Dirección General de Denuncias e Investigaciones de la Secretaría de la Función Pública en Av. Insurgentes Sur No. 1735, Piso 2 Ala Norte, Guadalupe Inn, Álvaro Obregón, CP 01020, Ciudad de México. 
					<br /><br />
					•	Vía correo electrónico: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4c2f2322383e2d20233e252d3f232f252d200c2a39222f2523223c392e20252f2d622b232e62213462">[email&#160;protected]</a>
					<br /><br />
					•	Plataforma: Ciudadanos Alertadores Internos y Externos de la Corrupción. La plataforma de alertadores está diseñada para atender casos graves de corrupción y/o en los que se requiere confidencialidad: <a href='https://alertadores.funcionpublica.gob.mx' target='_blank'>https://alertadores.funcionpublica.gob.mx</a> 
				</div>
				
				<div style="cursor:pointer;" class='col-12 h5 col-12 text-white mt-2 mt-md-0 py-1 bg-tecnm text-left' data-toggle='collapse' data-target='#ERAI' aria-expanded='false'>
					<span class='icon-menu'></span>
					En caso de requerir atención inmediata:
				</div>
				
				<div class='col-12 h6 col-12 text-dark mt-2 mt-md-0 py-1 bg-light text-justify collapse' id='ERAI'>
					Si desea hacer una consulta o recibir asesoría inmediata respecto a las actividades del Órgano Interno de Control en la SEP o en cuanto a la presentación de peticiones ciudadanas, usted puede:
					<br /><br />
					• Acudir de manera personal, a las oficinas que ocupa el Área de Quejas de este Órgano Fiscalizador, ubicado en: Av. Universidad 1074, Col. Xoco, C.P. 03330, Alcaldía Benito Juárez, Ciudad de México, en un horario 9:00 a 15:00 y de 16:00 a 18:00 horas, de lunes a viernes.
					<br /><br />
					• De igual forma puede ingresar su escrito en Oficialía de Partes Común, localizada en el referido domicilio de 9:00 a 15:00 horas o enviarla a través del correo electrónico: <a href="/cdn-cgi/l/email-protection#f8898d9d92998bb88b9d88d69f979ad69580"><span class="__cf_email__" data-cfemail="fa8b8f9f909b89ba899f8ad49d9598d49782">[email&#160;protected]</span></a>

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