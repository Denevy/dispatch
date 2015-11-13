<?php  
	$restriccion = $_POST['parametros'];
	echo $restriccion[1];
	foreach ($restriccion as $key => $value) {
		echo "<tr>".$value."</tr>";
	}

	$datos = $_POST['proceso'];
	foreach ($datos as $key => $value) {
		echo "<tr>".$value."</tr>";	
	}

?>