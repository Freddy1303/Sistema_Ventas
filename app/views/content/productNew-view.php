<div class="container is-fluid mb-6">
	<h1 class="title is-3 has-text-weight-bold has-text-primary">
		<i class="fas fa-box"></i> &nbsp; Nuevo producto
	</h1>
</div>

<div class="container pb-6 pt-6">

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">

		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" autocomplete="off" enctype="multipart/form-data">

			<input type="hidden" name="modulo_producto" value="registrar">

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Código <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_codigo" pattern="[a-zA-Z0-9- ]{1,77}" maxlength="77" required>
						<span class="icon is-left"><i class="fas fa-barcode"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Nombre <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_nombre" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}" maxlength="100" required>
						<span class="icon is-left"><i class="fas fa-tag"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-one-third">
					<label class="label">Precio de compra <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_precio_compra" pattern="[0-9.]{1,25}" maxlength="25" value="0.00" required>
						<span class="icon is-left"><i class="fas fa-dollar-sign"></i></span>
					</div>
				</div>
				<div class="column is-one-third">
					<label class="label">Precio de venta <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_precio_venta" pattern="[0-9.]{1,25}" maxlength="25" value="0.00" required>
						<span class="icon is-left"><i class="fas fa-dollar-sign"></i></span>
					</div>
				</div>
				<div class="column is-one-third">
					<label class="label">Stock o existencias <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_stock" pattern="[0-9]{1,22}" maxlength="22" required>
						<span class="icon is-left"><i class="fas fa-boxes"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Marca</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_marca" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,30}" maxlength="30">
						<span class="icon is-left"><i class="fas fa-industry"></i></span>
					</div>
				</div>
				<div class="column is-one-quarter">
					<label class="label">Presentación del producto <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="producto_unidad">
							<option value="" selected="">Seleccione una opción</option>
							<?php echo $insLogin->generarSelect(PRODUCTO_UNIDAD,"VACIO"); ?>
						</select>
					</div>
				</div>
				<div class="column is-one-quarter">
					<label class="label">Categoría <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="producto_categoria">
							<option value="" selected="">Seleccione una opción</option>
							<?php
								$datos_categorias = $insLogin->seleccionarDatos("Normal","categoria","*",0);
								$cc = 1;
								while($campos_categoria = $datos_categorias->fetch()){
									echo '<option value="'.$campos_categoria['categoria_id'].'">'.$cc.' - '.$campos_categoria['categoria_nombre'].'</option>';
									$cc++;
								}
							?>
						</select>
					</div>
				</div>
			</div>

			<div class="columns">
				<div class="column">
					<label class="label">Foto o imagen del producto</label>
					<div class="file has-name is-boxed is-fullwidth">
						<label class="file-label">
							<input class="file-input" type="file" name="producto_foto" accept=".jpg, .png, .jpeg">
							<span class="file-cta">
								<span class="file-icon"><i class="fas fa-upload"></i></span>
								<span class="file-label">Seleccionar imagen</span>
							</span>
							<span class="file-name">JPG, JPEG, PNG. (MAX 5MB)</span>
						</label>
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
