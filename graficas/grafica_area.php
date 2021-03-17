<?php
	include "../../../ajax/dbconection.php";
	mysqli_set_charset($conn,'utf8' );
	$sql = "SELECT DISTINCT areas.`Id_areas`, areas.`Nombre` FROM servicios INNER JOIN areas ON servicios.`Id_area`=areas.`Id_areas` INNER JOIN solicitudes ON servicios.`Id_servicios` = solicitudes.`Id_servicio`";
	$valoresX= array(); //Nombres de Areas
	$valoresY= array(); //Numero de servicios solicitados
	$result=mysqli_query($conn,$sql);
	while ($row= mysqli_fetch_array($result)) {
		$valoresX[]=$row[1];
		$sql = "SELECT areas.`Id_areas`, areas.`Nombre` FROM servicios INNER JOIN areas ON servicios.`Id_area`=areas.`Id_areas` INNER JOIN solicitudes ON servicios.`Id_servicios` = solicitudes.`Id_servicio` WHERE areas.`Id_areas`='".$row[0]."'";
		$result1=mysqli_query($conn,$sql);
		$NRows=mysqli_num_rows($result1);
		$valoresY[]=$NRows;
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
?>

<div id="gf"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">
	datosX = crearCadenaLineal('<?php echo $datosX ?>');
	datosY = crearCadenaLineal('<?php echo $datosY ?>');

	var Trace1 = {
		x: datosX,
		y: datosY,
		type: 'bar',
		marker: {
    color: 'rgb(0,250,154)'
  }
	};

	var layout = {
  title: 'Solicitudes por área',
  font:{
    family: 'Raleway, sans-serif'
  },
  showlegend: false,
  xaxis: {
    tickangle: -45
  },
  yaxis: {
    zeroline: false,
    gridwidth: 2
  },
  bargap :0.05
};

	var data = [Trace1];
	Plotly.newPlot('gf',data, layout);
</script>