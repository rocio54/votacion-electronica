<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet" type="text/css" href="../props/bootstrap/css/bootstrap.min.css">
	<script src="../props/bootstrap/js/validacion.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<center>
			<br><br>
			<h1>SEDE</h1>
			<br><br>
			
			<form action="<?php echo base_url().'sede_controller/insertar' ?>" method="POST" onsubmit="return validar()">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Nueva Sede
				</button>
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
									<label>NOMBRE SEDE</label>
									<input type="text" name="nombre_sede" id="nombre" autocomplete="off" >
								</div>
								<br>
								<br>
								<div>
									<label>DIRECCION</label>
									<input type="text" name="direccion" id='direccion' autocomplete="off" >
								</div>
								<br>
								<br>
								<div>
									<label>MUNICIPIO</label>
									<select name="nombre_municipio" id="municipio" autocomplete="off">
										<option value="">--Seleccione un municipio--</option>
										<?php foreach($municipio as $m) { ?>
											<option value="<?= $m->id_municipio ?>"><?= $m->nombre_municipio ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
									<div class="modal-footer">
										<center><div class=col-md-12><button type="submit" value="ingresar" class="btn btn-block btn-info">Ingresar</button></div></center>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</center>
		<br><br>
		<div class="container">
			<table border="1" class="table table-dark table-hover" >
				<thead>
					<tr>
						<td>Nombre</td>
						<td>Direccion</td>
						<td>Municipio</td>
						<td colspan="2">Operaciones</td>
					</tr>
				</thead>
				<tbody>
					<?php foreach($sede as $valor) { ?>
						<tr>
							<td><?= $valor->nombre_sede?></td>
							<td><?= $valor->direccion?></td>
							<td><?= $valor->nombre_municipio?></td>
							<td><a class="btn btn-block btn-danger" onclick="alerta_eliminar('<?= $valor->id_sede ?>')">eliminar</a></td>
							<td><a  class="btn btn-bock btn-success" href="<?php echo base_url('sede_controller/get_datos/'.$valor->id_sede) ?>">Actualizar</a></td>
						</tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
		<?php $this->load->view('utils/alertassede') ?>
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