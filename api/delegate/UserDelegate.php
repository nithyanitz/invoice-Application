<?php
require_once "../model/User.php";
require_once "../dbConnection/DBConnection.php";
require_once "../dbConnection/DBFunctions.php";

class UserDelegate {
	public $connection;
	public $dbConnection;
	public $dbFunctions;

	public function __construct(){
		$dbConnection = new DBConnection();
		$this->connection =$dbConnection->getDBConnection();
		$this->dbFunctions = new DBFunctions();
	}
	
	function get($queryParameters){
		$userName = $queryParameters[0];
		$password = $queryParameters[1];
		$query = "Select userId,role from users where userName = :userName and pasword = :password ";
		$params = array(":userName"=>$userName,":password"=>$password);
		$className = "User";
		$resultSet = $this->dbFunctions->select($this->connection,$query,$params,$className);
		$rows = count($resultSet);
		if($rows == 0){
			return array("status"=>"Invalid Login Credentials");
		}else {
			return array("status"=>"login success",
							"token" =>md5($resultSet[0]->userName),"role" => $resultSet[0]->role,
							"userId"=>$resultSet[0]->userId);
	}
	}	
	function post(){
		$params = json_decode(file_get_contents("php://input"),true);
		//echo "inside post".'<br/>'.$params;
		$query = "INSERT INTO users(userName,pasword,role)VALUES(:userName,:password,:role)";
			$result = $this->dbFunctions->tableUpdates($this->connection,$query,$params);
			if($result){
			$status = array("status"=>"successfully registered");
		}else{
			$status = array("status"=>"insertion failed");
		}
		return $status;
		}
}