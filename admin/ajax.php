<?php
// it will fetch the all details about ajax file and admin class
ob_start();
$action = $_GET['action'];
include 'admin_class.php';
$crud = new Action();
//ajax for customer login 
if($action == 'login'){
	$login = $crud->login();
	if($login)
		echo $login;
}
//ajax for seller login 
if($action == 'slogin'){
	$login = $crud->slogin();
	if($login)
		echo $login;
}

//ajax for admin login 
if($action == 'login2'){
	$login = $crud->login2();
	if($login)
		echo $login;
}
//All user logout details
if($action == 'logout'){
	$logout = $crud->logout();
	if($logout)
		echo $logout;
}
if($action == 'slogout'){
	$logout = $crud->slogout();
	if($logout)
		echo $logout;
}
if($action == 'logout2'){
	$logout = $crud->logout2();
	if($logout)
		echo $logout;
}
//it will save the details of user that they are admin customer or seller using ajax
if($action == 'save_user'){
	$save = $crud->save_user();
	if($save)
		echo $save;
}
if($action == 'delete_user'){
	$save = $crud->delete_user();
	if($save)
		echo $save;
}
//registration of  admin customer or seller using ajax
if($action == 'signup'){

	if ($action == 'signup') {
		$signupResult = $crud->signup();
	
		if ($signupResult === 1) {
			// Success
			echo 1;
		} elseif ($signupResult === 2) {
			// Username already exists
			echo 2;
		} elseif ($signupResult === 3) {
			// First name already exists
			echo 3;

		} elseif ($signupResult === 4) {
			// contat  number aleady exists
			echo 4;
		} elseif ($signupResult === 11) {
			// Invalid OTP
			echo 11;
		} elseif ($signupResult === 12) {
			// OTP not found
			echo 12;
		} else {
			// Other error
			echo "Error: " . $signupResult;
		}
	}
	

	// $save = $crud->signup();

	// if($save)
	// 	echo $save;
}
if($action == 'update_account'){
	$save = $crud->update_account();
	if($save)
		echo $save;
}
//system seeting information
if($action == "save_settings"){
	$save = $crud->save_settings();
	if($save)
		echo $save;
}
if($action == "save_category"){
	$save = $crud->save_category();
	// if($save)
	// 	echo $save;

	// Code added by Vatsal ********************
		if ($save === 1) {
			// Success
			echo "Category saved successfully.";
		} 
		else if($save===3)
		{
			echo "Error: Category should not be empty";
		}
		else {
			// Error
			echo "Error: Category already avaiable";
		}
	// Code added by Vatsal ********************
}

if($action == "delete_category"){
	$delete = $crud->delete_category();
	if($delete)
		echo $delete;
}
if($action == "save_product"){
	$save = $crud->save_product();
	if($save)
		echo $save;
}
if($action == "delete_product"){
	$save = $crud->delete_product();
	if($save)
		echo $save;
}
if($action == "get_latest_bid"){
	$save = $crud->get_latest_bid();
	if($save)
		echo $save;
}
if($action == "save_bid"){
	$save = $crud->save_bid();
	if($save)
		echo $save;
}

ob_end_flush();
?>
