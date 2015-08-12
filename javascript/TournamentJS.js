	
	var stringWinnersArray = "";
	
	
	function recursiveFuntionTournament(stringStart,stringVar){
		var i = stringStart;
		var currentPartida = "";
		var endStringGame;

		console.log("----Entro Recursividad ------");
		console.log("El inicio es: " + stringStart + "el caracter es: "  +stringVar.charAt(stringStart) + " el string es " + stringWinnersArray );
			
		if(stringVar.charAt(i) == ','){
			stringWinnersArray += ",";
			return i+1;
		}

		if(stringVar.charAt(i) == ']'){
			stringWinnersArray += "]";
			return -1;
		}

		if( i != stringVar.length && stringVar.charAt(i) == '[' && stringVar.charAt(i+1) == '[' && stringVar.charAt(i+2)=='"' ){
			endStringGame = findGame(i,stringVar);
			var currentGame = stringVar.substring(i, endStringGame);
			console.log("El inicio del string es " + i + " El endStringGame es " + endStringGame + ", la subString es " + stringVar.substring(i, endStringGame));
			var currentWinner = paperSiccorsRockChooseWinner(currentGame);

			stringWinnersArray = stringWinnersArray + currentWinner;
			console.log("ganadores Parciales " + currentWinner);	

			return endStringGame;
		}else{
			if(stringVar.charAt(i) == '['){
				stringWinnersArray += "[";
				var endRecursividad = 1;
				var inicioSiguienteJugada = i+1;
				var indexString = inicioSiguienteJugada;
				while(endRecursividad != -1){
					indexString = inicioSiguienteJugada;
					inicioSiguienteJugada = recursiveFuntionTournament(inicioSiguienteJugada,stringVar);
					endRecursividad = inicioSiguienteJugada;
				}
				return indexString+1;
			}
		}
		return 0;
	}
	
	
	function tournament(stringTournament){
		var tournamentTmp = stringTournament;
		while(!winnerTournament(tournamentTmp)){
			recursiveFuntionTournament(0, tournamentTmp);
			console.log("En el while " + stringWinnersArray);
			tournamentTmp = stringWinnersArray;
			stringWinnersArray = "";
		}
		return tournamentTmp;
	}
	
	function winnerTournament(game){
		var returnValue = false;
		
		if(game.charAt(0) == '[' && game.charAt(1) == '"'){
			returnValue = true;
		}
		
		return returnValue;
	}