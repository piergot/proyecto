<?php
session_start();
?>
<?php
  	/*Conecta al servidor*/
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());
    mysql_select_db("musicbox") or die(mysql_error());
?>

<!DOCTYPE html>
<html>
	<?php 
		$title = 'Disco';
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
		<div class="cuerpo">
		      <?php
		          /*Obtiene el valor del formulario de busqueda*/
		          $query = $_GET['busqueda'];

		              $query = htmlspecialchars($query);
		              $query = mysql_real_escape_string($query);

		             /*Query para buscar el disco en la base de datos*/
		              $raw_results = mysql_query("SELECT * FROM discos
		                  WHERE (`titulo_disco` LIKE '%".$query."%')") or die(mysql_error());

            		/*Si hay resultados disponibles en la base de datos, los mostrará*/
		              if(mysql_num_rows($raw_results) > 0){ 

		                  while($results = mysql_fetch_array($raw_results)){
                    		/*Muestra el resultado de la busqueda extraidos de la base de datos*/
		                      echo "<div class='divdiscos'>";
		                      echo "<p><div id='divdiscos-divportada'><a href='http://localhost/Proyecto_Musicbox/Web/pagina%20real/".$results['portada']."'><img id='divdiscos-portada' src='".$results['portada']."'></a>";
		                      echo "<p><a class='divdiscos-botondebajoportada' href='".$results['spotify_enlace']."'>Spotify</a></p>";
		                      echo "<a class='divdiscos-botondebajoportada' href='".$results['amazon_enlace']."'>Amazon</a>";
		                      echo "<a class='divdiscos-botondebajoportada' href='".$results['apple_enlace']."'>Apple Music</a></div></p>";
		                      echo "<h2 id='divdiscos-titulodisco'>".$results['titulo_disco']."</h2>";
		                      echo "<p>".$results['texto']."</p>";
		                      echo "<p><b>Fecha de lanzamiento: </b>".$results['fecha_lanzamiento']."</p>";
		                      echo "<p><b>Formato: </b>".$results['formato']."</p>";
		                      echo "<p><b>Generos: </b>".$results['generos']."</p>";
		                      echo "<p><b>Duracion: </b>".$results['duracion']."</p>";
		                      echo "<p><b>Discografica: </b>".$results['discograficas']."</p>";

		                      /*Guarda las visitas que se han hecho a este disco*/
		                      $visitas2 = $results['numero_visitas'] + 1;
		                      $titulo_disco = $results['titulo_disco'];
		                      $id_disco = $results['id_disco'];
		                      $visitas = mysql_query("UPDATE discos SET numero_visitas=$visitas2 WHERE id_disco=$id_disco");


		                      		/*Busca en la base de datos la lista de canciones del disco X*/
						              $raw_results = mysql_query("SELECT * FROM discos, canciones WHERE discos.id_disco = canciones.id_disco AND discos.titulo_disco = '" . mysql_real_escape_string($_GET['busqueda']) . "'");

						             if(mysql_num_rows($raw_results) > 0){ 
						             	echo "<br>";
						             	echo "<br>";
						             	echo "<br>";
						             	echo "<h3>Tracklist</h3>";
						             	echo "<div id='lista-de-canciones'>";

						                  while($results = mysql_fetch_array($raw_results)){

						                      echo "<p>".$results['numero_cancion'].". ".$results['nombre_cancion'].$results['duracion']."</p>";
						                  }
						              }
						              	echo "</div>";         
								                  }

								              }
								              else{ 
								                  echo "No hay resultados";
								              }
								              ?>	
								              <!--Permite al usuario puntuar por disco X y además muestra la puntación media entre todos los usuarios que han votado este disco-->
								<div id="calificacionyvoto">
								<h3>Calificacion</h3>
									<div id="calificacion-total">
										
										<?php
										/*Saca el promedio de todas las puntuaciones que se le ha dado al disco*/
											$query2 = ("SELECT ROUND (AVG(calificacion_usuario),1) FROM calificaciones WHERE id_disco = $id_disco");
											$resultadopromedio = mysql_query ($query2);
											$row = mysql_fetch_array($resultadopromedio);

											echo $row[0];
										?><span style="font-size:16px;"> | 10</span> 
									</div>
									<br>
									<br>
									<br>
									<br>
									<br>
									<p>Numero de votos: <b><?php
									/*Obtiene el número de usuarios que han votado por este disco*/
									$query3 = ("SELECT COUNT(id_disco) FROM calificaciones WHERE id_disco = $id_disco");

									$resultadovotos = mysql_query ($query3);
											$row = mysql_fetch_array($resultadovotos);

											echo $row[0];
									?><b></p>
								 <!--Formulario de votación-->
							    <form method="POST" action="calificar-disco.php">
								<input type="hidden" name="hola" value="<?php echo $id_disco; ?>"/>
								<input type="hidden" name="hola2" value="<?php echo $_SESSION['username']; ?>"/>
								<input type="hidden" name="hola3" value="<?php echo $titulo_disco; ?>">
								<select id="disco-formcalificacion" name="calificacion">
									<option value="10">10</option>
									<option value="9">9</option>
									<option value="8">8</option>
									<option value="7">7</option>
									<option value="6">6</option>
									<option value="5">5</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
									<input type="submit" id="botonvotacion" name="submite" value="VOTAR" />
								</select>
								</form>

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
