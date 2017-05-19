
/*Función para el menú en responsive*/

function menuResponsive(){
	var x = document.getElementById("elmenu");
	var y = document.getElementById("ademenu");
	var u = document.getElementById("iniciosesionresponsive");
	var z = document.getElementById("registroresponsive");
	if (x.className === "menu"){
		x.className += " responsive";
		y.className += "responsive";
		u.style.display = "block";
		z.style.display = "block";
	}
	else {
		x.className = "menu";
		y.className = "";
		u.style.display = "none";
		z.style.display = "none";
	}
}
