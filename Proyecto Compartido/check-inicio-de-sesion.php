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
	 
	$username = $_POST['nombreusuario'];
	$password = $_POST['contrasenausuario'];
	  
	$sql = "SELECT * FROM usuario WHERE nombre_usuario = '$username'";
	 
	$result = $conexion->query($sql);
	 
	 
	if ($result->num_rows > 0) {     
	 }
	 $row = $result->fetch_array(MYSQLI_ASSOC);
	 if ($password == $row['contrasena']) { 
	  
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();
	    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
	 
	    echo "Bienvenido! " . $_SESSION['username'];
		header('Location: http://localhost/Proyecto_Musicbox\Web\pagina real/index.php');	 
	 } else { 
	   echo "Username o Password estan incorrectos.";
	 
	   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
	 }
mysqli_close($conexion);
?>
