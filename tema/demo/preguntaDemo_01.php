<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_PD"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	// echo "el valor de la variable session= " . $_SESSION["ID_PD"];

  		header("location:../../index.php");			
	}
	else{

		define("PREGUNTA_ACTUAL", 1);  // definiendo una constante para identificar el número de la pregunta

		// include("../../conexion/Conexion_BD.php");

	    $participanteDemo= $_SESSION["ID_PD"];//en esta sesion se guarda el id del participante, sesion creada en recibe_demo.php
	    // echo "ID_Participante: " . $participanteDemo . "<br>";

	    $_SESSION["Usuario"];//en esta sesion se tiene guardado el nombre de usuario del participante, sesion creada en recibe_demo.php
	    // echo "El nombre de usuario es: " . $_SESSION["UsuarioDemo"] . "<br>";

	    $Num_Pregunta= PREGUNTA_ACTUAL;

	    $_SESSION["Pregunta"] = PREGUNTA_ACTUAL;//se crea la SESION pregunta, necesaria en Temporizador_2	
	    // echo "Pregunta Nº " . $_SESSION["Pregunta"] . "<br>";
	    
	    $Tema= "Demo";
	    // echo "El tema de la prueba es: " . $Tema . "<br>";

	    $CodigoPrueba= "demo";
		
		include("../../conexion/Conexion_BD.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20 Pregunta Nº <?php echo $Num_Pregunta;?></title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_EstilosVs_100.css">
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
		<link rel="stylesheet" type="text/css" href="../../iconos/icono_siguiente/style_siguiente.css"/> <!--galeria icomoon.io  -->
		<link rel="stylesheet" type="text/css" href="../../iconos/icono_repetir/style_repetir.css"/> <!--galeria icomoon.io  -->

		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>
		<script src="../../javascript/Funciones_varias.js"></script>
		<script src="../../javascript/Funciones_Ajax.js"></script>
		<script language="JavaScript">//impide regresar a esta pagina nuevamente con el boton de atras 
			javascript:window.history.forward(1);
		</script> 
   	</head>	
	<body onload="llamar_puntaje_Demo()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->
		<input type="text" class="ocultar" id="Tema" value="Demo">
		<input type="text" class="ocultar" id="ID_Pregunta" value= "<?php echo PREGUNTA_ACTUAL;?>">
	    <input type="text" class="ocultar" id="ID_PD" value="<?php echo $participanteDemo;?>"><!-- se utiliza para enviar a puntaje.js-->
	    <input type="text" class="ocultar" id="Pregunta_Num" value="<?php echo $Num_Pregunta;?>"><!-- se utiliza para enviar a puntaje.js-->
			<div class="Secundario">
				<div class="encabezado">
					<h1 class="anula">Versus_20</h1>
			    </div>
			    <div class="encabezado_2">
				    <div id="mostrarPuntos"></div><!-- recibe el puntaje del participante por medio de llamar_puntaje() llamada al cargar el documento desde sumaPuntaje.php-->
				</div>
				<h4>Pregunta Nº <?php echo PREGUNTA_ACTUAL;?></h4>
				<div>
					<p class="pregunta">¿Quién traicionó a Jesús?</p>
				</div>
				<div class="Quinto">
					<div class="Quinto_2">
						<p id="respuesta_d" class="efecto" onclick="sonidoInCorrecto(); pauseAudio(); llamar_bloqueo_Demo()">Poncio Pilatos.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
						<p id="respuesta_b" class="efecto" onclick="sonidoInCorrecto(); pauseAudio(); llamar_bloqueo_Demo()">Pedro.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
					</div>
					<div class="Quinto_2">
						<p id="respuesta_c" class="efecto" onclick="sonidoInCorrecto(); pauseAudio(); llamar_bloqueo_Demo()">Judas Tadeo.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
						<p id="respuesta_a" class="efecto" onclick="sonidoCorrecto(); pauseAudio();llamar_sombrear_Demo(); setTimeout(llamar_puntaje_Demo,200);">Judas iscariote.</p><!-- llamar_puntaje() se encuentra en puntaje.js -->
					</div>
				</div>
				<div class="respuestaPreguntas" id="RespuestaPreguntas"><!--con el id recibe informacion desde ajax-->
					<div id="Temporizador_2">
						<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta, el tiempo maximo para responder y se muestra un temporizador en pantalla-->
						<?php include("../../controlador/Temporizador_Demo.php");?>
					</div>
				</div>									
				<div class="contenedor_7">
					<a style="color:white !important;" href="../../index.php">Inicio</a>
				</div>
				<audio id="Resp_Correc" src="../../audio/SD_ALERT_22.mp3"></audio>
				<audio id="Resp_InCorrec" src="../../audio/incorrecta.mp3"></audio>
				<audio id="FondoComercial_1" autoplay src="../../audio/AudioCorrecta.mp3" loop></audio>
				<div class="contenedor_6" id="Flecha">
					<a  href='preguntaDemo_02.php'><span class="icon-arrow-right parpadea" title="Siguiente"></span></a>					
				</div>
		</div>		
	</body>
</html>

	<?php
			}
		?>