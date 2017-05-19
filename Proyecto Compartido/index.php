<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<!-- Head -->
	<?php 
		$title = "Inicio";
		include("components/head.php"); 
	?>
	<body>
		<!-- Header -->
		<?php include("components/header.php"); ?>

		<!-- Main Container -->
		<main class="cuerpo container">
			<div class="row">
				<div class="col-xs-12">
					<!--Formulario buscador-->
					<div class="busquedayboton">
						<form method="GET" action="" id="formularioprincipio">
							<input  id="cajadebusqueda" type="text" name="busqueda" placeholder=" Ejemplo: The Beatles">
							<select id="selectform">
								<option value="Artista">ARTISTA</option>
								<option value="Disco">DISCO</option>
							</select>
							<input type="submit" onclick="cambioAction(event)"/>
						</form>
					</div>
				</div>
			</div>
		</main>

		<!--Pie-->
		<?php include("components/footer.php"); ?>

		<!-- Js Files -->
		<?php include("components/js-files.php"); ?>
		<script type="text/javascript">
			/*Script del menú desplegable*/
			function menuDespegable(){
				document.getElementById("contenidodespegable2").classList.toggle("mostrarcontenido");
			}

			/*Cambia el action del formulario dependiendo de valor del select*/
			function cambioAction(e){

				if (document.getElementById("cajadebusqueda").value == ""){
					alert("Ingresa un dato");
					e.preventDefault()
				}
				else{

					if (document.getElementById("selectform").value == "Artista"){
						console.log("hola");
						document.getElementById("formularioprincipio").action = "artista.php";
					}
					else if (document.getElementById("selectform").value == "Disco"){
						document.getElementById("formularioprincipio").action = "disco.php";
						console.log("hola2");
					}
				}
			}
		</script>
	</body>
</html>
