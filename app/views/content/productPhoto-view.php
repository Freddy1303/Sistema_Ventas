<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Productos</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="far fa-image"></i> &nbsp; Actualizar foto de producto</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./app/views/inc/btn_back.php";

		$id = $insLogin->limpiarCadena($url[1]);
		$datos = $insLogin->seleccionarDatos("Unico", "producto", "producto_id", $id);

		if($datos->rowCount() == 1){
			$datos = $datos->fetch();
	?>

	<h2 class="title has-text-centered has-text-link"><?php echo $datos['producto_nombre']; ?></h2>

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
		<div class="columns is-variable is-6 is-align-items-center">

			<div class="column is-half has-text-centered">
				<h4 class="subtitle is-4 mb-4">Foto actual del producto</h4>

				<figure class="image is-inline-block mb-5" style="max-width: 250px;">
					<img class="is-photo" style="border-radius: 10px;" src="<?php echo APP_URL; ?>app/views/productos/<?php echo is_file("./app/views/productos/".$datos['producto_foto']) ? $datos['producto_foto'] : 'default.png'; ?>">
				</figure>

				<?php if(is_file("./app/views/productos/".$datos['producto_foto'])){ ?>
				<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" autocomplete="off">
					<input type="hidden" name="modulo_producto" value="eliminarFoto">
					<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>">
					<button type="submit" class="button is-danger is-rounded">
						<i class="far fa-trash-alt"></i> &nbsp; Eliminar foto
					</button>
				</form>
				<?php } ?>
			</div>

			<div class="column is-half">
				<h4 class="subtitle is-4 has-text-centered mb-4">Actualizar foto de producto</h4>

				<form class="FormularioAjax has-text-centered" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" name="modulo_producto" value="actualizarFoto">
					<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>">

					<label class="label">Foto o imagen del producto</label>

					<div class="file has-name is-boxed is-centered mb-6">
						<label class="file-label">
							<input class="file-input" type="file" name="producto_foto" accept=".jpg, .png, .jpeg">
							<span class="file-cta">
								<span class="file-icon">
									<i class="fas fa-upload"></i>
								</span>
								<span class="file-label">Seleccione una foto</span>
							</span>
							<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
						</label>
					</div>

					<button type="submit" class="button is-success is-rounded">
						<i class="fas fa-sync-alt"></i> &nbsp; Actualizar foto
					</button>
				</form>
			</div>

		</div>
	</div>

	<?php
		}else{
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>