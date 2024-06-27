
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
		</script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
		integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
		</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
		integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
		</script>


	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
</style>
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
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>admin">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>report">Report</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>late">ลงเวลาใช้รถช้า</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>approved">อนุมัติการขอย้ายสายรถ</a></li>
                <li class="nav-item"><a class="nav-link text-white active" aria-current="page" href="<?php echo site_url('Bus/'); ?>staff_by_lo">รายชื่อพนักงานในแต่ละสายรถ</a></li>
            </ul>
            <div class="d-flex" role="search">
			<a href="<?php echo site_url('Bus/'); ?>admin" class="btn text-white" style="color: #FFF;font-weight: 600;" id=""><b><?php echo $_SESSION['user']; ?></b></a>
			<a href="<?php echo site_url('Bus/'); ?>logout" class="btn" style="background-color: #FF0000;color: #FFF;font-weight: 600;" id="">LOGOUT</a>
            </div>
        </div>
    </div>
</nav>