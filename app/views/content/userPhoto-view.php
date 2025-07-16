<div class="container is-fluid mb-6">
	<?php 
		$id = $insLogin->limpiarCadena($url[1]);
		if($id == $_SESSION['id']){ 
	?>
	<h1 class="title has-text-weight-bold is-uppercase has-text">Mi foto de perfil</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-camera"></i> &nbsp; Actualizar foto de perfil</h2>
	<?php }else{ ?>
	<h1 class="title has-text-weight-bold is-uppercase has-text">Usuarios</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-camera"></i> &nbsp; Actualizar foto de perfil</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./app/views/inc/btn_back.php";
		$datos = $insLogin->seleccionarDatos("Unico", "usuario", "usuario_id", $id);
		if($datos->rowCount() == 1){
			$datos = $datos->fetch();
	?>

	<h2 class="title has-text-centered has-text-link"><?php echo $datos['usuario_nombre']." ".$datos['usuario_apellido']; ?></h2>

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
		<div class="columns is-variable is-6 is-align-items-center">
			
			<div class="column is-half has-text-centered">
				<h4 class="subtitle is-4 mb-4">Foto actual del usuario</h4>

				<figure class="image is-inline-block mb-5">
					<img class="is-rounded" style="max-width: 200px;" src="<?php echo APP_URL; ?>app/views/fotos/<?php echo is_file("./app/views/fotos/".$datos['usuario_foto']) ? $datos['usuario_foto'] : 'default.png'; ?>">
				</figure>

				<?php if(is_file("./app/views/fotos/".$datos['usuario_foto'])){ ?>
				<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off">
					<input type="hidden" name="modulo_usuario" value="eliminarFoto">
					<input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>">
					<button type="submit" class="button is-danger is-rounded">
						<i class="far fa-trash-alt"></i> &nbsp; Eliminar foto
					</button>
				</form>
				<?php } ?>
			</div>

			<div class="column is-half">
				<h4 class="subtitle is-4 has-text-centered mb-4">Actualizar foto de usuario</h4>

				<form class="FormularioAjax has-text-centered" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" enctype="multipart/form-data" autocomplete="off">
					<input type="hidden" name="modulo_usuario" value="actualizarFoto">
					<input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>">

					<label class="label">Foto o imagen del usuario</label>

					<div class="file has-name is-boxed is-centered mb-6">
						<label class="file-label">
							<input class="file-input" type="file" name="usuario_foto" accept=".jpg, .png, .jpeg">
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
