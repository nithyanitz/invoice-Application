<?php
require_once "../../api/util/urllib.php";
require_once "../View/display.php";

if(isset($_POST["productId"]) && !empty($_POST["productId"])){
	$display = new Display();
	$productId = $_POST["productId"];
	$url = "http://localhost/invoice/api/Controller/Products.php?";
	$response = url::deleteData($url.$productId);
	$display->displayStatus($response);
}else {
	echo "delete operation failed";
}
?>