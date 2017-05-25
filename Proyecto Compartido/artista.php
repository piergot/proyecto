<?php
  session_start();
?>
<?php
  /*Conecta al servidor*/
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());

    mysql_select_db("musicbox") or die(mysql_error());

    $query = $_GET['busqueda'];
    $query = htmlspecialchars($query);
    $query = mysql_real_escape_string($query);

    /*Query para buscar el artista en la base de datos*/
    $raw_results = mysql_query("SELECT * FROM artista
        WHERE (`nombre` LIKE '%".$query."%')") or die(mysql_error());
?>
<html>
<!-- Head -->
	<?php
		$title = 'Artista';
		include("components/head.php");
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>
    <div class="cuerpo container">
      <div class="row" id='divartistas'>
        <div class="col-sm-4">
          <?php
            /*Obtiene el valor del formulario de busqueda*/
                    /*Si hay resultados disponibles en la base de datos, los mostrará*/
                    if(mysql_num_rows($raw_results) > 0){
                        while($results = mysql_fetch_array($raw_results)){
                            /*Muestra el resultado de la busqueda extraidos de la base de datos*/
                            echo "<div id='foto'><img id='imagenartista' src='".$results['foto_artista']."'></div>";
                            echo "<div class='contenido-artista'><p><h3>".$results['nombre']."</h3></p>";
                            echo "<p class='perfildelartista'><b>Lugar de nacimiento:</b> ".$results['pais']."</p>";
                            echo "<p class='perfildelartista'><b>Fecha de nacimiento:</b> ".$results['fecha_nacimiento']."</p>";
                            echo "<p class='perfildelartista'><b>Página web oficial:</b> <a href=".$results['website'].">".$results['website']."</a></p>";
                            echo "<p class='perfildelartista'>".$results['biografia']."</p></div>";

                            /*Guarda las visitas que se han hecho a este artista*/
                            $visitas2 = $results['numero_visitas_artistas'] + 1;
                            $id_artista = $results['id_artista'];
                            $visitas = mysql_query("UPDATE artista SET numero_visitas_artistas=$visitas2 WHERE id_artista=$id_artista");
                        }

                    }
                    else{
                        echo "No existen resultados";
                    }
         ?>
        </div>
        <div class="col-sm-8">
          <?php
            /*Busca los discos del artista X en la base de datos*/
            $raw_results = mysql_query("SELECT * FROM artista, discos WHERE artista.id_artista = discos.id_artista AND artista.nombre = '" . mysql_real_escape_string($_GET['busqueda']) . "'");
            if(mysql_num_rows($raw_results) > 0){
              echo "<h2>Lista de &aacute;lbumes</h2><div id='lista-de-discos-artista'>";
               while($results = mysql_fetch_array($raw_results)){
                 if($results['portada']) {
                  echo "<div class='nombre-disco-mas-disco-portada'><a href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><img class='portada-disco-artista'src='".$results['portada']."'></a>";
                  echo "<a id='nombre-disco-estilo-enlance' href='disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><span>".$results['titulo_disco']."</span></a></div>";
                 }
            }
              echo "</div>";
          }
        ?>
        </div>
      </div>
    <div>

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
