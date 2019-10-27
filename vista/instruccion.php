<?php
session_start();
$CapituloHoy = $_SESSION["Capitulo"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Instrucciones</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas biblicas."/>
		<meta name="keywords" content="citas biblicas, biblia"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
       	<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
       	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">
		<link rel="stylesheet" type="text/css" href="../iconos/icono_avion/style_avion.css"/> <!--galeria icomoon.io  -->

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
	</head>	
	<body>
	    <header>
			<?php include("modulos/header.html");?>
		</header>
		<div onclick="ocultarMenu()">	 
			<h2 class="h2_2" id="ancla_1">Reglas generales</h2><!--onclick="mostrar('Lista_6')"-->
		    <ul id="Lista_1"><!-- class="ocultar"-->
				<li class="Inicio_3">El acceso a la plataforma es libre y gratuito</li>
		        <li class="Inicio_3">Pueden participar personas de cualquier edad y ubicación geografica dentro de Colombia, Ecuador y Venezuela. (El proposito es expandirse a otros paises)</li>
		        <li class="Inicio_3">Debe estar registrado en la plataforma, e iniciar sesión con su cuenta de usuario.</li>
		        <li class="Inicio_3">Seleccione el reto diario de "Reavivados" o un libro de la Biblia para ingresar a su prueba.</li>
		    </ul>
			<p class="Inicio_6">Ganar puntos</p><!--onclick="mostrar('Lista_6')"-->
		    <ul id="Lista_2"><!-- class="ocultar"-->
		        <li class="Inicio_3">Solo es posible sumar puntos si acierta la respuesta en la primera respuesta que elija, luego ya no es posible sumar puntos aún contestado la respuesta correcta.</li>
				<li class="Inicio_3">Una respuesta correcta dentro de los primeros 10 segundos despues de abierta una pregunta suma la totalidad de los puntos de la pregunta (5 puntos)</li>
		        <li class="Inicio_3">Una respuesta correcta despues de los primeros 10 segundos despues de abierta una pregunta suma una cantidad particial del puntaje, cada segundo que tarde en responder el valor de los puntos ganados disminuye 0.04347 puntos.</li>
		    </ul>
			<p class="Inicio_6">Perder puntos</p><!--onclick="mostrar('Lista_6')"-->
		    <ul  id="Lista_3"><!-- class="ocultar"-->
				<li class="Inicio_3">Una respuesta incorrecta resta 2,25 puntos</li>
		    </ul>
			<p class="Inicio_6">No ganar puntos</p><!--onclick="mostrar('Lista_6')"-->
		    <ul id="Lista_4"><!-- class="ocultar"-->
				<li class="Inicio_3">Al dar una respuesta correcta despues de haberse cumplido el tiempo establecido.</li>
		        <li class="Inicio_3">Al dar una respuesta correcta despues de haber fallado el primer intento</li>
			</ul>
			
			<h2 class="h2_2" id="ancla_2">Bonos</h2>
			<p class="Inicio_6">Bono de constancia</p><!--onclick="mostrar('Lista_6')"-->
		    <ul id="Lista_5"><!-- class="ocultar"-->
				<li class="Inicio_3">Al participar todos los dias se otorga un bono de 4 puntos al puntaje semanal.</li>
				<!-- <br>  
				<span class="span_10">"Y la constancia debe llevar a feliz termino la obra, para que sean perfectos e íntegros, sin que les falte nada"</span>
				<br>
				<span class="span_10 span_11">Santiago 1:4</span> -->
		    </ul>
			<p class="Inicio_6">Bono de liderazgo</p><!--onclick="mostrar('Lista_6')"-->
		    <ul id="Lista_6"><!-- class="ocultar"-->
				<li class="Inicio_3">Mantenecerse en los tres primeros lugares diariamente otoga un bono de 0,002 puntos por cada minuto en esa posicion. <b>(En desarrollo)</b></li>
				<!-- <br>  
				<span class="span_10">"Te pondrá Jehová por cabeza y no por cola; y estaras encima solamente, y no estarás debajo, si obedecieres los mandamientos de Jehová"</span>
				<br>  
				<br>  
				<span class="span_10 span_11">Deuteronomio 28:13</span>  -->
		    </ul>
			<p class="Inicio_6" >Bono de prioridad</p><!--onclick="mostrar('Lista_6')"-->
		    <ul  id="Lista_7"><!-- class="ocultar"-->
				<li class="Inicio_3">Se otorgan 1 punto a los usuario que inicien el test antes de las siete de la mañana.</li>
				<!-- <br>  
				<span class="span_10">"Busquen primeramente el reino de Dios y su justicia"</span>
				<br>  
				<span class="span_10 span_11">Mateo 6:33</span>  -->
		    </ul>
			<!-- <p class="Inicio_6">Bono de evangelizacioón</p><!--onclick="mostrar('Lista_6')"
		    <ul id="Lista_8"><!-- class="ocultar"-->
				<!-- <li class="Inicio_3">Por cada nuevo miembro que llegue a la aplicación y presente tu código de referidos ganas 5 puntos,  la aplicación a otras personas e invitarlo a la lectura biblica diaria; ganas . (En desarrollo)</li> -->
				<!-- <br>  
				<span class="span_10">"Y si alguno de vosotros tiene falta de sabiduría, pidala a Dios, el cual da a todos abundantemente y sin reproche"</span>
				<br>
				<span class="span_10 span_11">Santiago 1:5</span> 
		    </ul> -->
		</div>
		<div onclick="ocultarMenu()">
			<h2 class="h2_2" id="ancla_3">Insignias</h2>
			<p class="Inicio_6">Insignia de Maestro</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Maestro.png">
			<p class="Inicio_3">Otorgada al participante que alcance cinco puntos en todas las respuesta de un test diario y participe antes de las 7 am.</p>
			<p class="Inicio_20">A partir del 1 de noviembre de 2019</p>
			
			<p class="Inicio_6">Insignia de Especialista</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Especialista.png">
			<p class="Inicio_3">Otorgada al lograr un puntaje mayor a 49 en un libro bíblico.</p>
			<p class="Inicio_20">A partir del 1 de noviembre de 2019</p>

			<p class="Inicio_6" >Insignia de Perseverancia</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Perseverancia.png">
			<p class="Inicio_3">Otorgada a los participantes con participación continua durante un trimestre</p>
			<p class="Inicio_20">A partir del 1 de noviembre de 2019</p>

			<p class="Inicio_6" >Insignia de Liderazgo</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Liderazgo.png">
			<p class="Inicio_3">Otorgada al participante que solo ha faltado un dia al mes en mantenerse en primer lugar.</p>
			<p class="Inicio_20">A partir del 1 de noviembre de 2019</p>

			<p class="Inicio_6" >Insignia Mayor</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Mayor.png">
			<p class="Inicio_3">Otorgada al participante que entregue un pequeño proyecto viable sobre un tema o problema actual, que se implemente en nuestro entorno social y que solucione o demuestre que puede solucionar un problema.</p>
			<p class="Inicio_20">A partir del 1 de noviembre de 2019</p>
		</div>
		<a href="#up" class="simplescrollup__button simplescrollup__button--hide"><span class="icon-airplane" style="transform: rotate(45deg); display: block;"></span></a>
		<script src="../javascript/scrollUp.js"></script>
	    <footer>
	        <?php include("modulos/footer.php");?>
		</footer> 
   	</body>
</html>