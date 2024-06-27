<!-- <?php //echo json_encode($num_17);  
		?>
<br>
<?php //print_r($date_17); 
?>
<br>
<?php //print_r($num_20); 
?>
<br>
<?php //print_r($date_20); 
?>
<br>
<?php //print_r($num_05); 
?>
<br>
<?php //print_r($date_05); 
?>
<br>
<?php //print_r($num_08); 
?>
<br>
<?php //print_r($date_08); 
?>
<br> -->
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Count per month</title>
</head>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script> -->


<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<body>
	<div class="container-fulid">
		<div class="row">
			<div class="col-sm-3">
				<p><b>Day Shift 17:00</b></p>
				<div id="data_17" style="width:100%;"></div>
			</div>
			<div class="col-sm-3">
				<p><b>Day Shift 20:00</b></p>
				<div id="data_20" style="width:100%;"></div>
			</div>
			<div class="col-sm-3">
				<p><b>Night Shift 05:00</b></p>
				<div id="data_05" style="width:100%;"></div>
			</div>
			<div class="col-sm-3">
				<p><b>Night Shift 08:00</b></p>
				<div id="data_08" style="width:100%;"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h3>
					<center>
						<p><b>Overall</b></p>
					</center>
				</h3>
				<div id="month" style="width:100%;max-width:1370px"></div>
			</div>
		</div>

		<script>
			var x_data_17 = <?php echo json_encode($num_17); ?>;
			var y_data_17 = <?php echo json_encode($date_17); ?>;
			var x_data_20 = <?php echo json_encode($num_20); ?>;
			var y_data_20 = <?php echo json_encode($date_20); ?>;
			var x_data_05 = <?php echo json_encode($num_05); ?>;
			var y_data_05 = <?php echo json_encode($date_05); ?>;
			var x_data_08 = <?php echo json_encode($num_08); ?>;
			var y_data_08 = <?php echo json_encode($date_08); ?>;

			var data_17 = [{
				x: x_data_17,
				y: y_data_17,
				type: "bar",
				orientation: "h",
				marker: {
					color: "#AF7AC5"
				}
			}];

			var data_20 = [{
				x: x_data_20,
				y: y_data_20,
				type: "bar",
				orientation: "h",
				marker: {
					color: "#5499C7"
				}
			}];

			var data_05 = [{
				x: x_data_05,
				y: y_data_05,
				type: "bar",
				orientation: "h",
				marker: {
					color: "#F7DC6F"
				}
			}];

			var data_08 = [{
				x: x_data_08,
				y: y_data_08,
				type: "bar",
				orientation: "h",
				marker: {
					color: "#48C9B0"
				}
			}];
			Plotly.newPlot("data_17", data_17);
			Plotly.newPlot("data_20", data_20);
			Plotly.newPlot("data_05", data_05);
			Plotly.newPlot("data_08", data_08);

			var month_year = <?php echo json_encode($month_year); ?>;
			var num_year = <?php echo json_encode($num_year); ?>;

			var data = [{
				x: month_year,
				y: num_year,
				type: "bar"
			}];

			Plotly.newPlot("month", data);
		</script>

	</div>
</body>

</html>
