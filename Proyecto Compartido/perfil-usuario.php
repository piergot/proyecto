<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/css.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Inicio</title>
	</head>
	<body onload="backgroundChange()">
		<div class="cabeza">
			<div id="elmenu" class="menu">
				<div id="logo"><a href="index.php" ><img src="img/logo_grande.png" alt=""></a></div>
				<a href="javascript:void(0);" id="iconoresponsive" onclick="menuResponsive()"><img id="" src="img/iconohamburguesa.svg"></a>
				<div id="ademenu">
					<a href="nuevoslanzamientos.html">Nuevos lanzamientos</a>
					<a href="musicapopular.html">M&uacute;sica popular</a>
					<a href="#contact">Recomendaciones</a>
					<a href="contacto.html">Contacto</a>
					<a href="iniciarsesion.html" id="iniciosesionresponsive" style="display:none;">Iniciar sesi&oacute;n</a>
					<a href="registro.html" id="registroresponsive" style="display:none;">Registrarse</a>
				</div>
				<div class="menudesplegable">
					<div class="menudesplegable2" onclick="menuDespegable()"><img id="iconodeiniciodesesion"src="img/iniciosension_icono.svg" ></div>
					<div class="contenidodespegable" id="contenidodespegable2">
					<?php
					//
					if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
						echo "<a href='perfil-usuario.php'>Perfil del usuario</a>
						<a href='cerrar-session.php'>Cerrar sesi&oacute;n</a>";
	 				}

	 				else{
	 					header('Location: http://localhost/Proyecto_Musicbox\Web\pagina real/index.php');
	 				}
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="cuerpo">
			<div>HOLA!</div>
		</div>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript">
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}
		</script>
	</body>
</html>