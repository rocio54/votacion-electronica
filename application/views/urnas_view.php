<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.css') ; ?>">
	<script src="<?php echo base_url('props/bootstrap/js/urnas.js');?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<br><br><br>
	<center><h1>URNAS</h1></center>
	<br><br>
	<center>
		<form action="<?php echo base_url().'urnas_controller/insertar' ?>" method="POST" onsubmit="return validar()" >
			<!-- Button trigger modal -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
				Nueva Urna
			</button><br><br>

			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div>
								<label>JRV</label>
								<input type="text" name="id_urnas" id="jrv" autocomplete="off">
							</div>
							<br>
							<div>
								<label>Nombre</label>
								<input type="text" name="nombre_urnas" id="nombre" autocomplete="off">
							</div>
							<br>
							<div>
								<label>Sede</label>
								<select name="sede" id="sede" autocomplete="off" >
									<option value="">--Seleccione un sede--</option>
									<?php foreach($sede as $s) { ?>
										<option value="<?= $s->id_sede ?>"><?= $s->nombre_sede ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							<div class=col-md-6><button type="submit" value="ingresar" class="btn btn-block btn-info" onclick="">Ingresar</button></div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</center>
	<center>
		<div class="container">
			<table border="1" class="table table-dark table-hover">
				<thead>
					<tr>
						<td>Junta Receptiva de Votos</td>
						<td>NOMBRE</td>
						<td>SEDE</td>
						<td colspan="2">Operaciones</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($urnas as $valor) { ?>
						<tr>
							<td><?= $valor->id_urnas?></td>
							<td><?= $valor->nombre_urnas?></td>
							<td><?= $valor->nombre_sede?></td>
							<td><a class="btn btn-block btn-danger" onclick="alerta_eliminar('<?= $valor->id_urnas ?>')">Eliminar</a></td>
							<td><a  class="btn btn-bock btn-success" href="<?php echo base_url('urnas_controller/get_datos/'.$valor->id_urnas) ?>">Actualizar</a></td>
						</tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
	</center>
	<?php $this->load->view('utils/alertasurnas') ?>
	<script src="<?php echo base_url('props/bootstrap/js/jquery.min.js') ?>"></script>          
	<script src="<?php echo base_url('props/bootstrap/js/datatables.min.js') ?>"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('#sucu').DataTable();
			$('.dataTables_length').addClass('bs-select');
		});
	</script>
</body>
</html>