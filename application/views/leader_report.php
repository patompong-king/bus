<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Report</title>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
	th {
		text-align: center;
	}
</style>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<div class="input-group">
					<input type="date" class="form-control" name="date" id="date" value="<?php echo $date; ?>"
						onchange="writ_table()">
					<button type="submit" class="btn btn-primary" onclick="writ_table()">ค้นหา</button>
				</div>
			</div>
			<div class="col"></div>
			<div class="col-md-1 text-center text-middle bg-warning text-white"
				onclick="$('#08').fadeOut(200,function (){ $('#05').fadeOut(200,function (){ $('#20').fadeOut(200,function (){ $('#17').fadeIn(200,function (){  }) }) }) })"
				style="cursor: pointer;">
				<h4>17:00 น.</h4>
			</div>
			<div class="col-md-1 text-center text-middle bg-info text-white"
				onclick="$('#08').fadeOut(200,function (){ $('#05').fadeOut(200,function (){ $('#17').fadeOut(200,function (){ $('#20').fadeIn(200,function (){  }) }) }) })"
				style="cursor: pointer;">
				<h4>20:00 น.</h4>
			</div>
			<div class="col-md-1 text-center text-middle bg-primary text-white"
				onclick="$('#08').fadeOut(200,function (){ $('#17').fadeOut(200,function (){ $('#20').fadeOut(200,function (){ $('#05').fadeIn(200,function (){  }) }) }) })"
				style="cursor: pointer;">
				<h4>05:00 น.</h4>
			</div>
			<div class="col-md-1 text-center text-middle bg-dark text-white"
				onclick="$('#17').fadeOut(200,function (){ $('#05').fadeOut(200,function (){ $('#20').fadeOut(200,function (){ $('#08').fadeIn(200,function (){  }) }) }) })"
				style="cursor: pointer;">
				<h4>08:00 น.</h4>
			</div>
		</div>
	</div>


	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<div id="17" class="card" style="">
					<input type="button" class="btn btn-sm btn-success" style="position: absolute;width: 200px;"
						onclick="var file = document.getElementById('date').value; file = file + ' 17'; tableToExcel('17', file)"
						value="Export to Excel">

					<table class="table table-bordered" style="width: 100%;font-size: 12px;">
						<tr class="bg-warning text-white" style="background-color: #FFBE3D;">
							<th colspan="11" class="bg-warning text-white">
								<b>
									<center>
										<?php echo $_SESSION['shop']; ?> วันที่ <span id="17_date"></span> เวลา 17:00 น.
									</center>
								</b>
							</th>
						</tr>
						<tr style="background-color: #FFBE3D;">
							<th class="bg-warning text-white">No.</th>
							<th class="bg-warning text-white">Emp Code</th>
							<th class="bg-warning text-white">Shop</th>
							<th class="bg-warning text-white">Dept.</th>
							<th class="bg-warning text-white">Shift</th>
							<th class="bg-warning text-white">Name</th>
							<th class="bg-warning text-white">Location</th>
							<th class="bg-warning text-white">Station</th>
							<th class="bg-warning text-white">Phone</th>
							<th class="bg-warning text-white">Status</th>
							<th class="bg-warning text-white">Last Update</th>
						</tr>
						<tbody id="body_17"></tbody>
					</table>
				</div>
				<div id="20" class="card" style="display:none">
					<input type="button" class="btn btn-sm btn-success" style="position: absolute;width: 200px;"
						onclick="var file = document.getElementById('date').value; file = file + ' 20'; tableToExcel('20', file)"
						value="Export to Excel">

					<table class="table table-bordered" style="width: 100%;font-size: 12px;">
						<tr class="bg-info text-white" style="background-color: #3DFFF9;">
							<th colspan="11" class="bg-info text-white">
								<b>
									<center>
										<?php echo $_SESSION['shop']; ?> วันที่ <span id="20_date"></span> เวลา 20:00 น.
									</center>
								</b>
							</th>
						</tr>
						<tr class="bg-info text-white" style="background-color: #3DFFF9;">
							<th class="bg-info text-white">No.</th>
							<th class="bg-info text-white">Emp Code</th>
							<th class="bg-info text-white">Shop</th>
							<th class="bg-info text-white">Dept.</th>
							<th class="bg-info text-white">Shift</th>
							<th class="bg-info text-white">Name</th>
							<th class="bg-info text-white">Location</th>
							<th class="bg-info text-white">Station</th>
							<th class="bg-info text-white">Phone</th>
							<th class="bg-info text-white">Status</th>
							<th class="bg-info text-white">Last Update</th>
						</tr>
						<tbody id="body_20"></tbody>
					</table>
				</div>
				<div id="05" class="card" style="display:none">
					<input type="button" class="btn btn-sm btn-success" style="position: absolute;width: 200px;"
						onclick="var file = document.getElementById('date').value; file = file + ' 05'; tableToExcel('05', file)"
						value="Export to Excel">

					<table class="table table-bordered" style="width: 100%;font-size: 12px;">
						<tr class="bg-primary text-white" style="background-color: #403DFF;">
							<th colspan="11" class="bg-primary text-white">
								<b>
									<center>
										<?php echo $_SESSION['shop']; ?> วันที่ <span id="05_date"></span> เวลา 05:00 น.
									</center>
								</b>
							</th>
						</tr>
						<tr class="bg-primary text-white" style="background-color: #403DFF;">
							<th class="bg-primary text-white">No.</th>
							<th class="bg-primary text-white">Emp Code</th>
							<th class="bg-primary text-white">Shop</th>
							<th class="bg-primary text-white">Dept.</th>
							<th class="bg-primary text-white">Shift</th>
							<th class="bg-primary text-white">Name</th>
							<th class="bg-primary text-white">Location</th>
							<th class="bg-primary text-white">Station</th>
							<th class="bg-primary text-white">Phone</th>
							<th class="bg-primary text-white">Status</th>
							<th class="bg-primary text-white">Last Update</th>
						</tr>
						<tbody id="body_05"></tbody>
					</table>
				</div>
				<div id="08" class="card" style="display:none">
					<input type="button" class="btn btn-sm btn-success" style="position: absolute;width: 200px;"
						onclick="var file = document.getElementById('date').value; file = file + ' 08'; tableToExcel('08', file)"
						value="Export to Excel">

					<table class="table table-bordered" style="width: 100%;font-size: 12px;">
						<tr style="background-color: #FCFF3D;">
							<th colspan="11" class="bg-dark text-white">
								<b>
									<center>
										<?php echo $_SESSION['shop']; ?> วันที่ <span id="08_date"></span> เวลา 08:00 น.
									</center>
								</b>
							</th>
						</tr>
						<tr class="bg-dark text-white" style="background-color: #FCFF3D;">
							<th class="bg-dark text-white">No.</th>
							<th class="bg-dark text-white">Emp Code</th>
							<th class="bg-dark text-white">Shop</th>
							<th class="bg-dark text-white">Dept.</th>
							<th class="bg-dark text-white">Shift</th>
							<th class="bg-dark text-white">Name</th>
							<th class="bg-dark text-white">Location</th>
							<th class="bg-dark text-white">Station</th>
							<th class="bg-dark text-white">Phone</th>
							<th class="bg-dark text-white">Status</th>
							<th class="bg-dark text-white">Last Update</th>
						</tr>
						<tbody id="body_08"></tbody>
					</table>
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
</script>
<script>
	function writ_table() {
		var shop = "<?php echo $_SESSION['shop']; ?>";
		var date = document.getElementById('date').value;

		document.getElementById('17_date').innerHTML = date;
		document.getElementById('20_date').innerHTML = date;
		document.getElementById('05_date').innerHTML = date;
		document.getElementById('08_date').innerHTML = date;
		// alert(date);
		writ_table_data(shop, date, '17:00:00', 'body_17');
		writ_table_data(shop, date, '20:00:00', 'body_20');
		writ_table_data(shop, date, '05:00:00', 'body_05');
		writ_table_data(shop, date, '08:00:00', 'body_08');
		// table += writ_table_data(shop, date, '20:00:00');
		// table += writ_table_data(shop, date, '05:00:00');
		// table += writ_table_data(shop, date, '08:00:00');
	}
	function writ_table_data(shop, date, time, id) {
		var request = new XMLHttpRequest();
		var link = '<?php echo site_url('Bus/'); ?>leader_report_data?shop=' + shop + '&date=' + date + '&time=' + time;
		var request = new XMLHttpRequest()
		request.open('GET', link, true)
		request.onload = function () {
			// Begin accessing JSON data here
			var data = JSON.parse(this.response)
			var a = '';
			if (request.status >= 200 && request.status < 400) {
				i = 0;
				a = '<table class="table table-bordered" style="width: 100%;font-size: 12px;">';
				data.forEach((x) => {
					i++;
					a += '<tr>';
					a += '<th>' + i + '</th>';
					a += '<td>' + x.staff_code + '</td>';
					a += '<th>' + x.shop + '</th>';
					a += '<th>' + x.shop2 + '</th>';
					a += '<th>' + x.shift + '</th>';
					a += '<td>' + x.title + x.f_name + ' ' + x.l_name + ' (' + x.nickname + ')</td>';
					a += '<td>' + x.description + '</td>';
					a += '<td>' + x.station + '</td>';
					a += '<td>' + x.phone + '</td>';
					a += '<th>' + x.status + '' + x.comment + '</th>';
					a += '<td>' + x.create_date_time + '</td>';
					a += '</tr>';
				})
				a += '<table>';
				document.getElementById(id).innerHTML = a;
			} else {
				console.log('error')
			}
		}
		request.send()
	}

	writ_table();
</script>

</html>