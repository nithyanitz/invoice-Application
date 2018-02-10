<?php
require_once "../../api/util/urllib.php";
require_once "../View/display.php";

$productId = null;

if(isset($_POST["productId"]) && !empty($_POST["productId"])){
	$productId = $_POST["productId"];
}
if(isset($_POST["viewAllProducts"])){
	$productId = null;
}
	
	
	$url = "http://localhost/invoice/api/Controller/Products.php";
	$response = url::getData($url."?".$productId);
	$display = new Display();
	$display->displayResults($response);
	
	//print_r($response);
?>