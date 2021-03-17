<?php
	include "../../../ajax/dbconection.php";
	mysqli_set_charset($conn,'utf8' );
	$sql = "SELECT DISTINCT investigadores.`Id_investigador`, investigadores.`Nombre` FROM gastos INNER JOIN investigadores ON gastos.`Id_investigador`=investigadores.`Id_investigador`";
	$valoresX= array(); //Nombres de Investigadores
	$valoresY= array(); //Costo total
	$result=mysqli_query($conn,$sql);
	while ($row= mysqli_fetch_array($result)) {
		$valoresX[]=$row[1];
		$sql1 = "SELECT SUM(Costo) FROM gastos INNER JOIN investigadores ON gastos.`Id_investigador`=investigadores.`Id_investigador` WHERE investigadores.`Id_investigador`='".$row[0]."'";

		$result1=mysqli_query($conn,$sql1);
		while($row1= mysqli_fetch_array($result1)){

		$valoresY[]=$row1[0];
		echo "<br>";	
		}
	}

	$datosX=json_encode($valoresX);
	$datosY=json_encode($valoresY);
?>

<div id="GraficaLine"></div>

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
    color: 'rgb(41,172,221)'
  }
	};

	var layout = {
  title: 'Costos',
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
	Plotly.newPlot('GraficaLine',data, layout);
</script>