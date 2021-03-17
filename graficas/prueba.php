<?php 
	require 'includes/dbconnection.php';
	$sql="SELECT * FROM tesis";
	$result=mysqli_query($conn,$sql);
	$num_row=mysqli_num_rows($result);
	////
	$sql1="SELECT * FROM articulos";
	$result1=mysqli_query($conn,$sql1);
	$num_row1=mysqli_num_rows($result1);
	/*
	$sql2="SELECT * FROM staff";
	$result2=mysqli_query($conn,$sql2);
	$num_row2=mysqli_num_rows($result2);
	*/
?>

<div id="graficaprueba" ></div>

<script type="text/javascript">
	var ultimateColors = [
  ['rgb(12, 183, 247)', 'rgb(0,128,128)', 'rgb(40, 100, 69)']];

	var data = [{
		values: [<?php echo $num_row; ?>, <?php echo $num_row1; ?>, /*<?php echo $num_row2; ?>*/0],
		labels: ['Tesis', 'Artículos', 'Proyectos'],
		type: 'pie',
		marker: {
  	colors: ultimateColors[0]
  }
	},
	];

	var layout = {
		height: 350,
		width: 390
	};

	Plotly.newPlot('graficaprueba', data, layout, {responsive: true});
</script>