<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Line</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" />
</head>
<body>
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-quater">
			<select name="shop" id="shop" class="w3-bar-item w3-button w3-brown w3-border">
				<option value=""></option>
				<?php foreach($shop as $s){
					echo '<option value="'.$s->shop.'">'.$s->shop.'</option>';
				} ?>
			</select>
		</div>
		<div class="w3-quarter">
			<select name="time" id="time" class="w3-bar-item w3-button w3-brown w3-border">
				<option value=""></option>
				<option value="17:00">17:00</option>
				<option value="20:00">20:00</option>
				<option value="05:00">05:00</option>
				<option value="08:00">08:00</option>
			</select>
		</div>
	</div>
</div>
</body>
</html>
<!-- 

	today_a_
http://172.28.1.23/app/mail_plus.php?time=a&day=today&location=

today_b_

http://172.28.1.23/app/mail_plus.php?time=b&day=today&location=




today_c_
http://172.28.1.23/app/mail_plus.php?time=c&day=today&location=1
http://172.28.1.23/app/mail_plus.php?time=c&day=today&location=2
http://172.28.1.23/app/mail_plus.php?time=c&day=today&location=3
http://172.28.1.23/app/mail_plus.php?time=c&day=today&location=4
http://172.28.1.23/app/mail_plus.php?time=c&day=today&location=5
today_d_
http://172.28.1.23/app/mail_plus.php?time=d&day=today&location=1
http://172.28.1.23/app/mail_plus.php?time=d&day=today&location=2
http://172.28.1.23/app/mail_plus.php?time=d&day=today&location=3
http://172.28.1.23/app/mail_plus.php?time=d&day=today&location=4
http://172.28.1.23/app/mail_plus.php?time=d&day=today&location=5



"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe"
tomorrow_a_





tomorrow_b_






tomorrow_c_





tomorrow_d_



























 -->
