<?php
session_start();

	//se evita guardar memoria cache
	// include("modulos/noCache.php");

	//Se utiliza la hora de Colombia
	date_default_timezone_set('America/Bogota');
	$FechaServidorPHP =date("Y-m-d");
	//  echo "Fecha PHP= " . $FechaServidorPHP . "<br>";

	// Se cambia el formato de la fecha
	$newFecha = date("d-m-Y", strtotime($FechaServidorPHP));

	if($FechaServidorPHP == "2019-09-18"){
		$CapituloHoy = "1 Cronicas 3";
		$_SESSION["Capitulo"] = $CapituloHoy;
	}
	else{
		$CapituloHoy = "1 Cronicas 4";
		$_SESSION["Capitulo"] = $CapituloHoy;
	}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>horebi</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas para ganar dinero."/>
		<meta name="keywords" content="preguntas, ganar, dinero, juego, concurso"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="Expires" content="0"><!--evita guardar en cache-->
		<meta http-equiv="Last-Modified" content="0"><!--evita guardar en cache-->
 		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate"><!--evita guardar en cache-->
		<meta http-equiv="Pragma" content="no-cache"><!--evita guardar en cache-->
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">

		<link rel="stylesheet" type="text/css" href="css/EstilosVs_100.css"/>      
		<link rel="stylesheet" type="text/css" href="css/Modal.css">   
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_EstilosVs_100.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 1500px)" href="css/MediaQuery_EstilosVs_100_Grande.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>    
		<link rel="stylesheet" type="text/css" href="iconos/icono_menu/style_menu.css"/> <!--galeria icomoon.io  -->
		<link rel="shortcut icon" type="image/png" href="images/logo.png">
		<link rel="manifest" href="./manifest.json">

		<script type="text/javascript" src="javascript/Funciones_varias.js" ></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117655324-5"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-117655324-5');
		</script>

	</head>	
	<body> 
		<!--Construcion de ventanan modal-->
        
			<!-- <input type="checkbox" id="Cerrar">
        	<label for="Cerrar" id="btnCerrar">Cerrar</label>
			<div class="modal">
				<article class="contenedor_modal modal_2">
					<p class="Inicio_1"><span></span></p>
					<p>Este ministerio tiene el propósito de incentivar y promover la lectura de la biblia y los libros del espíritu de profecía, herramientas que nos hacen mejores personas para convivir en sociedad y asi complacer al Señor.</p>
					<p>Pablo Cabeza</p>
					<p class="Inicio_1"><span>Programador BackEnd de Desarrollos Web</span></p>
				</article>
				<aside>
					<P>Hola</P>
				</aside>
			</div>      -->
		
		<!--Termina ventana modal-->
	
		<header>
			<h1 class="anula">Reavivados</h1>
		    <input type="checkbox" id="MenuRes">
    		<label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
		    <nav id="MenuResponsive" class="menuResponsive">
		        <ul id="MenuContenedor">
		            <li><a href="vista/principal.php">Inicio sesión</a></li>
		            <li><a href="vista/registro.php">Registrarse</a></li>
		            <!-- <li><a href="../vista/club.php">Club de lectura</a></li> -->
		            <li><a href="vista/contacto.php">Contacto</a></li>
		            <li><a href="vista/instruccion.php">¿Reavivados?</a></li>
		            <li><a href="vista/participacionHoy.php">Sabios</a></li>
		            <li><a href="vista/demo.php">Demo</a></li> 
		        </ul>
		    </nav>
		</header>
		<div class="Secundario" onclick="ocultarMenu()"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<p class="Inicio_13">Capitulo para hoy <?php echo $newFecha;?></p> 
			<a class="Inicio_14" href="vista/principal.php"><?php echo $CapituloHoy;?></a>
			<div class="n00">
				<div>
					<a class="buttonTres" href="vista/principal.php">inicia sesión</a>
				</div>	
				<!-- <a class="buttonTres" href="vista/club.php">Club de lectura</a>	 -->
				<div>
					<a class="buttonTres" href="vista/demo.php">Prueba Demo</a>	
				</div>
				<div>
					<a class="buttonTres" href="vista/participacionHoy.php">Sabios de hoy</a>
				</div>	
			</div>			
			<div class="n20">
				<h5>¿Que es Reavivados?</h5>				
				<p class="Inicio_1">Es un test diario basado en el programa <span class="span_6">"Reavivados por su palabra"</span> de la Iglesia Adventista del Séptimo Día, en el que se plantean 5 preguntas del capitulo biblico diario estudiado.</p>
				<p class="Inicio_1">Con cada pregunta acertada se ganan puntos, pero cuidado, equivocarse traerá sus concecuencias, un fallo en tu respuesta te penalizará, dejandote un paso atras de la sabiduría.</p>	
				<a class="Inicio_3  buttonCuatro" href="vista/instruccion.php">¿ Que es reavivados ?</a>
			</div>
		</div>
		
	    <footer class="piePagina_3 piePagina_4">
	        <?php include("vista/modulos/footer.php");?>
	    </footer> 
	</body>
</html>


<script src="convoca_SW.js"></script> 