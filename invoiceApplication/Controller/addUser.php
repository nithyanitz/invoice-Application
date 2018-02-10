<?php
require "../../api/util/urllib.php";
require_once "../View/display.php";

if(isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['role'])){
	$display = new Display();
	$user["userName"] = $_POST['userName'];
	$user["password"] = $_POST['password'];
	$user["role"] = $_POST['role'];
	$user = json_encode(($user),true);
	$response = url::postData("http://localhost/invoice/api/Controller/User.php",$user);
	$display->displayStatus($response);
	
}else{
	echo "registering users failed";
}



?>