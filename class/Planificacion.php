<?php 
  class Planificacion{
  public $cantProceso;

    function MostrarTabla()
    {
      //$restricciones = $_SESSION['restriciones'];
      session_start();
      $datos=$_SESSION['arrayProcesos'];
      //var_dump($procesos);
      //echo $restricciones;
  
      $proceso=explode(',',$datos);
      //var_dump($proceso);
      $cantidad=count($proceso);
      //echo 'cantidad de procesos:  '.$cantidad;
      var_dump($_SESSION['arrayProcesos']);
      echo '<table class="table table-striped table-advance table-hover">
                <thead>
                  <tr>
                      <th>Número</th>
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
		}
	}
 ?>