<?php

	//header("Content-Type:application/json");
	include_once("../base/bd_configuracion.php");
	include_once("../base/funcionesBase.php");
	include_once("../sharedfunctions/SharedFunctions.php");
	include_once("../Tournament.php");
	$con = new bd_configuracion;
	$con->conectar();
	
	if(isset($_POST['data']) && empty($_POST['data']) == false){
		$strTemp = $_POST['data'];
		try {
			$stringWinnersArray = tournament(str_replace(' ', '', $strTemp));
			setWinnerPoints(getNameWinner($stringWinnersArray));
			deliverResponse(200,$stringWinnersArray);
		} catch (Exception $e) {
			deliverResponse(400,"Error processing data");
		}
	}else{
		deliverResponse(400,"Error processing data");
	}
	
	function deliverResponse($status,$data){
		header("HTTP/1.1 $status");
		
		$response['status'] = $status;
		$response['winner'] = str_replace('"', '', $data);
		
		$jsonResponse  = json_encode($response);
		echo $jsonResponse;
	}
?>