<?php 
	include('conexion.php');
	$conexion = new conexion;
	$conexion->conexion();

	$tiempoLlegada	= $_GET['Llegada'];
	$rafaga 		= $_GET['Rafaga'];

	mysql_query("INSERT INTO Proceso (llegada ,rafaga) 
					VALUES('$tiempoLlegada','$rafaga')");

	//mostrar los procesos registrados
	$procesos 	= mysql_query("SELECT * FROM Proceso");
	echo '<table class="table table-striped table-advance table-hover">
	          <thead>
		          <tr>
		          	  <th>ID</th>
		              <th>Llegada</th>
		              <th>Rafaga</th>
		          </tr>
	          </thead>
	          <tbody>';
	while($mostrar = mysql_fetch_array($procesos))
	{
		echo '<tr>
			  	<td>'.$mostrar['idProceso'].'</td>';
		  echo '<td>'.$mostrar['llegada'].'</td>';
		  echo '<td>'.$mostrar['rafaga'].'</td> 
			  </tr>';
	}
		echo '
			</tbody>
        </table>';
?>	