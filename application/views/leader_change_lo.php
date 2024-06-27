<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"="IE=edge">
	<meta name="viewport"="width=device-width, initial-scale=1.0">
	<title>Change Location</title>
</head>
<style>
	.bi {
		font-size: 32px;
		-webkit-text-stroke: 2px;
	}

	th {
		text-align: center;
	}
</style>

<body>
	<div class="container" style="max-width:800px;" id="contact">
		<div class="row p-1">
			<div class="col ">
				<form action="" method="post" class="input-group mb-3">
					<select name="emp" id="" class="form-select">
						<option value="">Staff...</option>
						<?php foreach ($emp_ as $x) { ?>
							<option value="<?php echo $x->EmpCode; ?>">
								<?php echo $x->EmpCode . ' ' . $x->shop . ' ' . $x->shop2 . ' ' . $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')' . ' ' . $x->shift; ?>
							</option>
						<?php } ?>
					</select>
					<button type="submit" class="btn btn-primary">ค้นหา</button>
				</form>
			</div>
		</div>
	</div>
	<?php if (isset($emp_change) && !empty($emp_change)) { ?>
		<div class="container">
			<div class="row p-1">
				<table class="table table-bordered" style="width: 100%;">
					<tr class="">
						<th>No.</th>
						<th>Update Date</th>
						<th>Emp. Code</th>
						<th>Name</th>
						<th>New Location</th>
						<th>Reason</th>
						<th>Supervisor</th>
						<th>HR</th>
					</tr>
					<?php $i = 1;
					foreach ($emp_change as $x) { ?>
						<tr class="">
							<th>
								<?php echo $i; ?>
							</th>
							<td>
								<?php echo date('d/m/y H:i', strtotime($x->update_date)); ?>
							</td>
							<td>
								<?php echo $x->EmpCode; ?>
							</td>
							<td>
								<?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?>
							</td>
							<td>
								<?php echo $x->lo_des; ?>
							</td>
							<td>
								<?php echo $x->desc; ?>
							</td>
							<th>
								<?php if ($x->manager == '') {
									echo '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
								} ?>
								<?php if ($x->manager == 'approved') {
									echo '<i class="bi bi-check2-circle text-success"></i>';
								} ?>
								<?php if ($x->manager == 'disapproval') {
									echo '<i class="bi bi-x-circle text-danger"></i>';
								} ?>

							</th>
							<th>
								<?php if ($x->hr == '') {
									echo '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>';
								} ?>
								<?php if ($x->hr == 'approved') {
									echo '<i class="bi bi-check2-circle text-success"></i>';
								} ?>
								<?php if ($x->hr == 'disapproval') {
									echo '<i class="bi bi-x-circle text-danger"></i>';
								} ?>
							</th>
						</tr>
						<?php $i++;
					} ?>
				</table>
			</div>
		</div>
	<?php } ?>

	<?php if (isset($emp) && !empty($emp)) { ?>
		<?php foreach ($emp as $x) { ?>
			<div class="container card" style="max-width: 50vw;background-color: #FFFFFF;position: fixed;top: 15vh;left: 30vw;"
				id="contacta">
				<div class="row p-1" style="padding-top: 10px;">
					<div class="col ">
						<form action="<?php echo site_url('Bus/'); ?>change_lo" method="post">
							<input type="hidden" name="id" value="<?php echo $x->id; ?>">
							<input type="hidden" name="emp" value="<?php echo $x->EmpCode; ?>">
							<input type="hidden" name="name"
								value="<?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?>">
							<div class="row p-1" style="">
								<div class="col-md-6">
									<input class="form-control" type="text" disabled placeholder="Employee Code" required
										name="emp" id="emp" value="<?php echo $x->EmpCode; ?>">
								</div>
								<div class="col-md-3">
									<input class="form-control" type="text" disabled placeholder="Shop" required name="shop"
										id="shop" value="<?php echo $x->shop; ?>">
								</div>
								<div class="col-md-3">
									<input class="form-control" type="text" disabled placeholder="Department" name="dept"
										id="dept" value="<?php echo $x->shop2; ?>">
									<input type="hidden" class="form-control" disabled name="mail"
										value="<?php echo $x->mail; ?>">
								</div>
							</div>
							<div class="row p-1" style="">
								<div class="col" style="width:15%">
									<input class="form-control" type="text" disabled placeholder="title" required name="title"
										id="title" value="<?php echo $x->title; ?>">
								</div>
								<div class="col-md-6" disabled style="width:45%">
									<input class="form-control" type="text" disabled placeholder="First Name" required
										name="f_name" id="f_name" value="<?php echo $x->f_name; ?>">
								</div>
								<div class="col-md-6" disabled style="width:40%">
									<input class="form-control" type="text" disabled placeholder="Last Name" required
										name="l_name" id="l_name" value="<?php echo $x->l_name; ?>">
								</div>
							</div>
							<div class="row p-1" style="">
								<div class="col-md-4">
									<input class="form-control" type="text" disabled placeholder="shift" required name="shift"
										id="shift" value="<?php echo $x->shift; ?>">

								</div>
								<div class="col-md-4">
									<input class="form-control" disabled type="text" placeholder="Phone" name="phone" id="phone"
										value="<?php echo $x->phone; ?>">
								</div>
								<div class="col-md-4">
									<input class="form-control" disabled type="text" placeholder="Nick Name" name="nickname"
										id="nickname" value="<?php echo $x->nickname; ?>">
								</div>
							</div>
							<div class="row p-1" style="">
								<div class="col-md-4">
									<?php foreach ($lo as $y) { ?>
										<?php if ($x->location == $y->location_code) { ?>
											<input class="form-control" disabled type="text" placeholder="location" name="location"
												id="location" value="<?php echo $y->description; ?>">
										<?php } ?>
									<?php } ?>
								</div>
								<div class="col-md">
									<input class="form-control" type="text" disabled placeholder="Station" required
										name="station" id="station" value="<?php echo $x->station; ?>">
								</div>
							</div>
							<div class="row p-1" style="">
								<div class="col-md-4">
									<label for=""><b>สายรถใหม่</b></label>
									<select class="form-select" name="n_location" id="">
										<option value="L0">ไม่ใช้รถ</option>
										<?php foreach ($lo as $y) { ?>
											<?php if ($y->location_code != 'L0' && $y->location_code != 'L99') { ?>
												<?php if ($AC[$y->location_code][0] < 13 && $BC[$y->location_code][0] < 13) { ?>
													<option value="<?php echo $y->location_code; ?>">
														<?php echo $y->description; ?>
													</option>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</select>
								</div>
								<div class="col-md">
									<label for=""><b>สถานที่ขึ้น</b></label>
									<input class="form-control" type="text" placeholder="New Station" required name="n_station"
										id="n_station" value="">
								</div>
							</div>
							<div class="row p-1" style="">
								<div class="col-md">
									<label for=""><b>เหตุผลในการเปลี่ยนสายรถ</b></label>
									<input type="text" name="desc" id="" class="form-control">
								</div>
							</div>

							<div class="row p-1" style="">
								<div class="col-md-3" style="text-align: right;">
									<b>
										<p>&nbsp;</p>
									</b>
								</div>
								<div class="col-md-3">&nbsp;
								</div>
								<div class="col-md-3" style="text-align: right;">
									<b>
										<p>เริ่มวันที่</p>
									</b>
								</div>
								<div class="col-md-3" style="text-align: right;">
									<input class="form-control" type="date" placeholder="Date" required name="date" id="date"
										value="<?php echo date('Y-m-d'); ?>">
								</div>

							</div>
							<div class="row p-1" style="">
								<div class="col-md-6" style="text-align: center;">
									<b>
										<label>ผู้อนุมัติ</label>
										<select name="leader" class="form-select">
											<option value=""></option>
											<option value="paitoon.pro@univance.co.th">PAITOON PROMTHONG (TWC)</option>
											<option value="yupin.chi@univance.co.th">YUPIN CHIMNOK (TZK)</option>
											<option value="walairat.chi@univance.co.th">WALAIRAK CHIDCHUE (OFFICE)</option>
										</select>
									</b>
								</div>
								<div class="col-md-6" style="text-align: center;">
									<b>
										<label>ลงชื่อผู้ร้องขอ</label>
										<input class="form-control" type="text" placeholder="ลงชื่อผู้ร้องขอ" required
											name="staff" id="staff" value="">
									</b>
								</div>
							</div>
							<div class="row p-1" style="">
								<div class="col-md-6">
									<div class="btn btn-warning" style="width: 100%;" onclick="$('#contacta').hide(200)">ปิด
									</div>
								</div>
								<div class="col-md-6">
									<button type="submit" class="btn btn-primary" style="width: 100%;" name="status"
										value="change_lo">ส่งข้อมูล</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
</body>

</html>