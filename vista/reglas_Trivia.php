<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Instrucciones</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas biblicas."/>
		<meta name="keywords" content="citas biblicas, biblia"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
       	<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
       	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
	</head>	
	<body>
	    <header>
			<?php include("modulos/header.html");?>
		</header>
		<div style="margin-left:85%; margin-top:8%; position:fixed;">
			<a class="marcador" href="trivia.php">De acuerdo</a>
			<a class="marcador" href="#marcador_01">¿Como participar?</a>
			<a class="marcador" href="#marcador_02">¿Como jugar?</a>
			<a class="marcador" href="#marcador_03">¿Y el premio?</a>
		</div>
		<div class="contenedor_5" onclick="ocultarMenu()">
			<h2>Normas de la trivia.</h2>
			<a id="marcador_01"></a>	
			<p class="Inicio_6">¿Como participar?</p>
		    <ul>
		        <li class="Inicio_3">Nuestra trivia esta dirigida a personas que se encuentren en Pamplona-Colombia, y premia con descuentos en la tienda física <span style="font-weight:bold">ImpresionArte</span>, si usted desea participar en una de nuestras pruebas premiadas con dinero en efectivo, debe registrar una cuenta y seleccionar el tema de su preferencia.</li>
		        <li class="Inicio_3">La tematica general de la trivia consiste en responder 5 preguntas básicas sobre un tema aleatorio y cotidiano.</li>
			</ul>
			<a id="marcador_02"></a>
			<p class="Inicio_6">¿Como jugar?</p>
		    <ul>
		        <li class="Inicio_3">Se cuenta con dos minutos para responder cada pregunta.</li>
		        <li class="Inicio_3">Las respuestas correctas dentro de los primeros 10 segundos suman la totalidad de los puntos, si respondes despues de este tiempo, los puntos comenzarán a disminuir hasta tener un valor de cero puntos al cumplir el tiempo establecido de la pregunta.</li>
		        <li class="Inicio_3">La trivia se hará efectiva una vez se alla alcanzado la participación de un minimo de 10 usuarios.</li>
		    	<li class="Inicio_3">Diariamente tendremos trivias en las cuales puedes participar totalmente gratis.</li>
		        <li class="Inicio_3">Al responder una trivia se daran resultados parciales de su actuación en la misma; solo al cierre (08:00 pm) se publicaran los resultados generales de todos los participantes en la prueba.</li>
		        <li class="Inicio_3">Los resultados generales se publicarán inmediatamente despues del cierre de la misma.</li>
		    	<li class="Inicio_3">La trivia se apertura todos los dias y cierra a las nueve de la noche.</li>
		        <li class="Inicio_3">Una vez abierta una pregunta comienza a correr el tiempo que es tomado en cuenta para los resultados, luego de ser respondida el cronometro para hasta que decida abrir la proxima preguntar.</li>
		        <li class="Inicio_3">Solo es posible sumar puntos si acierta la respuesta en la primera respuesta que elija, luego ya no es posible sumar puntos aún contestado la respuesta correcta.</li>
			</ul>
			<a id="marcador_03"></a>
			<p class="Inicio_6">¿Y el premio?</p>
		    <ul>
		        <li class="Inicio_3">El participante que alcance el mayor puntaje obtendra un descuento de 20% de descuento en el servicio de plotter de ImpresionArte.
				</li>
				<li class="Inicio_3">Los resultados generales de la trivia son publicados de inmediato en esta plataforma, debe iniciar sesión  para poder verlos; o dirigirse a  ImpresionArte, ubicado en la calle 4 con carrera 4.</li>
		    	<li class="Inicio_3">Si resultas ganador dirigete a ImpresionArte y presenta tu cedula para que obtengas el descuento en el servicio de impresión en plotter.</li>
		    	<li class="Inicio_3">No es necesario canjear el premio de inmediato, puedes mantenerlo y acumularlo si asi lo deseas.</li>
		    </ul>
		</div>
		<a class="a_1" href="trivia.php">De acuerdo</a>
	    <footer>
	        <?php include("modulos/footer.php");?>
	    </footer> 
   	</body>
</html>