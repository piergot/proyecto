<?php
  session_start();
?>
<?php
  /*Conecta al servidor*/
    mysql_connect("localhost", "root", "") or die("Error connecting to database: ".mysql_error());

    mysql_select_db("musicbox") or die(mysql_error());
?>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Hind" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="icon" type="image/png" href="img/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artista</title>
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
    <div id='divartistas'>
    <?php
    /*Obtiene el valor del formulario de busqueda*/
        $query = $_GET['busqueda'];
            $query = htmlspecialchars($query);
            $query = mysql_real_escape_string($query);

            /*Query para buscar el artista en la base de datos*/
            $raw_results = mysql_query("SELECT * FROM artista
                WHERE (`nombre` LIKE '%".$query."%')") or die(mysql_error());

            /*Si hay resultados disponibles en la base de datos, los mostrará*/
            if(mysql_num_rows($raw_results) > 0){
                while($results = mysql_fetch_array($raw_results)){
                    /*Muestra el resultado de la busqueda extraidos de la base de datos*/
                    echo "<div id='foto'><img id='imagenartista' src='".$results['foto_artista']."'></div>";
                    echo "<p><h3>".$results['nombre']."</h3></p>";
                    echo "<p class='perfildelartista'>".$results['biografia']."</p>";
                    echo "<p class='perfildelartista'><b>Lugar de nacimiento:</b> ".$results['pais']."</p>";
                    echo "<p class='perfildelartista'><b>Fecha de nacimiento:</b> ".$results['fecha_nacimiento']."</p>";
                    echo "<p class='perfildelartista'><b>Página web oficial:</b> <a href=".$results['website'].">".$results['website']."</a></p>";

                    /*Guarda las visitas que se han hecho a este artista*/
                    $visitas2 = $results['numero_visitas_artistas'] + 1;
                    $id_artista = $results['id_artista'];
                    $visitas = mysql_query("UPDATE artista SET numero_visitas_artistas=$visitas2 WHERE id_artista=$id_artista");
                }

            }
            else{
                echo "No existen resultados";
            }

            /*Busca los discos del artista X en la base de datos*/
            $raw_results = mysql_query("SELECT * FROM artista, discos WHERE artista.id_artista = discos.id_artista AND artista.nombre = '" . mysql_real_escape_string($_GET['busqueda']) . "'");
            if(mysql_num_rows($raw_results) > 0){
              echo "<br><br><h2>Lista de &aacute;lbumes</h2><div id='lista-de-discos-artista'>";
               while($results = mysql_fetch_array($raw_results)){
                  echo "<div class='nombre-disco-mas-disco-portada'><a href='http://localhost/Proyecto_Musicbox/Web/pagina%20real/disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'><img class='portada-disco-artista'src='".$results['portada']."'></a>";
                  echo "<p><a id='nombre-disco-estilo-enlance' href='http://localhost/Proyecto_Musicbox/Web/pagina%20real/disco.php?busqueda=".$results['titulo_disco']."&search=BUSCAR'>".$results['titulo_disco']."</a></p></div>";
            }
              echo "</div>";
          } 
    ?>
    </div>
  </div>
      <!--Pie-->
    <div class="pie">
      HOLA
    </div>
  <script type="text/javascript">
    function menuDespegable(){
      document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
    }
  </script>
  <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
