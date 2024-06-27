<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<nav class="navbar navbar-expand-lg p-0" style="background-color: #FF3300;color: #FFF;">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            <img src="http://172.28.1.23/img/uvctlogo.gif" alt="Bootstrap" width="30" height="24">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>leader">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>lead_edit">แก้ไขรายการ</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>staff_by_lo_l">รายชื่อพนักงานในแต่ละสายรถ</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>lead_change_lo">แจ้งย้ายสายรถ</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>leader_report">Report</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="http://172.28.1.23/uvc_time/" target="_blank">OT</a></li>
				<?php if ($_SESSION['level'] == 'Supervisor'){ ?>
				<li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>approved">อนุมัติการขอย้ายสายรถ</a></li>
				<?php } ?>
            </ul>
            <div class="d-flex" role="search">
			<a href="<?php echo site_url('Bus/'); ?>leader" class="btn text-white" style="color: #FFF;font-weight: 600;" id=""><b><?php echo $_SESSION['user']; ?></b></a>
			<a href="<?php echo site_url('Bus/'); ?>logout" class="btn" style="background-color: #FF0000;color: #FFF;font-weight: 600;" id="">LOGOUT</a>
            </div>
        </div>
    </div>
</nav>