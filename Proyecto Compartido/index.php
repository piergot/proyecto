<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<!-- Head -->
	<?php 
		$title = "Inicio";
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>

		<!-- Main Container -->
		<main class="cuerpo container busquedayboton">
			<div class="busqueda-box">
				<div class="row">
					<div class="col-xs-12">
						<img src="img/logo_grande.png" alt="" class="logo-grande img-responsive">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<?php include("components/buscador.php"); ?>
					</div>
				</div>
			</div>
		</main>

		<!--Pie-->
		<?php include("components/footer.php"); ?>

		<!-- Js Files -->
		<?php include("components/js-files.php"); ?>
		
	</body>
</html>
