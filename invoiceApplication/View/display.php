<?php
class Display{
	function displayStatus($response){
	$response = json_decode($response,true);
	echo $response["status"];
}
	function displayResults($response){
	$response = json_decode($response,true);
	print_r($response);
}
	/*foreach ($response as $key => $value) {
			echo $key[$value];
			echo "<br />";
		}	
	}*/
}



?>