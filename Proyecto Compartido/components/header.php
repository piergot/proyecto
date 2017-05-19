<header class="cabeza">
	<div class="container">
		<div id="elmenu" class="row menu">
			<div class="col-xs-3">
				<picture id="logo">
					<a href="index.php" ><img src="img/logo_grande.png" alt=""></a>
				</picture>
			</div>
			<div class="col-xs-7">
				<a href="javascript:void(0);" id="iconoresponsive" onclick="menuResponsive()"><img src="img/iconohamburguesa.svg"></a>
				<nav id="ademenu">
					<ul class="nav nav-pills">
						<li role="presentation"><a href="nuevoslanzamientos.php">Nuevos lanzamientos</a></li>
						<li role="presentation"><a href="musicapopular.php">M&uacute;sica</a></li>
						<li role="presentation"><a href="#">Noticias</a></li>
						<li role="presentation"><a href="contacto.php">Contacto</a></li>
						<!--Opciones para el responsive-->
						<li role="presentation"><a href="iniciarsesion.php" id="iniciosesionresponsive" style="display:none;">Iniciar sesi&oacute;n</a></li>
						<li role="presentation"><a href="registro.php" id="registroresponsive" style="display:none;">Registrarse</a></li>
					</ul>
				</nav>
				<div id="ademenu">
					
				</div>
			</div>
			<div class="col-xs-2">
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
	</div>
</header>