<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirm</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>

<body>

	<div class="w3-container">
		<div class="w3-row" style="padding-top: 2%;">
			<div class="w3-col w3-container" style="width:20%">

			</div>
			<div class="w3-col w3-container w3-card-4" style="width:60%">
				<div class="w3-panel w3-pale-green w3-bottombar w3-border-green w3-border">
					<p>
						<center>
							<h4>
								<b>
									<?php echo $status; ?>
								</b>
							</h4>
						</center>
					</p>
				</div>
				<?php if ($dub != '') { ?>
					<div class="w3-panel w3-pale-red w3-bottombar w3-border-red w3-border">
						<p>
						<h4><b>
								<?php echo $dub; ?>
							</b></h4>
						</p>
					</div>

				<?php } ?>
				<form action="<?php echo site_url('Bus/').$page; ?>" method="post">
				<?php if(isset($date)){
					?>
					<input type="hidden" class="w3-input w3-border" name="date" value="<?php echo $date ?>">
					<?php
				} ?>
				<?php if(isset($shift)){
					?>
					<input type="hidden" class="w3-input w3-border" name="shift" value="<?php echo $shift ?>">
					<?php
				} ?>
				<?php if(isset($dept)){
					?>
					<input type="hidden" class="w3-input w3-border" name="dept" value="<?php echo $dept ?>">
					<?php
				} ?>
					<p><button type="submit" class="w3-button w3-green" style="width: 100%;">OK</button></p>
				</form>

			</div>
			<div class="w3-col w3-container" style="width:20%">

			</div>
		</div>
	</div>
</body>

</html>
