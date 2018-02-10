<?php
require_once "DBConnection.php";
class DBFunctions{

	function select($connection,$query,$bindParams,$className){
		try{
			$statement = $connection -> prepare($query);
			$statement -> execute($bindParams);
			$resultSet = $statement -> fetchAll(PDO::FETCH_CLASS,$className);
			return $resultSet;
		}catch(PDOException $exception){
			echo $exception->getMessage();
		}
	}

	function tableUpdates($connection,$query,$bindParams){
		try{
			$statement = $connection -> prepare($query);
			return $statement -> execute($bindParams);
		}catch(PDOException $exception){
			echo $exception -> getMessage();
		}
	}
}

?>