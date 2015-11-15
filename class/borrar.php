<?php 
include('conexion.php');
$conexion = new conexion;
$conexion->conexion();
            $query="TRUNCATE table Proceso";
            $record = mysql_query($query);
            $query2="TRUNCATE table Restricciones";
            $record = mysql_query($query2);
            header("location:../procesos.php");
 ?>