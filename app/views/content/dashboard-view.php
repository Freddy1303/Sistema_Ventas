<div class="container is-fluid mb-6">
	<h1 class="title has-text-weight-bold is-uppercase has-text">
		<i class="fas fa-home"></i> &nbsp; Inicio
	</h1>
</div>
<?php
	$total_cajas=$insLogin->seleccionarDatos("Normal","caja","caja_id",0);

	$total_usuarios=$insLogin->seleccionarDatos("Normal","usuario WHERE usuario_id!='1' AND usuario_id!='".$_SESSION['id']."'","usuario_id",0);

	$total_clientes=$insLogin->seleccionarDatos("Normal","cliente WHERE cliente_id!='1'","cliente_id",0);

	$total_categorias=$insLogin->seleccionarDatos("Normal","categoria","categoria_id",0);

	$total_productos=$insLogin->seleccionarDatos("Normal","producto","producto_id",0);

	$total_ventas=$insLogin->seleccionarDatos("Normal","venta","venta_id",0);


	$productos_bajo_stock = $insLogin->productos_bajo_stock();


	// CONSULTA PARA EL GRÁFICO DE BALANCE MENSUAL
	$consulta_balance = $insLogin->balance_mensual();

	$meses = [];
	$ingresos = [];
	$ganancias = [];

	$nombresMeses = [
		'01' => 'Enero', '02' => 'Febrero', '03' => 'Marzo', '04' => 'Abril',
		'05' => 'Mayo', '06' => 'Junio', '07' => 'Julio', '08' => 'Agosto',
		'09' => 'Septiembre', '10' => 'Octubre', '11' => 'Noviembre', '12' => 'Diciembre'
	];

	while ($fila = $consulta_balance->fetch(PDO::FETCH_ASSOC)) {
		$partes = explode('-', $fila['mes']); // Ejemplo: "2025-01" → ["2025", "01"]
		$nombreMes = $nombresMeses[$partes[1]] . ' ' . $partes[0]; // "Enero 2025"
		
		$meses[] = $nombreMes;
		$ingresos[] = (float) $fila['ingresos'];
		$ganancias[] = (float) $fila['ingresos'] - (float) $fila['costos'];
	}

?>
<div class="container pb-6 pt-6">

	<!-- Primer bloque de tarjetas -->
	<div class="columns is-multiline is-variable is-4">
		<div class="column is-one-third">
			<div class="card has-background-link has-text-white has-text-centered p-5 is-flex is-flex-direction-column is-justify-content-center" style="min-height: 150px;">
				<a href="<?php echo APP_URL; ?>userList/" class="has-text-white">
					<p class="heading is-size-5"><i class="fas fa-users fa-fw"></i> Usuarios</p>
					<p class="title"><?php echo $total_usuarios->rowCount(); ?></p>
				</a>
			</div>
		</div>
		<div class="column is-one-third">
			<div class="card has-background-info has-text-white has-text-centered p-5 is-flex is-flex-direction-column is-justify-content-center" style="min-height: 150px;">
				<a href="<?php echo APP_URL; ?>clientList/" class="has-text-white">
					<p class="heading is-size-5"><i class="fas fa-address-book fa-fw"></i> Clientes</p>
					<p class="title"><?php echo $total_clientes->rowCount(); ?></p>
				</a>
			</div>
		</div>
		<div class="column is-one-third">
			<div class="card has-background-success has-text-white has-text-centered p-5 is-flex is-flex-direction-column is-justify-content-center" style="min-height: 150px;">
				<a href="<?php echo APP_URL; ?>categoryList/" class="has-text-white">
					<p class="heading is-size-5"><i class="fas fa-tags fa-fw"></i> Categorías</p>
					<p class="title"><?php echo $total_categorias->rowCount(); ?></p>
				</a>
			</div>
		</div>
	</div>

	<!-- Segundo bloque de tarjetas centrado -->
	<div class="columns is-centered mt-4">
		<div class="column is-4">
			<div class="card has-background-warning has-text-white has-text-centered p-5 is-flex is-flex-direction-column is-justify-content-center" style="min-height: 150px;">
				<a href="<?php echo APP_URL; ?>productList/" class="has-text-white">
					<p class="heading is-size-5"><i class="fas fa-cubes fa-fw"></i> Productos</p>
					<p class="title"><?php echo $total_productos->rowCount(); ?></p>
				</a>
			</div>
		</div>
		<div class="column is-4">
			<div class="card has-background-danger has-text-white has-text-centered p-5 is-flex is-flex-direction-column is-justify-content-center" style="min-height: 150px;">
				<a href="<?php echo APP_URL; ?>saleList/" class="has-text-white">
					<p class="heading is-size-5"><i class="fas fa-shopping-cart fa-fw"></i> Ventas</p>
					<p class="title"><?php echo $total_ventas->rowCount(); ?></p>
				</a>
			</div>
		</div>
	</div>		

	<!-- Productos bajo stock como tarjetas -->
	<?php if($productos_bajo_stock->rowCount() > 0): ?>
		<!-- Solo se muestra si hay productos con bajo stock -->
		<div class="container mt-6">
			<h3 class="title is-4 has-text-centered has-text-danger">⚠ Productos con bajo stock</h3>
			
			<div class="columns is-multiline is-centered">
				<?php while($producto = $productos_bajo_stock->fetch(PDO::FETCH_ASSOC)): ?>
					<div class="column is-3">
						<div class="box has-background-warning-light has-text-centered">
							<p class="title is-5"><?php echo $producto['producto_nombre']; ?></p>
							<span class="tag is-danger is-medium">Stock: <?php echo $producto['producto_stock_total']; ?></span>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>

	<!-- Grafico de Balance Mensual -->
	<style>
	.wordart-title {
		font-size: 2.5rem; /* Tamaño grande */
		font-weight: bold;
		background: linear-gradient(90deg,rgb(39, 3, 85),rgb(92, 7, 63)); /* Degradado vistoso */
		-webkit-background-clip: text;
		-webkit-text-fill-color: transparent;
		text-shadow: 2px 2px 4px rgba(0,0,0,0.3); /* Sombra tipo WordArt */
		font-family: 'Comic Sans MS', cursive, sans-serif; /* Letra divertida tipo WordArt */
	}
	</style>

	<div class="container pb-6 mt-6">
		<div class="box" style="background-color: #ecececff; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); border-radius: 10px; padding: 2rem;">
			<h3 class="title has-text-centered wordart-title">Balance mensual</h3>
			<canvas id="graficoBalance" height="100"></canvas>
		</div>
	</div>

</div>


<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('graficoBalance').getContext('2d');
const grafico = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($meses); ?>,
        datasets: [
            {
                label: 'Ingresos',
                data: <?php echo json_encode($ingresos); ?>,
                borderColor: 'rgba(4, 104, 9, 1)',
                backgroundColor: 'rgba(96, 223, 57, 0.2)',
                tension: 0.4,
                fill: true
            },
            {
                label: 'Ganancias',
                data: <?php echo json_encode($ganancias); ?>,
                borderColor: 'rgba(7, 25, 128, 1)',
                backgroundColor: 'rgba(46, 103, 168, 0.2)',
                tension: 0.4,
                fill: true
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
			y: {
				beginAtZero: true,
				ticks: {
					callback: function(value) {
						return 'S/.' + value;
					}
				}
			},
			x: {
				ticks: {
					padding: 10,
					autoSkip: false,
					maxRotation: 45,
					minRotation: 30,
				}
			}
		},
        plugins: {
            legend: {
                position: 'top',
            }
        }
    }
});
</script>
