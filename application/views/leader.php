<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Leader</title>
</head>
<style>
	html {
		scroll-behavior: smooth;
	}

	.scroll::-webkit-scrollbar-track {
		-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
		background-color: #FFFFFF;
	}

	.scroll::-webkit-scrollbar {
		width: 1px;
		background-color: #FFFFFF;
	}

	.scroll::-webkit-scrollbar-thumb {
		background: rgb(255, 255, 255);
		background: -moz-linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
		background: -webkit-linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
		background: linear-gradient(0deg, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#FFFFFF", endColorstr="#FFFFFF", GradientType=1);
	}

	th {
		text-align: center;
	}

	.hover:hover {
		background-color: #FFFFFF;
	}
</style>

<body>
	<div class="container-fluid" style="width: 100vw;height: 96vh;">
		<div class="row justify-content-center align-items-center g-2" style="padding-top: 5vh;">
			<div class="col p-0">
				<div class="card text-white">
					<div class="d-flex ">
						<form action="" method="post" style="width: 100%;background-color: red;">
							<div class="input-group" style="width: 40vw;position: fixed;top: 5vh;left: 1vw;">
								<span class="input-group-text bg-primary text-white" id="basic-addon1">Dept</span>
								<select name="dept" class="form-select" id="">
									<option value=""></option>
									<?php foreach ($dept as $x) { ?>
										<option value="<?php echo $x->dept; ?>" <?php if ($x->dept == $dept_) {
											   echo 'selected';
										   } ?>><?php echo $x->dept; ?>
										</option>
									<?php } ?>
								</select>
								<span class="input-group-text bg-primary text-white" id="basic-addon1">Shift</span>
								<select name="shift" class="form-select" id="">
									<option value=""></option>
									<option value="A" <?php if ($shift == 'A') {
										echo 'selected';
									} ?>>A</option>
									<option value="B" <?php if ($shift == 'B') {
										echo 'selected';
									} ?>>B</option>
									<option value="C" <?php if ($shift == 'C') {
										echo 'selected';
									} ?>>C</option>
								</select>
								<button type="submit" class="btn btn-primary">ค้นหา</button>
							</div>
						</form>
						<form action="<?php echo site_url('Bus/'); ?>lead_add" method="post"
							style="width: 100%;background-color: green;">
							<div class="input-group" style="width: 40vw;position: fixed;top: 5vh;right: 1vw;">
								<span class="input-group-text bg-primary text-white" id="basic-addon1">เวลา</span>
								<select name="time" id="" class="form-select ">
									<option value="17:00:00">17:00</option>
									<option value="20:00:00">20:00</option>
									<option value="05:00:00">05:00</option>
									<option value="08:00:00">08:00</option>
								</select>
								<span class="input-group-text bg-primary text-white" id="basic-addon1">วันที่</span>
								<input type="date" name="f_date" id="" class="form-control"
									value="<?php echo $f_date; ?>">
								<span class="input-group-text bg-primary text-white" id="basic-addon1">ถึงวันที่</span>
								<input type="date" name="t_date" id="" class="form-control"
									value="<?php echo $t_date; ?>">
								<button type="submit" class="btn btn-primary">บันทึก</button>
							</div>

					</div>
					<div class="card-body scroll p-0" style="height: 88vh;overflow-y: auto;">
						<div class="table-responsive p-0">
							<table class="table table-bordered table-striped table-hover">
								<thead>
									<tr>
										<th class="bg-info text-white" style="width: 3%;"><input type="checkbox"
												id="checks" class="form-check-input mt-0" /></th>
										<th class="bg-info text-white" style="width: 5%;">Code</th>
										<th class="bg-info text-white" style="width: 5%;">Shop</th>
										<th class="bg-info text-white" style="width: 5%;">Dept</th>
										<th class="bg-info text-white" style="width: 25%;">ชื่อ</th>
										<th class="bg-info text-white" style="width: 5%;">Shift</th>
										<th class="bg-info text-white" style="width: 28%;">สถานที่ขึ้น</th>
										<th class="bg-info text-white" style="width: 17%;">สายรถ</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 0;
									foreach ($emp as $x) {
										?>
										<tr>
											<th class="<?php echo $x->EmpCode; ?> list">
												<center>
													<input type="checkbox" class="form-check-input mt-0" name="status[]"
														id="Ch_INSERT[<?php echo $i; ?>]" value="<?php echo $x->EmpCode; ?>"
														onchange="test('Ch_INSERT[<?php echo $i; ?>]','<?php echo $x->EmpCode; ?>')" />
												</center>
											</th>
											<td class="<?php echo $x->EmpCode; ?> list">
												<?php echo $x->EmpCode; ?>
												<input type="hidden" name="EmpCode[<?php echo $x->EmpCode; ?>]"
													id="EmpCode<?php echo $i; ?>" value="<?php echo $x->EmpCode; ?>" />
											</td>
											<th class="<?php echo $x->EmpCode; ?> list">
												<?php echo $x->shop; ?><input type="hidden"
													name="shop[<?php echo $x->EmpCode; ?>]" id="shop<?php echo $i; ?>"
													value="<?php echo $x->shop; ?>" />
											</th>
											<th class="<?php echo $x->EmpCode; ?> list">
												<?php echo $x->shop2; ?><input type="hidden"
													name="shop2[<?php echo $x->EmpCode; ?>]" id="shop2<?php echo $i; ?>"
													value="<?php echo $x->shop2; ?>" />
											</th>
											<td class="<?php echo $x->EmpCode; ?> list">
												<?php echo $x->title . " " . $x->f_name . " " . $x->l_name . " (" . $x->nickname . ")"; ?><input
													type="hidden" name="name[<?php echo $x->EmpCode; ?>]"
													id="name<?php echo $i; ?>"
													value="<?php echo $x->title . " " . $x->f_name . " " . $x->l_name . " (" . $x->nickname . ")"; ?>" />
											</td>
											<th class="<?php echo $x->EmpCode; ?> list">
												<?php echo $x->shift; ?><input type="hidden"
													name="shift[<?php echo $x->EmpCode; ?>]" id="shift<?php echo $i; ?>"
													value="<?php echo $x->shift; ?>" />
											</th>
											<td class="<?php echo $x->EmpCode; ?> list">
												<?php echo $x->station; ?><input type="hidden"
													name="station[<?php echo $x->EmpCode; ?>]" id="station<?php echo $i; ?>"
													value="<?php echo $x->station; ?>" />
											</td>
											<td class="p-1 <?php echo $x->EmpCode; ?> list">
												<select id="location<?php echo $i; ?>" name="lo[<?php echo $x->EmpCode; ?>]"
													class="form-select">
													<?php
													if ($x->location != 'L0') {
														foreach ($lo as $y) {
															// if ( $y->location_code == $x->location ) { 
															?>
															<option value="<?php echo $y->location_code ?>" <?php if ($y->location_code == $x->location) {
																   echo 'selected';
															   } ?>>
																<?php echo $y->description ?>
															</option>
															<?php
															// }
														}
													}
													// $j = $i++;
													?>
													<option value="L0">ไม่ใช้รถ</option>
												</select>
											</td>
										</tr>
										<?php $i++;
									} ?>
								</tbody>
							</table>
						</div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$('#checks').change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
		//     for (i = 1; i <= x; i++) {
		//     document.getElementById('Ch_INSERT[' + i + ']').checked = true;
		// }
		const check = document.getElementById('checks');
		const list = document.getElementsByClassName('list');
		if (check.checked == true) {
			for (var i = 0; i < list.length; i++) {
				list[i].style.backgroundColor = "#ceffb7";
				list[i].style.color = "#000";
			}
		}
		if (check.checked == false) {
			for (var i = 0; i < list.length; i++) {
				list[i].style.backgroundColor = "#FFF";
				list[i].style.color = "#000";
			}
		}
	});

	function test(checkbox, x) {
		const check = document.getElementById(checkbox);
		const classx = document.getElementsByClassName(x);
		if (check.checked == true) {
			for (var i = 0; i < classx.length; i++) {
				classx[i].style.backgroundColor = "#ceffb7";
				classx[i].style.color = "#000";
			}
		} 
		if (check.checked == false) {
			for (var i = 0; i < classx.length; i++) {
				classx[i].style.backgroundColor = "#FFF";
				classx[i].style.color = "#000";
			}
		}

	}
</script>

</html>