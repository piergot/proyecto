<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php 
		$title = 'Contacto';
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo container contenido-centrado">
			<div class="row">
				<div class="col-sm-6 col-xs-12 col-sm-offset-3">
					<h1>Formulario de contacto</h1>
					<form action="correo.php" method="POST">
						<div class="form-group">
							<label for="correoElectronico">Correo Electrónico</label>
							<input type="email" name="email" id="correoElectronico" placeholder="Ingresa un Correo Electrónico" class="form-control">
						</div>
						<div class="form-group">
							<label for="nombreUsuario">Nombre</label>
							<input type="text" name="nombrecontacto" id="nombreUsuario" placeholder="Ingresa un Nombre" class="form-control">
						</div>
						<div class="form-group">
							<label for="dudas">Mensaje</label>
							<textarea name="mensaje" class="form-control" id="dudas" rows="4" placeholder="Cuentanos tus Dudas"></textarea>
						</div>
						<button type="submit" class="btn btn-default">Aceptar</button>
						<p id="mostrarResultadoErrores"></p>
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

			/*Funcion para validar el formulario*/
			onload = function(){
				backgroundChange();
				var formulario = document.forms[0];
				formulario.onsubmit = function(e) {
					e.preventDefault();
					var err = document.getElementById('mostrarResultadoErrores');
				    var errList = " ";
				    var ret = true;

				    var nom = document.getElementsByName("nombrecontacto")[0].value;
				    if (nom == null || nom.length == 0){
				       	errList += "Ingresa tu nombre<br/>";
				        ret = false;
  				    }

  				    var correo = document.getElementsByName("email")[0].value;
  				    if (!/^\w+@\w+\.\w+$/.test(correo)) {
                    	errList += "El correo electr&oacute;nico es invalido<br/>";
                    	ret += false;
                	}

                	var mensaje = document.getElementsByName("mensaje")[0].value;
                	if (mensaje == null || mensaje == 0){
                		errList += "Mensaje vacío";
                		ret += false;
                	}

                	if (ret) {
                    	errList = "La reserva se ha hecho correctamente";
                    	err.style.color = "green";
                	} else {
                    	err.style.color = "white";
                	}
                	err.innerHTML = errList;
                	return ret;
				}
			}
		</script>
	</body>
</html>
