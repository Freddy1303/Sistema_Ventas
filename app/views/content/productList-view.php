<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">Productos</h1>
	<h2 class="subtitle has-text-weight-bold has-text"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de productos</h2>
</div>

<div class="container pb-6 pt-6">

	<div class="form-rest mb-6 mt-6"></div>

	<?php
		use app\controllers\productController;

		$insProducto = new productController();

		echo $insProducto->listarProductoControlador($url[1],10,$url[0],"",0);
	?>
</div>

<div class="modal" id="modalAgregarStock">
  <div class="modal-background"></div>
  <div class="modal-card" style="background-color: #ecececff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);">
    <header class="modal-card-head has-background-primary" style="border-top-left-radius: 12px; border-top-right-radius: 12px;">
      <p class="modal-card-title has-text-white">
        <i class="fas fa-plus-circle mr-2"></i> Agregar stock
      </p>
      <button class="delete" aria-label="close" id="cerrarModalStock"></button>
    </header>
    <section class="modal-card-body p-5">
      <form id="formAgregarStock" class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" autocomplete="off">
        
        <input type="hidden" name="producto_id" id="stock_producto_id">
        
        <div class="field mb-4">
          <label class="label has-text-weight-medium">Producto</label>
          <p id="stock_producto_nombre" class="has-text-weight-semibold has-text-grey-dark"></p>
        </div>

        <div class="field mb-5">
          <label class="label has-text-weight-medium">Cantidad a agregar</label>
          <div class="control has-icons-left">
            <input class="input is-rounded" type="number" name="cantidad" min="1" required placeholder="Ej. 10">
            <span class="icon is-left">
              <i class="fas fa-sort-numeric-up"></i>
            </span>
          </div>
        </div>

        <input type="hidden" name="modulo_producto" value="agregar_stock">
        
        <div class="has-text-right">
          <button type="submit" class="button is-success is-rounded px-5">
            <i class="fas fa-save mr-2"></i> Guardar
          </button>
        </div>
      </form>
    </section>
  </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.btn-agregar-stock').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const productoId = btn.getAttribute('data-id');
            const productoNombre = btn.getAttribute('data-nombre');
            
            document.getElementById('stock_producto_id').value = productoId;
            document.getElementById('stock_producto_nombre').textContent = productoNombre;
            
            document.getElementById('modalAgregarStock').classList.add('is-active');
        });
    });

    document.getElementById('cerrarModalStock').addEventListener('click', () => {
        document.getElementById('modalAgregarStock').classList.remove('is-active');
    });
});
</script>
