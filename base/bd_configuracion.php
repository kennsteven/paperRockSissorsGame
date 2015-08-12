<?php

class bd_configuracion{
  var $conect;
     function bd_configuracion(){
	 }

	 function get_conectar(){
	 return $this->conect;
	 }

	 function conectar() {
	     if(!($con=@mysql_connect("localhost","root","")))
		 {
		     echo"Error al conectar a la base de datos";
			 exit();
	      }
		 if (!@mysql_select_db("papersiccorsrockgame",$con)) {
		   echo "error al seleccionar la base de datos";
		   exit();
		 }
		@mysql_query("SET NAMES 'utf8'");
	       $this->conect=$con;
		   return true;
	 }
	 
  	//evitar inyeccion de codigo con el uso de comillas '
	function sql_quote($value){
		if(get_magic_quotes_gpc()){
			$value = stripslashes($value);
		}
		   
		//check if this function exists
		   
		if(function_exists("mysql_real_escape_string")){
			$value = mysql_real_escape_string( $value );
		}
		else {//for PHP version <4.3.0 use addslashes
			$value = addslashes( $value );
		}
		  
		return $value;
	  
	}

}

?>
