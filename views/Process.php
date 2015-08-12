<?php	
	include_once("/Tournament.php");
	if(isset($_GET['tournament']) && empty($_GET['tournament']) == false){ // button name
		$strTemp = trim($_GET['tournament']);
		
		$stringWinnersArray = tournament(str_replace(' ', '', $strTemp));
		//$stringWinnersArray = paperSiccorsRockChooseWinner(str_replace(' ', '', $strTemp));
		echo "The winner is " . $stringWinnersArray;
	}else{
		echo "No se enviaron datos";
	}

?>