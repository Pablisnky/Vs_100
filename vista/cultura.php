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

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
	</head>	
	<body>
	    <header>
			<?php include("modulos/header.html");?>
		</header>
		<div onclick="ocultarMenu()">          
			<h2>Misión</h2>
			<p class="Inicio_3">Cultivar la honestidad, el respeto y  la responsabilidad en las personas, para mejorar nuestro entorno social y nuestra convivencia en comunidad, valiéndonos de las herramientas que Dios nos ha dado.</p>
			<h2 id="ancla_5">Visión</h2>
			<p class="Inicio_3">Que todos los miembros de nuestra plataforma reflejemos el poder de Dios por medio de nuestro caracter transformado, y seamos una comunidad cristiana en la que según nuestros talentos, trabajemos por el porvenir de todos; de modo que seamos un pilar para el resto de nuestros hermanos</p>
			<h2 id="ancla_6">Valores</h2>
			<p class="Inicio_3">Nuestro valores etán enmarcados en las santas escrituras y nos identificamos absolutamento con los siguientes versiculos:</p>
			<ul class="ul_2">
				<li class="Inicio_19" onclick="verValor_Deuteronomio()">Deuteronomio 5:6-21</li>
				<li class="Inicio_19" onclick="verValor_Colosenses()">Colosenses 3:23 </li>
				<li class="Inicio_19" onclick="verValor_Juan()">Juan 15:5</li>
			</ul>
		</div>
	    <footer>
	        <?php include("modulos/footer.php");?>
	    </footer> 
   	</body>
</html>