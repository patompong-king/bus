<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Approved</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
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
							<td><?php echo $i; ?></td>
							<td><?php echo $x->EmpCode; ?></td>
							<td><?php echo $x->title . $x->f_name . ' ' . $x->l_name . '(' . $x->nickname . ')'; ?></td>
							<td><?php echo $x->lo_desc; ?></td>
							<td><?php echo $x->new_station; ?></td>
							<td><?php echo $x->desc; ?></td>
							<td><?php echo $x->start_date; ?></td>
							<td>
							<?php if($_SESSION['level'] == 'Supervisor'){ ?>
							<select name="sup" id="sup" class="form-control">
                                    <option value=""></option>
                                    <option value="approved">Approved</option>
                                    <option value="disapproval">Disapproval</option>
                                </select>
							<?php }else{ ?>
								<?php echo $x->manager; ?>
							<?php } ?>
							</td>
							<td>
							<?php if($_SESSION['level'] == 'admin'){ ?>
							<select name="hr" id="hr" class="form-control">
                                    <option value=""></option>
                                    <option value="approved">Approved</option>
                                    <option value="disapproval">Disapproval</option>
                                </select>
							<?php }else{ ?>
								<?php echo $x->manager; ?>
							<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
