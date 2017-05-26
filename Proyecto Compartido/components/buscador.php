<!--Formulario buscador-->
<div class="formulario">
    <form method="GET" action="" id="formularioprincipio" class="form-inline">
        <div class="form-group caja-busqueda">
            <input  id="cajadebusqueda" type="text" name="busqueda" placeholder=" Ejemplo: The Beatles" class="form-control">
        </div>
        <div class="form-group">
            <select id="selectform" class="form-control">
                <option value="Artista">Artista</option>
                <option value="Disco">Disco</option>
            </select>
        </div>
        <input type="submit"  class="btn btn-default" onclick="cambioAction(event)"/>
    </form>
</div>

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
                document.getElementById("formularioprincipio").action = "artista.php";
            }
            else if (document.getElementById("selectform").value == "Disco"){
                document.getElementById("formularioprincipio").action = "disco.php";
            }
        }
    }
</script>