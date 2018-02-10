<?php
session_start();
require_once "../../api/util/urllib.php";

if(isset($_POST['userName'])&& !empty($_POST['password'])){
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	$url = "http://localhost/invoice/api/Controller/User.php?";
	$queryParameters = $userName."&".$password;
	$response = json_decode(url::getData($url.$queryParameters),true);
	//print_r($response);
	if(strcmp($response["status"],"login success")==0){
		$_SESSION["role"] = $response["role"];
		$_SESSION["userId"] = $response["userId"];
		$_SESSION["token"] = $response["token"];
		header("location:../View/products.php");
	}
	else {
		header("location:../View/login.php");
	}
}



?>