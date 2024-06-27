<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
</head>
<style>
	th {
		text-align: center;
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

	.btn {
		font-weight: 500;
	}
</style>

<body>
	<div class="container-fluid">
		<div class="row p-0 align-middle">
			<div class="col-1 p-2 align-middle">
				<button class="btn btn-primary w-100 h-100" style="font-weight: 700;font-size: 18px;"
					onclick="$('#newStaff').fadeIn(300)">New staff</button>
			</div>
			<div class="col-11 p-1 align-middle">
				<form action="" method="post" id="ss" class="input-group p-1">
					<select name="shop" id="shop" class="form-select h-100" style="font-weight: 700;font-size: 16px;">
						<option value="">SHOP</option>
						<?php foreach ($shop as $x) { ?>
							<option value="<?php echo $x->shop; ?>" <?php if ($shop_ == $x->shop) {
								   echo 'selected';
							   } ?>><?php echo $x->shop; ?>
							</option>';
						<?php } ?>
					</select>
					<select name="dept" id="dept" class="form-select h-100" style="font-weight: 700;font-size: 16px;">
						<option value="">DEPT</option>
						<?php foreach ($dept as $x) { ?>
							<option value="<?php echo $x->dept; ?>" <?php if ($dept_ == $x->dept) {
								   echo 'selected';
							   } ?>><?php echo $x->dept; ?>
							</option>';
						<?php } ?>
					</select>
					<select name="shift" id="shift" class="form-select h-100" style="font-weight: 700;font-size: 16px;">
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
		</div>
		<script>
			$('#shop').change(function () {
				$('#dept').empty();
				$('#shift').empty();
				$("#ss").submit();
			});
			$('#dept').change(function () {
				$('#shift').empty();
				$("#ss").submit();
			});
			$('#shift').change(function () {
				$("#ss").submit();
			});
		</script>
		<div class="row p-0">
			<div class="col-lg">
				<div class="table-responsive">
					<table class="table table-bordered" id="emp" style="width: 100%;">
						<thead>
							<tr>
								<th style="width: 150px;background-color: #FF3300;color: #FFF;" class="p-0"><input
										id="myInput" class="form-control" type="text" placeholder="ค้นหา"></th>
								<th style="width: 100px;background-color: #FF3300;color: #FFF;">Shop</th>
								<th style="width: 100px;background-color: #FF3300;color: #FFF;">Dept</th>
								<th style="width: 120px;background-color: #FF3300;color: #FFF;">เวลา</th>
								<th style="width: 60px;background-color: #FF3300;color: #FFF;">กะ</th>
								<th style="width: 500px;background-color: #FF3300;color: #FFF;">ชื่อ</th>
								<th style="width: 170px;background-color: #FF3300;color: #FFF;">สายรถ</th>
								<th style="width: 400px;background-color: #FF3300;color: #FFF;">สถานที่ขึัน</th>
								<th style="width: 170px;background-color: #FF3300;color: #FFF;">เบอร์โทรศัพท์</th>
								<th style="background-color: #FF3300;color: #FFF;"><i class="bi bi-pencil-square"></i>
								</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td colspan="10" class="p-0">
									<div class="p-0 scroll" style="height: 80vh;overflow-y: auto;">
										<table class="table table-bordered table-striped table-hover" id="emp"
											style="font-size: 14px;width: 100%;">
											<tbody id="myTable">
												<?php foreach ($emp as $x) { ?>
													<tr>
														<!-- <form action="<?php echo site_url('Bus/'); ?>edit_emp" method="post"> -->
														<th style="width: 149px;">
															<?php echo $x->EmpCode; ?>
														</th>
														<th style="width: 100px;">
															<?php echo $x->shop; ?>
														</th>
														<th style="width: 100px;">
															<?php echo $x->shop2; ?>
														</th>
														<th style="width: 120px;">
															<?php echo date('H:i', strtotime($x->time_s)); ?>
														</th>
														<th style="width: 60px;">
															<?php echo $x->shift; ?>
														</th>
														<td style="width: 500px;">
															<?php echo $x->title . $x->f_name . ' ' . $x->l_name . ' (' . $x->nickname . ')'; ?>
														</td>
														<td style="width: 170px;">
															<?php echo $x->description; ?>
														</td>
														<td style="width: 400px;">
															<?php echo $x->station; ?>
														</td>
														<td style="width: 170px;">
															<?php echo $x->phone; ?>
														</td>
														<td class="p-1" style="">
															<button type="submit" class="btn btn-sm btn-secondary w-100"
																style="" name="emp"
																onclick="edit_staff('<?php echo $x->EmpCode; ?>')"
																value="<?php echo $x->EmpCode; ?>">แก้ไข</button>
														</td>
														<!-- </form> -->
													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</div>
	</div>
	<div style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: radial-gradient(circle, rgba(153,153,153,0.7) 0%, rgba(153,153,153,0.7) 100%);display: none;"
		id="newStaff">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center" style="padding-top: 20vh;">
				<div class="col-lg-2"></div>
				<div class="col-lg">
					<div class="card" style="background: none;border: 0;">
						<div class="card-body" style="background-color: #FFF;border-radius: 10px;">
						<span
								class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle text-white" style="border: 0;cursor: pointer;font-size: 24px;"
								onclick="$('#newStaff').fadeOut(300,function (){
											document.getElementById('emp_code').value = '';
											document.getElementById('Shops').value = '';
											document.getElementById('Shop2').value = '';
											document.getElementById('shifts').value = '';
											document.getElementById('title').value = '';
											document.getElementById('f_name').value = '';
											document.getElementById('l_name').value = '';
											document.getElementById('nickname').value = '';
											document.getElementById('location').value = '';
											document.getElementById('station').value = '';
											document.getElementById('phone').value = '';
										})">
								<i class="bi bi-x-lg"></i>
							</span>
							<div class="row justify-content-center align-items-center">
								<div class="col-lg text-center">
									<h3>NEW STAFF</h3>
								</div>
							</div>
							<form action="<?php echo site_url('Bus/'); ?>new_staff" method="POST">
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-4 p-1">
										<input type="hidden" name="process" value="new_staff">
										<input type="text" required name="emp_code" id="emp_code" class="form-control"
											placeholder="Employee Code.">
									</div>
									<div class="col-lg-3 p-1">
										<input type="text" required name="Shop" id="Shops" class="form-control"
											placeholder="Shop">
									</div>
									<div class="col-lg-3 p-1">
										<input type="text" required name="Shop2" id="Shop2" class="form-control"
											placeholder="Department">
									</div>
									<div class="col-lg-2 p-1">
										<select class="form-select" name="shift" id="shifts" required>
											<option value="">Shift</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
										</select>
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
										<select name="title" id="title" required class="form-select">
											<option value="">Title</option>
											<option value="นาย">นาย</option>
											<option value="นาง">นาง</option>
											<option value="นางสาว">นางสาว</option>
										</select>
									</div>
									<div class="col-lg-4 p-1">
										<input type="text" required name="f_name" id="f_name" class="form-control"
											placeholder="First name">
									</div>
									<div class="col-lg-4 p-1">
										<input type="text" required name="l_name" id="l_name" class="form-control"
											placeholder="Last name">
									</div>
									<div class="col-lg-2 p-1">
										<input type="text" name="nickname" id="nickname" class="form-control"
											placeholder="Nickname">
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
										<select name="location" id="location" required class="form-select">
											<option value="">Location</option>
											<?php foreach ($lo as $y) { ?>
												<option value="<?php echo $y->location_code; ?>">
													<?php echo $y->description; ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="col-lg-5 p-1">
										<input type="text" name="station" id="station" required class="form-control"
											placeholder="Station">
									</div>
									<div class="col-lg-2 p-1">
										<input type="time" required name="time" id="time" value="06:00"
											class="form-control">
									</div>
									<div class="col-lg-3 p-1">
										<input type="text" name="phone" id="phone" class="form-control"
											placeholder="Phone">
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
									</div>
									<div class="col-lg-8 p-1"></div>
									<div class="col-lg-2 p-1">
										<button type="submit" class="btn btn-primary w-100">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>

	<div style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: radial-gradient(circle, rgba(153,153,153,0.7) 0%, rgba(153,153,153,0.7) 100%);display: none;"
		id="editStaff">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center" style="padding-top: 20vh;">
				<div class="col-lg-2"></div>
				<div class="col-lg">
					<div class="card" style="background: none;border: 0;">
						<div class="card-body" style="background-color: #FFF;border-radius: 10px;">
							<span
								class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle text-white" style="border: 0;cursor: pointer;font-size: 24px;"
								onclick="$('#editStaff').fadeOut(300,function (){
											document.getElementById('edit_emp_code').value = '';
											document.getElementById('edit_Shops').value = '';
											document.getElementById('edit_Shop2').value = '';
											document.getElementById('edit_shifts').value = '';
											document.getElementById('edit_title').value = '';
											document.getElementById('edit_f_name').value = '';
											document.getElementById('edit_l_name').value = '';
											document.getElementById('edit_nickname').value = '';
											document.getElementById('edit_location').value = '';
											document.getElementById('edit_station').value = '';
											document.getElementById('edit_phone').value = '';
										})">
								<i class="bi bi-x-lg"></i>
							</span>
							<div class="row justify-content-center align-items-center">
								<div class="col-lg text-center">
									<h3>EDIT STAFF</h3>
								</div>
							</div>
							<form action="<?php echo site_url('Bus/'); ?>edit_emp" method="POST" id="edit_save">
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-4 p-1">
										<input type="hidden" name="process" value="edit_staff">
										<input type="hidden" name="id" id="edit_id" value="">
										<input type="hidden" name="mail" id="edit_id" value="">
										<input type="text" required name="emp_code" id="edit_emp_code"
											class="form-control" placeholder="Employee Code.">
									</div>
									<div class="col-lg-3 p-1">
										<input type="text" required name="shop" id="edit_Shops" class="form-control"
											placeholder="Shop">
									</div>
									<div class="col-lg-3 p-1">
										<input type="text" required name="dept" id="edit_Shop2" class="form-control"
											placeholder="Department">
									</div>
									<div class="col-lg-2 p-1">
										<select class="form-select" name="shift" id="edit_shifts" required>
											<option value="">Shift</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
										</select>
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
										<select name="title" id="edit_title" required class="form-select">
											<option value="">Title</option>
											<option value="นาย">นาย</option>
											<option value="นาง">นาง</option>
											<option value="นางสาว">นางสาว</option>
										</select>
									</div>
									<div class="col-lg-4 p-1">
										<input type="text" required name="f_name" id="edit_f_name" class="form-control"
											placeholder="First name">
									</div>
									<div class="col-lg-4 p-1">
										<input type="text" required name="l_name" id="edit_l_name" class="form-control"
											placeholder="Last name">
									</div>
									<div class="col-lg-2 p-1">
										<input type="text" name="nickname" id="edit_nickname" class="form-control"
											placeholder="Nickname">
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
										<select name="location" id="edit_location" required class="form-select">
											<option value="">Location</option>
											<?php foreach ($lo as $y) { ?>
												<option value="<?php echo $y->location_code; ?>">
													<?php echo $y->description; ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<div class="col-lg-5 p-1">
										<input type="text" name="station" id="edit_station" required
											class="form-control" placeholder="Station">
									</div>
									<div class="col-lg-2 p-1">
										<input type="time" required name="time_s" id="edit_time" value="06:00:00"
											class="form-control">
									</div>
									<div class="col-lg-3 p-1">
										<input type="text" name="phone" id="edit_phone" class="form-control"
											placeholder="Phone">
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
									</div>
									<div class="col-lg-8 p-1"></div>
									<div class="col-lg-2 p-1">
										<button type="submit" class="btn btn-primary w-100" name="status"
											value="edit">Save</button>
									</div>
								</div>
								<div class="row justify-content-center align-items-center">
									<div class="col-lg-2 p-1">
									</div>
									<div class="col-lg-8 p-1"></div>
									<div class="col-lg-2 p-1">
										<button type="submit" class="btn btn-danger w-100" name="status"
											value="delete">Delete</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-2"></div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function () {
		$("#myInput").on("keyup", function () {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function () {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>
<script type="text/javascript">
	function edit_staff(code) {
		// alert(code);
		var request = new XMLHttpRequest();
		var link = '<?php echo site_url('Bus/'); ?>get_emp?emp=' + code;
		var request = new XMLHttpRequest()
		request.open('GET', link, true)
		request.onload = function () {
			// Begin accessing JSON data here
			var data = JSON.parse(this.response)
			var a = '';
			if (request.status >= 200 && request.status < 400) {
				i = 0;
				data.forEach((x) => {
					i++;
					document.getElementById('edit_id').value = x.id;
					document.getElementById('edit_emp_code').value = x.EmpCode;
					document.getElementById('edit_Shops').value = x.shop;
					document.getElementById('edit_Shop2').value = x.shop2;
					document.getElementById('edit_shifts').value = x.shift;
					document.getElementById('edit_title').value = x.title;
					document.getElementById('edit_f_name').value = x.f_name;
					document.getElementById('edit_l_name').value = x.l_name;
					document.getElementById('edit_nickname').value = x.nickname;
					document.getElementById('edit_location').value = x.location;
					document.getElementById('edit_station').value = x.station;
					document.getElementById('edit_phone').value = x.phone;
					document.getElementById('edit_time').value = x.time_s;
				})
				document.getElementById(id).innerHTML = a;
			} else {
				console.log('error')
			}
		}
		request.send()
		$('#editStaff').fadeIn(300);
	}
</script>

</html>