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
		$title = 'Nuevos lanzamientos';
		include("components/head.php");
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo container">
			<div class="row">
				<div class="col-sm-12">
			<h2>Nuevos lanzamientos</h2>
			<?php
			 	$querynuevoslanzamientos = mysql_query("SELECT * FROM discos, artista WHERE discos.id_artista = artista.id_artista ORDER BY fecha_lanzamiento DESC LIMIT 12");
					if(mysql_num_rows($querynuevoslanzamientos) > 0){
						 while($results = mysql_fetch_array($querynuevoslanzamientos)){
						 echo "<div style='max-width:220px;'class='nombre-disco-mas-disco-portada'><a href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><img class='portada-disco-artista'src='".$results['portada']."'></a>";
 						 echo "<a id='nombre-disco-estilo-enlance' href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><span style='font-size:30px;'>".$results['fecha_lanzamiento']."</span><br><span>".$results['titulo_disco']."</span><br><span>".$results['nombre']."</a></div>";
				}
			}
			else {
				echo "no existen resultados";
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
	</body>
</html>
