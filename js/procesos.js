//var nombre;
//nombre = prompt("Ingresa tu nombre");
//alert(nombre);
//document.write(nombre);
//alert("hola denevy");
var bandera=0;
$(document).on('ready',cargar);
function cargar(){
var proceso=[]; //arrego de procesos incialmente esta en vacio
var contador=0; //Contador de Registro de procesos
  if(contador == 0)
  {
	document.getElementById('tablaProcesos').style.display = 'none';

  }	
	$(function() {
		$('#guardar').on('click', function(){
			var url = document.URL;
			location.href=url;
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
			var cantProceso = [$('#cantidadProcesos').val(),$('#quantum').val()];
			//alert(cantProceso);
			//var quantum = $('#quantum').val();
			if(cantProceso.length > 0){
				$.ajax({
					type: 'POST',
					data: 'cantProceso='+cantProceso,
					url: 'class/Restricciones.php',
					success: function(data){
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
			//var proceso; 
			proceso[contador]= [contador,$('#tiempoLlegada').val(),$('#rafaga').val()];
			//proceso[proceso.length]=procesoAgregar;
			//proceso.push(procesoAgregar);
			//var proceso = [contador,$('#tiempoLlegada').val(),$('#rafaga').val()];
			contador++;
			//alert(proceso);
			if (proceso.length > 0){
				$.ajax({
					type: 'POST',
					data: 'proceso='+proceso,
					//url: 'class/IngresarProceso.php?proceso='+proceso+'&contador='+contador,
					url: 'class/IngresarProceso.php',
					success: function(data){
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
  
}
  if(bandera==1)
  {
    document.getElementById('tablaProcesos').style.display = 'block';
  }