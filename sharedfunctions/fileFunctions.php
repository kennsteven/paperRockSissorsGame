<?php

function downLoadFiles(){
	$file = 'TestFiles.7z';
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}


function uploadFile(){
	$uploaddir = '';
	$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);

	//echo '<pre>';
	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		//echo "El archivo es valido y fue cargado exitosamente.\n";
	} else {
		//echo "No se pudo subir el archivo\n";
	}
	//print_r($_FILES);
	//print "</pre>";	
	
	$stringArchivo = "";
	if(basename($_FILES['userfile']['name']) !== ""){
		$file=fopen($_FILES['userfile']['name'],"r") or exit("Unable to open file!");
		while (!feof($file)){
			$linea = fgets($file);
			$stringArchivo = $stringArchivo.$linea;
		}
	fclose($file);
	}
	return $stringArchivo;
}