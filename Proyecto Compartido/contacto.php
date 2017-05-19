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
		<title>Contacto</title>
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
			<!--Formulario de contacto-->
			<div class="divcontacto">
				<h1>Formulario de contacto</h1>
				<form action="correo.php" method="POST">
					<br>
					<input type="email" name="email" placeholder="CORREO ELECTR&Oacute;NICO"><br>
					<br>
					<input type="text" name="nombrecontacto" placeholder="NOMBRE"><br>
					<textarea name="mensaje" rows="4" placeholder="CUENTANOS TUS DUDAS"></textarea>
					<br>
					<button type="submit">ACEPTAR</button>
					<p id="mostrarResultadoErrores"></p>
				</form>
			</div>
		</div>
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
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
