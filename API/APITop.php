<?php

	header("Content-Type:application/json");
	include_once("../base/bd_configuracion.php");
	include_once("../base/funcionesBase.php");
	$con = new bd_configuracion;
	$con->conectar();
	
	
	$playersCount = 10; 
	if(isset($_GET['count'])){
		$playersCount = $_GET['count'];
	}
	
	$queryResult = getTop($playersCount);
	$nameArray = createArrayNames($queryResult);
	deliverResponse(200,$nameArray);
	
	
	function deliverResponse($status,$data){
		header("HTTP/1.1 $status");
		
		$response['status'] = $status;
		$response['players'] = $data;
		
		$jsonResponse  = json_encode($response);
		echo $jsonResponse;
	}
	
	function createArrayNames($queryResult){
		$dataString = "[";
		$i = 1;
		
		while ($row = mysql_fetch_array($queryResult, MYSQL_ASSOC)) {
			$dataString .= $row["win_tour_name"] ."," ;
			$i++;
		}
		$dataString .= "]";
		return $dataString;
	}
	

?>