<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php 
		$title = 'Iniciar Sesión';
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo container contenido-centrado">
			<div class="row">
				<div class="col-sm-6 col-xs-12 col-sm-offset-3">
					<h1>Inicio de sesi&oacute;n</h1>
					<form action="check-inicio-de-sesion.php" method="POST">
						<div class="form-group">
							<label for="nombreUsuario">Nombre de Usuario</label>
							<input type="text" name="nombreusuario" id="nombreUsuario" placeholder="Ingresa un Nombre de Usuario" class="form-control">
						</div>
						<div class="form-group">
							<label for="contraseña">Contraseña</label>
							<input type="password" class="form-control" id="contraseña" name="contrasenausuario" placeholder="Ingresa una Contraseña">
						</div>
						<button type="submit" name="search" class="btn btn-default">Enviar</button>
					</form>
				</div>
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