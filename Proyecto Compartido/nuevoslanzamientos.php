<!DOCTYPE html>
<html>
	<?php 
		$title = 'Artista';
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo">
			<div class="divdenuevoslanzamientos">
			<h1>EN CONSTRUCCIÓN</h1>
			</div>
		</div>
		<!--Pie-->
		<?php include("components/footer.php"); ?>

		<!-- Js Files -->
		<?php include("components/js-files.php"); ?>
		<script type="text/javascript">
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}
		</script>
	</body>
</html>
