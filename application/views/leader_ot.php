<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>OT</title>
</head>

<body>
	<div class="w3-bar">
	<form action="<?php echo site_url('Bus/'); ?>leader_ot" method="post">
		<b class="w3-bar-item">Date</b>
		<input type="date" name="date" class="w3-bar-item w3-border w3-input" value="<?php echo $date ?>">
		<b class="w3-bar-item">Dept.</b>
		<select name="dept" id="" class="w3-bar-item w3-border w3-input">
			<?php foreach ($dept as $x) { ?>
				<option value="<?php echo $x->dept; ?>" <?php if ($dept_ == $x->dept) {
															echo 'selected';
														} ?>><?php echo $x->dept; ?></option>
			<?php } ?>
		</select>
		<b class="w3-bar-item">Shift.</b>
		<select name="shift" id="" class="w3-bar-item w3-border w3-input">
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
		<button class="w3-bar-item w3-button w3-blue" type="submit">ค้นหา</button>
		</form>
	</div>
</body>

</html>
