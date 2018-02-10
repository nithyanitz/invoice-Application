<?php
require_once "../../api/util/urllib.php";
require_once "../View/display.php";

$data = null; 
if(isset($_POST["productId"]) && !empty($_POST["productId"])){
	$productId = $_POST["productId"];
	$url = "http://localhost/api/Controller/Products.php?";
}
if(isset($_POST["quantity"])&&isset($_POST["price"])&&!empty($_POST["quantity"])&&!empty($_POST["price"])){
	$data = json_encode(array("productQuantity" => $_POST["quantity"] , "productPrice" => $_POST["price"]));
}else if(isset($_POST["price"])&&!empty($_POST["price"])){
	$data = json_encode(array("productPrice"=>$_POST["price"]));
}else if(isset($_POST["quantity"])&&!empty($_POST["quantity"])){
	$data = json_encode(array("productQuantity"=>$_POST["quantity"]));
}else{
	echo "Enter details inorder to update";
	return;
}

	$url = "http://localhost/invoice/api/Controller/Products.php?";
	$response = url::putData($url.$productId,$data);
	$display = new Display();
	$display->displayStatus($response);
?>