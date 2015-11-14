
var bandera=0;
var proceso=[]; //arrego de procesos incialmente esta en vacio
var contador=0; //Contador de Registro de procesos
/*	if(contador == 0)
	{
	document.getElementById('tablaProcesos').style.display = 'none';

	}	*/
	$(function() {
		$('#guardar').on('click', function(){
			var url 		= 	document.URL;
			location.href	=	url;
			//document.getElementById('tablaProcesos').style.display = 'block';
			bandera=1;
		});

		$('#generar').on('click', function(){
			$('#modeloRestricciones').modal({
				show:true,
				backdrop:'static',
			});
		});

	//Registro de Retricciones inicio
		$('#definirRestricciones').on('click', function(){
			var cantProcesos = $('#cantidadProcesos').val();
			var quantum		= $('#quantum').val(); 
			//alert(cantProceso);
			//var quantum = $('#quantum').val();
			if(cantProcesos.length > 0){
				$.ajax({
					type: 'GET',
					//data: 'cantProceso='+cantProceso,
					url: 'class/Restricciones.php?cantidadProcesos='+cantProcesos+'&quantum='+quantum,
					success: function(data){
					//alert(cantProcesos);
					//alert(quantum);
						//alert(data);
						if(data == 'cargo'){
							//alert('si mando datos');
							$('#tiempoLlegada').removeAttr('disabled').focus();
							$('#rafaga').removeAttr('disabled');
							$('#regProceso').removeAttr('disabled');
							//$('#guardar').removeAttr('disabled');

							$('#cantidadProcesos').attr('disabled','disabled');
							$('#quantum').attr('disabled','disabled');
							$('#definirRestricciones').attr('disabled','disabled');
						}
						else{
							alert('no cargo');
						}
					}
				});
			}
			else
			{
				$('#mensaje').html('<p class="alert alert-block alert-danger fade in"> Debe de ingresar por lo menos un proceso </p>');
			}
		});
	//Registro de Retricciones fin

	//Registro de procesos inicio
		$('#regProceso').on('click',function(){
			var tiempoLlegada 	= $('#tiempoLlegada').val();
			var rafaga			= $('#rafaga').val();
			if (tiempoLlegada.length > 0){
				$.ajax({
					type: 'GET',
					url: 'class/IngresarProceso.php?Llegada='+tiempoLlegada+'&Rafaga='+rafaga,
					success: function(data){
						//alert(tiempoLlegada);
						//alert(rafaga);
						//alert(data);
						//document.getElementById('tablaProcesos').style.display = 'block';
						$('#tiempoLlegada').val('').focus();
						$('#rafaga').val('');
						$('#contenidoRegistro').html(data);

					}
				});
			}
			else
			{
				$('#mensaje').html('<p class="alert alert-block alert-danger fade in"> Debe de ingresar datos para crear procesos </p>');
			}
		});
	//Registro de Procesos fin	
	});
  
//}
 /* if(bandera==1)
  {
    document.getElementById('tablaProcesos').style.display = 'block';
  }*/