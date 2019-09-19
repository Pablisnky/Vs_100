<!--Formulario de registro de usuarios, aqui se cargan los datos de los nuevos participantes.-->
<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verificar_1 = 44;  
	$_SESSION["verifica"] = $verificar_1; 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Contacto</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../javascript/validarFormularios.js"></script>
        <script type="text/javascript">
            document.addEventListener("keydown", contar, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", contar, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keydown", valida_Longitud, false);//valida_Longitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_Longitud, false);//valida_Longitud() se encuentra en 
        </script>	
    </head>	
	<body onload="autofocusContacto()">
		<div class="Secundario">
            <header>
                <?php include("modulos/header.html");?>
            </header>
            <div onclick= "ocultarMenu()">
                <h2>Contacto</h2>
                <div class="contacto_2">
                    <p class="Inicio_1">Sugerencias, recomendaciones y cualquier inquietud que puedas tener, hazla saber enviando un mensaje.</p>
                </div>
                <div class="Inicio_2">
                    <form action="../controlador/recibeContacto.php" method="post" autocomplete="off" name="Contacto" id="contacto" onsubmit=" return validar_02()">
                        <fieldset class="Afiliacion_4">
                            <input type="text" name="nombre" id="Nombre" placeholder="Nombre" />
                            <input type="text" name="apellido" id="Apellido" placeholder="Apellido"/>
                            <input type="email"  name="correo" id="Correo" placeholder="Correo electronico"/>
                            <label class="etiqueta">Contenido</label>
                            <textarea class="contenido_2" name="contenido" id="Contenido"></textarea>
                            <input class="contador" type="text" name="contador" id="Contador" value="500">

                            <input type="submit" id="submitContacto" name="Enviar" value="enviar"  />
                        </fieldset>        
                    </form>
                </div>
            </div>
		</div>
        <footer>
            <?php include("modulos/footer.php");?>
        </footer>
	</body>
</html>

<script type="text/javascript">
    // Con este script se ajusta el textarea según se va escribiendo el contenido del mismo
    var textarea_A = document.querySelector('textarea');
    textarea_A.addEventListener('keydown', autosize);
             
    function autosize(){
        var el = this;
        setTimeout(function(){
        el.style.cssText = 'height:100px; padding:0';
        el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }
</script>