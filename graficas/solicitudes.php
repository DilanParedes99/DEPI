<?php 

	
?>


<div id="graficasolicitudes"></div>


<script type="text/javascript">
var ultimateColors = [
  ['rgb(12, 183, 247)', 'rgb(3, 189, 14)', 'rgb(227, 44, 44)']];

var data = [{
//  values: [<?php echo $num_row2; ?>, <?php echo $num_row; ?>, <?php echo $num_row1; ?>],
    values: [5, 3, 9],

  labels: ['Inicial', 'Aceptado', 'Rechazado'],
  type: 'pie',
  marker: {
  	colors: ultimateColors[0]
  }
},

];

var layout = {
  title: 'Solicitudes',
  font:{
    family: 'Raleway, sans-serif'
  },
  height: 400,
  width: 500
};

Plotly.newPlot('graficasolicitudes', data, layout);
	

</script>