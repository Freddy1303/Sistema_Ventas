<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Usuarios</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-user-tie"></i> &nbsp; Nuevo usuario</h2>
</div>

<div class="container pb-6 pt-6">

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">

		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/usuarioAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data">

			<input type="hidden" name="modulo_usuario" value="registrar">

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Nombres <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="usuario_nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
						<span class="icon is-left"><i class="fas fa-user"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Apellidos <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="usuario_apellido" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}" maxlength="40" required>
						<span class="icon is-left"><i class="fas fa-user-tag"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Usuario <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="usuario_usuario" pattern="[a-zA-Z0-9]{4,20}" maxlength="20" required>
						<span class="icon is-left"><i class="fas fa-user-circle"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Email</label>
					<div class="control has-icons-left">
						<input class="input" type="email" name="usuario_email" maxlength="70">
						<span class="icon is-left"><i class="fas fa-envelope"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Clave <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="password" name="usuario_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
						<span class="icon is-left"><i class="fas fa-lock"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Repetir clave <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="password" name="usuario_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required>
						<span class="icon is-left"><i class="fas fa-lock"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Foto del usuario</label>
					<div class="file has-name is-boxed is-fullwidth">
						<label class="file-label">
							<input class="file-input" type="file" name="usuario_foto" accept=".jpg, .png, .jpeg">
							<span class="file-cta">
								<span class="file-icon"><i class="fas fa-upload"></i></span>
								<span class="file-label">Seleccionar foto</span>
							</span>
							<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
						</label>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Caja de ventas <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="usuario_caja">
							<option value="" selected="">Seleccione una opción</option>
							<?php
								$datos_cajas = $insLogin->seleccionarDatos("Normal","caja","*",0);
								while($campos_caja = $datos_cajas->fetch()){
									echo '<option value="'.$campos_caja['caja_id'].'">Caja No.'.$campos_caja['caja_numero'].' - '.$campos_caja['caja_nombre'].'</option>';
								}
							?>
						</select>
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
