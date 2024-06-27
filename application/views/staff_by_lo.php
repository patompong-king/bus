<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Staff By Location</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col" style="text-align: right;"></div>
			<div class="col">
				<form action="" method="post" id="location">
					<div class="input-group mb-3">
						<label class="input-group-text bg-warning" for="inputGroupSelect01">Location</label>
						<select class="form-select" name="lo" id="" onchange="$('#location').submit()">
							<?php $i = 0;
							foreach ($location as $x) {
								$i++ ?>
								<option value="<?php echo $x->location_code; ?>" <?php if ($lo == $x->location_code) {
																						echo 'selected';
																					} ?>><?php echo $x->description; ?></option>
							<?php } ?>
						</select>
						<button type="submit" class="btn btn-warning">ค้นหา</button>
					</div>
				</form>
			</div>
			<div class="col"></div>
		</div>
		<div class="row">
			<div class="col">
				<table style="width: 100%;font-size: 12px;" class="table table-bordered table-hover">
					<thead class="bg-danger text-white">
						<tr>
							<th colspan="4" style="text-align: center;">
								<b>
									<h4>Shift: A</h4>
								</b>
							</th>
						</tr>
						<tr>
							<th>No.</th>
							<th>Emp. Code</th>
							<th>Name</th>
							<!-- <th>Phone</th> -->
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($staff_a as $x) {
							$i++ ?>
							<tr>
								<th><?php echo $i; ?></th>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo $x->phone; ?></td> -->
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col">
				<table style="width: 100%;font-size: 12px;" class="table table-bordered table-hover">
					<thead class="bg-success text-white">
						<tr>
							<th colspan="4" style="text-align: center;">
								<b>
									<h4>Shift: B</h4>
								</b>
							</th>
						</tr>
						<tr>
							<th>No.</th>
							<th>Emp. Code</th>
							<th>Name</th>
							<!-- <th>Phone</th> -->
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($staff_b as $x) {
							$i++ ?>
							<tr>
								<th><?php echo $i; ?></th>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo $x->phone; ?></td> -->
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col">
				<table style="width: 100%;font-size: 12px;" class="table table-bordered table-hover">
					<thead class="bg-primary text-white">
						<tr>
							<th colspan="4" style="text-align: center;">
								<b>
									<h4>Shift: C</h4>
								</b>
							</th>
						</tr>
						<tr>
							<th>No.</th>
							<th>Emp. Code</th>
							<th>Name</th>
							<!-- <th>Phone</th> -->
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($staff_c as $x) {
							$i++ ?>
							<tr>
								<th><?php echo $i; ?></th>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<!-- <td><?php echo $x->phone; ?></td> -->
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>

</html>