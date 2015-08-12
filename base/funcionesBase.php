<?php

//Elimina los datos de la tabla ganadores
function deleteWinnersData(){
	$sql = "TRUNCATE TABLE `winners_tournament`";
	$result = mysql_query($sql) or die(mysql_error());
}

function setWinnerPoints($winnersName){
	$sql = "SELECT * FROM `winners_tournament` WHERE `win_tour_name` = \"".$winnersName."\"";
	$result = mysql_query($sql) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	if($num_rows > 0){
		$rowQuery = mysql_fetch_assoc($result);
		$points = $rowQuery['win_tour_points'] + 3;
	    updateWinnerPoints($winnersName,$points);
	}else{
		createWinner($winnersName);
	}
}

//
function createWinner($winnersName){
	
	$sql = "INSERT INTO `winners_tournament` 
	(`win_tour_name`, `win_tour_points`) 
	VALUES ('".$winnersName."', '3')";

	$result = mysql_query($sql) or die(mysql_error());
}

//
function updateWinnerPoints($winnersName, $winnersPoints){
	$sql = "UPDATE `winners_tournament` 
			SET `win_tour_points` = ".$winnersPoints.
		   " WHERE `win_tour_name` = \"".$winnersName."\"";
	$result = mysql_query($sql) or die(mysql_error());
}



//
function getWinners(){
	$sql = "SELECT * FROM `winners_tournament`";
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}

//
function getTopTen(){
	$sql = "SELECT * FROM `winners_tournament` order by `win_tour_points` desc LIMIT 10";
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}

function getTop($limit){
	$sql = "SELECT * FROM `winners_tournament` order by `win_tour_points` desc LIMIT $limit";
	$result = mysql_query($sql) or die(mysql_error());
	return $result;
}

?>