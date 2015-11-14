<?php
session_start();
class conexion{
	public function conexion(){
		$host	  =	'localhost';
		$usuario  =	'procesos';
		$password =	'umg1234';
		$db		  = 'procesos';

		$conexion 		= 	mysql_connect($host,$usuario,$password);
		$seleccion_bd	=	mysql_select_db($db,$conexion);
	}
}
?>