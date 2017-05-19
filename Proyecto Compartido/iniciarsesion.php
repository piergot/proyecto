<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css.css">
		<link rel="icon" type="image/png" href="img/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/javascript" src="inicio.js"></script>
		<title>Inicio</title>
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
			<!--DIV de inicio de sesión-->
			<img id="imagen_fondo" src="">
			<div class="diviniciosesion"><h1>Inicio de sesi&oacute;n</h1>
				<form action="check-inicio-de-sesion.php" method="POST">
					<br>
					<input type="text" name="nombreusuario" placeholder="NOMBRE DE USUARIO"><br>
					<br>
					<input type="password" name="contrasenausuario" placeholder="CONTRASE&Ntilde;A"><br>
					<br>
						<input type="submit" name="search" value="BUSCAR" />
				</form>
			</div>
		</div>
		<script type="text/javascript">
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}

			
		</script>
	</body>
</html>