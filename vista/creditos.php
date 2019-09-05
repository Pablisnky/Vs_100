<!--Formulario de registro de usuarios, aqui se cargan los datos de los nuevos participantes.-->
<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verificar_1 = 44;  
	$_SESSION["verifica"] = $verificar_1; 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20 Creditos</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

		<script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../javascript/validarFormularios.js"></script>	
    </head>	
    <body>
		<audio autoplay loop src="../audio/Powerful_Startup.mp3"></audio>
        <header>
            <?php include("modulos/header.html");?>
        </header>
        <div onclick= "ocultarMenu()">
            <h2>Nuestro equipo</h2>
            <div class="contacto_2">
                <p class="Inicio_1">.</p>
            </div>
		    <div class="Inicio_2">
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