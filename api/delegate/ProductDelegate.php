<?php
require_once "../model/Product.php";
require_once "../dbConnection/DBConnection.php";
require_once "../dbConnection/DBFunctions.php";

class ProductDelegate {
	public $connection;
	public $dbConnection;
	public $dbFunctions;

	public function __construct(){
		$dbConnection = new DBConnection();
		$this->connection =$dbConnection->getDBConnection();
		$this->dbFunctions = new DBFunctions();
	}
		
	
	public function checkIdExists($productId){
		$query = "Select * from products where productId = :productId";
		$params = array(":productId"=>$productId);
		$className = "Product";
		$resultSet = $this->dbFunctions->select($this->connection,$query,$params,$className);
		$rows = count($resultSet);
		if($rows==0){
			return false;
			}else{
				return true;
			}
		}


	public function get($productId){

		if($productId != null){	
		if($this->checkIdExists($productId)){		
			$query =  "Select * from products where productId = :productId";
		}else{
			echo json_encode(array("status"=>"Id given does not exists"));
		}
	}else{
		$query = "SELECT * from products";
	}
		$params = array(":productId" => $productId);
		$className = "Product";
		
		$resultSet = $this->dbFunctions->select($this->connection,$query,$params,$className);
		return $resultSet; 
	}

	public function post(){
		//echo "entered into post";
		$params = json_decode(file_get_contents("php://input"),true);
		//echo "inside post".'<br/>'.$params;
		$query = "INSERT INTO products(productName,quantity,price,units)VALUES(:productName,:productQty,:productPrice,:productUnits)";
			$result = $this->dbFunctions->tableUpdates($this->connection,$query,$params);
			if($result){
			$status = array("status"=>"successfully registered");
		}else{
			$status = array("status"=>"insertion failed");
		}
		return $status;
		}

	public function put(){
		$productId = explode('?',trim($_SERVER['REQUEST_URI']));
		$headerLength = sizeof($productId);
		if($headerLength == 1 ){
			echo json_encode(array("status" => "cannot update properly"));
			return;
		}else {
			$id = $productId[1];
		}
		if(!$this->checkIdExists($id)){ 
			echo json_encode(array(status=>"Id given does not exists"));
			return;
		}
		else{
		$query = "UPDATE products SET ";
		$params = json_decode(file_get_contents("php://input"),true);
		if(isset($params["productQuantity"])){
		$productQuantity = $params["productQuantity"];
	}
		if(isset($params["productPrice"])){
			$productPrice = $params["productPrice"];
		}
		if(!empty($productQuantity) && !empty($productPrice)){
			$setValue = "quantity = ".$productQuantity.",price = ".$productPrice;
		}else if(empty($productPrice)){
			$setValue = "quantity =".$productQuantity;
		}else if(empty($productQuantity)){
			$setValue = "price =".$productPrice;
			}
		$whereClause = " WHERE productId = :productId";
		$sqlQuery = $query.$setValue.$whereClause;
		$params = array(":productId"=>$id);
		$result = $this->dbFunctions->tableUpdates($this->connection,$sqlQuery,$params);
		if($result){
			$status = array("status"=>"successfully updated");
		}else{
			$status = array("status"=>"update failed");
		}
	}
		return $status;
		}
	

	public function delete($productId){
		//echo "delegate delete";
		$query = "DELETE from products where productId = :productId";
		$params = array(":productId"=>$productId);
		$result = $this->dbFunctions->tableUpdates($this->connection,$query,$params);
		if($result){
			//echo "delete success";
			$status = array("status"=>"successfully deleted");
		}else{
			$status = array("status"=>"delete failed");
		}
		return $status;

	}

}
?>