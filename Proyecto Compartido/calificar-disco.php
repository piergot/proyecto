	<?php
	session_start();
	?>
	<?php
	 
	 $host_db = "localhost";
	 $user_db = "root";
	 $pass_db = "";
	 $db_name = "musicbox";
	 
	 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

	 
	 if ($conexion->connect_error) {
	 die("La conexion falló: " . $conexion->connect_error);
	}

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {		
	$buscarcalificacion = "SELECT * FROM calificaciones WHERE nombre_usuario = '$_POST[hola2]' AND  id_disco = '$_POST[hola]'";
	
	 
	$result = $conexion->query($buscarcalificacion) or die(mysql_error());
	 	 
	if(mysqli_num_rows($result) > 0){
		echo "hola";
		$actualizarcalificacion = "UPDATE calificaciones SET calificacion_usuario='$_POST[calificacion]' WHERE nombre_usuario = '$_POST[hola2]' AND  id_disco = '$_POST[hola]'";
		if ($conexion->query($actualizarcalificacion) === TRUE) {
			echo "voto actualizado";
	 		header("Location: disco.php?busqueda=$_POST[hola3]");	 
	 	}	
	}	 
	 else{
	 
	 $query = "INSERT INTO calificaciones (calificacion_usuario, nombre_usuario, id_disco)
	           VALUES ('$_POST[calificacion]','$_POST[hola2]', '$_POST[hola]')";

	 
	 if ($conexion->query($query) === TRUE) {
	 		header("Location: disco.php?busqueda=$_POST[hola3]");	 
	 }
	 
	 else {
	 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
	   }
	}
	 }
	 else {
		header("Location: iniciarsesion.php");
	 }
	 mysqli_close($conexion);
	?>