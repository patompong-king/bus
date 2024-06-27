<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<form action="<?php echo site_url('Bus/'); ?>chart" method="post" id="ss">
				<input type="month" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
				</form>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6">
				<canvas id="myChart" width="100%" height="40px"></canvas>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<canvas id="myChart_2" width="400px" height="800px"></canvas>
			</div>
			<div class="col-sm-3">
				<canvas id="myChart_3" width="400px" height="800px"></canvas>
			</div>
			<div class="col-sm-3">
				<canvas id="myChart_4" width="400px" height="800px"></canvas>
			</div>
			<div class="col-sm-3">
				<canvas id="myChart_5" width="400px" height="800px"></canvas>
			</div>
		</div>
	</div>
	<script>
		var month_year = <?php echo json_encode($month_year); ?>;
		var num_year = <?php echo json_encode($num_year); ?>;
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart_1 = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($month_year); ?>,
				datasets: [{
					label: 'Counter user per month.',
					data: <?php echo json_encode($num_year); ?>,
					backgroundColor: [
						'rgba(255, 0, 0, 0.7)',
						'rgba(255, 109, 0, 0.7)',
						'rgba(255, 208, 0, 0.7)',
						'rgba(220, 255, 0, 0.7)',
						'rgba(121, 255, 0, 0.7)',
						'rgba(0, 255, 160, 0.7)',
						'rgba(0, 237, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(139, 0, 255, 0.7)',
						'rgba(255, 0, 226, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)'
					],
					borderColor: [
						'rgba(255, 0, 0, 1)',
						'rgba(255, 109, 0, 1)',
						'rgba(255, 208, 0, 1)',
						'rgba(220, 255, 0, 1)',
						'rgba(121, 255, 0, 1)',
						'rgba(0, 255, 160, 1)',
						'rgba(0, 237, 255, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(139, 0, 255, 1)',
						'rgba(255, 0, 226, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(0, 106, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});


		var ctx_2 = document.getElementById('myChart_2').getContext('2d');
		var myChart_2 = new Chart(ctx_2, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($date_17); ?>,
				datasets: [{
					label: 'Day Shift 17:00.',
					data: <?php echo json_encode($num_17); ?>,
					backgroundColor: [
						'rgba(255, 0, 0, 0.7)',
						'rgba(255, 109, 0, 0.7)',
						'rgba(255, 208, 0, 0.7)',
						'rgba(220, 255, 0, 0.7)',
						'rgba(121, 255, 0, 0.7)',
						'rgba(0, 255, 160, 0.7)',
						'rgba(0, 237, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(139, 0, 255, 0.7)',
						'rgba(255, 0, 226, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)'
					],
					borderColor: [
						'rgba(255, 0, 0, 1)',
						'rgba(255, 109, 0, 1)',
						'rgba(255, 208, 0, 1)',
						'rgba(220, 255, 0, 1)',
						'rgba(121, 255, 0, 1)',
						'rgba(0, 255, 160, 1)',
						'rgba(0, 237, 255, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(139, 0, 255, 1)',
						'rgba(255, 0, 226, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(0, 106, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				indexAxis: 'y',
			}
		});

		var ctx_3 = document.getElementById('myChart_3').getContext('2d');
		var myChart_3 = new Chart(ctx_3, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($date_20); ?>,
				datasets: [{
					label: 'Day Shift 20:00.',
					data: <?php echo json_encode($num_20); ?>,
					backgroundColor: [
						'rgba(255, 0, 0, 0.7)',
						'rgba(255, 109, 0, 0.7)',
						'rgba(255, 208, 0, 0.7)',
						'rgba(220, 255, 0, 0.7)',
						'rgba(121, 255, 0, 0.7)',
						'rgba(0, 255, 160, 0.7)',
						'rgba(0, 237, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(139, 0, 255, 0.7)',
						'rgba(255, 0, 226, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)'
					],
					borderColor: [
						'rgba(255, 0, 0, 1)',
						'rgba(255, 109, 0, 1)',
						'rgba(255, 208, 0, 1)',
						'rgba(220, 255, 0, 1)',
						'rgba(121, 255, 0, 1)',
						'rgba(0, 255, 160, 1)',
						'rgba(0, 237, 255, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(139, 0, 255, 1)',
						'rgba(255, 0, 226, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(0, 106, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				indexAxis: 'y',
			}
		});

		var ctx_4 = document.getElementById('myChart_4').getContext('2d');
		var myChart_4 = new Chart(ctx_4, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($date_05); ?>,
				datasets: [{
					label: 'Night Shift 05:00.',
					data: <?php echo json_encode($num_05); ?>,
					backgroundColor: [
						'rgba(255, 0, 0, 0.7)',
						'rgba(255, 109, 0, 0.7)',
						'rgba(255, 208, 0, 0.7)',
						'rgba(220, 255, 0, 0.7)',
						'rgba(121, 255, 0, 0.7)',
						'rgba(0, 255, 160, 0.7)',
						'rgba(0, 237, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(139, 0, 255, 0.7)',
						'rgba(255, 0, 226, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)'
					],
					borderColor: [
						'rgba(255, 0, 0, 1)',
						'rgba(255, 109, 0, 1)',
						'rgba(255, 208, 0, 1)',
						'rgba(220, 255, 0, 1)',
						'rgba(121, 255, 0, 1)',
						'rgba(0, 255, 160, 1)',
						'rgba(0, 237, 255, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(139, 0, 255, 1)',
						'rgba(255, 0, 226, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(0, 106, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				indexAxis: 'y',
			}
		});

		var ctx_5 = document.getElementById('myChart_5').getContext('2d');
		var myChart_5 = new Chart(ctx_5, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($date_08); ?>,
				datasets: [{
					label: 'Night Shift 08:00.',
					data: <?php echo json_encode($num_08); ?>,
					backgroundColor: [
						'rgba(255, 0, 0, 0.7)',
						'rgba(255, 109, 0, 0.7)',
						'rgba(255, 208, 0, 0.7)',
						'rgba(220, 255, 0, 0.7)',
						'rgba(121, 255, 0, 0.7)',
						'rgba(0, 255, 160, 0.7)',
						'rgba(0, 237, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(139, 0, 255, 0.7)',
						'rgba(255, 0, 226, 0.7)',
						'rgba(0, 106, 255, 0.7)',
						'rgba(0, 106, 255, 0.7)'
					],
					borderColor: [
						'rgba(255, 0, 0, 1)',
						'rgba(255, 109, 0, 1)',
						'rgba(255, 208, 0, 1)',
						'rgba(220, 255, 0, 1)',
						'rgba(121, 255, 0, 1)',
						'rgba(0, 255, 160, 1)',
						'rgba(0, 237, 255, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(139, 0, 255, 1)',
						'rgba(255, 0, 226, 1)',
						'rgba(0, 106, 255, 1)',
						'rgba(0, 106, 255, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				indexAxis: 'y',
			}
		});
	</script>
	<script>
		
		$('#date').change(function() {
				$("#ss").submit();
			});
	</script>
</body>

</html>
