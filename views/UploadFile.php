<?php

	include_once("../base/bd_configuracion.php");
	include_once("../base/funcionesBase.php");
	include_once("../sharedfunctions/SharedFunctions.php");
	include_once("/Tournament.php");
	include_once("../sharedfunctions/fileFunctions.php");
	$con = new bd_configuracion;
	$con->conectar();
	
	$stringArchivo = uploadFile();
	if($stringArchivo != ""){
		$stringWinnersArray = tournament(str_replace(' ', '', $stringArchivo));
		setWinnerPoints(getNameWinner($stringWinnersArray));
	}
	$resultado = getTopTen();
	
?>

<html lang="en">

	<META http-equiv="Content-Type" content="text/html; charset=ISO-8859-5"> 
	 <script src="//use.edgefonts.net/poiret-one.js"></script>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	<head>

	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>	
	<script type="text/javascript" src="javascript/TournamentJS.js"></script>
	<script type="text/javascript" src="javascript/PaperSiccorsRockRules.js"></script>
	<!-- <script>var gameListInput = '<?php echo $stringArchivo; ?>';</script> -->
	<script type="text/javascript" src="javascript/javaUploadFile.js"></script>
	
	<title>Test - Kenneth</title>

	</head>

	<body>			
			<h2>Upload File Winner</h2>
			
			<div id="tournament"> The string of the tournament is: <?php echo $stringArchivo; ?></div>
			<div id="tournamentWinnerDiv"></div>
			<br><br>
			<div id="meessageDiv"></div>
			
			<?php 
				if($stringArchivo != ""){
					echo "The winner is " . $stringWinnersArray. ". The points had been save.";
				}else{
					echo "Unable to process the file";
				}
			?>
			<br><br>
			<table border="1">
				<tr>
					<td>Position</td>
					<td>Player Name</td>
					<td>Points</td>
				</tr>
			<?php
				$i = 1;
				while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)) {
					printf("<tr><td>$i</td><td>".$row["win_tour_name"]."</td><td>".$row["win_tour_points"]."</td></tr>");
					$i++;
				}
			?>
			</table>
			<br>
	</body>

</html>