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
			<h2>¿Que es Reavivados?</h2>	 
			<p class="Inicio_3">Es un ministerio desarrollado para incentivar la lectura bíblica diaria y recordar el sábado como día de reposo para honrar a Dios; dejándonos una lección de sabiduría para reflejar en nuestra sociedad.</p> 

			<p class="Inicio_3">La dinamica consiste en un sencillo test de cinco preguntas sobre el capitulo biblico estudiado el dia de hoy &nbsp<b>"<?php echo $CapituloHoy;?>"</b>, al finalizarlo se le notifica su resultado en un reporte general de su actuación, y su posicionamiento con respecto a todos los miembros de la comunidad de reavivados.</p> 

			<p class="Inicio_3">Al terminar la semana el día sábado a las seis de la tarde, se entregan los resultados generales y de esta manera iniciamos la semana el domingo a las 00:00 con un nuevo ciclo de aprendizaje </p> 
	    <footer>
	        <?php include("modulos/footer.php");?>
		</footer> 
   	</body>
</html>