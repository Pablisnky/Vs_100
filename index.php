<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas para ganar dinero."/>
		<meta name="keywords" content="preguntas, ganar, dinero, juego, concurso"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="css/EstilosVs_100.css"/>      
		<link rel="stylesheet" type="text/css" href="css/Modal.css">   
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_EstilosVs_100.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 1500px)" href="css/MediaQuery_EstilosVs_100_Grande.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>    
        <link rel="stylesheet" type="text/css" href="iconos/icono_menu/style_menu.css"/> <!--galeria icomoon.io  -->

		<script type="text/javascript" src="javascript/Funciones_varias.js" ></script> 
		<script>
		  	window.dataLayer = window.dataLayer || [];
		  	function gtag(){dataLayer.push(arguments);}
		  	gtag('js', new Date());

		  	gtag('config', 'UA-117655324-5');
		</script>
	</head>	
	<body> 
		<!--Construcion de ventanan modal-->
        <input type="checkbox" id="Cerrar">
        <label for="Cerrar" id="btnCerrar">Cerrar</label>
        <div class="modal">
            <div class="contenedor_modal modal_2">
                <p class="Inicio_1"><span>Promoción ImpresionArte</span></p>
				 <p>Obten el 30% de descuentos en nuestro servicio de impresión en plotter participando en nuestra trivia</p>
				 <a class="a_1" href="vista/reglas_trivia.php">Participar</a>
            </div>
        </div>    
		<!--Termina ventana modal-->
		

		<header>
			<h1 class="anula">Versus_20</h1>
		    <input type="checkbox" id="MenuRes">
    		<label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
		    <nav id="MenuResponsive" class="menuResponsive">
		        <ul id="MenuContenedor">
		            <li><a href="vista/principal.php">Entrar</a></li>
		            <li><a href="vista/registro.php">Registrarse</a></li>
		            <!-- <li><a href="participantes.php">Participantes</a></li> -->
		            <li><a href="vista/contacto.php">Contacto</a></li>
		            <li><a href="vista/demo.php">Demo</a></li> 
		        </ul>
		    </nav>
		</header>
		<div class="Secundario" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<div class="n00">
				<div class="n10">
					<h5>Inicia sesión</h5>
					<a href="vista/principal.php" class="buttonCuatro">Entrar</a>
				</div>
				<div class="n10">
					<header><h5>Demo</h5></header>
					<a href="vista/demo.php"  class="buttonCuatro">Iniciar</a>
				</div>					
			</div>
			<div class="n20">
				<h5>¿Que es Versus_20?</h5>				
				<p class="Inicio_1">Son pruebas de conocimiento que plantean 10 preguntas de un tema seleccionado por el participante, y en el que compiten 20 usuarios por prueba para tomar un premio pagado en dinero.</p>
				<p class="Inicio_1">Con cada pregunta acertada se ganan puntos, pero cuidado, equivocarse traerá sus concecuencias, un fallo en la respuesta penalizará, dejandote a merced de tus contrincantes y alejandote del premio.</p>	
				<a class="Inicio_3  buttonCuatro" href="vista/instruccion.php">Instrucciones</a>
			</div>
		</div>
	    <footer class="piePagina_3">
	        <?php include("vista/modulos/footer.php");?>
	    </footer> 
	</body>
</html>