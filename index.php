<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas para ganar dinero."/>
		<meta name="keywords" content="preguntas, ganar, dinero, juego, concurso"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_EstilosVs_100.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

		<script type="text/javascript" src="javascript/Funciones_varias.js" ></script> 
	</head>	
	<body>
		<header>
			<h1 class="anula">Vs_100</h1>
		    <input type="checkbox" id="MenuRes">
		    <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()">Menu</label>
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
		<div onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
		    <div class="n20">
				<header><h5>¿Que es Vs_100?</h5></header>				
						
				<p class="Inicio_1">Es un juego de conocimiento, donde se plantea un test con 10 preguntas de un tema especifico, y en el que compites con un minimo de 20 participantes y un maximo de 100, por un premio pagado en dinero.</p>

				<p class="Inicio_1">Con cada pregunta acertada ganas puntos, pero cuidado, equivocarte traerá sus concecuencias, un fallo en tu respuesta te penalizará, dejandote a merced de tus contrincantes y alejandote del premio.</p>	
				<a class="Inicio_3  buttonCuatro" href="vista/instruccion.php">Instrucciones</a>					
			</div>
			<div class="n00">
				<div class="n10">
					<header><h5>Inicia sesión</h5></header>
					<p class="Inicio_1">¿Estas registrado? Continua avanzando con tu prueba.</p>
					<a href="vista/principal.php" class="buttonCuatro">Entrar</a>
				</div>
				<div class="n10">
					<header><h5>Jugar Demo</h5></header>
					<p class="Inicio_1">Te damos una prueba gratis en el tema de "Cultura General".</p>
					<a href="vista/demo.php"  class="buttonCuatro">Iniciar.</a>
				</div>					
			</div>
		</div>
	</body>
</html>


	