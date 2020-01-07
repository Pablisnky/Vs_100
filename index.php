<?php
session_start();

	//se evita guardar memoria cache
	include("modulos/noCache.php");
	include("clases/imagenComentada.php");

	//Se utiliza la hora de Colombia
	date_default_timezone_set('America/Bogota');
	$FechaServidorPHP =date("Y-m-d");
	 // echo $FechaServidorPHP . "<br>";
	 	 
	// $_SESSION["FechaHoy"] = $FechaServidorPHP; 

	// Se cambia el formato de la fecha
	$newFecha = date("d-m-Y", strtotime($FechaServidorPHP));
	//  echo $newFecha . "<br>";

	if($FechaServidorPHP == "2020-01-07"){
		$CapituloHoy = "Job 16";
		$_SESSION["Capitulo"] = $CapituloHoy;
	}
	else if($FechaServidorPHP == "2020-01-06"){
		$CapituloHoy = "Job 15";
		$_SESSION["Capitulo"] = $CapituloHoy;
	}
	else{
		$CapituloHoy = "Test disponible a las 5:00 am ";
		$_SESSION["Capitulo"] = $CapituloHoy;		
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>horebi</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Test biblico"/>
		<meta name="keywords" content="preguntas, juego, Dios, Biblia, capitulo, reavivados"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<meta http-equiv="Expires" content="0"><!--evita guardar en cache-->
		<meta http-equiv="Last-Modified" content="0"><!--evita guardar en cache-->
 		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate"><!--evita guardar en cache-->
		<meta http-equiv="Pragma" content="no-cache"><!--evita guardar en cache-->
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">

		<link rel="stylesheet" type="text/css" href="css/EstilosVs_100.css?update=12102006"  media="screen" >      
		<link rel="stylesheet" type="text/css" href="css/Modal.css">  
        <link rel="stylesheet" type="text/css" media="(max-width: 350px)" href="css/MediaQuery_EstilosVs_100_350px.css">   
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_EstilosVs_100.css">
        <link rel="stylesheet" type="text/css" media="(min-width: 1500px)" href="css/MediaQuery_EstilosVs_100_Grande.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>    
		<link rel="stylesheet" type="text/css" href="iconos/icono_menu/style_menu.css"/> <!--galeria icomoon.io  -->
		<link rel="shortcut icon" type="image/png" href="images/logo.png">
		<link rel="manifest" href="./manifest.json">

		<script type="text/javascript" src="javascript/Funciones_varias.js" ></script>
		<script type="text/javascript" src="javascript/validarFormulario.js" ></script>

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
		<!-- Construcion de ventanan modal -->
        
			<!-- <input type="checkbox" id="Cerrar">  -->
        	<!-- <label for="Cerrar" id="btnCerrar" onclick="pauseAudio()">Cerrar</label>   -->
			<!-- <div class="modal"> -->
				<!-- <article class="contenedor_modal modal_2">
				 	<img class="imagen_5"  src="images/logo.png">
					<label class="Inicio_23">horebi.com</label>
					<p class="Inicio_3">Hermanos.</p>
					<p class="Inicio_3">La plataforma se ha suspendido</p>
					<p class="Inicio_3">Continuemos aferrados a Dios,<br>
					aún en la adversidad.</p>
				</article>  -->
								
				<!-- <form action="controlador/recibe_demo.php" method="POST">
    				<img class="imagen_6" id="blah" src="images/Sabado_Joven.jpg">
					<input style="display:none" type="text" id="Usuario" name="usuario" value="SabadoJoven_1" >	
					<input type="submit" class="btn" style="display:none;" value="Entrar">
				</form> -->
				
				<!-- <p class="Inicio_28">Invitación</p>
				<p class="Inicio_27">Cantata navideña</p>
				<p class="Inicio_27">Coro: Iglesia Peniel</p>
				<img class="imagen_6" id="blah" src="images/CantataNavideña.jpeg">
				<p class="label_5">Iglesia Adventista del septimo día<p> 
				<p class="label_5 label_5a">Peniel - Pamplona.</p> -->
<!-- 				
			 	<audio id="FondoComercial_1" autoplay src="audio/Himno.mp3" loop></audio>
			</div>        -->
		
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
						<li class="menuLi_1"><a>Nuestro ADN</a>        
							<ul class="menuContenedor_2">
								<li><a class="menuLi_2" href="vista/equipo.php">Quiénes somos</a></li>
								<li><a class="menuLi_2" href="vista/ministerio.php">Que hacemos</a></li>
								<li><a class="menuLi_2" href="vista/cultura.php#ancla_4">Misión</a></li>
								<li><a class="menuLi_2" href="vista/cultura.php#ancla_5">Visión</a></li>
								<li><a class="menuLi_2" href="vista/cultura.php#ancla_6">Valores</a></li>
								<!-- <li><a class="menuLi_2"  href="vista/demo.php">Demo</a></li> -->
								<li><a class="menuLi_2" href="vista/contacto.php">Contacto</a></li> 
							</ul>
						</li>
					</ul>
				</nav>
			</header>
			<div onclick="ocultarMenu()">
				<p class="Inicio_13">Capítulo para hoy <?php echo $newFecha;?></p> 
				<label class="Inicio_14" href=""><?php echo $CapituloHoy;?></label>
				<div class="contenedor_33">				
					<?php
						$ImagenComentar= new imagenComentada();

						$ImagenComentar->ImagenIndex();
					?>
				</div>	 
				<div class="contenedor_40">
					<a class="buttonTres" href="vista/Estudios.php">Estudios biblicos</a>
					<span class="span_12 span_13">Proximamente</span>	
				</div>
				<div class="contenedor_29 contenedor_29a">
					<div class="n00">
						<div>
							<a class="buttonTres" href="vista/principal.php">inicia sesión</a>
						</div>	
						<!-- <a class="buttonTres" href="vista/club.php">Club de lectura</a>	 -->
						<div>
							<a class="buttonTres" href="vista/Estudios.php">Estudios biblicos</a>
							<span class="span_12 span_13">Proximamente</span>	
						</div>
						<div>
							<a class="buttonTres" href="vista/participacionHoy.php">Sabios de hoy</a>
						</div>	
					</div>			 
					<div class="n20" onclick="ocultarMenu()">
						<h5>Lo que hacemos</h5>				
						<p class="Inicio_1">Todos los días planteamos un test con 5 preguntas de un capítulo bíblico, en el que cada respuesta acertada es premiada con puntos, al finalizar la semana el día sábado, tenemos un maestro ganador que pasa a nuestro magno salón de los sabios. Para hoy estudiamos <b>"<?php echo $CapituloHoy;?>"</b>, registra una cuenta, toma el test, diviértete y pasa un momento ameno con los miembros de la comunidad.</p>
						<a class="Inicio_3  buttonCuatro" href="vista/registro.php">Registrar cuenta</a>
					</div>
				</div>
			</div> 
		
	    <footer class="piePagina_5">
            <img class="imagen_3" alt="Logotipo horebi.com" src="images/logo.png">
			<label class="Inicio_23">horebi.com</label>
			<!-- <span class="span_7">Reavivados</span>  -->
			<a class="menuLi_2" href="vista/equipo.php"><p class="p_8">El propósito de esta plataforma es incentivar la lectura bíblica y exaltar el sábado como día especial de dedicación a Jehová.</p></a>
	        <?php include("vista/modulos/footer.php");?>
	    </footer>  
	</body>
</html>