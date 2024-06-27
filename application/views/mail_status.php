<!DOCTYPE html>
<html lang="en">
<?php

$json = file_get_contents('http://172.28.1.23/uvc_api_test/bus_report.php?req=status');
$data = json_decode($json);

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap');

    body {
        font-family: 'Bebas Neue', cursive;
    }

    .list-group-item {
        cursor: pointer;
    }

    .icon {
        font-size: 22px;
        -webkit-text-stroke: .5px;
    }
</style>

<body>
    <div class="container-fluid" style="position: fixed;top: 0%;left: 0%;background: #ffffff;top: 0%;">

        <div class="row">
            <div class="col-md-1 text-start">
                <button class="btn" style="width: 100%;font-weight: 700;font-size: 24px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Menu</button>
            </div>
        </div>
        
    </div>
    <div class="container" style="padding-top: 4rem;">
        <div class="row">
            <div class="col" style="border: 3px solid black;padding: 10px;">
                <table class="table table-striped" id="status">
                    <thead class="bg-primary text-white text-center">
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th>Detail</th>
                            <th style="width: 20%;">Timestamp</th>
                            <th style="width: 10%;"></th>
                            <th style="width: 20%;">status</th>
                        </tr>
                    </thead>
                    <tbody id="status">
                    <?php for ($i = 0; $i < count($data); $i++){ ?>
                        <tr>
                            <th class="text-center"><?php echo $i+1; ?></th>
                            <td><?php echo $data[$i]->data; ?></td>
                            <td class="text-center"><?php echo $data[$i]->date_time; ?></td>
                            <td class="text-center"><?php echo $data[$i]->to; ?></td>
                            <?php if(strtoupper($data[$i]->status) == 'FAIL'){ ?>
                            <td class="text-center text-danger"><?php echo $data[$i]->status; ?></td>
                            <?php }else{ ?>
                            <td class="text-center text-success"><?php echo $data[$i]->status; ?></td>
                            <?php } ?>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" style="cursor: pointer;font-weight: 900;" id="offcanvasExampleLabel" onclick="location.replace('<?php echo site_url('Bus/'); ?>admin')">Home</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="font-weight: 700;">
            <ul class="list-group">
                <!-- <li class="list-group-item active" aria-current="true">An active item</li> -->
                <li class="list-group-item" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/new_staff')"><i class="bi bi-person-plus-fill icon"></i> เพิ่มรายชื่อพนักงาน</li>
                <li class="list-group-item" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/staff_by_lo')"><i class="bi bi-person-lines-fill icon"></i> รายชื่อพนักงานในแต่ละสายรถ</li>
                <li class="list-group-item" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/late')"><i class="bi bi-alarm-fill icon"></i> ลงเวลาใช้รถช้า</li>
                <li class="list-group-item" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/approved')"><i class="bi bi-check2-square icon"></i> อนุมัติการขอย้ายสายรถ</li>
                <li class="list-group-item bg-danger text-white" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/logout')"><i class="bi bi-box-arrow-left icon"></i> Sign-Out</li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item active" aria-current="true" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/report')"><i class="bi bi-clipboard2-minus icon"></i> Report</li>
                <li class="list-group-item" onclick="window.open('http://172.28.1.23/app/send_mail_v2.php?shift=day&date=<?php echo date('Y-m-d') ?>','_blank')"><i class="bi bi-send-fill icon"></i> Mail Day Shift</li>
                <li class="list-group-item" onclick="window.open('http://172.28.1.23/app/send_mail_v2.php?shift=night&date=<?php echo date('Y-m-d') ?>','_blank')"><i class="bi bi-send-fill icon"></i> Mail Night Shift</li>
                <li class="list-group-item" onclick="location.replace('http://172.28.1.23/app/bus3/index.php/Bus/mail_status')"><i class="bi bi-archive icon"></i> Mail Status</li>
            </ul>
        </div>
    </div>
</body>
<script>
	$(document).ready(function() {
		$("#status").DataTable();
	});
</script>
</html>