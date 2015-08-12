<?php

	header("Content-Type:application/json");
	include_once("../base/bd_configuracion.php");
	include_once("../base/funcionesBase.php");
	include_once("../fileFunctions.php");
	$con = new bd_configuracion;
	$con->conectar();
	
	if(isset($_GET['first']) && isset($_GET['second'])){ // button name
		$first = trim($_GET['first']);
		$second = trim($_GET['second']);
		
		setWinnerPoints($first);
		deliverResponse(200,"success");
	}else{
		deliverResponse(200,"error");
	}
	
	function deliverResponse($status,$statusMessage){
		header("HTTP/1.1 $status $statusMessage");
		
		$response['status'] = $status;
		$response['status_message'] = $statusMessage;
		//$response['data'] = $data;
		
		$jsonResponse  = json_encode($response);
		echo $jsonResponse;
	
	}
	

?>