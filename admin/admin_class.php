<?php
session_start();
//To store all the details of painting we have created auction class 
ini_set('display_errors', 1);

class Action
{
	private $db;

	public function __construct()
	{
		ob_start();
		include 'db_connect.php';

		$this->db = $conn;
	}
	function __destruct()
	{
		$this->db->close();
		ob_end_flush();
	}

	//admin login
	function login()
	{

		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
			}
			if ($_SESSION['login_type'] != 1) {
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				return 2;
				exit;
			}
			return 1;
		} else {
			return 3;
		}
	}
	//Seller login
	function slogin()
	{

		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '" . $username . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['slogin_' . $key] = $value;
			}
			if ($_SESSION['slogin_type'] != 3) {
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				return 2;
			}
			return 1;
		} else {
			return 3;
		}
	}
	//bidder login
	function login2()
	{

		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where email = '" . $email . "' or username = '" . $email . "' and password = '" . md5($password) . "' ");
		if ($qry->num_rows > 0) {
			foreach ($qry->fetch_array() as $key => $value) {
				if ($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_' . $key] = $value;
					$_SESSION['slogin_' . $key] = $value;
			}
			if ($_SESSION['login_type'] == 1) {

				return 10;
			}

			if ($_SESSION['login_type'] == 2) {
				return 20;
			}

			if ($_SESSION['login_type'] == 3) {
				return 30;
			}


			foreach ($_SESSION as $key => $value) {
				unset($_SESSION[$key]);
			}

			return 1;
		} else {
			return 3;
		}
	}
	//customer logout
	function logout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}
	//Seller logout
	function slogout()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}
	//Admin logout
	function logout2()
	{
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}
	//It will save the all details of user 
	function save_user()
	{
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		if (!empty($password))
			$data .= ", password = '" . md5($password) . "' ";
		$data .= ", type = '$type' ";
		if ($type == 1)
			$establishment_id = 0;
		$chk = $this->db->query("Select * from users where username = '$username' and id !='$id' ")->num_rows;
		if ($chk > 0) {
			return 2;
			exit;
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO users set " . $data);
		} else {
			$save = $this->db->query("UPDATE users set " . $data . " where id = " . $id);
		}
		if ($save) {
			return 1;
		}
	}
	//It will delete the user of from database
	function delete_user()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = " . $id);
		if ($delete)
			return 1;
	}
	//Registration of seller / Bidder
	function signup()
	{
		extract($_POST);
		$chk = $this->db->query("SELECT * FROM otps where email = '$email' ")->num_rows;

		// Check if the username already exists in the users table
		$chkUsername = $this->db->query("SELECT * FROM users WHERE username = '$username'")->num_rows;

		if ($chkUsername > 0) {
			// Username already exists
			return 2;
		}

		// Check if the first name already exists in the users table
		$chkFirstName = $this->db->query("SELECT * FROM users WHERE name = '$name'")->num_rows;

		if ($chkFirstName > 0) {
			// First name already exists
			return 3; // You can use a different error code if needed
		}

		$chkContnumber = $this->db->query("SELECT * FROM users WHERE contact = '$contact'")->num_rows;

		if ($chkContnumber > 0) {
			// contact already exists
			return 4; // You can use a different error code if needed
		}

		$chkEmail = $this->db->query("SELECT * FROM users WHERE email = '$email'")->num_rows;

		if ($chkEmail > 0) {
			// email already exists
			return 5; // You can use a different error code if needed
		}

		$chkcity = $this->db->query("SELECT * FROM users WHERE city = '$city'")->num_rows;
                //city only for surat
		if ($chkcity > 0) {
			// email already exists
			return 5; // You can use a different error code if needed
		}

		

          if ($chk > 0) {
			if ($emailotp != $_SESSION['otp']) {
				//Special code for invalid otp
				return 11;
			}
		} else {
			//special code for otp not found
			return 12;
		}

		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", email = '$email' ";
		$data .= ", emailotp = '$emailotp' ";
		$data .= ", type = '$type' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", city = '$city' ";
		$data .= ", password = '" . md5($password) . "' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$username' ")->num_rows;
		if ($chk > 0) {
			return 2;
			exit();
		}
		$save = $this->db->query("INSERT INTO users set " . $data);
		if ($save) {
			return 1;
			// $login = $this->login2();
			// if ($login)
			// 	return $login;
		}
	}
	//It will provide the other details of user when we are doing update	
	function update_account()
	{
		extract($_POST);
		$data = " name = '" . $firstname . ' ' . $lastname . "' ";
		$data .= ", username = '$email' ";
		if (!empty($password))
			$data .= ", password = '" . md5($password) . "' ";
		$chk = $this->db->query("SELECT * FROM users where username = '$email' and id != '{$_SESSION['login_id']}' ")->num_rows;
		if ($chk > 0) {
			return 2;
			exit;
		}
		$save = $this->db->query("UPDATE users set $data where id = '{$_SESSION['login_id']}' ");
		if ($save) {
			$data = '';
			foreach ($_POST as $k => $v) {
				if ($k == 'password')
					continue;
				if (empty($data) && !is_numeric($k))
					$data = " $k = '$v' ";
				else
					$data .= ", $k = '$v' ";
			}
			if ($_FILES['img']['tmp_name'] != '') {
				$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
				$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
				$data .= ", avatar = '$fname' ";
			}
			$save_alumni = $this->db->query("UPDATE alumnus_bio set $data where id = '{$_SESSION['bio']['id']}' ");
			if ($data) {
				foreach ($_SESSION as $key => $value) {
					unset($_SESSION[$key]);
				}
				$login = $this->login2();
				if ($login)
					return 1;
			}
		}
	}
	//it will provide the details of system setting
	function save_settings()
	{
		extract($_POST);
		$data = " name = '" . str_replace("'", "&#x2019;", $name) . "' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", about_content = '" . htmlentities(str_replace("'", "&#x2019;", $about)) . "' ";
		if ($_FILES['img']['tmp_name'] != '') {
			$fname = strtotime(date('y-m-d H:i')) . '_' . $_FILES['img']['name'];
			$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
			$data .= ", cover_img = '$fname' ";
		}

		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if ($chk->num_rows > 0) {
			$save = $this->db->query("UPDATE system_settings set " . $data);
		} else {
			$save = $this->db->query("INSERT INTO system_settings set " . $data);
		}
		if ($save) {
			$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
			foreach ($query as $key => $value) {
				if (!is_numeric($key))
					$_SESSION['system'][$key] = $value;
			}

			return 1;
		}
	}

	//It will insert update delete and save the details
	function save_category()
	{
		extract($_POST);
		$data = " name = '$name' ";

		// Code added by Vatsal ********************
		if (empty($name)) {
			return 3;
		}

		// Sanitize user input
		$name = mysqli_real_escape_string($this->db, $name);

		// Check if the category with the given name already exists
		$check_query = $this->db->query("SELECT * FROM categories WHERE name = '$name'");

		if ($check_query->num_rows > 0) {
			// Category with the same name already exists
			return "Category with the name '$name' already exists.";
		}

		// Code added by Vatsal ********************

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO categories set $data");
		} else {
			$save = $this->db->query("UPDATE categories set $data where id = $id");
		}
		if ($save)
			return 1;
	}
	function delete_category()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM categories where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function save_product()
	{
		extract($_POST);
		$data = "";
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id', 'img')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}

		if (empty($id)) {
			$save = $this->db->query("INSERT INTO products set $data");
			$id = $this->db->insert_id;
		} else {
			$save = $this->db->query("UPDATE products set $data where id = $id");
		}

		if ($save) {

			if ($_FILES['img']['tmp_name'] != '') {
				$ftype = explode('.', $_FILES['img']['name']);
				$ftype = end($ftype);
				$fname = $id . '.' . $ftype;
				if (is_file('assets/uploads/' . $fname))
					unlink('assets/uploads/' . $fname);
				$move = move_uploaded_file($_FILES['img']['tmp_name'], 'assets/uploads/' . $fname);
				$save = $this->db->query("UPDATE products set img_fname='$fname' where id = $id");
			}
			return 1;
		}
	}
	function delete_product()
	{
		extract($_POST);
		$delete = $this->db->query("DELETE FROM products where id = " . $id);
		if ($delete) {
			return 1;
		}
	}
	function get_latest_bid()
	{
		extract($_POST);
		$get = $this->db->query("SELECT * FROM bids where product_id = $product_id order by bid_amount desc limit 1 ");
		$bid = $get->num_rows > 0 ? $get->fetch_array()['bid_amount'] : 0;
		return $bid;
	}
	function save_bid()
	{
		extract($_POST);
		$data = "";
		$chk = $this->db->query("SELECT * FROM bids where product_id = $product_id order by bid_amount desc limit 1 ");
		$uid = $chk->num_rows > 0 ? $chk->fetch_array()['user_id'] : 0;
		foreach ($_POST as $k => $v) {
			if (!in_array($k, array('id')) && !is_numeric($k)) {
				if (empty($data)) {
					$data .= " $k='$v' ";
				} else {
					$data .= ", $k='$v' ";
				}
			}
		}
		$data .= ", user_id='{$_SESSION['login_id']}' ";

		if ($uid == $_SESSION['login_id']) {
			return 2;
			exit;
		}
		if (empty($id)) {
			$save = $this->db->query("INSERT INTO bids set " . $data);
		} else {
			$save = $this->db->query("UPDATE bids set " . $data . " where id=" . $id);
		}
		if ($save)
			return 1;
	}
}
