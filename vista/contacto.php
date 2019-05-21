<!--Formulario de registro de usuarios, aqui se cargan los datos de los nuevos participantes.-->
<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verificar_1 = 44;  
	$_SESSION["verifica"] = $verificar_1; 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Contactenos</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
	</head>	
	<body onload="autofocusContacto()">
            <!--titulo y menu principal-->
			<?php include("modulos/header.html");?>
            <div onclick= "ocultarMenu()">
                <div class="contacto_2">
                    <p class="Inicio_1">Sugerencias, recomendaciones y cualquier inquietud que puedas tener, hazla saber enviandonos un mensaje.</p>
                </div>
				<div class="Inicio_2">
                    <h2>Contactenos</h2>
                    <form action="recibeContacto.php" method="post" autocomplete="off" name="Contacto" id="contacto" onsubmit="">
                        <fieldset class="Afiliacion_4">
                            <input type="text" name="nombre" id="Nombre" placeholder="Nombre" />
                            <input type="text" name="apellido" id="Apellido" placeholder="Apellido"/>
                            <input type="email"  name="correo" id="Correo" placeholder="Correo electronico"/>
                            <input type="text"  name="asunto" id="Asunto" placeholder="Asunto">
                            <label class="etiqueta">Contenido</label>
                            <textarea  name="contenido" id="Contenido"></textarea>

                            <input type="submit" id="submitContacto" name="Enviar" value="enviar"  />
                        </fieldset>        
                    </form>
                </div>
            </div>
		</body>
</html>