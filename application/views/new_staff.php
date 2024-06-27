<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>New staff</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
		<h2 class="w3-wide w3-center">NEW STAFF</h2>
		<div class="w3-row w3-padding-32">
			<div class="w3-col m12">
				<form action="<?php echo site_url('Bus/'); ?>new_staff" method="POST">
					<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
						<div class="w3-half">
							<input type="hidden" name="process" value="new_staff">
							<input class="w3-input w3-border" type="text" placeholder="Employee Code" required name="emp_code" id="emp_code">
						</div>
						<div class="w3-quarter">
							<input class="w3-input w3-border" type="text" placeholder="Shop" required name="Shop" id="Shop">
						</div>
						<div class="w3-quarter">
							<input class="w3-input w3-border" type="text" placeholder="Department" name="Shop2" id="Shop2">
						</div>
					</div>
					<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
						<div class="w3-col" style="width:15%">
							<select name="title" id="title" required class="w3-input w3-border">
								<option value="">Title</option>
								<option value="นาย">นาย</option>
								<option value="นาง">นาง</option>
								<option value="นางสาว">นางสาว</option>
							</select>
						</div>
						<div class="w3-half" style="width:45%">
							<input class="w3-input w3-border" type="text" placeholder="First Name" required name="f_name" id="f_name">
						</div>
						<div class="w3-half" style="width:40%">
							<input class="w3-input w3-border" type="text" placeholder="Last Name" required name="l_name" id="l_name">
						</div>
					</div>
					<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
						<div class="w3-third">
							<select name="shift" id="shift" required class="w3-input w3-border" required>
								<option value="">Shift</option>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
							</select>
						</div>
						<div class="w3-third">
							<input class="w3-input w3-border" type="text" placeholder="Phone" name="phone" id="phone">
						</div>
						<div class="w3-third">
							<input class="w3-input w3-border" type="text" placeholder="Nick Name" name="nickname" id="nickname">
						</div>
					</div>
					<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
						<div class="w3-third">
							<select class="w3-input w3-border" name="location" id="">
								<?php foreach ($lo as $y) { ?>
									<option value="<?php echo $y->location_code; ?>"><?php echo $y->description; ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="w3-twothird">
							<input class="w3-input w3-border" type="text" placeholder="Station" name="station" id="station">
						</div>
					</div>
					<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
						<div class="w3-threequarter" style="text-align: right;">
							<b>
								<p>เวลาขึ้นรถ</p>
							</b>
						</div>
						<div class="w3-quarter">
							<input class="w3-input w3-border" type="Time" placeholder="Time" required name="time" id="time" value="06:00:00">
						</div>
					</div>
					<center><button class="w3-button w3-green w3-section" type="submit">SAVE</button></center>

				</form>
			</div>


			<?php if (isset($status)) { ?>
				<?php if ($status == 'success') { ?>
					<div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
						<p>
							<center><?php echo $status; ?></center>
						</p>
					</div>
				<?php } else { ?>
					<div class="w3-panel w3-pale-red w3-bottombar w3-border-red w3-border">
						<p>
							<center><?php echo $status; ?></center>
						</p>
					</div>
				<?php } ?>
			<?php } ?>
		</div>
	</div>
</body>

</html>
