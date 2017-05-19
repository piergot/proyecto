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
			<!--Formulario buscador-->
			<div class="busquedayboton">
				<form method="GET" action="" id="formularioprincipio">
					<input  id="cajadebusqueda" type="text" name="busqueda" placeholder=" Ejemplo: The Beatles">
					<select id="selectform">
						<option value="Artista">ARTISTA</option>
						<option value="Disco">DISCO</option>
					</select>
					<input type="submit" onclick="cambioAction(event)"/>

				</form>
			</div>
		</div>
		<!--Pie-->
		<div class="pie">
			HOLA
		</div>
		<script type="text/javascript">
			/*Script del menú desplegable*/
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}

			/*Cambia el action del formulario dependiendo de valor del select*/
			function cambioAction(e){

				if (document.getElementById("cajadebusqueda").value == ""){
					alert("Ingresa un dato");
					e.preventDefault()
				}
				else{

					if (document.getElementById("selectform").value == "Artista"){
						console.log("hola");
						document.getElementById("formularioprincipio").action = "artista.php";
					}
					else if (document.getElementById("selectform").value == "Disco"){
						document.getElementById("formularioprincipio").action = "disco.php";
						console.log("hola2");
					}
				}
			}
		</script>
	</body>
</html>
