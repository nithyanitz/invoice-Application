<?php
class DBConnection {
	public  $hostName = "localhost";
	public  $dbName = "invoice";
	public $userName = "root";
	public  $password = "Ztech@123";
	public $connection = null;

public function getDBConnection(){
	try{
		$this->connection = new PDO("mysql:host=".$this->hostName.";dbname=".$this->dbName,$this->userName,$this->password);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $this -> connection;
	}catch(PDOException $exception){
		echo "Connection Failed",$exception->getMessage();
	}
	return $this->connection;
}
}
?>