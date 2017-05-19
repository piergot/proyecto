<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/css.css">
		<link rel="icon" type="image/png" href="img/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Registro</title>
	</head>
	<body>
		<div class="cabeza">
			<!--El menu principal de la página-->
			<div id="elmenu" class="menu">
				<div id="logo"><a href="index.php" ><img src="img/logo_grande.png" alt=""></a></div>
				<a href="javascript:void(0);" id="iconoresponsive" onclick="menuResponsive()"><img id="" src="img/iconohamburguesa.svg"></a>
				<div id="ademenu">
					<a href="nuevoslanzamientos.php">Nuevos lanzamientos</a>
					<a href="musicapopular.php">M&uacute;sica</a>
					<a href="#">Noticias</a>
					<a href="contacto.php">Contacto</a>
					<!--Opciones para el responsive-->
					<a href="iniciarsesion.php" id="iniciosesionresponsive" style="display:none;">Iniciar sesi&oacute;n</a>
					<a href="registro.php" id="registroresponsive" style="display:none;">Registrarse</a>
				</div>
				<!--Menú desplegable del extremo derecho-->
				<div style="float:right;" class="menudesplegable">
					<div class="menudesplegable2" onclick="menuDespegable()"><img id="iconodeiniciodesesion"src="img/iniciosension_icono.svg" ></div>
					<div class="contenidodespegable" id="contenidodespegable2">
					<?php
					//Comprueba si el usuario está logueado o no, si está logueado muestra distintas opciones en el menú desplegable
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
							echo "<a href='perfil-usuario.php'>Perfil del usuario</a>
							<a href='cerrar-session.php'>Cerrar sesi&oacute;n</a>";
		 				}

		 				else{
		 					echo "<a href='iniciarsesion.php'>Iniciar sesi&oacute;n</a>
							<a href='registro.php'>Registrarse</a>";
		 				}
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="cuerpo">
			<!--Formulario de registro-->
			<div class="divformularioregistro">
				<h1>Formulario de registro</h1>
				<form method="post" name="formularioderegistro" action="registro-usuario.php">
					<input type="text" name="nombreus" placeholder="NOMBRE DE USUARIO"><br>
					<input type="email" name="correoelectronico" placeholder="CORREO ELECTRONICO"><br>
					<input type="password" name="contra" placeholder="CONTRASE&Ntilde;A"><br>
					<input type="password" name="contra2" placeholder="CONFIRMAR CONTRASE&Ntilde;A"><br>
					<button type="submit">ACEPTAR</button>
					<p id="mostrarResultadoErrores"></p>
				</form>
			</div>
		</div>
		<script type="text/javascript" src="js/main.js"></script>
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