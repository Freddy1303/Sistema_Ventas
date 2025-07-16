<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Clientes</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-sync-alt"></i> &nbsp; Actualizar cliente</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./app/views/inc/btn_back.php";
		$id = $insLogin->limpiarCadena($url[1]);
		$datos = $insLogin->seleccionarDatos("Unico", "cliente", "cliente_id", $id);

		if ($datos->rowCount() == 1) {
			$datos = $datos->fetch();
	?>

	<h2 class="title has-text-centered"><?php echo $datos['cliente_nombre']." ".$datos['cliente_apellido']." (".$datos['cliente_tipo_documento'].": ".$datos['cliente_numero_documento'].")"; ?></h2>

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/clienteAjax.php" method="POST" autocomplete="off">
			<input type="hidden" name="modulo_cliente" value="actualizar">
			<input type="hidden" name="cliente_id" value="<?php echo $datos['cliente_id']; ?>">

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Tipo de documento <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="cliente_tipo_documento">
							<?php echo $insLogin->generarSelect(DOCUMENTOS_USUARIOS, $datos['cliente_tipo_documento']); ?>
						</select>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Número de documento <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_numero_documento" value="<?php echo $datos['cliente_numero_documento']; ?>" pattern="[a-zA-Z0-9-]{7,30}" maxlength="30" required>
						<span class="icon is-left"><i class="fas fa-id-card"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Nombres <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_nombre" value="<?php echo $datos['cliente_nombre']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
						<span class="icon is-left"><i class="fas fa-user"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Apellidos <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_apellido" value="<?php echo $datos['cliente_apellido']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
						<span class="icon is-left"><i class="fas fa-user-tag"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-one-third">
					<label class="label">Estado, provincia o departamento <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_provincia" value="<?php echo $datos['cliente_provincia']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" maxlength="30" required>
						<span class="icon is-left"><i class="fas fa-map-marked-alt"></i></span>
					</div>
				</div>
				<div class="column is-one-third">
					<label class="label">Ciudad o pueblo <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_ciudad" value="<?php echo $datos['cliente_ciudad']; ?>" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" maxlength="30" required>
						<span class="icon is-left"><i class="fas fa-city"></i></span>
					</div>
				</div>
				<div class="column is-one-third">
					<label class="label">Calle o dirección de casa <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_direccion" value="<?php echo $datos['cliente_direccion']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,70}" maxlength="70" required>
						<span class="icon is-left"><i class="fas fa-map-pin"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Teléfono</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_telefono" value="<?php echo $datos['cliente_telefono']; ?>" pattern="[0-9()+]{8,20}" maxlength="20">
						<span class="icon is-left"><i class="fas fa-phone"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input class="input" type="email" name="cliente_email" value="<?php echo $datos['cliente_email']; ?>" maxlength="70">
						<span class="icon is-left"><i class="fas fa-envelope"></i></span>
					</div>
				</div>
			</div>

			<div class="field is-grouped is-grouped-centered mt-5">
				<p class="control">
					<button type="submit" class="button is-success is-rounded">
						<i class="fas fa-sync-alt"></i> &nbsp; Actualizar
					</button>
				</p>
			</div>

			<p class="has-text-centered pt-6">
				<small>Los campos marcados con <?php echo CAMPO_OBLIGATORIO; ?> son obligatorios</small>
			</p>
		</form>
	</div>

	<?php
		} else {
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>
