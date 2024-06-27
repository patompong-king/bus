<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>

<body>
<script>
// function test(){
// 	window.open(document.URL, '_blank', 'location=yes,height=570,width=520,scrollbars=yes,status=yes');
// }
</script>
<!-- <a onclick="test()">
Open New Window
</a> -->
	<div class="w3-container">
		<div class="w3-bar">
			<div class="w3-dropdown-click">
				<button onclick="myFunction()" class="w3-button w3-black">จำนวนพนังงาน ในแต่ละสายรถ</button>
				<div id="emps" class="w3-dropdown-content w3-bar-block w3-border">
					<?php foreach ($emp_lo as $x) { ?>
						<a class="w3-bar-item w3-button"><?php echo $x->description . ' ' . $x->num_staff . ' คน'; ?></a>
					<?php } ?>
				</div>

				<script>
					function myFunction() {
						var x = document.getElementById("emps");
						if (x.className.indexOf("w3-show") == -1) {
							x.className += " w3-show";
						} else {
							x.className = x.className.replace(" w3-show", "");
						}
					}
				</script>
			</div>
			<form action="" method="post" id="ss">
				<select name="shop" id="shop" class="w3-bar-item w3-button w3-brown w3-border">
					<option value="">SHOP</option>
					<?php foreach ($shop as $x) { ?>
						<option value="<?php echo $x->shop; ?>" <?php if ($shop_ == $x->shop) {
																	echo 'selected';
																} ?>><?php echo $x->shop; ?></option>';
					<?php } ?>
				</select>
				<select name="dept" id="dept" class="w3-bar-item w3-button w3-deep-purple w3-border">
					<option value="">DEPT</option>
					<?php foreach ($dept as $x) { ?>
						<option value="<?php echo $x->dept; ?>" <?php if ($dept_ == $x->dept) {
																	echo 'selected';
																} ?>><?php echo $x->dept; ?></option>';
					<?php } ?>
				</select>
				<select name="shift" id="shift" class="w3-bar-item w3-button w3-teal w3-border">
					<option value="">SHIFT</option>
					<option value="A" <?php if ($shift_ == 'A') {
											echo 'selected';
										} ?>>A</option>
					<option value="B" <?php if ($shift_ == 'B') {
											echo 'selected';
										} ?>>B</option>
					<option value="C" <?php if ($shift_ == 'C') {
											echo 'selected';
										} ?>>C</option>
				</select>
			</form>
		</div>
		<script>
			$('#shop').change(function() {
				$('#dept').empty();
				$('#shift').empty();
				$("#ss").submit();
			});
			$('#dept').change(function() {
				$('#shift').empty();
				$("#ss").submit();
			});
			$('#shift').change(function() {
				$("#ss").submit();
			});
		</script>
		<div class="w3-row">
			<table class="w3-table-all" id="emp" style="font-size: 14px;width: 100%;">
				<thead>
					<tr class="w3-blue">
						<!-- <th style="width: 100%;"><center>ลำดับ</center></th> -->
						<th>
							<center>รหัส</center>
						</th>
						<th>
							<center>shop</center>
						</th>
						<th>
							<center>Dept</center>
						</th>
						<th>
							<center>เวลา</center>
						</th>
						<th>
							<center>กะ</center>
						</th>
						<th colspan="4">
							<center>ชื่อ</center>
						</th>
						<th>
							<center>สายรถ</center>
						</th>
						<th>
							<center>สถานที่ขึัน</center>
						</th>
						<th>
							<center>เบอร์โทรศัพท์</center>
						</th>
						<th></th>
						<!-- <th style="width: 15%;">
                <center>Save / Delete</center>
              </th> -->
					</tr>
				</thead>
				<tbody id="emp">
					<?php foreach ($emp as $x) { ?>
						<tr class="w3-hover-deep-orange">
							<form action="<?php echo site_url('Bus/'); ?>edit_emp" method="post">
							<input type="hidden" name="id" value="<?php echo $x->id; ?>">
								<th><?php echo $x->EmpCode; ?></th>
								<td><input class="w3-input w3-border" type="text" name="shop" value="<?php echo $x->shop; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="dept" value="<?php echo $x->shop2; ?>"></td>
								<td><input class="w3-input w3-border" type="time" name="time_s" value="<?php echo $x->time_s; ?>"></th>

								<td>
									<select name="shift" id="" class="w3-input w3-border">
										<option value="A" <?php if($x->shift == 'A'){ echo 'selected'; } ?>>A</option>
										<option value="B" <?php if($x->shift == 'B'){ echo 'selected'; } ?>>B</option>
										<option value="C" <?php if($x->shift == 'C'){ echo 'selected'; } ?>>C</option>
									</select>
								</td>

								<td><input class="w3-input w3-border" type="text" name="title" value="<?php echo $x->title; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="f_name" value="<?php echo $x->f_name; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="l_name" value="<?php echo $x->l_name; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="nickname" value="<?php echo $x->nickname; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="description" value="<?php echo $x->description; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="station" value="<?php echo $x->station; ?>"></td>
								<td><input class="w3-input w3-border" type="text" name="phone" value="<?php echo $x->phone; ?>"></td>
								<td><button type="submit" class="w3-button w3-brown w3-hover-blue" style="" name="emp" value="<?php echo $x->EmpCode; ?>">แก้ไข</button></td>
							</form>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

</body>
<script>
	$(document).ready(function() {
		$("#emp").DataTable();
	});
</script>

</html>
