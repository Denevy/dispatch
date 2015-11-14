<?php 
include('conexion.php');
$conexion = new conexion;
$conexion->conexion();
            $query="TRUNCATE table Proceso";
            $record = mysql_query($query);
            header("location:../procesos.php");
 ?>