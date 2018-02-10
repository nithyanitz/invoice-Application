<?php
require_once "../util/urllib.php";

if(isset($_POST['productName']) && isset($_POST['quantity']) && isset($_POST['price']) && isset($_POST['units'])){
		$product['name'] = $_POST['productName'];
		$product['qty'] = $_POST['quantity'];
		$product['price'] = $_POST['price'];
		$product['units'] = $_POST['units'];
		$productData = json_encode($product);
	    $response = url::postData("http://localhost/invoice/api/Controller/Products.php",$productData);
		//echo $response;
	//echo '<br/>';	
		//$a = "nithya";
		//var_dump($a);

		var_dump($response);

}


?>