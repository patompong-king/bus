<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit EMP</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
	<?php foreach ($emp as $x) { ?>
		<div class="w3-container w3-content w3-padding-64" style="max-width:800px;" id="contact">
			<h2 class="w3-wide w3-center"><?php echo $x->EmpCode; ?></h2>
			<div class="w3-row w3-padding-32">
				<div class="w3-col m12">
					<form action="<?php echo site_url('Bus/'); ?>edit_emp" method="post">
						<input type="hidden" name="id" value="<?php echo $x->id; ?>">
						<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
							<div class="w3-half">
								<input type="hidden" name="process" value="new_staff">
								<input class="w3-input w3-border" type="text" placeholder="Employee Code" required name="emp" id="emp" value="<?php echo $x->EmpCode; ?>">
							</div>
							<div class="w3-quarter">
								<input class="w3-input w3-border" type="text" placeholder="Shop" required name="shop" id="shop" value="<?php echo $x->shop; ?>">
							</div>
							<div class="w3-quarter">
								<input class="w3-input w3-border" type="text" placeholder="Department" name="dept" id="dept" value="<?php echo $x->shop2; ?>">
								<input type="hidden" class="w3-input w3-border" name="mail" value="<?php echo $x->mail; ?>">
							</div>
						</div>
						<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
							<div class="w3-col" style="width:15%">
								<select name="title" id="title" required class="w3-input w3-border">
									<option value="">Title</option>
									<option value="นาย" <?php if ($x->title == 'นาย') {
															echo 'selected';
														} ?>>นาย</option>
									<option value="นาง" <?php if ($x->title == 'นาง') {
															echo 'selected';
														} ?>>นาง</option>
									<option value="นางสาว" <?php if ($x->title == 'นางสาว') {
																echo 'selected';
															} ?>>นางสาว</option>
								</select>
							</div>
							<div class="w3-half" style="width:45%">
								<input class="w3-input w3-border" type="text" placeholder="First Name" required name="f_name" id="f_name" value="<?php echo $x->f_name; ?>">
							</div>
							<div class="w3-half" style="width:40%">
								<input class="w3-input w3-border" type="text" placeholder="Last Name" required name="l_name" id="l_name" value="<?php echo $x->l_name; ?>">
							</div>
						</div>
						<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
							<div class="w3-third">
								<select name="shift" id="shift" required class="w3-input w3-border" required>
									<option value="">Shift</option>
									<option value="A" <?php if ($x->shift == 'A') {
															echo 'selected';
														} ?>>A</option>
									<option value="B" <?php if ($x->shift == 'B') {
															echo 'selected';
														} ?>>B</option>
									<option value="C" <?php if ($x->shift == 'C') {
															echo 'selected';
														} ?>>C</option>
								</select>
							</div>
							<div class="w3-third">
								<input class="w3-input w3-border" type="text" placeholder="Phone" name="phone" id="phone" value="<?php echo $x->phone; ?>">
							</div>
							<div class="w3-third">
								<input class="w3-input w3-border" type="text" placeholder="Nick Name" name="nickname" id="nickname" value="<?php echo $x->nickname; ?>">
							</div>
						</div>
						<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
							<div class="w3-third">
								<select class="w3-input w3-border" name="location" id="">
									<?php foreach ($lo as $y) { ?>
										<option value="<?php echo $y->location_code; ?>" <?php if ($x->location == $y->location_code) {
																								echo 'selected';
																							} ?>><?php echo $y->description; ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="w3-twothird">
								<input class="w3-input w3-border" type="text" placeholder="Station" required name="station" id="station" value="<?php echo $x->station; ?>">
							</div>
						</div>
						<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
							<div class="w3-threequarter" style="text-align: right;">
								<b>
									<p>เวลาขึ้นรถ</p>
								</b>
							</div>
							<div class="w3-quarter">
								<input class="w3-input w3-border" type="Time" placeholder="Time" required name="time_s" id="time_s" value="<?php echo $x->time_s; ?>">
							</div>
						</div>
						<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
							<div class="w3-half"><button type="submit" class="w3-button w3-green" name="status" value="edit">SAVE</button></div>
							<div class="w3-half"><a class="w3-button w3-red" style="width: 100%;" name="status" value="delete" onclick="document.getElementById('id01').style.display='block'">DELETE</a></div>
						</div>

					</form>
				</div>
			</div>

			<?php if (isset($edit_status)) { ?>
				<?php if ($edit_status == 'success') { ?>
					<div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
						<p>
							<center><?php echo $edit_status; ?></center>
						</p>
					</div>
				<?php } else { ?>
					<div class="w3-panel w3-pale-red w3-bottombar w3-border-red w3-border">
						<p>
							<center><?php echo $edit_status; ?></center>
						</p>
					</div>
				<?php } ?>
			<?php } ?>

		</div>

		<div id="id01" class="modal">
			<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
			<form class="modal-content" action="<?php echo site_url('Bus/'); ?>edit_emp" method="post">
				<input type="hidden" name="id" value="<?php echo $x->id; ?>">
				<input type="hidden" name="emp" value="<?php echo $x->EmpCode; ?>">
				<div class="container">
					<h1>Delete Account</h1>
					<p>Are you sure you want to delete your account?</p>
					<p><?php echo $x->EmpCode . ' ' . $x->title . ' ' . $x->f_name . ' ' . $x->l_name . ' (' . $x->nickname . ')'; ?></p>
					<div class="clearfix">
						<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
						<button type="submit" class="deletebtn" name="status" value="delete">Delete</button>
					</div>
				</div>
			</form>
		</div>
	<?php } ?>
</body>

</html>
