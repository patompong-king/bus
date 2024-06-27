<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit</title>

	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />

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
	<div class="container-fluid">
		<div class="row">
			<div class="col">
				<form action="" method="post" class="input-group">
					<span class="input-group-text bg-primary text-white" id="basic-addon1">Date</span>
					<input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
					<span class="input-group-text bg-primary text-white" id="basic-addon1">Dept.</span>
					<select name="dept" class="form-select">
						<option value=""></option>
						<?php foreach ($dept as $x) { ?>
							<option value="<?php echo $x->dept; ?>" <?php if ($x->dept == $dept_) {
								   echo 'selected';
							   } ?>><?php echo $x->dept; ?>
							</option>
						<?php } ?>
					</select>
					<span class="input-group-text bg-primary text-white" id="basic-addon1">Shift</span>
					<select name="shift" class="form-select">
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
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="table-responsive p-0">
					<table class="table table-striped table-bordered" style="width: 100%;font-size: 12px;" id="emp">
						<thead>
							<tr>
								<th class="bg-primary text-white">#</th>
								<th class="bg-primary text-white">Code</th>
								<th class="bg-primary text-white">Shop</th>
								<th class="bg-primary text-white">Dept</th>
								<th class="bg-primary text-white">ชื่อ</th>
								<th class="bg-primary text-white">Shift</th>
								<th class="bg-primary text-white">สายรถ</th>
								<th class="bg-primary text-white">เวลา</th>
								<th class="bg-primary text-white">ขาด/ลา</th>
								<th class="bg-primary text-white">สาเหตุ</th>
								<th class="bg-primary text-white">
								<i class="bi bi-check2-square"></i> / <i class="bi bi-trash"></i>
								</th>
							</tr>
						</thead>
						<tbody id="emp">

							<?php $i = 0;
							foreach ($emp as $x) {
								$i++; ?>
								<tr>
									<form action="<?php echo site_url('Bus/'); ?>lead_edit_" method="post">
										<th>
												<?php echo $i; ?><input type="hidden" name="id"
													value="<?php echo $x->id; ?>" />
										</th>
										<td>
											<?php echo $x->staff_code; ?><input type="hidden" name="staff_code"
												value="<?php echo $x->staff_code; ?>" />
										</td>
										<th>
											<?php echo $x->shop; ?><input type="hidden" name="shop"
												value="<?php echo $x->shop; ?>" />
										</th>
										<th>
											<?php echo $x->shop2; ?><input type="hidden" name="shop2"
												value="<?php echo $x->shop2; ?>" />
										</th>
										<td>
											<?php echo $x->title . " " . $x->f_name . " " . $x->l_name . " (" . $x->nickname . ")"; ?><input
												type="hidden" name="name"
												value="<?php echo $x->title . " " . $x->f_name . " " . $x->l_name . " (" . $x->nickname . ")"; ?>" />
										</td>
										<th>
											<?php echo $x->shift; ?><input type="hidden" name="shift"
												value="<?php echo $x->shift; ?>" />
										</th>
										<td class="p-0">
											<?php if ($x->location_code != 'L0') { ?>
												<select name="lo" class="form-select">
													<option value="L0">ไม่ใช้รถ</option>
													<?php foreach ($lo as $y) { ?>
														<?php if ($y->location_code == $x->location_code) { ?>
															<option value="<?php echo $y->location_code ?>" selected>
																<?php echo $y->description ?>
															</option>
														<?php } ?>
													<?php } ?>
													<?php $j = $i++; ?>
												</select>
											<?php } else { ?>
												<input type="text" class="form-control" disabled name="" value="ไม่ใช้รถ">
												<input type="hidden" class="form-control" name="lo"
													value="<?php echo $x->location_code ?>">
											<?php } ?>
										</td>
										<td class="p-0">
											<select name="time" class="form-select">
												<option value="17:00:00" <?php if ($x->time == '17:00:00') {
													echo 'selected';
												} ?>>17:00</option>
												<option value="20:00:00" <?php if ($x->time == '20:00:00') {
													echo 'selected';
												} ?>>20:00</option>
												<option value="05:00:00" <?php if ($x->time == '05:00:00') {
													echo 'selected';
												} ?>>05:00</option>
												<option value="08:00:00" <?php if ($x->time == '08:00:00') {
													echo 'selected';
												} ?>>08:00</option>
											</select>
										</td>
										<td class="p-0">
											<select name="status" id="status" class="form-select">
												<option value="">ขาด/ลา</option>
												<option value="ขาด" <?php if ($x->status == 'ขาด') {
													echo 'selected';
												} ?>>ขาด</option>
												<option value="ลากิจ" <?php if ($x->status == 'ลากิจ') {
													echo 'selected';
												} ?>>ลากิจ</option>
												<option value="ลาป่วย" <?php if ($x->status == 'ลาป่วย') {
													echo 'selected';
												} ?>>ลาป่วย</option>
												<option value="ลาพักร้อน" <?php if ($x->status == 'ลาพักร้อน') {
													echo 'selected';
												} ?>>ลาพักร้อน</option>
												<option value="อื่นๆ" <?php if ($x->status == 'อื่นๆ') {
													echo 'selected';
												} ?>>อื่นๆ</option>
											</select>
										</td>
										<td class="p-0">
											<input type="text" name="desc" class="form-control"
												value="<?php echo $x->description; ?>" placeholder="สาเหตุ">
										</td>
										<td class="p-0">
											<div class="btn-group w-100">
												<button type="submit" class="btn btn-success" name="level"
													value="edit">บันทึก</button>
												<input type="hidden" name="date" value="<?php echo $date; ?>">
												<input type="hidden" name="shift" value="<?php echo $shift; ?>">
												<input type="hidden" name="dept" value="<?php echo $dept_; ?>">
												<button type="submit" class="btn btn-danger" name="level"
													value="delete">ลบ</button>
											</div>
										</td>
									</form>
								</tr>
							<?php } ?>
						</tbody>
						<?php ?>
						<?php ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function () {
		$("#emp").DataTable();
	});
</script>

</html>