<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Productos</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-sync-alt"></i> &nbsp; Actualizar producto</h2>
</div>

<div class="container pb-6 pt-6">
	<?php
		include "./app/views/inc/btn_back.php";
		$id=$insLogin->limpiarCadena($url[1]);
		$datos=$insLogin->seleccionarDatos("Unico","producto","producto_id",$id);
		if($datos->rowCount()==1){
			$datos=$datos->fetch();
	?>

	<div class="columns is-flex is-justify-content-center">
		<figure class="full-width mb-3" style="max-width: 170px;">
			<?php
				if(is_file("./app/views/productos/".$datos['producto_foto'])){
					echo '<img class="img-responsive" src="'.APP_URL.'app/views/productos/'.$datos['producto_foto'].'">';
				}else{
					echo '<img class="img-responsive" src="'.APP_URL.'app/views/productos/default.png">';
				}
			?>
		</figure>
	</div>

	<h2 class="title has-text-centered"><?php echo $datos['producto_nombre']." (Stock: ".$datos['producto_stock_total']." ".$datos['producto_tipo_unidad'].")"; ?></h2>

	<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
		<form class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" autocomplete="off">
			<input type="hidden" name="modulo_producto" value="actualizar">
			<input type="hidden" name="producto_id" value="<?php echo $datos['producto_id']; ?>">

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Código de barra <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_codigo" value="<?php echo $datos['producto_codigo']; ?>" pattern="[a-zA-Z0-9- ]{1,77}" maxlength="77" required>
						<span class="icon is-left"><i class="fas fa-barcode"></i></span>
					</div>
				</div>
				<div class="column is-half">
					<label class="label">Nombre <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_nombre" value="<?php echo $datos['producto_nombre']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,$#\-\/ ]{1,100}" maxlength="100" required>
						<span class="icon is-left"><i class="fas fa-tag"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-one-third">
					<label class="label">Precio de compra <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_precio_compra" value="<?php echo $datos['producto_precio_compra']; ?>" pattern="[0-9.]{1,25}" maxlength="25" required>
						<span class="icon is-left"><i class="fas fa-dollar-sign"></i></span>
					</div>
				</div>
				<div class="column is-one-third">
					<label class="label">Precio de venta <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_precio_venta" value="<?php echo $datos['producto_precio_venta']; ?>" pattern="[0-9.]{1,25}" maxlength="25" required>
						<span class="icon is-left"><i class="fas fa-dollar-sign"></i></span>
					</div>
				</div>
				<div class="column is-one-third">
					<label class="label">Stock o existencias <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_stock" value="<?php echo $datos['producto_stock_total']; ?>" pattern="[0-9]{1,22}" maxlength="22" required>
						<span class="icon is-left"><i class="fas fa-boxes"></i></span>
					</div>
				</div>
			</div>

			<div class="columns is-variable is-6">
				<div class="column is-half">
					<label class="label">Marca</label>
					<div class="control has-icons-left">
						<input class="input" type="text" name="producto_marca" value="<?php echo $datos['producto_marca']; ?>" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,30}" maxlength="30">
						<span class="icon is-left"><i class="fas fa-industry"></i></span>
					</div>
				</div>
				<div class="column is-one-quarter">
					<label class="label">Presentación del producto <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="producto_unidad">
							<?php echo $insLogin->generarSelect(PRODUCTO_UNIDAD,$datos['producto_tipo_unidad']); ?>
						</select>
					</div>
				</div>
				<div class="column is-one-quarter">
					<label class="label">Categoría <?php echo CAMPO_OBLIGATORIO; ?></label>
					<div class="select is-fullwidth">
						<select name="producto_categoria">
							<?php
								$datos_categorias=$insLogin->seleccionarDatos("Normal","categoria","*",0);
								$cc=1;
								while($campos_categoria=$datos_categorias->fetch()){
									if($campos_categoria['categoria_id']==$datos['categoria_id']){
										echo '<option value="'.$campos_categoria['categoria_id'].'" selected>'.$cc.' - '.$campos_categoria['categoria_nombre'].' (Actual)</option>';
									}else{
										echo '<option value="'.$campos_categoria['categoria_id'].'">'.$cc.' - '.$campos_categoria['categoria_nombre'].'</option>';
									}
									$cc++;
								}
							?>
						</select>
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
	} ?>
</div>
