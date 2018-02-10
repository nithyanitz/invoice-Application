<?php
require_once '../delegate/ProductDelegate.php';
header("Access-Control-Allow-Headers: *");
$method = strtolower($_SERVER['REQUEST_METHOD']);
$productDelegate = new ProductDelegate();
switch($method){
	case 'get':
		$productId = explode('?',trim($_SERVER['REQUEST_URI']));
		$headerLength = sizeof($productId);
		if($headerLength == 1 ){
			$id = null;
		}else {
			$id = $productId[1];
		}
		
		$resultSet = $productDelegate -> get($id);
		echo json_encode($resultSet);
		break;
	case 'post':
		$status = $productDelegate -> post();
		echo json_encode($status);
		break;
	case 'put' :
		$status = $productDelegate -> put();
		echo json_encode($status);
		//echo json_encode(array("dani"=>"1"));
		break;
		
	case 'delete' :
		$productId = explode('?',trim($_SERVER['REQUEST_URI']));
		$headerLength = sizeof($productId);
		if($headerLength == 1 ){
			echo json_encode(array("status"=>"cannot delete entire product list"));
			return;
		}else {
			$id = $productId[1];
		}
		if($productDelegate->checkIdExists($id)){
		$status = $productDelegate -> delete($id);
		echo json_encode($status);
	}else{
			echo json_encode(array("status"=>"Id given does not exists"));
		}
		break;
		
}

/*
<?php
echo $_SERVER['REQUEST_METHOD'];
///if(isset($_SERVER['REQUEST_URI'])) {
    $info = explode('/', trim($_SERVER['REQUEST_URI']));
   // echo $info;

    echo "<br>";
    print_r($info);

    echo "<br>";

    echo $_SERVER["REQUEST_URI"];
//}

//$request = explode('/',$_SERVER['PATH_INFO']);
//print_r($request);


?>

*/



?>