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
            <h1>Reavivados</h1>
		</header>
		<div onclick="ocultarMenu()">
			<p class="Inicio_26">Insignia de Maestro</p>
            <img class="imagen_7  imagen_10" alt="Fotografia del usuario" src="../images/In_Maestro.png">
			<p class="Inicio_3">Otorgada por haber alcanzado cinco puntos en todas las respuesta de un test diario.</p>
		</div>
        <label class="nav_13" onclick ="window.close()">Cerrar</label>
	    <footer>
	        <?php include("modulos/footer.php");?>
	    </footer> 
   	</body>
</html>