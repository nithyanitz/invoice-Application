<?php
require_once "../../api/util/urllib.php";
require_once "../View/display.php";

if(isset($_POST['productName']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['units'])){
	$display = new Display();
	$product["productName"] = $_POST['productName'];
	$product["productQty"] = $_POST['quantity'];
	$product["productPrice"] = $_POST['price'];
	$product["productUnits"] = $_POST['units'];
	$product = json_encode($product);
	$response = url::postData("http://localhost/invoice/api/Controller/Products.php",$product);
	$display->displayStatus($response);
}else{
	echo "insertion failed";
}



?>