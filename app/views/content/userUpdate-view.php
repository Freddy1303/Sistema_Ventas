<div class="container is-fluid mb-6">
	<?php 
		$id = $insLogin->limpiarCadena($url[1]);
		if($id == $_SESSION['id']){ 
	?>
	<h1 class="title has-text-weight-bold is-uppercase has-text"><i class="fas fa-user-cog"></i> &nbsp; Mi cuenta</h1>
	<h2 class="subtitle"><i class="fas fa-sync-alt"></i> &nbsp; Actualizar cuenta</h2>
	<?php }else{ ?>
	<h1 class="title is-3 has-text-link"><i class="fas fa-users-cog"></i> &nbsp; Usuarios</h1>
	<h2 class="subtitle"><i class="fas fa-sync-alt"></i> &nbsp; Actualizar usuario</h2>
	<?php } ?>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./app/views/inc/btn_back.php";
		$datos = $insLogin->seleccionarDatos("Unico","usuario","usuario_id",$id);

		if($datos->rowCount() == 1){
			$datos = $datos->fetch();
	?>

	<div class="columns is-justify-content-center mb-4">
		<figure class="image is-128x128">
			<?php
				if(is_file("./app/views/fotos/".$datos['usuario_foto'])){
					echo '<img class="is-rounded" src="'.APP_URL.'app/views/fotos/'.$datos['usuario_foto'].'">';
				}else{
					echo '<img class="is-rounded" src="'.APP_URL.'app/views/fotos/default.png">';
				}
			?>
		</figure>
	</div>

	<h2 class="title has-text-centered"><?php echo $datos['usuario_nombre']." ".$datos['usuario_apellido']; ?></h2>

	<div class="box" style="background-color: #ececec; border-radius: 10px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); padding: 2rem;">
		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off">

			<input type="hidden" name="modulo_usuario" value="actualizar">
			<input type="hidden" name="usuario_id" value="<?php echo $datos['usuario_id']; ?>">

			<div class="columns">
				<div class="column">
					<label class="label">Nombres <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" value="<?php echo $datos['usuario_nombre']; ?>" required>
						<span class="icon is-left"><i class="fas fa-user"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Apellidos <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" value="<?php echo $datos['usuario_apellido']; ?>" required>
						<span class="icon is-left"><i class="fas fa-user-tag"></i></span>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Usuario <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" value="<?php echo $datos['usuario_usuario']; ?>" required>
						<span class="icon is-left"><i class="fas fa-user-circle"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input class="input" type="email" name="usuario_email" maxlength="70" value="<?php echo $datos['usuario_email']; ?>">
						<span class="icon is-left"><i class="fas fa-envelope"></i></span>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Caja de ventas <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="usuario_caja">
							<?php
								$datos_cajas = $insLogin->seleccionarDatos("Normal","caja","*",0);
								while($campos_caja = $datos_cajas->fetch()){
									if($campos_caja['caja_id'] == $datos['caja_id']){
										echo '<option value="'.$campos_caja['caja_id'].'" selected>Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].' (Actual)</option>';
									}else{
										echo '<option value="'.$campos_caja['caja_id'].'">Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
			</div>

			<br>
			<p class="has-text-centered has-text-weight-semibold">Si desea actualizar la clave, llene ambos campos. Si no, déjelos vacíos.</p>
			<br>

			<div class="columns">
				<div class="column">
					<label class="label">Nueva clave</label>
					<div class="control has-icons-left">
						<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
						<span class="icon is-left"><i class="fas fa-lock"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Repetir nueva clave</label>
					<div class="control has-icons-left">
						<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
						<span class="icon is-left"><i class="fas fa-lock"></i></span>
					</div>
				</div>
			</div>

			<br>
			<p class="has-text-centered has-text-weight-semibold">
				Ingrese su <strong>usuario</strong> y <strong>clave actual</strong> para confirmar la actualización.
			</p>
			<br>

			<div class="columns">
				<div class="column">
					<label class="label">Usuario <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="administrador_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
						<span class="icon is-left"><i class="fas fa-user-lock"></i></span>
					</div>
				</div>
				<div class="column">
					<label class="label">Clave <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="password" name="administrador_clave" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
						<span class="icon is-left"><i class="fas fa-key"></i></span>
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
		}else{
			include "./app/views/inc/error_alert.php";
		}
	?>
</div>
