<?php 
	//Se inicia la sesiѓn en el servidor
	session_start();
	//Se incluye la clase DBManager
	include_once("base/bd_configuracion.php");
	//Se incluye el archivo que tien las funciones que se comunican con la base de datos
	include_once("base/funcionesBase.php");
	//Se incluyen archivos de operaciones de archivos
	include_once("sharedfunctions/fileFunctions.php");
	//creamos el objeto $con a partir de la clase DBManager
	$con = new bd_configuracion;
	//usamos el metodo conectar para realizar la conexion
	$con->conectar();
	
	if(isset($_POST['deleteData'])){
		deleteWinnersData();
	}
	if(isset($_POST['downLoadFiles'])){
		downLoadFiles();
	}
	$resultado = getTopTen();
?>

<html lang="en">

	<META http-equiv="Content-Type" content="text/html; charset=ISO-8859-5"> 
	 <script src="//use.edgefonts.net/poiret-one.js"></script>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
	<head>

	<!--Inclusiѓn de javascript y Ajax
	<link rel="stylesheet" href="css/estilos.css" type="text/css" media="screen" />
	<script type="text/javascript" src="javascript/javaCliente.js"></script>
	-->
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>	
	<script type="text/javascript" src="javascript/PaperSiccorsRockRules.js"></script>
	<script type="text/javascript" src="javascript/TournamentJS.js"></script>
	<script type="text/javascript" src="javascript/javaIndex.js"></script>
	
	<title>Test - Kenneth</title>

	</head>

	<body>
		<h1>Paper Rock Scissors </h1>
		
			<h3>Winners Table</h3>
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
			<form name="deleteDataBase" action="" method= "POST">
				<input type="submit" name = "deleteData" value="Delete Records Data">
			</form>
			
			<br><br>
			<h3>Tournament String (Process the tournament with javaScript, it doesn't save in DB)</h3>
			<form action="ChooseWinner.php" id="formularioPruebaPiedraPapelTijeras" enctype="multipart/form-data" method= "POST">
				<textarea type="" rows="6" cols="100" id="tournamentDefinition" name="list"></textarea>
				<br><br>
				<button type="button" id="calcularButton">Process Tournament</button>
			</form>
			
			<div id="tournamentWinnerDiv"></div>
			
			<br>
			<h3>Upload a File</h3>
			<form action="views/UploadFile.php" enctype="multipart/form-data"  method="POST">
				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				Sen this file:<input name="userfile" type="file" />
				<input type="submit" value="Send File" />
			</form>
			<form enctype="multipart/form-data" action="" method="POST">
				<input type="submit" name = "downLoadFiles" value="Download Example Files">
			</form>
			
			<br><br>
			
<!-- 				<h3>Tournament Proccess</h3> -->
<!-- 			<form action="views/Process.php" id="formPRS" method= "GET"> -->
<!-- 				<textarea type="" rows="6" cols="100" id="tournament" name="tournament"></textarea> -->
<!-- 				<br><br> -->
<!-- 				<button type="submit" id="">Process Tournament</button> -->
<!-- 			</form> -->
			
	</body>

</html>