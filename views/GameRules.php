<?php
	function findGame($stringStart, $stringVar){
		$i = $stringStart;
		$counter = 0;

		while($i < strlen($stringVar) && $counter != 3){
			if($stringVar{$i} == ']'){
				$counter++;
			}
			$i++;
		}

		return $i;
	}
		
	//Decide cual jugador es el ganador
	function paperSiccorsRockChooseWinner($gameList){
		$movesArray = explode(",",$gameList);
		//printf("El gamelist es: " . $gameList . "<br>");
		//printf("La jugada1 es: " . substr($movesArray[1],1,1) . "<br>");
		$player1move = substr($movesArray[1],1,1);
		$player2move = substr($movesArray[3],1,1);
		$gameResult = "";

		//console.log(" ");
		//console.log(" ");
		

		//Se pregunta si la cantidad de jugadores es valida
		if(validateQuantityOfPlayers($movesArray) == false){
			//console.log("Error Cantidad de jugadores");
			//throw "Error with number of players"; 
		}

		//Se preguntan si las jugadas son validas
		if(validateMove($player1move) == false || validateMove($player2move) == false){
			//console.log("Error Jugada no valida");
			//throw "Error not valid move";
		}

		//Se averigua cual jugador gano
		$winner = paperSiccorsRockRules($player2move, $player1move);
		if($winner == true){
			////printf("1 El gamelist es: " .$movesArray[2] . ',' . substr($movesArray[3],0,-1). "<br>");
			$gameResult = $movesArray[2] . ',' . substr($movesArray[3],0,-1);
		}else{
			////printf("2 El gamelist es: " . substr($movesArray[0],1). ',' .$movesArray[1] . "<br>");
			$gameResult = substr($movesArray[0],1). ',' .$movesArray[1]; //Se puede caer
		}

		//printf("El juego es " . $gameList . "<br>");
		//printf("Jugada player 1 " . $player1move ."<br>");
		//printf("Jugada player 2 " . $player2move ."<br>");
		//printf("El ganadore es player2 " . $winner ."<br>");

		//console.log(" ");
		//console.log(" ");
		return $gameResult;
	}
	
	function validateQuantityOfPlayers($movesArray){
		$isCorrect = false;

		if(count($movesArray) == 4){
			$isCorrect = true;
		}

		return $isCorrect;
	}
	
	function validateMove($playerElection){
		$isAvalidMove = false;
		$playerElectionUpper =  strtoupper($playerElection);

		if($playerElectionUpper == "R" || $playerElectionUpper == "S" || $playerElectionUpper == "P"){
			$isAvalidMove = true;
		}
		return $isAvalidMove;
	}
	
	function paperSiccorsRockRules($player1Election, $player2Election){
		$player1Win = false;
		$player1ElectionUpper =  strtoupper($player1Election);
		$player2ElectionUpper =  strtoupper($player2Election);
		//printf("el player 1 es " . $player1ElectionUpper . "<br>");
		//printf("el player 2 es " . $player2ElectionUpper. "<br>");

		//piedra le gana a tijeras
		if($player1ElectionUpper == "R" && $player2ElectionUpper == "S"){
			/*//console.log("El if 1");*/
			$player1Win = true;
		}

		//tijeras le gana a papel
		if($player1ElectionUpper == "S" && $player2ElectionUpper == "P"){
			/*//console.log("El if 2");*/
			$player1Win = true;
		}

		//papel le gana a piedra
		if($player1ElectionUpper == "P" && $player2ElectionUpper == "R"){
			/*//console.log("El if 3");*/
			$player1Win = true;
		}

		return $player1Win;
	}

	function getWinnersName($winnerGame){
		$i = 2;
		$name = "";
		//console.log("El ganador es " + winnerGame);
		
		while($winnerGame{$i} != '"'){
			$name += $winnerGame{$i};
			$i++;
		}
		
		return $name;
	}
?>
