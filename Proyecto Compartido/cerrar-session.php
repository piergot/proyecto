<?php
	 
	session_start();
	unset ($SESSION['username']);
	session_destroy();
	 
	header('Location: http://localhost/Proyecto_Musicbox\Web\pagina real/index.php');
	 
	?>