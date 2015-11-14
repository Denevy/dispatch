<?php 
  include('conexion.php');
  $conexion = new conexion;
  $conexion->conexion();
class Planificacion{

  //------------------Fcfs inicio
  function MostrarTablaFcfs()
  {
    $procesos   = mysql_query("SELECT * FROM Proceso 
                                ORDER BY llegada ASC, rafaga ASC");
    $queryTotal= mysql_query("SELECT SUM(RAFAGA) FROM Proceso");
    $mostrarTotal=mysql_fetch_array($queryTotal);
    $TiempoTotal=$mostrarTotal[0];
    //echo $TiempoTotal;
    echo '<table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                    <th>Proceso</th>
                    <th>Llegada</th>
                    <th>Rafaga</th>
                    <th>Retorno</th>
                    <th>Espera</th>
                    <th>Grafica</th>
                </tr>
              </thead>
              <tbody>';
    $contador=0;
    $contador2=0;
    $rafaga[]=100;
    $retorno[]=100;
    $esperaArray[]=100;
    $tempRafaga=0;
    $tempTotal=0;
    $tempEspera=0;
    $totalEspera=0;
    $porcentaje[]=100;
    $temp=0;
    while($mostrar = mysql_fetch_array($procesos))
    {
    $totalRafaga=0;

      echo '<tr>
              <td>P'.$mostrar['idProceso'].'</td>
              <td>'.$mostrar['llegada'].'</td>
              <td>'.$mostrar['rafaga'].'</td>';
      $rafaga[$contador]=$mostrar['rafaga'];
      $total=count($rafaga);
      $tempTotal=$total;
      //echo "el total es : ".$total;
      if($total == 1)
      {
        //echo "entro al if";
        echo '<td>'.$mostrar['rafaga'].'</td>';
        $espera= ($mostrar['rafaga']-$mostrar['rafaga']);
        echo'   <td>'.$espera.'</td>';
      }
      else
      {
        //echo "esgosdlfjlk";
         for ($i=0; $i <$total ; $i++) {
         $totalRafaga+=$rafaga[$i];
      
        }
        $tempRafaga=$totalRafaga;
        //echo $totalRafaga;
        $retorno[$contador2]=($totalRafaga-$mostrar['llegada']);
        echo'   <td>'.$retorno[$contador2].'</td>';

        $espera= ($retorno[$contador2]-$mostrar['rafaga']);
        $esperaArray[$contador2]=$espera;
        $tEspera=count($esperaArray);
        $totalEspera+=$espera;
        $tempEspera=$totalEspera;
        //echo $tempEspera;
        echo'   <td>'.$espera.'</td>';
      }
        $porcentaje[$contador]=((100/($TiempoTotal))*($mostrar['rafaga']));
        $temp+=$porcentaje[$contador];
        //echo $porcentaje[$contador];
        echo '<td>'.$temp.'%<div class="progress progress-striped active progress-sm">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: '.$temp.'%">
                      <span class="sr-only">'.$temp.'% Complete</span>
                    </div>
                  </div>
              </td>';
        echo'
            </tr>';

    $contador2++;  
    $contador++;  
    }
      $promedioRafaga=$tempRafaga/$tempTotal;
      $promedioEspera=$tempEspera/$tempTotal;
        echo '<tr>
                <td>Promedio</td>
                <td><td>
                <td>'.number_format($promedioRafaga,2).'</td>
                <td>'.number_format($promedioEspera,2).'</td>
              </tr>';
      echo '
        </tbody>
          </table>';
  }
  //------------------Fcfs fin
  
//--------------------SJF apropiativo inicio
  function MostrarTablaSjf()
  {
    $procesos   = mysql_query("SELECT * FROM Proceso 
                                ORDER BY rafaga ASC");
    $queryTotal= mysql_query("SELECT SUM(RAFAGA) FROM Proceso");
    $mostrarTotal=mysql_fetch_array($queryTotal);
    $TiempoTotal=$mostrarTotal[0];
    //echo $TiempoTotal;
    echo '<table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                    <th>Proceso</th>
                    <th>Llegada</th>
                    <th>Rafaga</th>
                    <th>Retorno</th>
                    <th>Espera</th>
                    <th>Grafica</th>
                </tr>
              </thead>
              <tbody>';
    $contador=0;
    $contador2=0;
    $rafaga[]=100;
    $retorno[]=100;
    $esperaArray[]=100;
    $tempRafaga=0;
    $tempTotal=0;
    $tempEspera=0;
    $totalEspera=0;
    $porcentaje[]=100;
    $temp=0;
    while($mostrar = mysql_fetch_array($procesos))
    {
    $totalRafaga=0;

      echo '<tr>
              <td>P'.$mostrar['idProceso'].'</td>
              <td>'.$mostrar['llegada'].'</td>
              <td>'.$mostrar['rafaga'].'</td>';
      $rafaga[$contador]=$mostrar['rafaga'];
      $total=count($rafaga);
      $tempTotal=$total;
      //echo "el total es : ".$total;
      if($total == 1)
      {
        //echo "entro al if";
        echo '<td>'.$mostrar['rafaga'].'</td>';
        $espera= ($mostrar['rafaga']-$mostrar['rafaga']);
        echo'   <td>'.$espera.'</td>';
      }
      else
      {
        //echo "esgosdlfjlk";
         for ($i=0; $i <$total ; $i++) {
         $totalRafaga+=$rafaga[$i];
      
        }
        $tempRafaga=$totalRafaga;
        //echo $totalRafaga;
        $retorno[$contador2]=($totalRafaga-$mostrar['llegada']);
        echo'   <td>'.$retorno[$contador2].'</td>';

        $espera= ($retorno[$contador2]-$mostrar['rafaga']);
        $esperaArray[$contador2]=$espera;
        $tEspera=count($esperaArray);
        $totalEspera+=$espera;
        $tempEspera=$totalEspera;
        //echo $tempEspera;
        echo'   <td>'.$espera.'</td>';
      }
        $porcentaje[$contador]=((100/($TiempoTotal))*($mostrar['rafaga']));
        $temp+=$porcentaje[$contador];
        //echo $porcentaje[$contador];
        echo '<td>'.$temp.'%<div class="progress progress-striped active progress-sm">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: '.$temp.'%">
                      <span class="sr-only">'.$temp.'% Complete</span>
                    </div>
                  </div>
              </td>';
        echo'
            </tr>';

    $contador2++;  
    $contador++;  
    }
      $promedioRafaga=$tempRafaga/$tempTotal;
      $promedioEspera=$tempEspera/$tempTotal;
        echo '<tr>
                <td>Promedio</td>
                <td><td>
                <td>'.number_format($promedioRafaga,2).'</td>
                <td>'.number_format($promedioEspera,2).'</td>
              </tr>';
      echo '
        </tbody>
          </table>';
  }
  //--------------------SJF apropiativo fin

  //--------------------SJF no apropiativo inicio
  function MostrarTablaNoSjf()
  {
    $procesos   = mysql_query("SELECT * FROM Proceso 
                                ORDER BY rafaga ASC");
    $queryTotal= mysql_query("SELECT SUM(RAFAGA) FROM Proceso");
    $mostrarTotal=mysql_fetch_array($queryTotal);
    $TiempoTotal=$mostrarTotal[0];
    //echo $TiempoTotal;
    echo '<table class="table table-striped table-advance table-hover">
              <thead>
                <tr>
                    <th>Proceso</th>
                    <th>Llegada</th>
                    <th>Rafaga</th>
                    <th>Retorno</th>
                    <th>Espera</th>
                    <th>Grafica</th>
                </tr>
              </thead>
              <tbody>';
    $contador=0;
    $contador2=0;
    $rafaga[]=100;
    $retorno[]=100;
    $esperaArray[]=100;
    $tempRafaga=0;
    $tempTotal=0;
    $tempEspera=0;
    $totalEspera=0;
    $porcentaje[]=100;
    $temp=0;
    while($mostrar = mysql_fetch_array($procesos))
    {
    $totalRafaga=0;

      echo '<tr>
              <td>P'.$mostrar['idProceso'].'</td>
              <td>'.$mostrar['llegada'].'</td>
              <td>'.$mostrar['rafaga'].'</td>';
      $rafaga[$contador]=$mostrar['rafaga'];
      $total=count($rafaga);
      $tempTotal=$total;
      //echo "el total es : ".$total;
      if($total == 1)
      {
        //echo "entro al if";
        echo '<td>'.$mostrar['rafaga'].'</td>';
        $espera= ($mostrar['rafaga']-$mostrar['rafaga']);
        echo'   <td>'.$espera.'</td>';
      }
      else
      {
        //echo "esgosdlfjlk";
         for ($i=0; $i <$total ; $i++) {
         $totalRafaga+=$rafaga[$i];
      
        }
        $tempRafaga=$totalRafaga;
        //echo $totalRafaga;
        $retorno[$contador2]=($totalRafaga-$mostrar['llegada']);
        echo'   <td>'.$retorno[$contador2].'</td>';

        $espera= ($retorno[$contador2]-$mostrar['rafaga']);
        $esperaArray[$contador2]=$espera;
        $tEspera=count($esperaArray);
        $totalEspera+=$espera;
        $tempEspera=$totalEspera;
        //echo $tempEspera;
        echo'   <td>'.$espera.'</td>';
      }
        $porcentaje[$contador]=((100/($TiempoTotal))*($mostrar['rafaga']));
        $temp+=$porcentaje[$contador];
        //echo $porcentaje[$contador];
        echo '<td>'.$temp.'%<div class="progress progress-striped active progress-sm">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: '.$temp.'%">
                      <span class="sr-only">'.$temp.'% Complete</span>
                    </div>
                  </div>
              </td>';
        echo'
            </tr>';

    $contador2++;  
    $contador++;  
    }
      $promedioRafaga=$tempRafaga/$tempTotal;
      $promedioEspera=$tempEspera/$tempTotal;
        echo '<tr>
                <td>Promedio</td>
                <td><td>
                <td>'.number_format($promedioRafaga,2).'</td>
                <td>'.number_format($promedioEspera,2).'</td>
              </tr>';
      echo '
        </tbody>
          </table>';
  }
  //--------------------SJF no apropiativo fin
}
?>