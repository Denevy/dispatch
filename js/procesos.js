//var nombre;
//nombre = prompt("Ingresa tu nombre");
//alert(nombre);
//document.write(nombre);
//alert("hola denevy");
var proceso=[];
var contador=0;
$(function() {
	$('#guardar').on('click', function(){
		var url = document.URL;
		location.href=url;
	});

	$('#generar').on('click', function(){
		$('#modeloRestricciones').modal({
			show:true,
			backdrop:'static',
		});
	});

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

	$('#regProceso').on('click',function(){
		
		//var proceso; 
		proceso[contador]= [$('#tiempoLlegada').val(),$('#rafaga').val()];
		//proceso[proceso.length]=procesoAgregar;
		//proceso.push(procesoAgregar);
		//var proceso = [contador,$('#tiempoLlegada').val(),$('#rafaga').val()];
		contador++;
		alert(proceso);
		if (proceso.length > 0){
			$.ajax({
				type: 'GET',
				//data: 'proceso='+proceso,
				url: 'class/IngresarProceso.php?proceso='+proceso+'&contador='+contador,
				success: function(data){
					//alert(data);
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
});
