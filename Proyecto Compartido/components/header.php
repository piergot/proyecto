<header class="cabeza">
	<nav class="navbar navbar-inverse cabecera-menu">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="index.php" class="logo"><img src="img/logo_grande.png" alt=""></a>
			</div>
			<div class="navbar-form navbar-left buscador">
				<?php include("components/buscador.php"); ?>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav menu-principal">
					<li role="presentation"><a href="nuevoslanzamientos.php">Nuevos lanzamientos</a></li>
					<li role="presentation"><a href="musicapopular.php">M&uacute;sica</a></li>
					<li role="presentation"><a href="contacto.php">Contacto</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right menu-secundario">
					<?php
					//Comprueba si el usuario está logueado o no, si está logueado muestra distintas opciones en el menú desplegable
						if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
							echo "<li role='presentation'><a href='perfil-usuario.php'><span class='glyphicon glyphicon-user'></span> <span class='texto'>Perfil del usuario</span></a></li>
							<li role='presentation'><a href='cerrar-session.php'><span class='glyphicon glyphicon-log-out'></span> <span class='texto'>Cerrar sesi&oacute;n</span></a></li>";
						}

						else{
							echo "<li role='presentation'><a href='iniciarsesion.php'><span class='glyphicon glyphicon-log-in'></span> <span class='texto'>Iniciar Sesión</span></a></li>
							<li role='presentation'><a href='registro.php'><span class='glyphicon glyphicon-user'></span> <span class='texto'>Registrarse</span></a></li>";
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
	<!--<div class='container">
		<div id="elmenu" class="row menu">
			<div class="col-xs-3">
				<picture id="logo">
					<a href="index.php" ><img src="img/logo_grande.png" alt=""></a>
				</picture>
			</div>
			<div class="col-xs-7">
				<nav id="ademenu" class="navbar navbar-default">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menuPrincipal" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<ul class="nav nav-pills" id="menuPrincipal">
						<li role="presentation"><a href="nuevoslanzamientos.php">Nuevos lanzamientos</a></li>
						<li role="presentation"><a href="musicapopular.php">M&uacute;sica</a></li>
						<li role="presentation"><a href="#">Noticias</a></li>
						<li role="presentation"><a href="contacto.php">Contacto</a></li>
						<li role="presentation"><a href="iniciarsesion.php" id="iniciosesionresponsive"><span class="glyphicon glyphicon-log-in"> Iniciar sesi&oacute;n</a></li>
						<li role="presentation"><a href="registro.php" id="registroresponsive"><span class="glyphicon glyphicon-user"> Registrarse</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-xs-2">
				<div style="float:right;" class="menudesplegable">
					<div class="menudesplegable2" onclick="menuDespegable()"><img id="iconodeiniciodesesion"src="img/iniciosension_icono.svg" ></div>
					<div class="contenidodespegable" id="contenidodespegable2">
					</div>
				</div>
			</div>
		</div>
	</div>-->
</header>
