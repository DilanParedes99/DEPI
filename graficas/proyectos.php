<?php 
	 

	require 'includes/dbconnection.php';
  $sq="SELECT * FROM articulos WHERE MONTH(fechaSubida)='01'";
  $resu=mysqli_query($conn,$sq);
  $num=mysqli_num_rows($resu);

  $sql="SELECT * FROM tesis WHERE MONTH(fechaSubida)='01'";
	$result=mysqli_query($conn,$sql);
	$num_row=mysqli_num_rows($result);
  $num_row=$num_row+$num;
	////
  $sq1="SELECT * FROM articulos WHERE MONTH(fechaSubida)='02'";
  $resu1=mysqli_query($conn,$sq1);
  $num1=mysqli_num_rows($resu1);

	$sql1="SELECT * FROM tesis WHERE MONTH(fechaSubida)='02'";
	$result1=mysqli_query($conn,$sql1);
	$num_row1=mysqli_num_rows($result1);
  $num_row1=$num_row1+$num1;
	/////
  $sq2="SELECT * FROM articulos WHERE MONTH(fechaSubida)='03'";
  $resu2=mysqli_query($conn,$sq2);
  $num2=mysqli_num_rows($resu2);

	$sql2="SELECT * FROM tesis WHERE MONTH(fechaSubida)='03'";
	$result2=mysqli_query($conn,$sql2);
	$num_row2=mysqli_num_rows($result2);
  $num_row2=$num_row2+$num2;
  /////
  $sq3="SELECT * FROM articulos WHERE MONTH(fechaSubida)='04'";
  $resu3=mysqli_query($conn,$sq3);
  $num3=mysqli_num_rows($resu3);

  $sql3="SELECT * FROM tesis WHERE MONTH(fechaSubida)='04'";
  $result3=mysqli_query($conn,$sql3);
  $num_row3=mysqli_num_rows($result3);
  $num_row3=$num_row3+$num3;
  /////
  $sq4="SELECT * FROM articulos WHERE MONTH(fechaSubida)='05'";
  $resu4=mysqli_query($conn,$sq4);
  $num4=mysqli_num_rows($resu4);

  $sql4="SELECT * FROM tesis WHERE MONTH(fechaSubida)='05'";
  $result4=mysqli_query($conn,$sql4);
  $num_row4=mysqli_num_rows($result4);
  $num_row4=$num_row4+$num4;
  /////
  $sq5="SELECT * FROM articulos WHERE MONTH(fechaSubida)='06'";
  $resu5=mysqli_query($conn,$sq5);
  $num5=mysqli_num_rows($resu5);

  $sql5="SELECT * FROM tesis WHERE MONTH(fechaSubida)='06'";
  $result5=mysqli_query($conn,$sql5);
  $num_row5=mysqli_num_rows($result5);
  $num_row5=$num_row5+$num5;
  /////
  $sq6="SELECT * FROM articulos WHERE MONTH(fechaSubida)='07'";
  $resu6=mysqli_query($conn,$sq6);
  $num6=mysqli_num_rows($resu6);

  $sql6="SELECT * FROM tesis WHERE MONTH(fechaSubida)='07'";
  $result6=mysqli_query($conn,$sql6);
  $num_row6=mysqli_num_rows($result6);
  $num_row6=$num_row6+$num6;
  /////
  $sq7="SELECT * FROM articulos WHERE MONTH(fechaSubida)='08'";
  $resu7=mysqli_query($conn,$sq7);
  $num7=mysqli_num_rows($resu7);

  $sql7="SELECT * FROM tesis WHERE MONTH(fechaSubida)='08'";
  $result7=mysqli_query($conn,$sql7);
  $num_row7=mysqli_num_rows($result7);
  $num_row7=$num_row7+$num7;
  /////
  $sq8="SELECT * FROM articulos WHERE MONTH(fechaSubida)='09'";
  $resu8=mysqli_query($conn,$sq8);
  $num8=mysqli_num_rows($resu8);

  $sql8="SELECT * FROM tesis WHERE MONTH(fechaSubida)='09'";
  $result8=mysqli_query($conn,$sql8);
  $num_row8=mysqli_num_rows($result8);    
  $num_row8=$num_row8+$num8;
  /////
  $sq9="SELECT * FROM articulos WHERE MONTH(fechaSubida)='10'";
  $resu9=mysqli_query($conn,$sq9);
  $num9=mysqli_num_rows($resu9);

  $sql9="SELECT * FROM tesis WHERE MONTH(fechaSubida)='10'";
  $result9=mysqli_query($conn,$sql9);
  $num_row9=mysqli_num_rows($result9);
  $num_row9=$num_row9+$num9;
  /////
  $sq10="SELECT * FROM articulos WHERE MONTH(fechaSubida)='11'";
  $resu10=mysqli_query($conn,$sq10);
  $num10=mysqli_num_rows($resu10);

  $sql10="SELECT * FROM tesis WHERE MONTH(fechaSubida)='11'";
  $result10=mysqli_query($conn,$sql10);
  $num_row10=mysqli_num_rows($result10);
  $num_row10=$num_row10+$num10;
  /////
  $sq11="SELECT * FROM articulos WHERE MONTH(fechaSubida)='12'";
  $resu11=mysqli_query($conn,$sq11);
  $num11=mysqli_num_rows($resu11);

  $sql11="SELECT * FROM tesis WHERE MONTH(fechaSubida)='12'";
  $result11=mysqli_query($conn,$sql11);
  $num_row11=mysqli_num_rows($result11);  	
  $num_row11=$num_row11+$num11;
?>
 
<div id="graficaProyectos""></div>


<script type="text/javascript">
	var trace1 = {
  x: ['En', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ag', 'Set', 'Oct', 'Nom', 'Dic'],
  y: [<?php echo $num_row; ?>,<?php echo $num_row1; ?>,<?php echo $num_row2; ?>,<?php echo $num_row3; ?>,<?php echo $num_row4; ?>,<?php echo $num_row5; ?>,<?php echo $num_row6; ?>,<?php echo $num_row7; ?>,<?php echo $num_row8; ?>,<?php echo $num_row9; ?>,<?php echo $num_row10; ?>,<?php echo $num_row11; ?>],
  type: 'bar',
  text: ['Articulos/Tesis subidos en Enero', 'Articulos/Tesis subidos en Febrero', 'Articulos/Tesis subidos en Marzo','Articulos/Tesis subidos en Abril', 'Articulos/Tesis subidos en Mayo', 'Articulos/Tesis subidos en Junio','Articulos/Tesis subidos en Julio', 'Articulos/Tesis subidos en Agosto', 'Articulos/Tesis subidos en Septiembre','Articulos/Tesis subidos en Octubre', 'Articulos/Tesis subidos en Noviembre', 'Articulos/Tesis subidos en Diciembre'],
  marker: {
    color: 'rgb(0,128,128)',
    line: {
            width: 2.5
        }
  }
};

var data = [trace1];

var layout = {
      height: 450,
    width: 420,
  font:{
    family: 'Raleway, sans-serif'
  },
  showlegend: false,
  xaxis: {
    tickangle: -10
  },
  yaxis: {
    zeroline: true,
    gridwidth: 1
  },
  bargap :0.05
};

	Plotly.newPlot('graficaProyectos', data, layout, {responsive: true});
</script>