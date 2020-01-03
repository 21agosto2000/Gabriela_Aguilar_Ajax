<?php $this->load->helper('ajax_fruta') ?><!-- archivo ajax -->

<body>


	<table border="2" >
		<thead>
			
			<tr>
				<td>Id</td>
				<td>Fruta</td>
				<td>Color</td>
				<td>Sabor</td>
				<td>Operaciones</td>
			</tr>
		</thead>
		<tbody id="tabla_fruta">
			
		</tbody>

	</table>

	
	<div class="modal" tabindex="-1" role="dialog" id="modalBorrar">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Confirmacion de eliminar</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>¿Realmente desea eliminar el registro?</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btnBorrar">Si, borrar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

