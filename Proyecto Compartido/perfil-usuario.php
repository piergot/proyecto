<?php
	session_start();
?>
<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("musicbox") or die(mysql_error());
?>
<!DOCTYPE html>
<html>
<<<<<<< HEAD
	<?php
		$title = 'Perfil del Usuario';
		include("components/head.php");
=======
	<?php 
		$title = 'Perfil del Usuario';
		include("components/head.php"); 
>>>>>>> origin/master
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
<<<<<<< HEAD
		<div class="container cuerpo">
			<h3 style='text-align:center;'>Bienvenido <?php echo $_SESSION['username']; ?></h3>
			<h4>Discos puntuados</h4>
			<?php
			$query = mysql_query("SELECT * FROM artista, discos, calificaciones WHERE calificaciones.nombre_usuario = '$_SESSION[username]' AND discos.id_disco = calificaciones.id_disco AND artista.id_artista = discos.id_artista ORDER BY calificaciones.calificacion_usuario DESC");
			if(mysql_num_rows($query) > 0){
					while($results = mysql_fetch_array($query)){
						echo "<div style='max-width:220px;'class='nombre-disco-mas-disco-portada'><a href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><img class='portada-disco-artista'src='".$results['portada']."'></a>";
						echo "<a id='nombre-disco-estilo-enlance' href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><span style='font-size:30px;'>".$results['calificacion_usuario']."</span><br><span>".$results['titulo_disco']."</span></a></div>";
					}
				}
			?>
			<p><a href='cerrar-session.php'>Cerrar sesi&oacute;n</a></p>
=======
		<div class="cuerpo">
			<div>HOLA!</div>
>>>>>>> origin/master
		</div>
		<<!--Pie-->
		<?php include("components/footer.php"); ?>

		<!-- Js Files -->
		<?php include("components/js-files.php"); ?>
		<script type="text/javascript">
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}
		</script>
	</body>
</html>
