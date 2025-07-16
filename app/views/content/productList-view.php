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
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Agregar stock</p>
      <button class="delete" aria-label="close" id="cerrarModalStock"></button>
    </header>
    <section class="modal-card-body">
      <form id="formAgregarStock" class="FormularioAjax" action="<?php echo APP_URL; ?>app/ajax/productoAjax.php" method="POST" autocomplete="off">
        <input type="hidden" name="producto_id" id="stock_producto_id">
        <div class="field">
          <label class="label">Producto</label>
          <p id="stock_producto_nombre" class="has-text-weight-semibold"></p>
        </div>
        <div class="field">
          <label class="label">Cantidad a agregar</label>
          <div class="control">
            <input class="input" type="number" name="cantidad" min="1" required>
          </div>
        </div>
        <input type="hidden" name="modulo_producto" value="agregar_stock">
        <div class="has-text-right mt-3">
          <button type="submit" class="button is-success">Guardar</button>
        </div>
      </form>
    </section>
  </div>
</div>


<script>
  console.log("ajax.js CARGADO"); // ← esto debería mostrarse en consola
</script>

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
