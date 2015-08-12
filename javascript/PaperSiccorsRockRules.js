
	
	function showWinner(stringGanador){
		$('#tournamentWinnerDiv').html("<H4> El Ganador es " + stringGanador + "</H4>");
		$('#tournamentWinnerDiv').show();
	}
	
	function findGame(stringStart, stringVar){
		var i = stringStart;
		var counter = 0;

		while(i < stringVar.length && counter != 3){
			if(stringVar.charAt(i) == ']'){
				counter++;
			}
			i++;
		}

		return i;
	}
	

	
	//Decide cual jugador es el ganador
	function paperSiccorsRockChooseWinner(gameList){
		var movesArray = gameList.split(",");
		console.log("El gamelist es: " + gameList);
		console.log("La jugada1 es: " + movesArray[1].substring(1, 2));
		var player1move = movesArray[1].substring(1, 2);
		var player2move = movesArray[3].substring(1, 2);
		var gameResult = "";

		console.log(" ");
		console.log(" ");
		

		//Se pregunta si la cantidad de jugadores es valida
		if(validateQuantityOfPlayers(movesArray) == false){
			console.log("Error Cantidad de jugadores");
			throw "Error with number of players"; 
		}

		//Se preguntan si las jugadas son validas
		if(validateMove(player1move) == false || validateMove(player2move) == false){
			console.log("Error Jugada no valida");
			throw "Error not valid move";
		}

		//Se averigua cual jugador gano
		var winner = paperSiccorsRockRules(player2move, player1move);
		if(winner == true){
			gameResult = movesArray[2] + ',' + movesArray[3].substring(0, movesArray[3].length-1) ;
		}else{
			gameResult = movesArray[0].substring(1, movesArray[0].length) + ',' + movesArray[1];
		}

		//Test.create({first_name:'Kenneth' , last_name:'spain' , month: 'january' });
		console.log("El juego es " + gameList);
		console.log("Jugada player 1 " + player1move);
		console.log("Jugada player 2 " + player2move);
		console.log("El ganadore es player2 " + winner);

		console.log(" ");
		console.log(" ");
		return gameResult;
	}
	
	function validateQuantityOfPlayers( movesArray){
		var isCorrect = false;

		if(movesArray.length == 4){
			isCorrect = true;
		}

		return isCorrect;
	}
	
	function validateMove(playerElection){
		var isAvalidMove = false;
		var playerElectionUpper =  playerElection.toUpperCase();

		if(playerElectionUpper == "R" || playerElectionUpper == "S" || playerElectionUpper == "P"){
			isAvalidMove = true;
		}
		return isAvalidMove;
	}
	
	function paperSiccorsRockRules(player1Election, player2Election){
		var player1Win = false;
		var player1ElectionUpper =  player1Election.toUpperCase();
		var player2ElectionUpper =  player2Election.toUpperCase();
		console.log("el player 1 es " + player1ElectionUpper);
		console.log("el player 2 es " + player2ElectionUpper);

		//piedra le gana a tijeras
		if(player1ElectionUpper == "R" && player2ElectionUpper == "S"){
			/*console.log("El if 1");*/
			player1Win = true;
		}

		//tijeras le gana a papel
		if(player1ElectionUpper == "S" && player2ElectionUpper == "P"){
			/*console.log("El if 2");*/
			player1Win = true;
		}

		//papel le gana a piedra
		if(player1ElectionUpper == "P" && player2ElectionUpper == "R"){
			/*console.log("El if 3");*/
			player1Win = true;
		}

		return player1Win;
	}

	function getWinnersName(winnerGame){
		var i = 2;
		var name = "";
		console.log("El ganador es " + winnerGame);
		
		while(winnerGame.charAt(i) != '"'){
			name += winnerGame.charAt(i);
			i++;
		}
		
		return name;
	}


