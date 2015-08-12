$(document).ready(function() {
	console.log("game Lsit " + gameListInput);
	if(gameListInput != ""){
		var winnerTournament = tournament(gameListInput.replace(/\s+/g, ''));
		var winnersName = getWinnersName(winnerTournament);
		showWinner(winnersName);
		ajaxSavePointsPlayer(winnersName);
	}
});

function ajaxSavePointsPlayer(playersName) {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("meessageDiv").innerHTML = xmlhttp.responseText;//"The score of the winner had been save";
		}
	}
	xmlhttp.open("POST", "/saveWinner.php?winnersName=" + playersName, true);
	xmlhttp.send();
}