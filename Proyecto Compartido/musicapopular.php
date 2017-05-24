<?php
	session_start();
?>
<?php
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("musicbox") or die(mysql_error());
?>
<!DOCTYPE html>
<html>
	<?php 
		$title = 'Música Popular';
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo container">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<div class="musicapopulardiv">
						<?php

						/*Query para buscar en la base de datos los artistas más buscados*/
							$artistasmaspopulares = mysql_query("SELECT * FROM artista ORDER BY numero_visitas_artistas DESC");
							$contador = 0;
							echo "<h2>Artistas</h2>";
							if(mysql_num_rows($artistasmaspopulares) > 0){
								echo "<ol>";
								while($results = mysql_fetch_array($artistasmaspopulares)){
									$contador = $contador + 1;
									echo  "<li><img src='".$results['foto_artista']."'></a><a href='/artista.php?busqueda=".$results['nombre']."&search=BUSCAR'>".$results['nombre']."<span>".$contador."</span></a></li>";
								}
								echo "</ol>";
							}
						?>
					</div>
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="musicapopulardiv">
						<?php
							/*Query para buscar en la base de datos los discos más buscados*/
							$discossmaspopulares = mysql_query("SELECT * FROM discos, artista WHERE artista.id_artista = discos.id_artista ORDER BY numero_visitas DESC ");
							$contador = 0;
							echo "<h2>Discos</h2>";
							if(mysql_num_rows($discossmaspopulares) > 0){
								echo "<ol>";
								while($results = mysql_fetch_array($discossmaspopulares)){
									$contador = $contador + 1;
									echo "<li><img src='".$results['portada']."'><a href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'>".$results['titulo_disco']."</a><a href='/artista.php?busqueda=".$results['nombre']."&search=BUSCAR'>".$results['nombre']."<span>".$contador."</span></a></li>";
								}
								echo "</ol>";
							}
						?>
					</div>
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
		</script>

	</body>
</html>
