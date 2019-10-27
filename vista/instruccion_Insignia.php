<?php
session_start();
$CapituloHoy = $_SESSION["Capitulo"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Insignias</title>

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
			<h2>Insignias</h2>
			<p class="Inicio_6">Insignia de Maestro</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Maestro.png">
			<p class="Inicio_3">Otorgada al participante que alcance cinco puntos en todas las respuesta de un test diario.</p>
			
			<p class="Inicio_6">Insignia de Especialista</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Especialista.png">
			<p class="Inicio_3">Otorgada al lograr un puntaje mayor a 48,000 en un libro bíblico.</p>

			<p class="Inicio_6" >Insignia de Perseverancia</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Perseverancia.png">
			<p class="Inicio_3">Otorgada a los participantes con participación continua durante un trimestre</p>

			<p class="Inicio_6" >Insignia de Liderazgo</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Liderazgo.png">
			<p class="Inicio_3">Otorgada al participante que se a mantenido 28 dias de un mes en primer lugar.</p>

			<p class="Inicio_6" >Insignia Mayor</p>
            <img class="imagen_7" alt="Fotografia del usuario" src="../images/In_Mayor.png">
			<p class="Inicio_3">Otorgada al participante que presente un pequeño proyecto viable sobre un tema o problema actual, que sea implementado en nuestro entorno social y que solucione o demuestre que puede solucionar un problema que aqueja el bienestar de los ciudadanos.</p>
		</div>
	    <footer>
	        <?php include("modulos/footer.php");?>
	    </footer> 
   	</body>
</html>