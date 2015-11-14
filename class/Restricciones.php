<?php
session_start();
	$cantProcesos = $_POST['cantProceso'];
	$_SESSION['restriciones']=$cantProcesos;
	echo 'cargo';
?>