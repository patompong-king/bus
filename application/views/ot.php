<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>EMP</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="row">
			<!-- <div class="col-sm-3"></div> -->
			<div class="col-sm-6">
				<div class="container">
					<form action="<?php echo site_url('Bus/'); ?>ot" method="post">
						<div class="row">
							<?php if ($level == 'admin') { ?>
							<div class="col-sm-2">
							<select name="shop" id="" class="form-control input-sm">
									<option value=""></option>
									<?php foreach ($shop as $x) { ?>
										<option value="<?php echo $x->shop; ?>" <?php if($shop_ == $x->shop){ echo 'selected'; } ?> ><?php echo $x->shop; ?></option>
									<?php } ?>
								</select>
							</div>
							<?php } ?>
									<?php if ($level == 'leader') { ?>
							<div class="col-sm-2">
								<select name="dept" id="" class="form-control input-sm">
									<option value=""></option>
									<?php foreach ($dept as $x) { ?>
										<option value="<?php echo $x->dept; ?>" <?php if($dept_ == $x->dept){ echo 'selected'; } ?>><?php echo $x->dept; ?></option>
									<?php } ?>
								</select>
							</div>
							<? }else{ ?>
								<input type="hidden" name="dept" value="">
							<?php } ?>
							<div class="col-sm-2">
								<select name="shift" id="" class="form-control input-sm">
									<option value=""></option>
									<option value="A" <?php if($shift_ == 'A'){ echo 'selected'; } ?>>A</option>
									<option value="B" <?php if($shift_ == 'B'){ echo 'selected'; } ?>>B</option>
									<option value="C" <?php if($shift_ == 'C'){ echo 'selected'; } ?>>C</option>
								</select>
							</div>
							<div class="col-sm-2">
								<input type="week" name="week" id="week" class="form-control input-sm" value="<?php echo $week; ?>">
								
							</div>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-primary">submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	<div class="container-fulid">
	<?php

	echo '<table class="table table-bordered">';
	echo '<tr>';

	echo '<th colspan="5"></th>';
	foreach ($date as $da) {
		echo '<th>' . date('D', strtotime($da)) . '</th>';
	}
	echo '</tr>';
	echo '<tr>';

	echo '<th>Emp. Code</th>';
	echo '<th>Name</th>';
	echo '<th>Shift</th>';
	echo '<th>Shop</th>';
	echo '<th>Dept</th>';
	foreach ($date as $da) {
		echo '<th>' . date('d/m/y', strtotime($da)) . '</th>';
	}
	echo '</tr>';
	$g = 0;
	foreach ($ot_emp as $j) {
		foreach ($ot_emp[$g] as $x) {
			echo '<tr class="w3-hover-green">';
			echo '<th>' . $x->EmpCode . '</th>';
			echo '<th>' . $x->title . ' ' . $x->f_name . ' ' . $x->l_name . ' [' . $x->nickname . ']</th>';
			echo '<th>' . $x->shift . '</th>';
			echo '<th>' . $x->shop . '</th>';
			echo '<th>' . $x->shop2 . '</th>';
			if ($x->time1 != '') {
				$t1 = date('H:i', strtotime($x->time1));
				if($t1 == '17:00' || $t1 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t1 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			if ($x->time2 != '') {
				$t2 = date('H:i', strtotime($x->time2));
				if($t2 == '17:00' || $t2 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t2 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			if ($x->time3 != '') {
				$t3 = date('H:i', strtotime($x->time3));
				if($t3 == '17:00' || $t3 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t3 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			if ($x->time4 != '') {
				$t4 = date('H:i', strtotime($x->time4));
				if($t4 == '17:00' || $t4 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t4 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			if ($x->time5 != '') {
				$t5 = date('H:i', strtotime($x->time5));
				if($t5 == '17:00' || $t5 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t5 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			if ($x->time6 != '') {
				$tt6 = date('H:i', strtotime($x->time6));
				if($t6 == '17:00' || $t6 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t6 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			if ($x->time7 != '') {
				$t7 = date('H:i', strtotime($x->time7));
				if($t7 == '17:00' || $t7 == '05:00'){
					echo '<th  style="background-color: #BBFF96;">';
				}else{
					echo '<th  style="background-color: #9F96FF;">';
				}
				echo $t7 . '</th>';
			} else {
				echo '<th style="background-color: #FF6565;"></th>';
			}
			echo '</tr>';
		}
		$g++;
	}
	?>
	</div>
</body>

</html>
