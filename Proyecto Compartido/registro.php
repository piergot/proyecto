<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php 
		$title = 'Perfil del Usuario';
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo container contenido-centrado">
			<div class="row">
				<div class="col-sm-6 col-xs-12 col-sm-offset-3">
					<h1>Registrate</h1>
					<form method="post" name="formularioderegistro" action="registro-usuario.php">
						<div class="form-group">
							<label for="nombreUsuario">Nombre de Usuario</label>
							<input type="text" name="nombreus" id="nombreUsuario" placeholder="Ingresa un Nombre de Usuario" class="form-control">
						</div>
						<div class="form-group">
							<label for="correoElectronico">Correo Electrónico</label>
							<input type="email" name="correoelectronico" id="correoElectronico" placeholder="Ingresa un Correo Electrónico" class="form-control">
						</div>
						<div class="form-group">
							<label for="contraseña">Contraseña</label>
							<input type="password" name="contra" id="contraseña" class="form-control"  placeholder="Ingresa una Contraseña">
						</div>
						<div class="form-group">
							<label for="contraseña2">Confirmar Contraseña</label>
							<input type="password" name="contra2" class="form-control" id="contraseña2" placeholder="Confirma la Contraseña">
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

			/*Funcion para verificar el formulario*/

			// onload = function(){
			// 	backgroundChange();
			// 	var formulario = document.forms[0];
			// 	formulario.onsubmit = function(e) {
			// 		e.preventDefault();
			// 		var err = document.getElementById('mostrarResultadoErrores');
			// 	    var errList = " ";
			// 	    var ret = true;

			// 	    var nom = document.getElementsByName("nombreus")[0].value;
			// 	    if (nom == null || nom.length == 0){
			// 	       	errList += "El nombre es err&oacute;neo <br/>";
			// 	        ret = false;
  	// 			    }

  	// 			    var correo = document.getElementsByName("correoelectronico")[0].value;
  	// 			    if (!/^\w+@\w+\.\w+$/.test(correo)) {
   //                  	errList += "El correo electr&oacute;nico es invalido<br/>";
   //                  	ret = false;
   //              	}

   //              	var contra1 = document.getElementsByName("contra")[0].value;
   //              	var contra2 = document.getElementsByName("contra2")[0].value;
   //              	if (contra1 !== contra2 || contra1 == null || contra2 == null || contra1 == 0 || contra2 == 0){
   //              		errList += "Las contrase&ntilde;as no son iguales<br/>";
   //                  	ret = false;
   //              	}

   //              	if (ret) {
   //                  	errList = "La reserva se ha hecho correctamente";
   //                  	err.style.color = "green";
   //              	} else {
   //                  	err.style.color = "red";
   //              	}
   //              	err.innerHTML = errList;
   //              	return ret;
			// 	}
			// }
		</script>
	</body>
</html>