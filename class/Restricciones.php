<?php
	include('conexion.php');
	$conexion = new conexion;
	$conexion->conexion();
	$cantProcesos 	= $_GET['cantidadProcesos']; //Recibo el dato en un array
	$quantum		= $_GET['quantum'];	

	if ($cantProcesos > 0) {
		mysql_query("INSERT INTO Restricciones(cantidad,quantum) 
						VALUES ('$cantProcesos','$quantum')");
		$_SESSION['restriciones']=$cantProcesos;
	}
	echo 'cargo';
?>