<?php
	include_once("/GameRules.php");
	$stringWinnersArray = "";
	
	
	function recursiveFuntionTournament($stringStart,$stringVar){
		$i = $stringStart;
		$currentPartida = "";
		$endStringGame;
		global $stringWinnersArray;

		//printf("----Entro Recursividad ------". "<br>");
		//printf("El inicio es: " . $stringStart . " el caracter es: " . $stringVar{$stringStart} . " el string es " . $stringWinnersArray . "<br>");
			
		if($stringVar{$i} == ','){
			$stringWinnersArray .= ",";
			return $i+1;
		}

		if($stringVar{$i} == ']'){
			$stringWinnersArray .= "]";
			return -1;
		}

		 //printf ("Las var son " .$stringVar{$i}. " ".$stringVar{$i+1}." ".$stringVar{$i+2}."esp<br>"); 
		
		if( $i != strlen($stringVar) && $stringVar{$i} == '[' && $stringVar{$i+1} == '[' && $stringVar{$i+2} =='"' ){
			$endStringGame = findGame($i,$stringVar);
			$currentGame = substr($stringVar,$i,$endStringGame);
			//printf("El inicio del string es " . $i . " El endStringGame es " . $endStringGame . ", la subString es " . substr($stringVar,$i,$endStringGame) . "<br>");
			$currentWinner = paperSiccorsRockChooseWinner($currentGame);

			$stringWinnersArray = $stringWinnersArray . $currentWinner;
			//console.log("ganadores Parciales " + currentWinner);	

			return $endStringGame;
		}else{
			if($stringVar{$i} == '['){
				$stringWinnersArray .= "[";
				$endRecursividad = 1;
				$inicioSiguienteJugada = $i+1;
				$indexString = $inicioSiguienteJugada;
				while($endRecursividad != -1){
					$indexString = $inicioSiguienteJugada;
					$inicioSiguienteJugada = recursiveFuntionTournament($inicioSiguienteJugada,$stringVar);
					$endRecursividad = $inicioSiguienteJugada;
				}
				return $indexString+1;
			}
		}
		return 0;
	}
	
	
	function tournament($stringTournament){
		global $stringWinnersArray;
		$tournamentTmp = $stringTournament;
		while(!winnerTournament($tournamentTmp)){
			recursiveFuntionTournament(0, $tournamentTmp);
			//console.log("En el while " + stringWinnersArray);
			$tournamentTmp = $stringWinnersArray;
			$stringWinnersArray = "";
		}
		return $tournamentTmp;
	}
	
	function winnerTournament($game){
		$returnValue = false;
		
		if($game{0} == '[' && $game{1} == '"'){
			$returnValue = true;
		}
		
		return $returnValue;
	}

?>