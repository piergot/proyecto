<?php
	session_start();
?>
<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("musicbox") or die(mysql_error());
?>
<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/css.css">
		<link rel="icon" type="image/png" href="img/favicon.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Música</title>
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
			<div class="musicapopulardiv">
				<?php

				/*Query para buscar en la base de datos los artistas más buscados*/
					$artistasmaspopulares = mysql_query("SELECT * FROM artista ORDER BY numero_visitas_artistas DESC");
					$contador = 0;
					echo "ARTISTAS<br>";
					if(mysql_num_rows($artistasmaspopulares) > 0){
					    while($results = mysql_fetch_array($artistasmaspopulares)){
					    	$contador = $contador + 1;
					        echo  "<div class='musica-divartistaslistas'><span>".$contador."</span><p><img style='width: 50px; height:0 px' src='".$results['foto_artista']."'></a><a id='nombre-disco-estilo-enlance' href='http://localhost/Proyecto_Musicbox/Web/pagina%20real/artista.php?busqueda=".$results['nombre']."&search=BUSCAR'>".$results['nombre']."</a></p></div>";
						}
					}
				?>
			</div>
			<div class="musicapopulardiv">
				<?php
					/*Query para buscar en la base de datos los discos más buscados*/
					$discossmaspopulares = mysql_query("SELECT * FROM discos, artista WHERE artista.id_artista = discos.id_artista ORDER BY numero_visitas DESC ");
					$contador = 0;
					echo "DISCOS<br>";
					if(mysql_num_rows($discossmaspopulares) > 0){
					    while($results = mysql_fetch_array($discossmaspopulares)){
					    	$contador = $contador + 1;
					        echo "<div class='musica-divdiscoslistas'><span>".$contador."</span><p><img style='width: 50px; height:0 px' src='".$results['portada']."'><a href='http://localhost/Proyecto_Musicbox/Web/pagina%20real/disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'>".$results['titulo_disco']."</a><br><a id='nombre-disco-estilo-enlance' href='http://localhost/Proyecto_Musicbox/Web/pagina%20real/artista.php?busqueda=".$results['nombre']."&search=BUSCAR'>".$results['nombre']."</a></p></div>";
						}
					}
				?>
			</div>
		</div>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript">
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}
		</script>

	</body>
</html>
