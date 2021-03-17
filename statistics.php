<?php session_start(); ?>
<?php 
require 'includes/dbconnection.php';
$sql="SELECT * FROM tesis";
$result=mysqli_query($conn,$sql);
$num_row=mysqli_num_rows($result);
	////
$sql1="SELECT * FROM articulos";
$result1=mysqli_query($conn,$sql1);
$num_row1=mysqli_num_rows($result1);

$sql2="SELECT * FROM proyectos";
$result2=mysqli_query($conn,$sql2);
$num_row2=mysqli_num_rows($result2);


$sql3="SELECT * FROM instituciones";
$result3=mysqli_query($conn,$sql3);
$num_row3=mysqli_num_rows($result3);
	/*
	$sql2="SELECT * FROM staff";
	$result2=mysqli_query($conn,$sql2);
	$num_row2=mysqli_num_rows($result2);
	*/
	?>



	<!DOCTYPE html>
	<html lang="es-MX">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Estadísticas</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="statistics.css" rel="stylesheet" />
		<script src="https://kit.fontawesome.com/47a5d5df4f.js" crossorigin="anonymous"></script>
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="./resources/owl/owl.carousel.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



		<?php 
		include "./includes/navbar.php";
		?>
	</head>
	<body>

		<div class="container mt-4">
			<h1 class="text-center mb-3">¡Bienvenido al panel de Estadísticas!</h1>				
		</div>

		<div class="container-fluid pt-4">
			<!-- Card stats -->
			<div class="row pt-1" >
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Tesis</h5>
									<span class="h2 font-weight-bold mb-0">
										<h2 class="timer count-title count-number" data-to="<?php echo $num_row; ?>" data-speed="1500"></h2>
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-danger text-white rounded-circle shadow">
										<i class="fas fa-book-open"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Articulos</h5>
									<span class="h2 font-weight-bold mb-0"><h2 class="timer count-title count-number" data-to="<?php echo $num_row1; ?>" data-speed="1500"></h2></span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
										<i class="far fa-newspaper"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4">
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Proyectos</h5>
									<span class="h2 font-weight-bold mb-0"><h2 class="timer count-title count-number" data-to="<?php echo $num_row2; ?>" data-speed="1500"></h2> </span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
										<i class="fas fa-users"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-6">
					<div class="card card-stats mb-4">
						<div class="card-body">
							<div class="row">
								<div class="counter"></div>
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Tecnológicos</h5>
									<span class="h2 font-weight-bold mb-0"><h2 class="timer count-title count-number" data-to="4" data-speed="1500"></h2>
									</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-warning text-white rounded-circle shadow">
										<i class="fas fa-school"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="container pb-5" style="margin-top: 3rem;">
			<ul class="nav nav-pills mb-3  nav-justified navbar-light mb-3 pt-1" style="background-color: #e3f2fd;" id="pills-tab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Total de Documentos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Documentos Subidos por Mes</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="card text-center">
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">									
							<div class="card-body">
								<h5 class="card-title">Total de Tesis, Artículos y Proyectos</h5>
								<p class="card-text"> 
									<div class="d-flex justify-content-center">

										<div class="align-self-center" style="margin-left:-60px;">
											<?php 
											include "graficas/prueba.php";
											?>

										</div>
									</div>


								</p>
							</div></div>
							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<div class="card-body">
									<h5 class="card-title">Documentos subidos en cada mes</h5>
									<p class="card-text"> 
										<div class="d-flex justify-content-center">

											<div class="align-self-center" style="margin-left:-60px;">
												<?php 
												include "graficas/proyectos.php";
												?>

											</div>
										</div>


									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		




<!--

			<div class="container justify-content-center pb-5">
				<div class="container d-flex justify-content-center"> <h1 class="text-center mb-3">¡Generar Excel!</h1></div>

				<button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">
					GENERAR
				</button>

				
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalCenterTitle">Generar reporte en Excel</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="container d-flex justify-content-center">
									<form method="post" class="form" action="phpspreadsheet/prueba.php">

										<div class="container justify-content-center mb-3">
											<label>SELECCIONA UN TIPO DE DOCUMENTO</label>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="exampleRadios[]" id="exampleRadios1" value="1">
												<label class="form-check-label" for="exampleRadios1">
													Articulos
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="exampleRadios[]" id="exampleRadios2" value="2" checked>
												<label class="form-check-label" for="exampleRadios2">
													Tesis
												</label>
											</div>
											<div class="form-check">
												<input class="form-check-input" type="radio" name="exampleRadios[]" id="exampleRadios3" value="3" disabled>
												<label class="form-check-label" for="exampleRadios3">
													Proyectos
												</label>
											</div>
										</div>
										<br>
										<div class="container justify-content-center mb-3">
											<label>¿Deseas usar filtros?</label>
											<select class="form-control" id="tipo" onchange="changeDisplay('fecha')">
												<option selected disabled></option>
												<option>Si</option>
												<option>NO</option>
											</select>
										</div>
										<div id="extra">
											
										</div>
										<div id="fecha" style="display: none";>
											<label>Seleccionar fecha entre la fecha:</label>
											<input type="date" name="fecha1" >
											<br>
											<label>y la fecha:</label>											
											<input type="date" name="fecha2" >
											<br>
											<br>
											<div class="container justify-content-center mb-3">
											<label>Género del autor</label>
											<select class="form-control" id="tipo">
												<option selected disabled></option>
												<option>Hombre</option>
												<option>Mujer</option>
											</select>
										</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-info">Generar Excel</button>	</form>
								</div>
							</div>
						</div>
					</div>


				</div>

-->




				<?php 
				include "./includes/footer.php";
				?>

			</body>
			</html>
			<script type="text/javascript">
				function changeDisplay (id) {
					d=document.getElementById("extra");
					e=document.getElementById(id);
					if (e.style.display == 'none' || e.style.display == "") {
						e.style.display = 'block';
					} else {
						e.style.display = 'none';
					}
				}
			</script>



			<script type="text/javascript">
				(function ($) {
					$.fn.countTo = function (options) {
						options = options || {};

						return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
			increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
			$self = $(this),
			loopCount = 0,
			value = settings.from,
			data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
					};

					$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 10000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

				jQuery(function ($) {
	// custom formatting example
	$('.count-number').data('countToOptions', {
		formatter: function (value, options) {
			return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
		}  });
	
	// start all the timers
	$('.timer').each(count);  
	
	function count(options) {
		var $this = $(this);
		options = $.extend({}, options || {}, $this.data('countToOptions') || {});
		$this.countTo(options);
	}
});
</script>
