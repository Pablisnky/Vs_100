<?php
session_start();

	//se evita guardar memoria cache
	include("modulos/noCache.php");

	//Se utiliza la hora de Colombia
	date_default_timezone_set('America/Bogota');
	$FechaServidorPHP =date("Y-m-d");
 	// echo $FechaServidorPHP . "<br>";

	// Se cambia el formato de la fecha
	$newFecha = date("d-m-Y", strtotime($FechaServidorPHP));
	// echo $newFecha . "<br>";

	if($FechaServidorPHP == "2019-10-26"){
		$CapituloHoy = "2 Crónicas 12";
		$_SESSION["Capitulo"] = $CapituloHoy;
	}
	else{
		$CapituloHoy = "2 Crónicas 13";
		$_SESSION["Capitulo"] = $CapituloHoy;
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>horebi</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Test de capitulos biblicos"."/>
		<meta name="keywords" content="preguntas, puntos, Dios, Biblia, capitulo, reavivados"/>
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
        	<label for="Cerrar" id="btnCerrar">Cerrar</label> -->
			<!-- <div class="modal">  -->
				 <!-- <article class="contenedor_modal modal_2">
				 	<img class="imagen_5"  src="images/logo.png">
					<p class="Inicio_3">Hermanos.</p>
					<p class="Inicio_3">La plataforma se suspendio</p>
					<p class="Inicio_3">Por ahora el proyecto no continuará, aún y el sentir no sea dejarlo hasta aqui.</p>
					<p class="Inicio_3">Continuemos aferrados a Dios,<br>
					aún en la adversidad.</p>
				</article>  -->
								
				<!-- <form action="controlador/recibe_demo.php" method="POST">
    				<img class="imagen_6" id="blah" src="images/Sabado_Joven.jpg">
					<input style="display:none" type="text" id="Usuario" name="usuario" value="SabadoJoven_1" >	
					<input type="submit" class="btn" style="display:none;" value="Entrar">
				</form> -->
				
				<!-- <img class="imagen_6" id="blah" src="images/Notificacion_2a.png"> -->
				
			 <!-- <audio id="FondoComercial_1" autoplay src="audio/SabadoJoven.mp3" loop></audio>  -->
			<!-- </div>        -->
		
		<!--Termina ventana modal-->
	
		<div class="Secundario"><!--en este contenedor se hace click y se oculta el menu responsive-->
			<header>
				<h1 class="anula">Reavivados</h1>
				<input type="checkbox" id="MenuRes">
				<label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
				<nav id="MenuResponsive" class="menuResponsive">
					<ul id="MenuContenedor">
						<li><a href="vista/principal.php">Inicio sesión</a></li>
						<li><a href="vista/registro.php">Registrarse</a></li>
						<li><a href="vista/participacionHoy.php">Sabios</a></li>
						<li class="menuLi_1"><a>Instrucciones</a>
							<ul class="menuContenedor_2">
								<li><a class="menuLi_2" href="vista/instruccion.php#ancla_1">Reglas generales</a></li>
								<li><a class="menuLi_2" href="vista/instruccion.php#ancla_2">Bonos</a></li>
								<li><a class="menuLi_2" href="vista/instruccion.php#ancla_3">Insignias</a></li>
							</ul>
						</li>
        				<hr class="hr_2  hr_3">
						<!-- <li><a href="../vista/club.php">Club de lectura</a></li>  -->
						<li><a href="vista/ministerio.php">¿Que es reavivados?</a></li>
						<li class="menuLi_1"><a>Nuestro ADN</a>        
							<ul class="menuContenedor_2">
								<li><a class="menuLi_2" href="vista/cultura.php#ancla_4">Misión</a></li>
								<li><a class="menuLi_2" href="vista/cultura.php#ancla_5">Visión</a></li>
								<li><a class="menuLi_2" href="vista/cultura.php#ancla_6">Valores</a></li>
								<li><a class="menuLi_2" href="vista/contacto.php">Contacto</a></li>
								<li><a class="menuLi_2"  href="vista/demo.php">Demo</a></li> 
							</ul>
						</li>
					</ul>
				</nav>
			</header>
			<div onclick="ocultarMenu()">
				<p class="Inicio_13">Capítulo para hoy <?php echo $newFecha;?></p> 
				<label class="Inicio_14" href=""><?php echo $CapituloHoy;?></label>
			</div>
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
			<div class="n20" onclick="ocultarMenu()">
				<h5>¿Que es horebi?</h5>				
				<p class="Inicio_1">Es una plataforma en la que se plantea un test diario con 5 preguntas de un capitulo biblico, cada respuesta es premiada con puntos y al finalizar la semana el dia sábado tenemos un maestro ganador. Para hoy estudiamos <b>"<?php echo $CapituloHoy;?>"</b>, registra una cuenta, toma el test y pasa un momento ameno con los miembros de la comunidad.</p>
				<a class="Inicio_3  buttonCuatro" href="vista/registro.php">Registrar cuenta</a>
				<!-- <p class="Inicio_1">Con cada pregunta acertada se ganan puntos, pero cuidado, equivocarse traerá sus concecuencias, un fallo en tu respuesta te penalizará, dejandote un paso atras de la sabiduría.</p>	
				<a class="Inicio_3  buttonCuatro" href="vista/instruccion.php">Mas detalles</a> -->
			</div>
		</div> 
		
	    <footer class="piePagina_3 piePagina_4">
	        <?php include("vista/modulos/footer.php");?>
	    </footer> 
	</body>
</html>

<script src="convoca_SW.js"></script> 