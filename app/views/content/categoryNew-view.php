<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Categorías</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-sync-alt"></i> &nbsp; Nueva categoría</h2>
</div>

<div class="container pb-6 pt-6">

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">

		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/categoriaAjax.php" method="POST" autocomplete="off">

			<input type="hidden" name="modulo_categoria" value="registrar">

			<div class="columns is-centered">
				<div class="column is-half">
					<label class="label">Nombre <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="categoria_nombre" maxlength="50" required>
						<span class="icon is-left"><i class="fas fa-tag"></i></span>
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
