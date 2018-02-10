<?php
require '../delegate/UserDelegate.php';
header("Access-Control-Allow-Headers: *");
$method = strtolower($_SERVER['REQUEST_METHOD']);
$userDelegate = new UserDelegate();
switch($method){

	case 'get':
		$url = explode('?',trim($_SERVER['REQUEST_URI']));
		$queryParameters = explode('&',trim($url[1]));
		$resultSet = $userDelegate -> get($queryParameters);
		echo json_encode($resultSet);
		break;
	case 'post' :
		$resultSet = $userDelegate -> post();
		echo json_encode($resultSet);
		break;
}