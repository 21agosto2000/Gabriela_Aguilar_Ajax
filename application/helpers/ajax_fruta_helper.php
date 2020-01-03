<script type="text/javascript">
	
	$(document).ready(function(){

		mostrarFruta();

		function mostrarFruta(){
			$.ajax({

				type: 'ajax',
				url: '<?=  base_url('frutaC/get_fruta')?>',
				dataType: 'json',

				success: function(datos){
					var tabla ='';
					var i;
					var n=1;

					for(i=0; i<datos.length; i++){
						tabla +=
						'<tr>'+
						'<td>'+n+'</td>'+
						'<td>'+datos[i].nombre_fruta+'</td>'+
						'<td>'+datos[i].nombre_color+'</td>'+
						'<td>'+datos[i].nombre_sabor+'</td>'+
						'<td>'+'<a href="javascript:;" class="btn btn-danger btn-sm borrar" data="'+datos[i].id_fruta+'">Eliminar</a>'+
						'</td>'
						'</tr>'
						n++;

					}
					$('#tabla_fruta').html(tabla);
				}


			});
		}


		$('#tabla_fruta').on('click', '.borrar', function(){

			$id = $(this).attr('data');
			$('#modalBorrar').modal('show');

			$('#btnBorrar').unbind().click(function(){

				$.ajax({

					type: 'ajax',
					method: 'post',
					url: '<?= base_url('frutaC/eliminar')?>',
					data: {id:$id},
					dataType: 'json',

					success: function(respuesta){
						$('#modalBorrar').modal('hide');//para ocultar el modal
						if(respuesta==true){
							alertify.notify('Elminado existosamente', 'success', 10, null);
							mostrarFrutas();
						}else{
							alertify.notify('Error al eliminar', 'error', 10, null);
						}
						$('#formFruta')[0].reset();
						mostrarFrutas();
					}

				});
			});
		});
		$('#nueFru').click(function(){
			$('#fruta').modal('show');
			$('#fruta').find('.modal-title').text('Nueva fruta');
			$('#formFruta').attr('action','<?= base_url('frutaC/ingresar')?>');
		});

		get_color();
		function get_color(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('frutaC/get_color')?>',
				dataType: 'json',

				success: function(datos){
					var op = '',
					var i;
					op +="<option value=''>--seleccione un color--</option>";
					for(i=0; i<datos.length; i++){
						op +="<option value='"+datos[i].id_color"'>"+datos[i].id_color+"</option>";
					}

					$('#color').html(op);
				}
			});
		}


		get_sabor();
		function get_sabor(){
			$.ajax({
				type: 'ajax',
				url: '<?= base_url('frutaC/get_sabor')?>',
				dataType: 'json',

				success: function(datos){
					var op = '',
					var i;
					op +="<option value=''>--seleccione un sabor--</option>";
					for(i=0; i<datos.length; i++){
						op +="<option value='"+datos[i].id_sabor"'>"+datos[i].id_sabor+"</option>";
					}

					$('#sabor').html(op);
				}
			});
		}

		$('#btnGuardar').click(function(){
			$url = $('#formFruta').attr('action');
			$data = $('#formFruta').seialize();

			$.ajax({
				type: 'ajax',
				method: 'post',
				url: $url,
				data: $data,
				dataType: 'json',

				success: function(respuesta){
					$('#fruta').modal('hide');

					if(respuesta=='add'){
						alertify.notify('ingresado correctamente', 'success',10,null);
					}else{
						alertify.notify('error al ingresar', 'error',10,null);
					}
					$('#formFruta')[0].reset();
					mostrarFruta();
				}
			});
		});


	});
</script>