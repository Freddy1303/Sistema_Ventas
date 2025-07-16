<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Categorías</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-sync-alt"></i> &nbsp; Actualizar categoría</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./app/views/inc/btn_back.php";

		$id = $insLogin->limpiarCadena($url[1]);
		$datos = $insLogin->seleccionarDatos("Unico", "categoria", "categoria_id", $id);

		if ($datos->rowCount() == 1) {
			$datos = $datos->fetch();
	?>

	<h2 class="title has-text-centered "><?php echo $datos['categoria_nombre']; ?></h2>

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">

		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/categoriaAjax.php" method="POST" autocomplete="off">
			<input type="hidden" name="modulo_categoria" value="actualizar">
			<input type="hidden" name="categoria_id" value="<?php echo $datos['categoria_id']; ?>">

			<div class="columns is-centered">
				<div class="column is-half">
					<label class="label">Nombre <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="categoria_nombre" value="<?php echo $datos['categoria_nombre']; ?>" maxlength="50" required>
						<span class="icon is-left"><i class="fas fa-tags"></i></span>
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

	<?php } else {
		include "./app/views/inc/error_alert.php";
	} ?>
</div>
