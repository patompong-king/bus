<?php
class Bus_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function now()
	{
		$sql = "SELECT now() as c";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function login($user, $pass)
	{
		$sql = "SELECT * FROM `user_bus` WHERE `username` = '" . $user . "' AND `password` = '" . $pass . "' ";
		$query = $this->db->query($sql);
		return $query->result();
	}
	public function admin($shop, $dept, $shift)
	{
		$sql = "SELECT a.*,l.description FROM master_emp a LEFT JOIN location l ON a.location = l.location_code WHERE a.f_name <> 'admin' AND a.l_name <> 'admin' AND a.l_name <> 'Head' AND a.shop <> 'admin' ";
		if ($shop != '') {
			$sql .= "AND a.shop = '" . $shop . "' ";
		}
		if ($dept != '') {
			$sql .= "AND a.shop2 = '" . $dept . "' ";
		}
		if ($shift != '') {
			$sql .= "AND a.shift = '" . $shift . "' ";
		}
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_emp($emp)
	{
		$sql = "SELECT a.*,l.description FROM master_emp a LEFT JOIN location l ON a.location = l.location_code WHERE a.f_name <> 'admin' AND a.l_name <> 'admin' AND a.l_name <> 'Head' AND a.shop <> 'admin' AND EmpCode = '" . $emp . "' ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_location()
	{
		$sql = "SELECT * FROM `location` ORDER BY `number` ASC";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_location_2($lo)
	{
		$sql = "SELECT * FROM `location` WHERE location_code = '" . $lo . "'";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function get_lo_3($shift)
	{
		$sql = "SELECT b.number,a.location,b.description,b.location_code,COUNT(a.id) as emp FROM `master_emp` a 
		LEFT JOIN location b ON a.location = b.location_code 
		WHERE a.location != '' AND a.location != 'Z'  AND b.location_code != 'L0' AND a.shift = '" . $shift . "' 
		GROUP BY a.location  
		ORDER BY `b`.`number` ASC ";
		$query = $this->db->query($sql);
		return $query->result();
	}

	public function edit_emp($id, $emp_code, $title, $f_name, $l_name, $nickname, $mail, $phone, $shop, $dept, $shift, $time, $location, $station)
	{
		$sql = "UPDATE master_emp SET EmpCode = '" . $emp_code . "', title = '" . $title . "' ,mail = '" . $mail . "' ,f_name = '" . $f_name . "' ,l_name = '" . $l_name . "' ,nickname = '" . $nickname . "' ,shop = '" . $shop . "' ,shop2 = '" . $dept . "' ,`time_s` = '" . $time . "', shift = '" . $shift . "' , location = '" . $location . "' , station = '" . $station . "' , phone = '" . $phone . "' WHERE `id` = '" . $id . "';";
		$sql2 = "UPDATE `departure` SET `shop`= '" . $shop . "',`dept`= '" . $dept . "' WHERE `staff_code` = '" . $emp_code . "' ";
		if ($this->db->query($sql)) {
			$this->db->query($sql2);
			return 'success';
		} else {
			return 'unsuccess';
		}

	}
	public function delete_emp($id, $emp_code)
	{
		$sql = "DELETE FROM `departure` WHERE staff_code = '" . $emp_code . "' AND date >= '" . date('Y-m-d') . "'; ";
		$sql1 = "DELETE FROM master_emp WHERE id = '" . $id . "'; ";

		if ($this->db->query($sql1)) {
			if ($this->db->query($sql)) {
				return 'success';
			} else {
				return 'unsuccess';
			}
		} else {
			return 'unsuccess';
		}
	}
	public function new_staff($emp_code, $Shop, $Shop2, $title, $f_name, $l_name, $shift, $phone, $nickname, $location, $station, $time)
	{
		$sql = "INSERT INTO `master_emp`(`EmpCode`, `title`, `f_name`, `l_name`, `nickname`, `phone`, `shop`,`shop2`, `location`, `station`, `shift`,`time_s`) VALUES ";
		$sql .= "('" . $emp_code . "','" . $title . "','" . $f_name . "','" . $l_name . "','" . $nickname . "','" . $phone . "','" . $Shop . "','" . $Shop2 . "','" . $location . "','" . $station . "','" . $shift . "','" . $time . "')";

		if ($this->db->query($sql)) {
			return 'success';
		} else {
			return 'unsuccess';
		}
	}

	public function check($emp_code)
	{
		$sql = "SELECT count(id) as c FROM master_emp WHERE EmpCode = '" . $emp_code . "' ";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function report($date, $lo, $time)
	{
		$sql = "SELECT d.`id`, d.`date`, d.`time`, d.`location_code`, d.`status`, d.`description` as `desc`,l.description, d.`staff_code`,
				a.title,a.f_name,a.l_name,a.nickname,d.station,a.phone,a.shop,a.shop2,a.shift,d.create_date_time
				FROM `departure` d
				LEFT JOIN location l ON d.location_code = l.location_code
				LEFT JOIN master_emp a ON a.EmpCode = d.`staff_code`
				WHERE d.date = '" . $date . "'
				AND d.time = '$time'
				AND d.location_code = '$lo'
				ORDER BY d.time,l.description";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function count_staff_in_lo()
	{
		$sql = "SELECT COUNT(a.`id`) as num_staff,a.shift,l.location_code,l.description FROM `master_emp` a LEFT JOIN location l ON a.location = l.location_code ";
		$sql .= "WHERE a.f_name <> 'admin' AND a.l_name <> 'admin' AND a.l_name <> 'Head' AND a.shop <> 'admin' ";
		$sql .= "GROUP BY l.location_code,a.shift";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function staff_by_lo($lo, $shift)
	{
		$sql = "SELECT a.*,l.location_code,l.description FROM `master_emp` a LEFT JOIN location l ON a.location = l.location_code WHERE a.location = '" . $lo . "' AND a.shift = '" . $shift . "' AND a.f_name <> 'admin' AND a.l_name <> 'admin' AND a.l_name <> 'Head' AND a.shop <> 'admin' ORDER BY a.id ";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function late($time, $time_b, $xdate)
	{
		$date_a = date('Y-m-d', strtotime($xdate));
		$date_b = date('Y-m-d H:i:s', strtotime($xdate . ' ' . $time));

		$sql = "SELECT a.EmpCode,a.title,a.f_name,a.l_name,b.time,b.date,b.create_date_time,a.shop,a.shop2,a.nickname,c.description as lo_ FROM `departure` b LEFT JOIN master_emp a ON a.EmpCode = b.staff_code LEFT JOIN `location` c ON a.location = c.location_code WHERE b.create_date_time >= '" . $date_b . "' AND b.date = '" . $date_a . "' AND `b`.`time` = '" . $time_b . "' ORDER BY `b`.`create_date_time` ";
		// $sql = "SELECT * FROM `departure` b LEFT JOIN master_emp a ON a.EmpCode = b.staff_code LEFT JOIN `location` c ON a.location = c.location_code WHERE b.create_date_time > '2021-06-01 14:15:00' AND b.date = '2021-06-01' AND `b`.`time` = '".$time_b."'";
		$data = $this->db->query($sql);
		return $data->result();
		// return $sql;
	}
	public function late_b($time, $time_b, $xdate)
	{
		$date = strtotime(date('Y-m-d'), strtotime($xdate));
		$date_b = date('Y-m-d H:i:s', strtotime($xdate . ' ' . $time));
		$date_c = date('Y-m-d', strtotime('+ 1 days', strtotime($xdate)));

		$sql = "SELECT a.EmpCode,a.title,a.f_name,a.l_name,b.time,b.date,b.create_date_time,a.shop,a.shop2,a.nickname,c.description as lo_  FROM `departure` b LEFT JOIN master_emp a ON a.EmpCode = b.staff_code LEFT JOIN `location` c ON a.location = c.location_code WHERE b.create_date_time >= '" . $date_b . "' AND b.date = '" . $date_c . "' AND `b`.`time` = '" . $time_b . "' ORDER BY `b`.`create_date_time` ";
		// $sql = "SELECT * FROM `departure` b LEFT JOIN master_emp a ON a.EmpCode = b.staff_code LEFT JOIN `location` c ON a.location = c.location_code WHERE b.create_date_time > '2021-06-01 21:15:00' AND b.date = '2021-06-01' AND `b`.`time` = '".$time_b."'";
		$data = $this->db->query($sql);
		return $data->result();
		// return $sql;
	}

	public function count_staff_by_lo($shop, $dept, $shift)
	{
		$sql = "SELECT COUNT(d.`EmpCode`) as num_staff,d.`location`,l.description FROM `master_emp` d LEFT JOIN location l ON l.location_code = d.location WHERE d.f_name <> 'admin' AND d.l_name <> 'admin' AND d.l_name <> 'Head' AND d.shop <> 'admin' "; // l.description != ''
		if ($shop != '') {
			$sql .= "AND d.shop = '" . $shop . "' ";
		}
		if ($dept != '') {
			$sql .= "AND d.shop2 = '" . $dept . "' ";
		}
		if ($shift != '') {
			$sql .= "AND d.shift = '" . $shift . "' ";
		}
		$sql .= "GROUP BY d.`location` ORDER BY l.number";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function leader_emp($shop, $dept, $shift)
	{
		$sql = "SELECT a.*,l.description,l.group_lo FROM master_emp a LEFT JOIN location l ON a.location = l.location_code WHERE a.shop ='" . $shop . "' AND a.l_name != 'Head' AND a.f_name != 'Head' AND a.l_name != 'admin' AND a.f_name != 'admin' ";
		if ($dept != '') {
			$sql .= "AND a.shop2 ='" . $dept . "' ";
		}
		if ($shift != '') {
			$sql .= "AND a.shift ='" . $shift . "' ";
		}
		$sql .= "ORDER BY a.shop,a.shop2,a.shift,a.id; ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function leader_dept($shop)
	{
		$sql = "SELECT DISTINCT(shop2) as dept FROM `master_emp` WHERE f_name <> 'admin' AND l_name <> 'admin' AND l_name <> 'Head' AND shop <> 'admin' AND shop = '" . $shop . "' ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function leader_add($data)
	{
		if ($data != 'VALUE') {
			$sql = "INSERT INTO `departure` (`staff_code`,`shop`,`dept`,`shift`,`location_code`,`station`,`time`,`date`) ";
			$sql .= $data;
			// return $sql;
			if ($this->db->query($sql)) {
				return 'ทำรายการสำเร็จ';
			} else {
				return 'ทำรายการไม่สำเร็จ';
			}
		} else {
			return 'ทำรายการสำเร็จ';
		}
	}
	public function lead_check($emp, $date)
	{
		$sql = "SELECT COUNT(staff_code) as c FROM `departure` WHERE `date` = '" . $date . "' AND `staff_code` = '" . $emp . "' ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function leader_get_edit($shop, $dept, $shift, $date)
	{
		$sql = "SELECT d.id,emp.shop2,d.date,d.time,d.location_code,d.station,d.`status`, d.`description`,emp.time_s,d.shift,d.staff_code,d.shop,emp.f_name,emp.title,emp.l_name,emp.nickname ";
		$sql .= "FROM departure d LEFT JOIN master_emp emp ON d.staff_code = emp.EmpCode ";
		$sql .= "WHERE d.shop = '" . $shop . "' AND d.`date` = '" . $date . "'  ";
		if ($dept != '') {
			$sql .= "AND emp.shop2 = '" . $dept . "' ";
		}
		if ($shift != '') {
			$sql .= "AND d.shift = '" . $shift . "' ";
		}
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function leader_edit($id, $time, $lo, $status, $desc)
	{
		$sql = "UPDATE `departure` SET `time` = '" . $time . "', `location_code` = '" . $lo . "', `status` = '" . $status . "', `description` = '" . $desc . "' WHERE `id` = '" . $id . "' ";
		if ($this->db->query($sql)) {
			return 'ทำรายการสำเร็จ';
		} else {
			return 'ทำรายการไม่สำเร็จ';
		}
	}
	public function leader_delete($id)
	{
		$sql = "DELETE FROM `departure` WHERE `id` = '" . $id . "' ";
		if ($this->db->query($sql)) {
			return 'ทำรายการสำเร็จ';
		} else {
			return 'ทำรายการไม่สำเร็จ';
		}
	}
	public function leader_change_lo_data($shop, $mail)
	{
		$sql = "SELECT cl.`id`, cl.`EmpCode`, cl.`new_lo`, cl.`new_station`, cl.`desc`, cl.`phone`, cl.`start_date`, cl.`head`, cl.`manager_name`, cl.`manager`, cl.`hr`, cl.`update_date`
                        ,emp.title,emp.f_name,emp.l_name,emp.nickname,lo.description as lo_des FROM `change_lo` cl 
                    LEFT JOIN master_emp emp ON cl.`EmpCode` = emp.`EmpCode`
                    LEFT JOIN location lo ON lo.location_code = cl.new_lo 
                    WHERE 1 ";
		if ($mail != '') {
			$sql .= "AND cl.manager_name = '" . $mail . "' ";
		} else {
			$sql .= "AND emp.shop = '" . $shop . "' ";
		}
		$sql .= "ORDER BY cl.update_date DESC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function leader_change_lo($emp, $lo, $station, $s_date, $staff, $desc, $leader)
	{
		$sql = "INSERT INTO `change_lo`(`EmpCode`, `new_lo`, `new_station`, `start_date`, `head`,`desc`,`manager_name`,`create`) VALUES 
        ('" . $emp . "','" . $lo . "','" . $station . "','" . $s_date . "','" . $staff . "','" . $desc . "','" . $leader . "','" . date('Y-m-d H:i:s') . "')";
		if ($this->db->query($sql)) {
			return 'success';
		} else {
			return 'unsuccess';
		}
	}

	public function approved($mail)
	{
		$sql = "SELECT a.*,b.description,c.title,c.f_name,c.l_name,c.nickname ,b.description as lo_desc FROM `change_lo` a LEFT JOIN location b ON a.new_lo = b.location_code LEFT JOIN master_emp c ON a.EmpCode = c.EmpCode WHERE 1 ";
		if ($mail != '') {
			$sql .= "AND a.manager_name = '" . $mail . "' ";
			$sql .= "AND a.manager = '' ";
		} else {

			$sql .= "AND a.hr = '' ";
		}
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function approved_process($id, $sup, $hr)
	{
		$sql = "UPDATE `change_lo` SET `manager`='" . $sup . "',`hr`='" . $hr . "' WHERE `id` = '" . $id . "' ";
		if ($this->db->query($sql)) {
			return 'ทำรายการสำเร็จ';
		} else {
			return 'ทำรายการไม่สำเร็จ';
		}
		// return $sql;
	}

	public function leader_report($shop, $date, $time)
	{
		$sql = "SELECT d.`id`, d.`date`, d.`time`, d.`location_code`, d.`status`,l.description, d.`staff_code`,
				a.title,a.f_name,a.l_name,a.nickname,a.station,a.phone,a.shop,a.shop2,a.shift,d.create_date_time,d.description as comment
				FROM `departure` d
				LEFT JOIN location l ON d.location_code = l.location_code
				LEFT JOIN master_emp a ON a.EmpCode = d.`staff_code`
				WHERE d.date = '" . $date . "'
				AND d.time = '" . $time . "'
				AND a.shop = '" . $shop . "'
				ORDER BY a.shop,a.shop2,d.time,l.number";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function leader_ot($emp, $date)
	{
		$sql = "SELECT `time` as c FROM `departure` WHERE staff_code = '" . $emp . "' AND `date` = '" . $date . "' ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function disrinct_shop()
	{
		$sql = "SELECT DISTINCT(shop) FROM `master_emp` WHERE f_name != 'admin' AND l_name <> 'admin' AND l_name <> 'Head' AND shop <> 'admin' ORDER BY `shop` ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function disrinct_dept($shop)
	{
		$sql = "SELECT DISTINCT(shop2) as dept FROM `master_emp` WHERE shop = '" . $shop . "' AND f_name <> 'admin' AND l_name <> 'admin' AND l_name <> 'Head' AND shop <> 'admin' ORDER BY `shop` ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function chart($year, $month, $time)
	{
		$sql = "SELECT date,COUNT(id) as num FROM `departure` WHERE location_code != 'L0' AND MONTH(date) = '" . $month . "' and YEAR(date) = '" . $year . "' and `time` = '" . $time . "' group by date order by date";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function chart_month($year)
	{
		$sql = "SELECT date,YEAR(date) as `year`,COUNT(id) as num FROM `departure` WHERE location_code != 'L0' AND YEAR(date) = '" . $year . "' group by MONTH(date)";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function emp_ot($shop, $dept, $shift)
	{
		$sql = "SELECT * FROM `master_emp` WHERE f_name <> 'admin' AND l_name <> 'admin' AND l_name <> 'Head' AND shop <> 'admin' AND `shop` = '" . $shop . "' ";
		if ($dept != '') {
			$sql .= "AND `shop2` = '" . $dept . "' ";
		}
		if ($shift != '') {
			$sql .= "AND `shift` = '" . $shift . "' ";
		}
		$sql .= "ORDER BY shop2,shift";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function week_on($emp, $dae1, $date2, $date3, $date4, $date5, $date6, $date7)
	{
		$sql = "SELECT EmpCode,`title`, `f_name`, `l_name`, `nickname` ,`shop`,`shop2`,`shift`
		,(SELECT time FROM departure WHERE date = '" . $dae1 . "' AND staff_code = '" . $emp . "') as time1 
		,(SELECT time FROM departure WHERE date = '" . $date2 . "' AND staff_code = '" . $emp . "') as time2 
		,(SELECT time FROM departure WHERE date = '" . $date3 . "' AND staff_code = '" . $emp . "') as time3 
		,(SELECT time FROM departure WHERE date = '" . $date4 . "' AND staff_code = '" . $emp . "') as time4 
		,(SELECT time FROM departure WHERE date = '" . $date5 . "' AND staff_code = '" . $emp . "') as time5 
		,(SELECT time FROM departure WHERE date = '" . $date6 . "' AND staff_code = '" . $emp . "') as time6 
		,(SELECT time FROM departure WHERE date = '" . $date7 . "' AND staff_code = '" . $emp . "') as time7 
		FROM master_emp WHERE EmpCode = '" . $emp . "'";
		$data = $this->db->query($sql);
		return $data->result();
	}

	public function count_staff()
	{
		$sql = "SELECT a.`location_code`, a.`description`, a.`group_lo`, a.`number`,(SELECT COUNT(id) FROM master_emp WHERE location = a.location_code AND shift = 'A') AS A,(SELECT COUNT(id) FROM master_emp WHERE location = a.location_code AND shift = 'B') AS B,(SELECT COUNT(id) FROM master_emp WHERE location = a.location_code AND shift = 'C') AS C FROM `location` a WHERE 1 ORDER BY a.`number` ASC";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function bus_report_lo()
	{
		$sql = "SELECT * FROM `location` WHERE `location_code` != 'L99' ORDER BY `number` ";
		$data = $this->db->query($sql);
		return $data->result();
	}
	public function bus_report_report($date)
	{
		$sql = "SELECT d.`id`, d.`date`, d.`time`, d.`location_code`, d.`status`, d.`description` as `desc`,l.`description`, d.`staff_code`,
						a.`title`,a.`f_name`,a.`l_name`,a.`nickname`,d.`station`,a.`phone`,a.`shop`,a.`shop2`,a.`shift`,d.`create_date_time`
						FROM `departure` d
						LEFT JOIN `location` l ON d.`location_code` = l.`location_code`
						LEFT JOIN `master_emp` a ON a.`EmpCode` = d.`staff_code`
						WHERE l.`location_code` != 'L99' 
						AND d.`date` = '" . $date . "' 
						ORDER BY d.`id`,l.`number`";
		$data = $this->db->query($sql);
		return $data->result();
	}
}