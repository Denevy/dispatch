<?php
  include('class/Planificacion.php');
  //include('class/conexion.php');
 // $conectar = new conexion;
  //$conectar->conexion();
  $clase = new Planificacion;
 ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Dispatch UMG</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link href="assets/bxslider/jquery.bxslider.css" rel="stylesheet" />
    <link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/revolution_slider/css/rs-style.css" media="screen">
    <link rel="stylesheet" href="assets/revolution_slider/rs-plugin/css/settings.css" media="screen">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html">Distpach<span>UMG</span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li><a href="index.html">Inicio</a></li>
                        <li class="active"><a href="procesos.php">Planificación de Procesos</a></li>
                        <li><input type="text" placeholder=" Search" class="form-control search"></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->
    <!--breadcrumbs start-->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <h1>Planificación de Procesos</h1>
                </div>
                <div class="col-lg-8 col-sm-8">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Procesos</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs end-->
<section id="main-content">
          <section class="wrapper">
             <input type="button" value="Generar Planificación" id="generar" class="btn btn-success"/>
             <a type="button" href="class/borrar.php" value="Borrar Datos" id="borrar" class="btn btn-danger"/>Borrar</a>
             <div class="row">
               <div class="col-lg-12">
                 <section class="panel" id='tablaProcesos'>
                          
                          <header class="panel-heading">
                             <h1> Tabla FCFS </h1>
                          </header>
                              <?php 
                                $clase->MostrarTablaFcfs();
                               ?> 
                          <header class="panel-heading">
                             <h1> Tabla SJF Apropiativo </h1>
                          </header>
                              <?php 
                                $clase->MostrarTablaSjf();
                               ?>
                          <header class="panel-heading">
                             <h1> Tabla SJF No Apropiativo </h1>
                          </header>
                              <?php 
                                $clase->MostrarTablaNoSjf();
                               ?> 
                      </section>
               </div>
             </div>
        </section>
</section>

<!-- Modelo Restricciones inicio-->

 <div class="modal fade" id="modeloRestricciones" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title" id="myModalLabel"><b>Registro de Procesos</b></h4>
            </div>
            <div class="modal-body">
            <fieldset><legend>Ingresar Restricciones</legend>
             <table class="tbl-restricciones" width="100%">
                  <tr>
                      <td>Cantidad de Procesos</td>
                        <td><input type="text" class="form-control" id="cantidadProcesos" maxlength="5"/></td>
                      <td>Quantum </td>
                        <td><input type="text" class="form-control" id="quantum" maxlength="5"/></td>
                    </tr>
                    <tr>
                      <td colspan="4"><input type="button" id="definirRestricciones" class="btn btn-danger" value="Definir" /></td>
                    </tr>
                </table>
                </fieldset>
                <div id="mensaje"></div>
                <fieldset><legend>Registrar Proceso</legend>
                <table class="tbl-registro" width="100%">
                  <tr>
                      <td><input type="text" placeholder="Tiempo de llegada" class="form-control" id="tiempoLlegada" disabled="disabled"/></td>
                      <td><input type="text" placeholder="Rafaga" class="form-control" id="rafaga" disabled="disabled"/></td>
                      <td><input type="button" id="regProceso" class="btn btn-primary" value="+" disabled="disabled"/></td>
                    </tr>
                </table>
                </fieldset>
                <br />
                <div id="contenidoRegistro"></div>
                <div class="modal-footer">
                  <input type="button" id="guardar" class="btn btn-info" value="Guardar"/>
                </div>
              </div>
          </div>
        </div>
      </div>
      
      
   <!-- Modelo Restricciones fin -->

  <!--footer start-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                    <h1>Desarrollado Por</h1>
                    <address>
                        <p>Denevy Saquic</p>
                        <p>2690-11-5648</p>

                        <p>Curso: Sistemas Operativos</p>
                    </address>
                </div>

                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <h1>Contactame</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-google-plus"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="https://github.com/Denevy/"><i class="icon-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!--footer end-->

    

    <!-- js placed at the end of the document so the pages load faster -->
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/hover-dropdown.js"></script>
    <script defer src="js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/jquery.parallax-1.1.3.js"></script>

    <script src="js/jquery.easing.min.js"></script>
    <script src="js/link-hover.js"></script>

    <script src="assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <script type="text/javascript" src="assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <script src="js/revulation-slide.js"></script>
    <script src="js/procesos.js"></script>




  </body>
</html>
