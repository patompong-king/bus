<?php
use PHPUnit\Framework\Constraint\Count;

$json_rep = file_get_contents('http://172.28.1.23/uvc_api_test/bus_report.php?req=report&date=' . $date);
$data_rep = json_decode($json_rep);
if ($data_rep != null) {
	$json_lo = file_get_contents('http://172.28.1.23/uvc_api_test/bus_report.php?req=location');
	$data_lo = json_decode($json_lo);
	$data = array();
	for ($i = 0; $i < count($data_lo); $i++) {
		$lo_c = $data_lo[$i]->location_code;
		$data['t05'][$lo_c] = array();
		$data['t08'][$lo_c] = array();
		$data['t17'][$lo_c] = array();
		$data['t20'][$lo_c] = array();
	}
	for ($i = 0; $i < count($data_lo); $i++) {
		$lo_c = $data_lo[$i]->location_code;
		$data['t05'][$lo_c] = $data_rep->t05->$lo_c;
		$data['t08'][$lo_c] = $data_rep->t08->$lo_c;
		$data['t17'][$lo_c] = $data_rep->t17->$lo_c;
		$data['t20'][$lo_c] = $data_rep->t20->$lo_c;
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>report</title>
</head>
<style>
	tr,
	th,
	td {
		border: 1px solid #000000;
	}

	th {
		text-align: center;
	}

	.bg-info,
	.bg-warning,
	.btn-info,
	.btn-warning {
		color: #515151;
	}

	.list-group-item {
		cursor: pointer;
	}

	.icon {
		font-size: 22px;
		-webkit-text-stroke: .5px;
	}

	.line {
		background-color: #53B035;
		color: #ffffff;
		border: none;
	}

	.line:hover {
		background-color: #3A9F1A;
	}

	.bi {
		-webkit-text-stroke: 1px;
	}

	html {
		scroll-behavior: smooth;
	}

	.scroll::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
		background-color: #FFFFFF;
	}

	.scroll::-webkit-scrollbar {
		width: 0px;
		background-color: #FFFFFF;
	}

	.scroll::-webkit-scrollbar-thumb {
		background: rgb(255, 255, 255);
		background: -moz-linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
		background: -webkit-linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
		background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FFFFFF", endColorstr="#FFFFFF", GradientType=1);
	}
</style>

<body>
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center g-2">
			<div class="col-lg-2 p-1">
				<form id="xxx" action="" method="post" class="justify-content-center align-items-center g-2">
					<input type="date" name="date" id="date" class="form-control" value="<?php echo $date; ?>"
						onchange="$('#xxx').submit()" style="width: 100%;font-size: 24px;font-weight: 700;">
				</form>
			</div>
			<div class="col-lg"></div>
			<div class="col-lg-4 text-middle text-center p-1">
				<ul class="list-group list-group-horizontal w-100">
					<li class="list-group-item w-100" style="background-color: #ffa200;color: #FFF;"
						onclick="$('#report_08').fadeOut(300,function() { $('#report_05').fadeOut(300,function() { $('#report_20').fadeOut(300,function() { $('#report_17').fadeIn(300,function() {  }) }) }) })">
						<h4>17:00 น.</h4>
					</li>
					<li class="list-group-item w-100" style="background-color: #8ac200;color: #FFF;"
						onclick="$('#report_08').fadeOut(300,function() { $('#report_05').fadeOut(300,function() { $('#report_17').fadeOut(300,function() { $('#report_20').fadeIn(300,function() {  }) }) }) })">
						<h4>20:00 น.</h4>
					</li>
					<li class="list-group-item w-100" style="background-color: #00ecff;color: #FFF;"
						onclick="$('#report_08').fadeOut(300,function() { $('#report_17').fadeOut(300,function() { $('#report_20').fadeOut(300,function() { $('#report_05').fadeIn(300,function() {  }) }) }) })">
						<h4>05:00 น.</h4>
					</li>
					<li class="list-group-item w-100" style="background-color: #4800ff;color: #FFF;"
						onclick="$('#report_17').fadeOut(300,function() { $('#report_20').fadeOut(300,function() { $('#report_05').fadeOut(300,function() { $('#report_08').fadeIn(300,function() {  }) }) }) })">
						<h4>08:00 น.</h4>
					</li>
				</ul>
			</div>
		</div>
		<div class="row justify-content-center align-items-center g-2">
			<div class="col">
				<div class="card" id="report_17">
					<div class="card-header justify-content-center align-items-center p-0"
						style="background-color: #ffa200;color: #FFF;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md text-start p-0">
									<button type="submit" class="btn btn-success btn-sm"
										style="font-size: 20px;font-weight: 600;"
										onclick="tableToExcel('17', '<?php echo date('d-m-y') . ' 17:00 น.'; ?>')"><i
											class="bi bi-filetype-xls icon"></i> Excel</button>
								</div>
								<div class="col-md text-end">
									<div class="card-title h4">
										<i class="bi bi-clock"></i> 17:00 น.
										<i class="bi bi-calendar3"></i>
										<?php echo date('d/m/y', strtotime($date)); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body scroll" id="17" style="height: 82vh;overflow-y: auto;">
						<?php if (isset($data_lo) && !empty($data_lo)) { ?>
							<?php for ($i = 0; $i < count($data_lo); $i++) { ?>
								<?php $lo = $data_lo[$i]->location_code; ?>
								<?php if (count($data['t17'][$lo]) > 0) { ?>
									<table style="width: 100%;" class="table">
										<thead>
											<tr>
												<th colspan="8" style="background-color: #ffa200;color: #FFF;">
													<i class="bi bi-pin-map"></i>
													<?php echo $data_lo[$i]->description; ?>
													<i class="bi bi-calendar3"></i>
													<?php echo date('d/m/y', strtotime($date)); ?>
													<i class="bi bi-clock"></i>
													17:00 น.
													<i class="bi bi-people"></i><span id="u_17_<?php echo $i; ?>"></span>
												</th>
												<th style="background-color: #ffa200;color: #FFF;"><button
														class="btn btn-success line btn-sm" style="width: 100%;"
														onclick="line('<?php echo $data_lo[$i]->description; ?>','17:00','<?php echo $date; ?>')"><i
															class="bi bi-line"></i> Line send </button></th>
											</tr>
											<tr>
												<th style="width: 2%;background-color: #ffa200;color: #FFF;">#</th>
												<th style="width: 8%;background-color: #ffa200;color: #FFF;">Emp code</th>
												<th style="width: 5%;background-color: #ffa200;color: #FFF;">Shop</th>
												<th style="width: 5%;background-color: #ffa200;color: #FFF;">Dept.</th>
												<th style="width: 5%;background-color: #ffa200;color: #FFF;">Shift</th>
												<th style="width: 20%;background-color: #ffa200;color: #FFF;">Name</th>
												<th style="width: 30%;background-color: #ffa200;color: #FFF;">Station</th>
												<th style="width: 15%;background-color: #ffa200;color: #FFF;">Tel.</th>
												<th style="width: 10%;background-color: #ffa200;color: #FFF;">Status</th>
											</tr>
										</thead>
										<tbody class="">
											<?php for ($j = 0; $j < count($data['t17'][$lo]); $j++) { ?>
												<tr>
													<th>
														<?php echo $j + 1; ?>
													</th>
													<th>
														<?php echo $data['t17'][$lo][$j]->staff_code; ?>
													</th>
													<th>
														<?php echo $data['t17'][$lo][$j]->shop; ?>
													</th>
													<th>
														<?php echo $data['t17'][$lo][$j]->shop2; ?>
													</th>
													<th>
														<?php echo $data['t17'][$lo][$j]->shift; ?>
													</th>
													<td>
														<?php echo $data['t17'][$lo][$j]->title . ' ' . $data['t17'][$lo][$j]->f_name . ' ' . $data['t17'][$lo][$j]->l_name . '(' . $data['t17'][$lo][$j]->nickname . ')'; ?>
													</td>
													<td>
														<?php echo $data['t17'][$lo][$j]->station; ?>
													</td>
													<td>
														<?php echo $data['t17'][$lo][$j]->phone; ?>
													</td>
													<td>
														<?php if ($data['t17'][$lo][$j]->status != '') { ?>
															<?php echo $data['t17'][$lo][$j]->status; ?>
														<?php } else { ?>
															<div style="font-size: 12px;">
																<?php echo date('d/m/y H:i', strtotime($data['t17'][$lo][$j]->create_date_time)); ?>
															</div>
														<?php } ?>
													</td>
												</tr>
											<?php } ?>
											<script>
												document.getElementById('u_17_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
											</script>
										</tbody>
									</table>
								<?php } ?>
							<?php } ?>
						<?php } ?>
					</div>
				</div>

				<div class="card" id="report_20" style="display: none;">
					<div class="card-header p-0" style="background-color: #8ac200;color: #FFF;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md text-start p-0">
									<button type="submit" class="btn btn-success btn-sm"
										style="font-size: 20px;font-weight: 600;"
										onclick="tableToExcel('20', '<?php echo date('d-m-y') . ' 20:00 น.'; ?>')"><i
											class="bi bi-filetype-xls icon"></i> Excel</button>
								</div>
								<div class="col-md text-end">
									<div class="card-title h4"><i class="bi bi-clock"></i> 20:00 น. <i
											class="bi bi-calendar3"></i>
										<?php echo date('d/m/y', strtotime($date)); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body scroll" id="20" style="height: 82vh;overflow-y: auto;">
						<?php if (isset($data_lo) && !empty($data_lo)) { ?>
						<?php for ($i = 0; $i < count($data_lo); $i++) { ?>
							<?php $lo = $data_lo[$i]->location_code; ?>
							<?php if (count($data['t20'][$lo]) > 0) { ?>
								<table style="width: 100%;" class="table">
									<thead>
										<tr>
											<th colspan="8" style="background-color: #8ac200;color: #FFF;">
												<i class="bi bi-pin-map"></i>
												<?php echo $data_lo[$i]->description; ?>
												<i class="bi bi-calendar3"></i>
												<?php echo date('d/m/y', strtotime($date)); ?>
												<i class="bi bi-clock"></i> 20:00 น. <i class="bi bi-people"></i> <span
													id="u_20_<?php echo $i; ?>"></span>
											</th>
											<th style="background-color: #8ac200;color: #FFF;"><button
													class="btn btn-success line btn-sm" style="width: 100%;"
													onclick="line('<?php echo $data_lo[$i]->description; ?>','20:00','<?php echo $date; ?>')"><i
														class="bi bi-line"></i> Line send </button></th>
										</tr>
										<tr>
											<th style="width: 2%;background-color: #8ac200;color: #FFF;">#</th>
											<th style="width: 8%;background-color: #8ac200;color: #FFF;">Emp code</th>
											<th style="width: 5%;background-color: #8ac200;color: #FFF;">Shop</th>
											<th style="width: 5%;background-color: #8ac200;color: #FFF;">Dept.</th>
											<th style="width: 5%;background-color: #8ac200;color: #FFF;">Shift</th>
											<th style="width: 20%;background-color: #8ac200;color: #FFF;">Name</th>
											<th style="width: 30%;background-color: #8ac200;color: #FFF;">Station</th>
											<th style="width: 15%;background-color: #8ac200;color: #FFF;">Tel.</th>
											<th style="width: 10%;background-color: #8ac200;color: #FFF;">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($j = 0; $j < count($data['t20'][$lo]); $j++) { ?>
											<tr>
												<th>
													<?php echo $j + 1; ?>
												</th>
												<th>
													<?php echo $data['t20'][$lo][$j]->staff_code; ?>
												</th>
												<th>
													<?php echo $data['t20'][$lo][$j]->shop; ?>
												</th>
												<th>
													<?php echo $data['t20'][$lo][$j]->shop2; ?>
												</th>
												<th>
													<?php echo $data['t20'][$lo][$j]->shift; ?>
												</th>
												<td>
													<?php echo $data['t20'][$lo][$j]->title . ' ' . $data['t20'][$lo][$j]->f_name . ' ' . $data['t20'][$lo][$j]->l_name . '(' . $data['t20'][$lo][$j]->nickname . ')'; ?>
												</td>
												<td>
													<?php echo $data['t20'][$lo][$j]->station; ?>
												</td>
												<td>
													<?php echo $data['t20'][$lo][$j]->phone; ?>
												</td>
												<td>
													<?php if ($data['t20'][$lo][$j]->status != '') { ?>
														<?php echo $data['t20'][$lo][$j]->status; ?>
													<?php } else { ?>
														<div style="font-size: 12px;">
															<?php echo date('d/m/y H:i', strtotime($data['t20'][$lo][$j]->create_date_time)); ?>
														</div>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
										<script>
											document.getElementById('u_20_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
										</script>
									</tbody>
								</table>
							<?php } ?>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
				<div class="card" id="report_05" style="display: none;">
					<div class="card-header p-0" style="background-color: #00ecff;color: #FFF;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md text-start p-0">
									<button type="submit" class="btn btn-success btn-sm"
										style="font-size: 20px;font-weight: 600;"
										onclick="tableToExcel('05', '<?php echo date('d-m-y') . ' 05:00 น.'; ?>')"><i
											class="bi bi-filetype-xls icon"></i> Excel</button>
								</div>
								<div class="col-md text-end">
									<div class="card-title h4"><i class="bi bi-clock"></i> 05:00 น. <i
											class="bi bi-calendar3"></i>
										<?php echo date('d/m/y', strtotime($date)); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body scroll" id="05" style="height: 82vh;overflow-y: auto;">
						<?php if (isset($data_lo) && !empty($data_lo)) { ?>
						<?php for ($i = 0; $i < count($data_lo); $i++) { ?>
							<?php $lo = $data_lo[$i]->location_code; ?>
							<?php if (count($data['t05'][$lo]) > 0) { ?>
								<table style="width: 100%;" class="table">
									<thead>
										<tr>
											<th colspan="8" style="background-color: #00ecff;color: #FFF;">
												<i class="bi bi-pin-map"></i>
												<?php echo $data_lo[$i]->description; ?>
												<i class="bi bi-calendar3"></i>
												<?php echo date('d/m/y', strtotime($date)); ?>
												<i class="bi bi-clock"></i> 05:00 น. <i class="bi bi-people"></i> <span
													id="u_05_<?php echo $i; ?>"></span>
											</th>
											<th style="background-color: #00ecff;color: #FFF;"><button
													class="btn btn-success line btn-sm" style="width: 100%;"
													onclick="line('<?php echo $data_lo[$i]->description; ?>','05:00','<?php echo $date; ?>')"><i
														class="bi bi-line"></i> Line send </button></th>
										</tr>
										<tr>
											<th style="width: 2%;background-color: #00ecff;color: #FFF;">#</th>
											<th style="width: 8%;background-color: #00ecff;color: #FFF;">Emp code</th>
											<th style="width: 5%;background-color: #00ecff;color: #FFF;">Shop</th>
											<th style="width: 5%;background-color: #00ecff;color: #FFF;">Dept.</th>
											<th style="width: 5%;background-color: #00ecff;color: #FFF;">Shift</th>
											<th style="width: 20%;background-color: #00ecff;color: #FFF;">Name</th>
											<th style="width: 30%;background-color: #00ecff;color: #FFF;">Station</th>
											<th style="width: 15%;background-color: #00ecff;color: #FFF;">Tel.</th>
											<th style="width: 10%;background-color: #00ecff;color: #FFF;">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($j = 0; $j < count($data['t05'][$lo]); $j++) { ?>
											<tr>
												<th>
													<?php echo $j + 1; ?>
												</th>
												<th>
													<?php echo $data['t05'][$lo][$j]->staff_code; ?>
												</th>
												<th>
													<?php echo $data['t05'][$lo][$j]->shop; ?>
												</th>
												<th>
													<?php echo $data['t05'][$lo][$j]->shop2; ?>
												</th>
												<th>
													<?php echo $data['t05'][$lo][$j]->shift; ?>
												</th>
												<td>
													<?php echo $data['t05'][$lo][$j]->title . ' ' . $data['t05'][$lo][$j]->f_name . ' ' . $data['t05'][$lo][$j]->l_name . '(' . $data['t05'][$lo][$j]->nickname . ')'; ?>
												</td>
												<td>
													<?php echo $data['t05'][$lo][$j]->station; ?>
												</td>
												<td>
													<?php echo $data['t05'][$lo][$j]->phone; ?>
												</td>
												<td>
													<?php if ($data['t05'][$lo][$j]->status != '') { ?>
														<?php echo $data['t05'][$lo][$j]->status; ?>
													<?php } else { ?>
														<div style="font-size: 12px;">
															<?php echo date('d/m/y H:i', strtotime($data['t05'][$lo][$j]->create_date_time)); ?>
														</div>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
										<script>
											document.getElementById('u_05_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
										</script>
									</tbody>
								</table>
							<?php } ?>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
				<div class="card" id="report_08" style="display: none;">
					<div class="card-header p-0" style="background-color: #4800ff;color: #FFF;">
						<div class="container-fluid">
							<div class="row">
								<div class="col-md text-start p-0">
									<button type="submit" class="btn btn-success btn-sm"
										style="font-size: 20px;font-weight: 600;"
										onclick="tableToExcel('08', '<?php echo date('d-m-y') . ' 08:00 น.'; ?>')"><i
											class="bi bi-filetype-xls icon"></i> Excel</button>
								</div>
								<div class="col-md text-end">
									<div class="card-title h4"><i class="bi bi-clock"></i> 08:00 น. <i
											class="bi bi-calendar3"></i>
										<?php echo date('d/m/y', strtotime($date)); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="card-body scroll" id="08" style="height: 82vh;overflow-y: auto;">
						<?php if (isset($data_lo) && !empty($data_lo)) { ?>
						<?php for ($i = 0; $i < count($data_lo); $i++) { ?>
							<?php $lo = $data_lo[$i]->location_code; ?>
							<?php if (count($data['t08'][$lo]) > 0) { ?>
								<table style="width: 100%;" class="table">
									<thead>
										<tr>
											<th colspan="8" style="background-color: #4800ff;color: #FFF;">
												<i class="bi bi-pin-map"></i>
												<?php echo $data_lo[$i]->description; ?>
												<i class="bi bi-calendar3"></i>
												<?php echo date('d/m/y', strtotime($date)); ?>
												<i class="bi bi-clock"></i> 08:00 น. <i class="bi bi-people"></i> <span
													id="u_08_<?php echo $i; ?>"></span>
											</th>
											<th style="background-color: #4800ff;color: #FFF;"><button
													class="btn btn-success line btn-sm" style="width: 100%;"
													onclick="line('<?php echo $data_lo[$i]->description; ?>','08:00','<?php echo $date; ?>')"><i
														class="bi bi-line"></i> Line send </button></th>
										</tr>
										<tr>
											<th style="width: 2%;background-color: #4800ff;color: #FFF;">#</th>
											<th style="width: 8%;background-color: #4800ff;color: #FFF;">Emp code</th>
											<th style="width: 5%;background-color: #4800ff;color: #FFF;">Shop</th>
											<th style="width: 5%;background-color: #4800ff;color: #FFF;">Dept.</th>
											<th style="width: 5%;background-color: #4800ff;color: #FFF;">Shift</th>
											<th style="width: 20%;background-color: #4800ff;color: #FFF;">Name</th>
											<th style="width: 30%;background-color: #4800ff;color: #FFF;">Station</th>
											<th style="width: 15%;background-color: #4800ff;color: #FFF;">Tel.</th>
											<th style="width: 10%;background-color: #4800ff;color: #FFF;">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php for ($j = 0; $j < count($data['t08'][$lo]); $j++) { ?>
											<tr>
												<th>
													<?php echo $j + 1; ?>
												</th>
												<th>
													<?php echo $data['t08'][$lo][$j]->staff_code; ?>
												</th>
												<th>
													<?php echo $data['t08'][$lo][$j]->shop; ?>
												</th>
												<th>
													<?php echo $data['t08'][$lo][$j]->shop2; ?>
												</th>
												<th>
													<?php echo $data['t08'][$lo][$j]->shift; ?>
												</th>
												<td>
													<?php echo $data['t08'][$lo][$j]->title . ' ' . $data['t08'][$lo][$j]->f_name . ' ' . $data['t08'][$lo][$j]->l_name . '(' . $data['t08'][$lo][$j]->nickname . ')'; ?>
												</td>
												<td>
													<?php echo $data['t08'][$lo][$j]->station; ?>
												</td>
												<td>
													<?php echo $data['t08'][$lo][$j]->phone; ?>
												</td>
												<td>
													<?php if ($data['t08'][$lo][$j]->status != '') { ?>
														<?php echo $data['t08'][$lo][$j]->status; ?>
													<?php } else { ?>
														<div style="font-size: 12px;">
															<?php echo date('d/m/y H:i', strtotime($data['t08'][$lo][$j]->create_date_time)); ?>
														</div>
													<?php } ?>
												</td>
											</tr>
										<?php } ?>
										<script>
											document.getElementById('u_08_<?php echo $i; ?>').innerHTML = ' <?php echo $j; ?> คน ';
										</script>
									</tbody>
								</table>
							<?php } ?>
						<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</body>
<script type="text/javascript">
	var tableToExcel = (function () {
		var uri = 'data:application/vnd.ms-excel;base64,',
			template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
			base64 = function (s) {
				return window.btoa(unescape(encodeURIComponent(s)))
			},
			format = function (s, c) {
				return s.replace(/{(\w+)}/g, function (m, p) {
					return c[p];
				})
			}
		return function (table, name) {
			if (!table.nodeType) table = document.getElementById(table)
			var ctx = {
				worksheet: name || 'Worksheet',
				table: table.innerHTML
			}
			window.location.href = uri + base64(format(template, ctx))
		}
	})()


	function line(lo, time, date) {
		// alert(lo+time+date);
		var myWindow = window.open("http://172.28.1.23/app/line_send.php?lo=" + lo + "&time=" + time + "&date=" + date, "_blank", "height=300,width=300");
	}
</script>