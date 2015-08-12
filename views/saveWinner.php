<?php
	//Se incluye la clase DBManager
	include_once("base/bd_configuracion.php");
	//Se incluye el archivo que tien las funciones que se comunican con la base de datos
	include_once("base/funcionesBase.php");
	//creamos el objeto $con a partir de la clase DBManager
	$con = new bd_configuracion;
	//usamos el metodo conectar para realizar la conexion
	$con->conectar();
	if(isset($_GET['winnersName'])){ // button name
		$strTemp = trim($_GET['winnersName']);
		
		if($strTemp !== ''){
			setWinnerPoints($strTemp);
			echo "Success saving the tournament data";
		}else{
			echo "The data haven't been save";
		}
	}
?>