<div class="container is-fluid mb-6">
	<h1 class="title is-3 has-text-weight-bold has-text-primary">
		<i class="fas fa-store-alt"></i> &nbsp; Datos de empresa
	</h1>
</div>

<div class="container pb-6 pt-6">
	<?php
		$datos = $insLogin->seleccionarDatos("Normal", "empresa LIMIT 1", "*", 0);
		if ($datos->rowCount() == 1) {
			$datos = $datos->fetch();
	?>
	<style>
	.wordart-title {
		font-size: 3rem; /* Más grande */
		text-transform: uppercase;
		font-weight: 900;
		font-family: 'Arial Black', Impact, sans-serif;
		background: linear-gradient(to right, #ff416c, #ff4b2b, #ff416c); /* Degradado */
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); /* Sombra tipo WordArt */
		letter-spacing: 2px;
	}
	</style>
	<h2 class="title has-text-centered wordart-title"><?php echo strtoupper($datos['empresa_nombre']); ?></h2>


	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/empresaAjax.php" method="POST" autocomplete="off">

			<input type="hidden" name="modulo_empresa" value="actualizar">
			<input type="hidden" name="empresa_id" value="<?php echo $datos['empresa_id']; ?>">

			<div class="columns">
				<div class="column">
					<label class="label">Nombre <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="empresa_nombre" value="<?php echo $datos['empresa_nombre']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ., ]{4,85}" maxlength="85" required>
						<span class="icon is-left"><i class="fas fa-building"></i></span>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Teléfono</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="empresa_telefono" value="<?php echo $datos['empresa_telefono']; ?>" pattern="[0-9()+]{8,20}" maxlength="20">
						<span class="icon is-left"><i class="fas fa-phone"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input class="input" type="email" name="empresa_email" value="<?php echo $datos['empresa_email']; ?>" maxlength="50">
						<span class="icon is-left"><i class="fas fa-envelope"></i></span>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Dirección</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="empresa_direccion" value="<?php echo $datos['empresa_direccion']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,97}" maxlength="97">
						<span class="icon is-left"><i class="fas fa-map-marker-alt"></i></span>
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

	<?php } else { ?>

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/empresaAjax.php" method="POST" autocomplete="off">

			<input type="hidden" name="modulo_empresa" value="registrar">

			<div class="columns">
				<div class="column">
					<label class="label">Nombre <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="empresa_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ., ]{4,85}" maxlength="85" required>
						<span class="icon is-left"><i class="fas fa-building"></i></span>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Teléfono</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="empresa_telefono" pattern="[0-9()+]{8,20}" maxlength="20">
						<span class="icon is-left"><i class="fas fa-phone"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input class="input" type="email" name="empresa_email" maxlength="50">
						<span class="icon is-left"><i class="fas fa-envelope"></i></span>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Dirección</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="empresa_direccion" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{4,97}" maxlength="97">
						<span class="icon is-left"><i class="fas fa-map-marker-alt"></i></span>
					</div>
				</div>
			</div>

			<div class="field is-grouped is-grouped-centered mt-5">
				<p class="control">
					<button type="reset" class="button is-warning is-light is-rounded">
						<i class="fas fa-paint-roller"></i> &nbsp; Limpiar
					</button>
				</p>
				<p class="control">
					<button type="submit" class="button is-primary is-rounded">
						<i class="far fa-save"></i> &nbsp; Guardar
					</button>
				</p>
			</div>

			<p class="has-text-centered pt-6">
				<small>Los campos marcados con <?php echo CAMPO_OBLIGATORIO; ?> son obligatorios</small>
			</p>

		</form>
	</div>

	<?php } ?>
</div>
