<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="<?php echo base_url('props/bootstrap/js/urnas.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('props/bootstrap/css/bootstrap.css') ; ?>">
</head>
<body>
	<center>
		<h1>ACTUALIZAR URNAS</h1>
		<br>
		<center>
			<form action="<?php echo base_url().'urnas_controller/actualizar' ?>" method="POST" onsubmit="return validar()">
				<?php foreach ($urnas as $u) { ?>
					<div>
						<label>JRV</label>
						<input type="text" name="id_urnas" id="jrv" value="<?= $u->id_urnas?>">
					</div>
					<br>
					<div>
						<label>Nombre</label>
						<input type="text" name="nombre_urnas" id="nombre" value="<?= $u->nombre_urnas?>">
					</div>
					<br>
					<div>
						<label>Sede</label>
						<select name="sede" id="sede">
							<option value="">--Seleccione un sede--</option>
							<?php foreach($sede as $s){ ?>
								<option value="<?= $s->id_sede ?>"<?php if ($s->id_sede == $s->id_sede) {
									echo "selected";} ?>><?= $s->nombre_sede ?></option>
								<?php } ?>
							</select>
						</div>
						<br>
						<div>
							<input type="submit" name="actualizar" value="actualizar" class="btn btn-success">
						</div>
						<br>
					</form>
				<?php } ?>
			</center>
		</body>
		</html>