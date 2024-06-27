<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Approved</title>
</head>

<body>
	<div class="w3-container">
		<div class="w3-row">
			<table class="w3-table-all" style="width: 100%;" id="approved">
				<thead>
					<tr>
						<th>No.</th>
						<th>Emp. Code</th>
						<th>Name</th>
						<th>New Location</th>
						<th>New Station</th>
						<th>Description</th>
						<th>Start Date</th>
						<th>Supervisor</th>
						<th>HR</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="approved">
					<?php $i = 0;
					foreach ($approved_emp as $x) {
						$i++; ?>
						<tr>
							<form action="<?php echo site_url('Bus/'); ?>approved_process" method="post">
								<td><?php echo $i; ?></td>
								<td><?php echo $x->EmpCode; ?></td>
								<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
								<td><?php echo $x->lo_desc; ?></td>
								<td><?php echo $x->new_station; ?></td>
								<td><?php echo $x->desc; ?></td>
								<td><?php echo $x->start_date; ?></td>
								<td>
									<?php if ($_SESSION['level'] == 'Supervisor' || $_SESSION['level'] == 'Admin') { ?>
										<?php if ($x->manager == '') { ?>
											<select name="sup" id="sup" class="w3-input w3-border">
												<option value=""></option>
												<option value="approved">Approved</option>
												<option value="disapproval">Disapproval</option>
											</select>
										<?php } else { ?>
											<?php echo $x->manager; ?>
											<input type="hidden" name="sup" value="<?php echo $x->manager; ?>">
										<?php } ?>
									<?php } else { ?>
										<?php echo $x->manager; ?>
											<input type="hidden" name="sup" value="<?php echo $x->manager; ?>">
									<?php } ?>
								</td>
								<td>
									<?php if ($_SESSION['level'] == 'Admin') { ?>
										<select name="hr" id="hr" class="w3-input w3-border">
											<option value=""></option>
											<option value="approved">Approved</option>
											<option value="disapproval">Disapproval</option>
										</select>
									<?php } else { ?>
										<?php echo $x->manager; ?>
											<input type="hidden" name="hr" value="<?php echo $x->manager; ?>">
									<?php } ?>
								</td>
								<td>
									<input type="hidden" name="id" value="<?php echo $x->id; ?>">
									<button type="submit" class="w3-button w3-green">บันทึก</button>
								</td>
							</form>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>

</html>
