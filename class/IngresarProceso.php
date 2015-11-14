<?php 
session_start();
	//contador recibe la cantidad de procesos que se registran
	//$contar= $_GET['contador'];
	$datos=$_POST['proceso'];
	$_SESSION['arrayProcesos']=$datos;
	//var_dump($datos);
	$proceso=explode(',',$datos);
	//var_dump($proceso);
	$cantidad=count($proceso);
	//echo 'cantidad de procesos:  '.$cantidad;
	var_dump($_SESSION['arrayProcesos']);
	echo '<table class="table table-striped table-advance table-hover">
	          <thead>
		          <tr>
		          	  <th>ID</th>
		              <th>Llegada</th>
		              <th>Rafaga</th>
		          </tr>
	          </thead>
	          <tbody>';
    $i=0;

	for ($i; $i <$cantidad ; $i++) { 
		echo '<tr>';
		echo'<td>'.$proceso[$i].'</td>';	
		$i=$i+1;
		echo'<td>'.$proceso[$i].'</td>';	
		$i=$i+1;
		echo'<td>'.$proceso[$i].'</td></tr>';					
	}
	echo '</tbody>
          </table>';
?>	