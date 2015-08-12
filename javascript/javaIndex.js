  $(document).ready(function() {
		document.getElementById("calcularButton").onclick=function(){
			var gameListInput = $("#tournamentDefinition").val();
			if(gameListInput != ""){
				var winnerTournament = tournament(gameListInput.replace(/\s+/g, ''));
				showWinner(winnerTournament);
			}
			
		};
    });