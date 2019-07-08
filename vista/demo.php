<?php   
	include("../conexion/Conexion_BD.php");
?>		

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20 Prueba Demo</title>

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
        <script type="text/javascript" src="../javascript/Funciones_Ajax.js"></script>   
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(){foco('Usuario')} , false);//foco se encuentra en Funciones_varias.js
        </script>
	</head>	
	<body onload="autofocusInicioSesion()">
		<div class="">
			<header>
				<?php include("modulos/header.html");?>
			</header>
			<div onclick= "ocultarMenu()">
				<div class="Inicio_2">
					<h2>Prueba Demo</h2>
					<form action="../controlador/recibe_demo.php" method="POST">
						<fieldset class="Afiliacion_4">
						<input style="margin-bottom: 4%;" type="text" id="Usuario" name="usuario" placeholder="Nombre o Nickname" autocomplete="off">	
                        <div class="contenedor" id="Mostrar_verificaUsuario"></div><!-- recibe respuesta de ajax llamar_verificaUsuario()-->

						<input type="submit" value="Entrar"><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
						<br><hr>
						<p class="Inicio_1">Tabla de posiciones del Demo <a href="participantes.php">Ver.</a></p> 
						</fieldset>
					</form>
				</div>			
				<p class="Inicio_1">¿No tienes cuenta en Versus_20?<br>
				<a href="registro.php">Registrate aqui.</a></p> 
				<!--<a style="height: 10px; text-align: left;" href="controlador/llamarcookie.php">Ver cookie</a>En este archivo se pueden ver las cookies que se crearon en una visita anterior al sitio web por medio de validarSesion.php-->
			</div>
		</div>
		<br>
		<footer>
			<?php include("modulos/footer.php");?>
		</footer>
   	</body>
</html>

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>