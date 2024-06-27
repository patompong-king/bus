<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bus extends CI_Controller
{
	public function __construct()
	{
		session_start();
		parent::__construct();

		// load base_url
		$this->load->helper('url');
		$this->load->model('Bus_model');
	}
	public function index()
	{
		$data['count_staff'] = $this->Bus_model->count_staff();
		$this->load->view('login', $data);
	}
	public function login()
	{
		$user = $this->input->post('user');
		$pass = $this->input->post('pass');
		$user = $this->Bus_model->login($user, $pass);

		foreach ($user as $x) {
			$_SESSION['level'] = $x->level;
			$_SESSION['shop'] = $x->shop;
			$_SESSION['user'] = $x->name;
			$_SESSION['mail'] = $x->mail;
		}

		if ($_SESSION['level'] == 'Admin') {
			header('location: ' . site_url('Bus/') . 'admin');
		} else if ($_SESSION['level'] == 'Leader' || $_SESSION['level'] == 'Supervisor') {
			header('location: ' . site_url('Bus/') . 'leader');
		} else {
			header('location: ' . site_url('Bus/'));
		}
	}
	public function logout()
	{
		session_start();

		// Unset all of the session variables.
		$_SESSION = array();

		// If it's desired to kill the session, also delete the session cookie.
		// Note: This will destroy the session, and not just the session data!
		if (ini_get("session.use_cookies")) {
			$params = session_get_cookie_params();
			setcookie(
				session_name(),
				'',
				time() - 42000,
				$params["path"],
				$params["domain"],
				$params["secure"],
				$params["httponly"]
			);
		}

		// Finally, destroy the session.
		session_destroy();

		header('location: ' . site_url('Bus/'));
	}
	public function admin()
	{
		$shop = $this->input->post('shop');
		$dept = $this->input->post('dept');
		$shift = $this->input->post('shift');
		if (empty($shop)) {
			$shop = '';
		}
		if (empty($dept)) {
			$dept = '';
		}
		if (empty($shift)) {
			$shift = '';
		}

		$this->load->view('admin_bar');
		$data['emp'] = $this->Bus_model->admin($shop, $dept, $shift);
		$data['shop'] = $this->Bus_model->disrinct_shop();
		$data['dept'] = $this->Bus_model->disrinct_dept($shop);
		$data['lo'] = $this->Bus_model->get_location();
		// $data['emp_lo'] = $this->Bus_model->count_staff_by_lo($shop, $dept, $shift);
		$data['shop_'] = $shop;
		$data['dept_'] = $dept;
		$data['shift_'] = $shift;

		$this->load->view('admin', $data);
	}


	public function edit_emp()
	{
		echo json_encode($_POST);
		// $this->load->view('admin_bar');
		// # code...
		// // $posts = $this->input->post();
		$status = $this->input->post('status');
		$id = $this->input->post('id');
		$emp_code = $this->input->post('emp_code');
		$title = $this->input->post('title');
		$f_name = $this->input->post('f_name');
		$l_name = $this->input->post('l_name');
		$nickname = $this->input->post('nickname');
		$mail = $this->input->post('mail');
		$phone = $this->input->post('phone');
		$shop = $this->input->post('shop');
		$dept = $this->input->post('dept');
		$shift = $this->input->post('shift');
		$time = $this->input->post('time_s');
		$location = $this->input->post('location');
		$station = $this->input->post('station');

		// // print_r($data['emp']);
		if ($status != '') {
			if ($status == 'edit') {
				$x = $this->Bus_model->edit_emp($id, $emp_code, $title, $f_name, $l_name, $nickname, $mail, $phone, $shop, $dept, $shift, $time, $location, $station);
				header('location: ' . site_url('Bus/admin?status=' . $x));
			} else if ($status == 'delete') {
				$x = $this->Bus_model->delete_emp($id, $emp_code);
				header('location: ' . site_url('Bus/admin?status=' . $x));
			}
		}
	}

	public function new_staff()
	{
		// $this->load->view('admin_bar');
		# code...
		// print_r($_POST);
		$emp_code = $this->input->post('emp_code');
		$Shop = $this->input->post('Shop');
		$Shop2 = $this->input->post('Shop2');
		$title = $this->input->post('title');
		$f_name = $this->input->post('f_name');
		$l_name = $this->input->post('l_name');
		$shift = $this->input->post('shift');
		$phone = $this->input->post('phone');
		$nickname = $this->input->post('nickname');
		$location = $this->input->post('location');
		$station = $this->input->post('station');
		$time = $this->input->post('time');
		if ($emp_code != '') {
			$y = $this->Bus_model->check($emp_code);
			$c = check($y);
			// print_r($y);
			if ($c <= 0) {
				$x = $this->Bus_model->new_staff($emp_code, $Shop, $Shop2, $title, $f_name, $l_name, $shift, $phone, $nickname, $location, $station, $time);
				header('location: ' . site_url('Bus/admin?status=' . $x));
			}
		} else {
			header('location: ' . site_url('Bus/admin?status=error'));
		}

		// $data['lo'] = $this->Bus_model->get_location();
		// $this->load->view('new_staff', $data);

	}

	public function report()
	{

		$date = $this->input->post('date');

		if ($date == '') {
			$date = date('Y-m-d');
		}
		$data['date'] = $date;
		$this->load->view('admin_bar');
		// $this->load->view('report_2', $data);
		$this->load->view('report', $data);
		# code...
	}

	public function reportV2()
	{
		$date = $this->input->post('date');

		if ($date == '') {
			$date = date('Y-m-d');
		}

		$time1 = '17:00:00';
		$time2 = '20:00:00';
		$time3 = '05:00:00';
		$time4 = '08:00:00';

		$data['date'] = $date;

		$data['time1'] = $time1;
		$data['time2'] = $time2;
		$data['time3'] = $time3;
		$data['time4'] = $time4;

		$data['lo'] = $this->Bus_model->get_location();

		$data['data']['L0'] = $this->Bus_model->report($date, 'L0', $time1);
		$data['data']['L0_2'] = $this->Bus_model->report($date, 'L0', $time2);
		$data['data']['L0_3'] = $this->Bus_model->report($date, 'L0', $time3);
		$data['data']['L0_4'] = $this->Bus_model->report($date, 'L0', $time4);

		$data['data']['L1'] = $this->Bus_model->report($date, 'L1', $time1);
		$data['data']['L1_2'] = $this->Bus_model->report($date, 'L1', $time2);
		$data['data']['L1_3'] = $this->Bus_model->report($date, 'L1', $time3);
		$data['data']['L1_4'] = $this->Bus_model->report($date, 'L1', $time4);


		$data['data']['L2'] = $this->Bus_model->report($date, 'L2', $time1);
		$data['data']['L2_2'] = $this->Bus_model->report($date, 'L2', $time2);
		$data['data']['L2_3'] = $this->Bus_model->report($date, 'L2', $time3);
		$data['data']['L2_4'] = $this->Bus_model->report($date, 'L2', $time4);


		$data['data']['L3'] = $this->Bus_model->report($date, 'L3', $time1);
		$data['data']['L3_2'] = $this->Bus_model->report($date, 'L3', $time2);
		$data['data']['L3_3'] = $this->Bus_model->report($date, 'L3', $time3);
		$data['data']['L3_4'] = $this->Bus_model->report($date, 'L3', $time4);


		$data['data']['L4'] = $this->Bus_model->report($date, 'L4', $time1);
		$data['data']['L4_2'] = $this->Bus_model->report($date, 'L4', $time2);
		$data['data']['L4_3'] = $this->Bus_model->report($date, 'L4', $time3);
		$data['data']['L4_4'] = $this->Bus_model->report($date, 'L4', $time4);


		$data['data']['L5'] = $this->Bus_model->report($date, 'L5', $time1);
		$data['data']['L5_2'] = $this->Bus_model->report($date, 'L5', $time2);
		$data['data']['L5_3'] = $this->Bus_model->report($date, 'L5', $time3);
		$data['data']['L5_4'] = $this->Bus_model->report($date, 'L5', $time4);

		$data['data']['L6'] = $this->Bus_model->report($date, 'L6', $time1);
		$data['data']['L6_2'] = $this->Bus_model->report($date, 'L6', $time2);
		$data['data']['L6_3'] = $this->Bus_model->report($date, 'L6', $time3);
		$data['data']['L6_4'] = $this->Bus_model->report($date, 'L6', $time4);

		$data['data']['L7'] = $this->Bus_model->report($date, 'L7', $time1);
		$data['data']['L7_2'] = $this->Bus_model->report($date, 'L7', $time2);
		$data['data']['L7_3'] = $this->Bus_model->report($date, 'L7', $time3);
		$data['data']['L7_4'] = $this->Bus_model->report($date, 'L7', $time4);

		$data['data']['L8'] = $this->Bus_model->report($date, 'L8', $time1);
		$data['data']['L8_2'] = $this->Bus_model->report($date, 'L8', $time2);
		$data['data']['L8_3'] = $this->Bus_model->report($date, 'L8', $time3);
		$data['data']['L8_4'] = $this->Bus_model->report($date, 'L8', $time4);

		$data['data']['L9'] = $this->Bus_model->report($date, 'L9', $time1);
		$data['data']['L9_2'] = $this->Bus_model->report($date, 'L9', $time2);
		$data['data']['L9_3'] = $this->Bus_model->report($date, 'L9', $time3);
		$data['data']['L9_4'] = $this->Bus_model->report($date, 'L9', $time4);

		$data['data']['L10'] = $this->Bus_model->report($date, 'L10', $time1);
		$data['data']['L10_2'] = $this->Bus_model->report($date, 'L10', $time2);
		$data['data']['L10_3'] = $this->Bus_model->report($date, 'L10', $time3);
		$data['data']['L10_4'] = $this->Bus_model->report($date, 'L10', $time4);

		$data['data']['L11'] = $this->Bus_model->report($date, 'L11', $time1);
		$data['data']['L11_2'] = $this->Bus_model->report($date, 'L11', $time2);
		$data['data']['L11_3'] = $this->Bus_model->report($date, 'L11', $time3);
		$data['data']['L11_4'] = $this->Bus_model->report($date, 'L11', $time4);

		$data['data']['L12'] = $this->Bus_model->report($date, 'L12', $time1);
		$data['data']['L12_2'] = $this->Bus_model->report($date, 'L12', $time2);
		$data['data']['L12_3'] = $this->Bus_model->report($date, 'L12', $time3);
		$data['data']['L12_4'] = $this->Bus_model->report($date, 'L12', $time4);

		$data['data']['L13'] = $this->Bus_model->report($date, 'L13', $time1);
		$data['data']['L13_2'] = $this->Bus_model->report($date, 'L13', $time2);
		$data['data']['L13_3'] = $this->Bus_model->report($date, 'L13', $time3);
		$data['data']['L13_4'] = $this->Bus_model->report($date, 'L13', $time4);

		$data['data']['L14'] = $this->Bus_model->report($date, 'L14', $time1);
		$data['data']['L14_2'] = $this->Bus_model->report($date, 'L14', $time2);
		$data['data']['L14_3'] = $this->Bus_model->report($date, 'L14', $time3);
		$data['data']['L14_4'] = $this->Bus_model->report($date, 'L14', $time4);

		$data['data']['L15'] = $this->Bus_model->report($date, 'L15', $time1);
		$data['data']['L15_2'] = $this->Bus_model->report($date, 'L15', $time2);
		$data['data']['L15_3'] = $this->Bus_model->report($date, 'L15', $time3);
		$data['data']['L15_4'] = $this->Bus_model->report($date, 'L15', $time4);

		$data['data']['L16'] = $this->Bus_model->report($date, 'L16', $time1);
		$data['data']['L16_2'] = $this->Bus_model->report($date, 'L16', $time2);
		$data['data']['L16_3'] = $this->Bus_model->report($date, 'L16', $time3);
		$data['data']['L16_4'] = $this->Bus_model->report($date, 'L16', $time4);

		$data['data']['L17'] = $this->Bus_model->report($date, 'L17', $time1);
		$data['data']['L17_2'] = $this->Bus_model->report($date, 'L17', $time2);
		$data['data']['L17_3'] = $this->Bus_model->report($date, 'L17', $time3);
		$data['data']['L17_4'] = $this->Bus_model->report($date, 'L17', $time4);

		$data['data']['L18'] = $this->Bus_model->report($date, 'L18', $time1);
		$data['data']['L18_2'] = $this->Bus_model->report($date, 'L18', $time2);
		$data['data']['L18_3'] = $this->Bus_model->report($date, 'L18', $time3);
		$data['data']['L18_4'] = $this->Bus_model->report($date, 'L18', $time4);

		$data['data']['L19'] = $this->Bus_model->report($date, 'L19', $time1);
		$data['data']['L19_2'] = $this->Bus_model->report($date, 'L19', $time2);
		$data['data']['L19_3'] = $this->Bus_model->report($date, 'L19', $time3);
		$data['data']['L19_4'] = $this->Bus_model->report($date, 'L19', $time4);

		$data['data']['L20'] = $this->Bus_model->report($date, 'L20', $time1);
		$data['data']['L20_2'] = $this->Bus_model->report($date, 'L20', $time2);
		$data['data']['L20_3'] = $this->Bus_model->report($date, 'L20', $time3);
		$data['data']['L20_4'] = $this->Bus_model->report($date, 'L20', $time4);

		$data['data']['L21'] = $this->Bus_model->report($date, 'L21', $time1);
		$data['data']['L21_2'] = $this->Bus_model->report($date, 'L21', $time2);
		$data['data']['L21_3'] = $this->Bus_model->report($date, 'L21', $time3);
		$data['data']['L21_4'] = $this->Bus_model->report($date, 'L21', $time4);

		$data['data']['L22'] = $this->Bus_model->report($date, 'L22', $time1);
		$data['data']['L22_2'] = $this->Bus_model->report($date, 'L22', $time2);
		$data['data']['L22_3'] = $this->Bus_model->report($date, 'L22', $time3);
		$data['data']['L22_4'] = $this->Bus_model->report($date, 'L22', $time4);

		$data['data']['L23'] = $this->Bus_model->report($date, 'L23', $time1);
		$data['data']['L23_2'] = $this->Bus_model->report($date, 'L23', $time2);
		$data['data']['L23_3'] = $this->Bus_model->report($date, 'L23', $time3);
		$data['data']['L23_4'] = $this->Bus_model->report($date, 'L23', $time4);

		$data['data']['L24'] = $this->Bus_model->report($date, 'L24', $time1);
		$data['data']['L24_2'] = $this->Bus_model->report($date, 'L24', $time2);
		$data['data']['L24_3'] = $this->Bus_model->report($date, 'L24', $time3);
		$data['data']['L24_4'] = $this->Bus_model->report($date, 'L24', $time4);

		$data['data']['L25'] = $this->Bus_model->report($date, 'L25', $time1);
		$data['data']['L25_2'] = $this->Bus_model->report($date, 'L25', $time2);
		$data['data']['L25_3'] = $this->Bus_model->report($date, 'L25', $time3);
		$data['data']['L25_4'] = $this->Bus_model->report($date, 'L25', $time4);

		$data['data']['L26'] = $this->Bus_model->report($date, 'L26', $time1);
		$data['data']['L26_2'] = $this->Bus_model->report($date, 'L26', $time2);
		$data['data']['L26_3'] = $this->Bus_model->report($date, 'L26', $time3);
		$data['data']['L26_4'] = $this->Bus_model->report($date, 'L26', $time4);

		$data['data']['L27'] = $this->Bus_model->report($date, 'L27', $time1);
		$data['data']['L27_2'] = $this->Bus_model->report($date, 'L27', $time2);
		$data['data']['L27_3'] = $this->Bus_model->report($date, 'L27', $time3);
		$data['data']['L27_4'] = $this->Bus_model->report($date, 'L27', $time4);

		$data['data']['L28'] = $this->Bus_model->report($date, 'L28', $time1);
		$data['data']['L28_2'] = $this->Bus_model->report($date, 'L28', $time2);
		$data['data']['L28_3'] = $this->Bus_model->report($date, 'L28', $time3);
		$data['data']['L28_4'] = $this->Bus_model->report($date, 'L28', $time4);

		$data['data']['L29'] = $this->Bus_model->report($date, 'L29', $time1);
		$data['data']['L29_2'] = $this->Bus_model->report($date, 'L29', $time2);
		$data['data']['L29_3'] = $this->Bus_model->report($date, 'L29', $time3);
		$data['data']['L29_4'] = $this->Bus_model->report($date, 'L29', $time4);

		$data['data']['L30'] = $this->Bus_model->report($date, 'L30', $time1);
		$data['data']['L30_2'] = $this->Bus_model->report($date, 'L30', $time2);
		$data['data']['L30_3'] = $this->Bus_model->report($date, 'L30', $time3);
		$data['data']['L30_4'] = $this->Bus_model->report($date, 'L30', $time4);

		$data['data']['L31'] = $this->Bus_model->report($date, 'L31', $time1);
		$data['data']['L31_2'] = $this->Bus_model->report($date, 'L31', $time2);
		$data['data']['L31_3'] = $this->Bus_model->report($date, 'L31', $time3);
		$data['data']['L31_4'] = $this->Bus_model->report($date, 'L31', $time4);

		$data['data']['L32'] = $this->Bus_model->report($date, 'L32', $time1);
		$data['data']['L32_2'] = $this->Bus_model->report($date, 'L32', $time2);
		$data['data']['L32_3'] = $this->Bus_model->report($date, 'L32', $time3);
		$data['data']['L32_4'] = $this->Bus_model->report($date, 'L32', $time4);

		$data['data']['L99'] = $this->Bus_model->report($date, 'L99', $time1);
		$data['data']['L99_2'] = $this->Bus_model->report($date, 'L99', $time2);
		$data['data']['L99_3'] = $this->Bus_model->report($date, 'L99', $time3);
		$data['data']['L99_4'] = $this->Bus_model->report($date, 'L99', $time4);

		$this->load->view('report', $data);
	}


	public function mail_status()
	{
		$this->load->view('mail_status');
	}

	public function staff_by_lo()
	{
		# code...
		$this->load->view('admin_bar');
		$lo = $this->input->post('lo');
		if ($lo == '') {
			$lo = 'L0';
		}

		$data['lo'] = $lo;
		$data['location'] = $this->Bus_model->get_location();
		$data['staff_a'] = $this->Bus_model->staff_by_lo($lo, 'A');
		$data['staff_b'] = $this->Bus_model->staff_by_lo($lo, 'B');
		$data['staff_c'] = $this->Bus_model->staff_by_lo($lo, 'C');

		$this->load->view('staff_by_lo', $data);
	}
	public function staff_by_lo_l()
	{
		# code...
		$this->load->view('leader_bar');
		$lo = $this->input->post('lo');
		if ($lo == '') {
			$lo = 'L0';
		}

		$data['lo'] = $lo;
		$data['location'] = $this->Bus_model->get_location();
		$data['staff_a'] = $this->Bus_model->staff_by_lo($lo, 'A');
		$data['staff_b'] = $this->Bus_model->staff_by_lo($lo, 'B');
		$data['staff_c'] = $this->Bus_model->staff_by_lo($lo, 'C');

		$this->load->view('staff_by_lo', $data);
	}

	public function late()
	{
		$date = $this->input->post('date');
		if ($date == '') {
			$date = date('Y-m-d');
		}
		$dt = $this->Bus_model->now();
		$dt = check($dt);
		$dt = date('H:i:s', strtotime($dt));
		// echo date('H:i:s' ,strtotime($dt));
		// if ($dt > '14:15:00') {
		$data['a_'] = $this->Bus_model->late('14:10:00', '17:00:00', $date);
		$data['b_'] = $this->Bus_model->late_b('14:10:00', '17:00:00', $date);
		$data['c_'] = $this->Bus_model->late('14:10:00', '20:00:00', $date);
		$data['d_'] = $this->Bus_model->late_b('14:10:00', '20:00:00', $date);
		$data['time_a_'] = '17:00:00';
		$data['time_b_'] = '20:00:00';
		// } else {
		$data['a'] = $this->Bus_model->late('21:10:00', '05:00:00', $date);
		$data['b'] = $this->Bus_model->late_b('21:10:00', '05:00:00', $date);
		$data['c'] = $this->Bus_model->late('21:10:00', '08:00:00', $date);
		$data['d'] = $this->Bus_model->late_b('21:10:00', '08:00:00', $date);
		$data['time_a'] = '05:00:00';
		$data['time_b'] = '08:00:00';
		// }

		$xdate = strtotime(date('Y-m-d', strtotime($date)));
		$date_a = $date;
		$date_b = date('Y-m-d', strtotime('+ 1 days', $xdate));
		$data['date_a'] = $date_a;
		$data['date_b'] = $date_b;
		// echo $data['a'];
		// echo '<br>';
		// echo $data['b'];
		// echo '<br>';
		// echo $data['c'];
		// echo '<br>';
		// echo $data['d'];
		// echo '<br>';
		// echo $date_a;
		// echo '<br>';
		// echo $date_b;

		$this->load->view('admin_bar');
		$this->load->view('late', $data);
	}

	public function leader()
	{
		$shop = $_SESSION['shop'];
		$dept = $this->input->post('dept');
		$shift = $this->input->post('shift');
		$data['dept'] = $this->Bus_model->leader_dept($shop);
		$data['shift'] = $shift;
		$data['dept_'] = $dept;
		$data['emp'] = $this->Bus_model->leader_emp($shop, $dept, $shift);
		$data['lo'] = $this->Bus_model->get_location();

		$date = date('Y-m-d');
		$x_date = new DateTime($date);
		$x_date->modify('+1 day');
		// print_r($data['emp']);
		$data['f_date'] = $date;
		$data['t_date'] = $x_date->format("Y-m-d");
		$this->load->view('leader_bar');
		$this->load->view('leader', $data);
	}
	public function lead_add()
	{
		// print_r($_POST);
		// echo '<br>';
		$EmpCode = $this->input->post('EmpCode');
		$name = $this->input->post('name');
		$shop = $this->input->post('shop');
		$dept = $this->input->post('shop2');
		$shift = $this->input->post('shift');
		$station = $this->input->post('station');
		$lo = $this->input->post('lo');
		$status = $this->input->post('status');
		$time = $this->input->post('time');
		$f_date = $this->input->post('f_date');
		$t_date = $this->input->post('t_date');
		$i = 0;
		$a = '';

		$begin = new DateTime($f_date);
		$end = new DateTime($t_date);

		$a .= 'VALUE';
		$i = 0;
		$b = '';
		for ($x = $begin; $x <= $end; $x->modify('+1 day')) {
			$date = $x->format("Y-m-d");
			foreach ($status as $c) {
				$check = $this->Bus_model->lead_check($EmpCode[$c], $date);
				$check = check($check);
				// echo $check.'<br>';
				if ($check <= 0) {

					if ($i > 0) {
						$a .= ',';
					}
					$a .= " ('" . $EmpCode[$c] . "' ,'" . $shop[$c] . "' ,'" . $dept[$c] . "' ,'" . $shift[$c] . "' ,'" . $lo[$c] . "' ,'" . $station[$c] . "','" . $time . "','" . $date . "') ";
					$i++;
				} else {
					$b .= $EmpCode[$c] . ' ' . $name[$c] . " วันที่ " . date('d/m/Y', strtotime($date)) . " ทำรายการซ้ำ<br>";
				}
			}

			// line noti
			// ini_set('display_errors', 1);
			// ini_set('display_startup_errors', 1);
			// error_reporting(E_ALL);
			// date_default_timezone_set("Asia/Bangkok");

			// $sToken = "eJK4Xb9MY8gEeEDiLL1rFiUiMUHHO2PwO9bOq9BoFso";
			// $sMessage = "\n".$_SESSION['shop']." ".$_SESSION['shop']." จองรถวันที่ ".$date." แล้วจ้า \n";


			// $chOne = curl_init(); 
			// curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
			// curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
			// curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
			// curl_setopt( $chOne, CURLOPT_POST, 1); 
			// curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
			// $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
			// curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
			// curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
			// $result = curl_exec( $chOne ); 

			// //Result error 
			// if(curl_error($chOne)) 
			// { 
			// 	echo 'error:' . curl_error($chOne); 
			// } 
			// else { 
			// 	$result_ = json_decode($result, true); 
			// 	echo "status : ".$result_['status']; echo "message : ". $result_['message'];
			// } 
			// curl_close( $chOne ); 
			// end line noti

		}

		$datas = $this->Bus_model->leader_add($a);

		$data['dub'] = $b;
		$data['status'] = $datas;
		$data['page'] = 'leader';
		$this->load->view('leader_confirm', $data);
	}

	public function lead_edit()
	{
		$shop = $_SESSION['shop'];
		$dept = $this->input->post('dept');
		$shift = $this->input->post('shift');
		$date = $this->input->post('date');
		// echo $shift.$dept;

		$level = $this->input->post('level');
		$id = $this->input->post('id');

		// echo $level.' '.$id;

		if ($date == '') {
			$data['date'] = date('Y-m-d');
			$date = date('Y-m-d');
		} else {
			$data['date'] = $date;
		}
		$data['dept'] = $this->Bus_model->leader_dept($shop);
		$data['shift'] = $shift;
		$data['dept_'] = $dept;
		$data['emp'] = $this->Bus_model->leader_emp($shop, $dept, $shift);
		$data['lo'] = $this->Bus_model->get_location();

		$data['emp'] = $this->Bus_model->leader_get_edit($shop, $dept, $shift, $date);

		$this->load->view('leader_bar');
		$this->load->view('leader_edit', $data);
	}

	public function lead_edit_()
	{
		$id = $this->input->post('id');
		$lo = $this->input->post('lo');
		$time = $this->input->post('time');
		$level = $this->input->post('level');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$dept = $this->input->post('dept');
		$status = $this->input->post('status');
		$desc = $this->input->post('desc');

		// echo $id.' '.$lo.' '.$time.' '.$level;
		$data['status'] = '';
		$data['dub'] = '';
		if ($level == 'edit') {
			$data['status'] = $this->Bus_model->leader_edit($id, $time, $lo, $status, $desc);
		} else if ($level == 'delete') {
			$data['status'] = $this->Bus_model->leader_delete($id);
		}
		$data['page'] = 'lead_edit';
		$data['date'] = $date;
		$data['shift'] = $shift;
		$data['dept'] = $dept;
		// echo $date;
		$this->load->view('leader_confirm', $data);
	}

	public function lead_change_lo()
	{
		$shop = $_SESSION['shop'];
		$mail = $_SESSION['mail'];
		$emp_code = $this->input->post('emp');

		$data['emp_change'] = $this->Bus_model->leader_change_lo_data($shop, $mail);
		$data['emp_'] = $this->Bus_model->leader_emp($shop, '', '');
		$data['emp'] = $this->Bus_model->get_emp($emp_code);
		$data['lo'] = $this->Bus_model->get_location();
		$lo = $this->Bus_model->get_location();

		$lo_a = $this->Bus_model->get_lo_3('A');
		$lo_b = $this->Bus_model->get_lo_3('B');
		$lo_c = $this->Bus_model->get_lo_3('C');

		foreach ($lo as $l) {
			$A[$l->location_code] = array();
			$B[$l->location_code] = array();
			$C[$l->location_code] = array();
			$AC[$l->location_code] = array();
			$BC[$l->location_code] = array();
			if ($l->location_code != 'L0') {
				$lo_['A'][$l->location_code] = array();
				$lo_['B'][$l->location_code] = array();
				$lo_['C'][$l->location_code] = array();
			}
		}
		// echo '<br>';
		// $data['lo'] = '';

		// echo 'A<br>';
		foreach ($lo_a as $a) {
			// echo $a->location_code.'-'.$a->emp.'<br>';
			array_push($lo_['A'][$a->location_code], $a->emp);
		}
		// echo 'B<br>';
		foreach ($lo_b as $b) {
			// echo $b->location_code.'-'.$b->emp.'<br>';
			array_push($lo_['B'][$b->location_code], $b->emp);
		}
		// echo 'C<br>';
		foreach ($lo_c as $c) {
			// echo $c->location_code.'-'.$c->emp.'<br>';
			array_push($lo_['C'][$c->location_code], $c->emp);
		}


		foreach ($lo as $l) {
			if (!empty($lo_['A'][$l->location_code])) {
				// echo 'A '.$l->location_code.' '.$lo_['A'][$l->location_code][0].'<br>';
				$A[$l->location_code] = $lo_['A'][$l->location_code][0];
			} else {
				// echo'A '. $l->location_code.' 0<br>';
				$A[$l->location_code] = 0;
			}
			if (!empty($lo_['B'][$l->location_code])) {
				// echo 'B '.$l->location_code.' '.$lo_['B'][$l->location_code][0].'<br>';
				$B[$l->location_code] = $lo_['B'][$l->location_code][0];
			} else {
				// echo 'B '.$l->location_code.' 0<br>';
				$B[$l->location_code] = 0;
			}
			if (!empty($lo_['C'][$l->location_code])) {
				// echo 'C '.$l->location_code.' '.$lo_['C'][$l->location_code][0].'<br>';
				$C[$l->location_code] = $lo_['C'][$l->location_code][0];
			} else {
				// echo 'C '.$l->location_code.' 0<br>';
				$C[$l->location_code] = 0;
			}
		}

		foreach ($lo as $l) {
			$i = 0;
			$i = $A[$l->location_code] + $C[$l->location_code];
			array_push($AC[$l->location_code], $i);
			$j = 0;
			$j = $B[$l->location_code] + $C[$l->location_code];
			array_push($BC[$l->location_code], $j);
		}
		$data['AC'] = $AC;
		$data['BC'] = $BC;

		// echo json_encode($data['AC']);
		$this->load->view('leader_bar');
		$this->load->view('leader_change_lo', $data);
	}
	public function change_lo()
	{
		// print_r($_POST);

		$emp = $this->input->post('emp');
		$name = $this->input->post('name');

		$id = $this->input->post('id');
		$n_location = $this->input->post('n_location');
		$n_station = $this->input->post('n_station');
		$desc = $this->input->post('desc');
		$date = $this->input->post('date');
		$leader = $this->input->post('leader');
		$staff = $this->input->post('staff');

		$lo_ = $this->Bus_model->get_location_2($n_location);
		foreach ($lo_ as $x) {
			$lo_desc = $x->description;
		}

		$status = $this->Bus_model->leader_change_lo($emp, $n_location, $n_station, $date, $staff, $desc, $leader);
		echo $status;
		if ($status == 'success') {
			$body = $emp . ' ' . $name . ' ต้องการเปลี่ยนสายรถเป็น ' . $lo_desc . ' ' . $n_station . ' เริ่มวันที่ ' . $date;
			// $mail = chang_lo_mail($body, 'patompong.chi@univance.co.th');
			$mail = chang_lo_mail($body, $leader);
			$data['dub'] = '';
			$data['status'] = $mail;
			$data['page'] = 'lead_change_lo';
			$this->load->view('leader_confirm', $data);
		} else {
			$data['dub'] = '';
			$data['status'] = 'ทำรายการไม่สำเร็จ';
			$data['page'] = 'lead_change_lo';
			$this->load->view('leader_confirm', $data);
		}
	}

	public function approved()
	{
		// print_r($_SESSION);
		$level = $_SESSION['level'];
		$shop = $_SESSION['shop'];
		$mail = $_SESSION['mail'];
		if ($level == 'Admin') {
			$data['approved_emp'] = $this->Bus_model->approved('');
			$this->load->view('admin_bar');
			$this->load->view('sup_approve', $data);
		} else {
			$data['approved_emp'] = $this->Bus_model->approved($mail);
			$this->load->view('leader_bar');
			$this->load->view('sup_approve', $data);
		}
	}

	public function approved_process()
	{
		$level = $_SESSION['level'];
		$shop = $_SESSION['shop'];
		$sup = $this->input->post('sup');
		$hr = $this->input->post('hr');
		$id = $this->input->post('id');

		if ($hr == '') {
			$data['dub'] = '';
			$data['status'] = $this->Bus_model->approved_process($id, $sup, $hr);
			// $status = $this->Bus_model->approved_process($id,$sup,$hr);
			$data['page'] = 'approved';
			$data['status'] .= ' ';
			$data['status'] .= chang_lo_mail('', $sup);
			$this->load->view('leader_confirm', $data);
		} else {
			$data['dub'] = '';
			$data['status'] = $this->Bus_model->approved_process($id, $sup, $hr);
			// $status = $this->Bus_model->approved_process($id,$sup,$hr);
			$data['page'] = 'approved';
			$this->load->view('leader_confirm', $data);
			// echo $status;
		}
	}

	public function leader_report()
	{
		$shop = $_SESSION['shop'];
		$date = $this->input->post('date');

		if ($date == '') {
			$date = date('Y-m-d');
		}

		$time1 = '17:00:00';
		$time2 = '20:00:00';
		$time3 = '05:00:00';
		$time4 = '08:00:00';

		$data['date'] = $date;

		$data['time1'] = $time1;
		$data['time2'] = $time2;
		$data['time3'] = $time3;
		$data['time4'] = $time4;

		// $data['emp_1'] = $this->Bus_model->leader_report($shop, $date, $time1);
		// $data['emp_2'] = $this->Bus_model->leader_report($shop, $date, $time2);
		// $data['emp_3'] = $this->Bus_model->leader_report($shop, $date, $time3);
		// $data['emp_4'] = $this->Bus_model->leader_report($shop, $date, $time4);

		$this->load->view('leader_bar');
		$this->load->view('leader_report', $data);
	}
	public function leader_report_data()
	{
		$shop = $_GET['shop'];
		$date = $_GET['date'];
		$time = $_GET['time'];
		$data = $this->Bus_model->leader_report($shop, $date, $time);
		echo json_encode($data);
	}
	public function leader_ot()
	{
		$shop = $_SESSION['shop'];
		$data['dept'] = $this->Bus_model->leader_dept($shop);
		$shift = $this->input->post('shift');
		$dept_ = $this->input->post('dept');

		$date = $this->input->post('date');
		if ($date == '') {
			$date = date('Y-m-d');
		}
		$data['date'] = $date;
		$data['shift'] = $shift;
		$data['dept_'] = $dept_;

		$a = array();
		$a = x_week_range($date);

		$begin = new DateTime(date('Y-m-d', strtotime($a[0] . " +1 days")));
		$end = new DateTime(date('Y-m-d', strtotime($a[0] . " +8 days")));
		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($begin, $interval, $end);
		foreach ($period as $dt) {
			$xdate = $dt->format("Y-m-d");
			$name_date = $dt->format("l");
			echo $name_date . ' ' . $xdate . '<br>';
		}
		if ($shift != '' && $dept_ != '') {
			// 	// $data['ot'] = $this->Bus_model->leader_ot($shift,$dept_);
			$emp = $this->Bus_model->leader_emp($shop, $dept_, $shift);
			foreach ($emp as $x) {
				// 		$data['ot'][$x->EmpCode] = $this->Bus_model->leader_ot($x->EmpCode,$date);
				echo $x->EmpCode . ' ';
				foreach ($period as $dt) {
					$xdate = $dt->format("Y-m-d");
					$name_date = $dt->format("l");

					$data_t = $this->Bus_model->leader_ot($x->EmpCode, $xdate);
					if (empty($data_t)) {
						$data_t = 0;
					} else {
						$data_t = check($data_t);
					}

					if ($data_t != 0) {
						$ot = date('H', strtotime($data_t));
						if ($name_date == 'Saturday' || $name_date == 'Sunday') {
							if ($ot = '17') {
								$ot = '8';
							} else if ($ot = '20') {
								$ot = '10.5';
							}
						} else {
							if ($ot = '17') {
								$ot = '0';
							} else if ($ot = '20') {
								$ot = '2.5';
							}
						}
					} else {
						$ot = $data_t;
					}

					echo $name_date . ' ' . $ot . ' ';
				}
				echo '<br>';
			}
			// }else{
			// 	// $data['ot'] = '';
		}
		$this->load->view('leader_bar');
		$this->load->view('leader_ot', $data);
	}

	public function img()
	{
		echo '<center><img src="http://172.28.1.23/app/images/loading.gif" /> </center>';
		$this->load->view('loading');
	}

	public function chart()
	{
		$num_17 = array();
		$date_17 = array();
		$num_20 = array();
		$date_20 = array();
		$num_05 = array();
		$date_05 = array();
		$num_08 = array();
		$date_08 = array();
		$num_year = array();
		$month_year = array();
		$date = $this->input->post('date');
		if ($date == '') {
			$date = date('Y-m');
		}
		$month = date('m', strtotime($date));
		$year = date('Y', strtotime($date));

		$data_17 = $this->Bus_model->chart($year, $month, '17:00:00');
		if (!empty($data_17)) {
			foreach ($data_17 as $a) {
				array_push($num_17, $a->num);
				array_push($date_17, date('d M', strtotime($a->date)));
			}
			$data['num_17'] = $num_17;
			$data['date_17'] = $date_17;
		} else {
			$data['num_17'] = '';
			$data['date_17'] = '';
		}
		$data_20 = $this->Bus_model->chart($year, $month, '20:00:00');
		if (!empty($data_20)) {
			foreach ($data_20 as $b) {
				array_push($num_20, $b->num);
				array_push($date_20, date('d M', strtotime($b->date)));
			}
			$data['num_20'] = $num_20;
			$data['date_20'] = $date_20;
		} else {
			$data['num_20'] = '';
			$data['date_20'] = '';
		}
		$data_05 = $this->Bus_model->chart($year, $month, '05:00:00');
		if (!empty($data_05)) {
			foreach ($data_05 as $c) {
				array_push($num_05, $c->num);
				array_push($date_05, date('d M', strtotime($c->date)));
			}
			$data['num_05'] = $num_05;
			$data['date_05'] = $date_05;
		} else {
			$data['num_05'] = '';
			$data['date_05'] = '';
		}
		$data_08 = $this->Bus_model->chart($year, $month, '08:00:00');
		if (!empty($data_08)) {
			foreach ($data_08 as $d) {
				array_push($num_08, $d->num);
				array_push($date_08, date('d M', strtotime($d->date)));
			}
			$data['num_08'] = $num_08;
			$data['date_08'] = $date_08;
		} else {
			$data['num_08'] = '';
			$data['date_08'] = '';
		}

		$data_year = $this->Bus_model->chart_month($year);
		//print_r($data_year);
		if (!empty($data_year)) {
			foreach ($data_year as $e) {
				array_push($num_year, $e->num);
				// array_push($month_year,$e->month);
				array_push($month_year, date('M', strtotime($e->date)));
			}
			$data['num_year'] = $num_year;
			$data['month_year'] = $month_year;
		} else {
			$data['num_year'] = '';
			$data['month_year'] = '';
		}
		$data['date'] = $date;
		$this->load->view('chart_js', $data);
		// $this->load->view('chart',$data);
	}

	public function line()
	{
		$this->load->view('admin_bar');

		$data['shop'] = $this->Bus_model->disrinct_shop();

		$this->load->view('line', $data);
	}

	public function get_emp()
	{
		$emp = $_GET['emp'];
		$data = $this->Bus_model->get_emp($emp);
		echo json_encode($data);
	}
	public function bus_report_report()
	{
		$arr = array();
		$lo = $this->Bus_model->bus_report_lo();
		if (isset($_GET['date']) && !empty($_GET['date'])) {
			$date = $_GET['date'];
		} else {
			$date = date('Y-m-d');
		}
		$data = $this->Bus_model->bus_report_report($date);
		if (count($data) > 0) {
			$arr['t05'] = array();
			$arr['t08'] = array();
			$arr['t17'] = array();
			$arr['t20'] = array();
			foreach ($lo as $l) {
				$arr['t05'][$l->location_code] = array();
				$arr['t08'][$l->location_code] = array();
				$arr['t17'][$l->location_code] = array();
				$arr['t20'][$l->location_code] = array();
			}
		}
		$i = 0;
		foreach ($data as $x) {
			if ($x->time == '05:00:00') {
				array_push($arr['t05'][$x->location_code], $x);
			}
			if ($x->time == '08:00:00') {
				array_push($arr['t08'][$x->location_code], $x);
			}
			if ($x->time == '17:00:00') {
				array_push($arr['t17'][$x->location_code], $x);
			}
			if ($x->time == '20:00:00') {
				array_push($arr['t20'][$x->location_code], $x);
			}
			$i++;
		}

		echo json_encode($arr, JSON_PRETTY_PRINT);

	}
	public function bus_report_lo()
	{
		$arr = array();
		$lo = $this->Bus_model->bus_report_lo();
		foreach($lo as $x){
			array_push($arr, $x);
		}
		echo json_encode($arr, JSON_PRETTY_PRINT);
	}
}

/* End of file Controllername.php */

function chang_lo_mail($mail, $leader)
{
	$subject = '=?utf-8?B?' . base64_encode("ตอบรับแบบฟอร์มขอเปลี่ยนสายรถรับส่ง") . '?=';
	$body = 'คำขอต้องการเปลี่ยนสายรถ<br>' . $mail;
	$body .= '<br>เข้าสู่ระบบ เลือกเมนู Approved เพื่อทำการอนุมัติ<br>https://172.28.1.23/app/Approved.php?mode=manager&manager_name=' . $leader;
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/HTML; charset=utf-8' . "\r\n";
	$headers .= "From: Bus Time Management Change Location\r\n";
	$headers .= "From: Bus Time Management Change Location" . "\r\n";
	if (mail($leader, $subject, $body, $headers)) {
		return "ส่งแบบฟอร์มเรียบร้อย";
	} else {
		return "ส่งแบบฟอร์มผิดพลาด";
	}
}

function check($data)
{
	foreach ($data as $x) {
		$result = $x->c;
	}
	return $result;
}

function x_week_range($date)
{
	$ts = strtotime($date);
	$start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
	return array(
		date('Y-m-d', $start),
		date('Y-m-d', strtotime('next saturday', $start))
	);
}