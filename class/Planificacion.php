<?php 
  class Planificacion{
  public $cantProceso;

    function MostrarTabla()
    {
      $restricciones = $_SESSION['restriciones'];
      echo $restricciones;
      echo "<tr>
                                  <td><a>Vector Ltd</a></td>
                                  <td class=\"hidden-phone\">Lorem Ipsum dorolo imit</td>
                                  <td>12120.00$ </td>
                                  <td><span class=\"label label-info label-mini\">Due</span></td>
                                  <td>
                                      <button class=\"btn btn-success btn-xs\"><i class=\"icon-ok\"></i></button>
                                      <button class=\"btn btn-primary btn-xs\"><i class=\"icon-pencil\"></i></button>
                                      <button class=\"btn btn-danger btn-xs\"><i class=\"icon-trash\"></i></button>
                                  </td>
                              </tr>";
		}
	}
 ?>