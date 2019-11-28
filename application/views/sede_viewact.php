<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="<?php echo base_url('props/bootstrap/js/validacion.js');?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.css') ; ?>">
</head>
<body>
	<center>
		<br><br>
		<h1>SEDE</h1>
		<br>
		<form action="<?php echo base_url().'sede_controller/actualizar' ?>" method="POST" onsubmit="return validar()" >
			<?php foreach ($sede as $s) { ?>
				<div>
					<input type="hidden" name="id" value="<?= $s->id_sede?>" >
					<label>NOMBRE SEDE</label>
					<input type="text" name="nombre_sede" value="<?= $s->nombre_sede?>" id='nombre'>
				</div><br>
				<div>
					<label>DIRECCION</label>
					<input type="text" name="direccion" value="<?= $s->direccion?>" id='direccion'>
				</div><br>
				<div>
					<label>MUNICIPIO</label>
					<select name="nombre_municipio" id="municipio" >
						<option value="">-- Seleccione una ciudad --</option>
						<?php foreach ($municipio as $m) { ?>
							<option value="<?= $m->id_municipio ?>" <?php if($m->id_municipio == $s->id_municipio){ echo 'selected'; } ?>><?= $m->nombre_municipio ?></option>
						<?php } ?>
					</select>
				</div><br>
				<br>
				<div>
					<input type="submit" name="actualizar" value="actualizar" class="btn btn-warning
					">
				</div>
			</form>
		<?php } ?>
	</center>
</body>
</html>