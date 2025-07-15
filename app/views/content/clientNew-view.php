<div class="container is-fluid mb-6">
	<h1 class="title is-3 has-text-weight-bold has-text-primary">
		<i class="fas fa-male"></i> &nbsp; Nuevo cliente
	</h1>
</div>

<div class="container pb-6 pt-6">

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">

		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/clienteAjax.php" method="POST" autocomplete="off">

			<input type="hidden" name="modulo_cliente" value="registrar">

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Tipo de documento <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="cliente_tipo_documento">
							<option value="" selected="">Seleccione una opción</option>
							<?php echo $insLogin->generarSelect(DOCUMENTOS_USUARIOS,"VACIO"); ?>
						</select>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Número de documento <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_numero_documento" pattern="[a-zA-Z0-9-]{7,30}" maxlength="30" required>
						<span class="icon is-left"><i class="fas fa-id-card"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Nombres <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
						<span class="icon is-left"><i class="fas fa-user"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Apellidos <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
						<span class="icon is-left"><i class="fas fa-user-tag"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column">
					<label class="label">Estado/Provincia <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_provincia" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" maxlength="30" required>
						<span class="icon is-left"><i class="fas fa-map-marked-alt"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Ciudad o pueblo <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_ciudad" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{4,30}" maxlength="30" required>
						<span class="icon is-left"><i class="fas fa-city"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Dirección <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,70}" maxlength="70" required>
						<span class="icon is-left"><i class="fas fa-home"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Teléfono</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="cliente_telefono" pattern="[0-9()+]{8,20}" maxlength="20">
						<span class="icon is-left"><i class="fas fa-phone"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input class="input" type="email" name="cliente_email" maxlength="70">
						<span class="icon is-left"><i class="fas fa-envelope"></i></span>
					</div>
				</div>
			</div>

			<div class="field is-grouped is-grouped-centered mt-5">
				<p class="control">
					<button type="reset" class="button is-warning is-rounded is-light">
						<i class="fas fa-paint-roller"></i> &nbsp; Limpiar
					</button>
				</p>
				<p class="control">
					<button type="submit" class="button is-primary is-rounded">
						<i class="fas fa-save"></i> &nbsp; Guardar
					</button>
				</p>
			</div>

			<p class="has-text-centered pt-6">
				<small>Los campos marcados con <?php echo CAMPO_OBLIGATORIO; ?> son obligatorios</small>
			</p>
			
		</form>
	</div>
</div>
