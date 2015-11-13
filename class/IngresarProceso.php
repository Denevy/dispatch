<?php 
	$contar= $_GET['contador'];
	$datos=$_GET['proceso'];
	$_SESSION['X']=$datos;
	//var_dump($datos);
	$proceso=explode(',',$datos);
	//var_dump($proceso);
	$cantidad=count($proceso);
	//echo 'cantidad de procesos:  '.$cantidad;
	//var_dump($_SESSION['X']);
	echo '<table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th><i class="icon-bullhorn"></i>Llegada</th>
                                  <th class="hidden-phone"><i class="icon-question-sign"></i>Rafaga</th>
                              </tr>
                              </thead>
                              <tbody>';
    $i=0;

	for ($i; $i <$cantidad ; $i++) { 
		
	echo '<tr>
				<td>'.$proceso[$i].'<td>
				<td>'.$proceso[$i+1].'<td>
		  </tr>';
		  $i++;
	}
	echo '</tbody>
          </table>';
?>	