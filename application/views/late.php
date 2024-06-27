<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Late</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div class="w3-container">
		<div class="w3-row">
			<div class="w3-half w3-container"></div>
			<form action="" method="post">
				<div class="w3-quarter w3-container"><input type="date" name="date" class="w3-input" value="<?php echo $date_a; ?>"></div>
				<div class="w3-quarter w3-container"><button type="submit" class="w3-button w3-blue">ค้นหา</button></div>
			</form>
		</div>
		<div class="w3-row">
			<div class="w3-half w3-container">
				<?php if (!empty($a_)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_a)); ?> <?php echo date('H:i', strtotime($time_a_)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($a_ as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
				<?php if (!empty($c_)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_a)); ?> <?php echo date('H:i', strtotime($time_b_)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($c_ as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
				<!--  -->
				<?php if (!empty($a)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_a)); ?> <?php echo date('H:i', strtotime($time_a)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($a as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
				<?php if (!empty($c)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_a)); ?> <?php echo date('H:i', strtotime($time_b)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($c as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
			</div>
			<div class="w3-half w3-container">
				<?php if (!empty($b_)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_b)); ?> <?php echo date('H:i', strtotime($time_a_)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($b_ as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
				<?php if (!empty($d_)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_b)); ?> <?php echo date('H:i', strtotime($time_b_)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($d_ as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
				<!--  -->
				<?php if (!empty($b)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_b)); ?> <?php echo date('H:i', strtotime($time_a)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($b as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
				<?php if (!empty($d)) { ?>
					<table class="w3-table-all" style="width: 100%;font-size: 12px;">
						<tr class="w3-blue">
							<th colspan="6">ลงเวลาใช้รถช้า <?php echo date('d/m/y', strtotime($date_b)); ?> <?php echo date('H:i', strtotime($time_b)); ?> น.</th>
						</tr>
						<tr>
							<th style="text-align: center;">รหัส</th>
							<th style="text-align: center;">Shop</th>
							<th style="text-align: center;">ชื่อ</th>
							<th style="text-align: center;">สายรถ</th>
							<th style="text-align: center;">เวลาลงข้อมูล</th>
						</tr>
						<?php foreach ($d as $x) { ?>
							<tr>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->shop; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo date('d/m/y', strtotime($x->date)); ?></td>
								<td><?php echo date('H:i', strtotime($x->time)); ?></td> -->
								<td><?php echo $x->lo_; ?></td>
								<td><?php echo date('d/m/y H:i:s', strtotime($x->create_date_time)); ?></td>
							</tr>
						<?php } ?>
					</table>
				<?php } ?>
			</div>
			<div class="w3-half w3-container">

			</div>
		</div>
	</div>
</body>

</html>
