<?php 
	 include "../../../ajax/dbconection.php";
	$sql="SELECT * FROM clientes";
	$result=mysqli_query($conn,$sql);
	$num_row=mysqli_num_rows($result);
	////
	$sql1="SELECT * FROM investigadores";
	$result1=mysqli_query($conn,$sql1);
	$num_row1=mysqli_num_rows($result1);
	/////
	$sql2="SELECT * FROM staff";
	$result2=mysqli_query($conn,$sql2);
	$num_row2=mysqli_num_rows($result2);
	
?>

<div id="graficaBarras"></div>


<script type="text/javascript">
	var trace1 = {
  x: ['Clientes', 'Investigadores', 'Staff'],
  y: [<?php echo $num_row; ?>, <?php echo $num_row1; ?>, <?php echo $num_row2; ?>],
  type: 'bar',
  text: ['Cantidad de clientes registrados', 'Cantidad de investigadores registrados', 'Cantidad de staff´s registrados'],
  marker: {
    color: 'rgb(0,250,154)'
  }
};

var data = [trace1];

var layout = {
  title: 'Usuarios Registrados',
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

	Plotly.newPlot('graficaBarras', data, layout);
</script>