<?php
session_start();    //se inicia sesion para llamar a una variable 

	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	    //echo $participante;

	$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
	// echo "El tema de la prueba es: " . $Tema;

	$CodigoPrueba =$_SESSION["codigoPrueba"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs-100</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_EstilosVs_100.css">
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>
	</head>	
	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje por libro del participante -->
		<?php
			include("../../conexion/Conexion_BD.php");	

	    	//se realiza una consulta para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";//se plantea la consulta
			$Recordset = mysqli_query($conexion,$Consulta);//se manda a ejecutar la consulta
			$Participante= mysqli_fetch_row($Recordset);
		?>
		<input type="text" class="ocultar" id="Tema" value="Colombia">
		<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
		<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
		<?php
			//Consulta realizada para verificar que la pregunta anterior esta respondida y puede entrar en esta.
			$Consulta_3="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND ID_Pregunta = 8 AND Tema= '$Tema' ";
			$Recordset_3 = mysqli_query($conexion,$Consulta_3);
			$Respondida= mysqli_num_rows($Recordset_3);//se suman los registros que tiene la consulta realizada.
				//echo $Respondida;	

		    if($Respondida>0){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php

		   	//se actualiza en la BD que no tiene esta prueba pendiente
			$Actualiza="UPDATE participantes_pruebas SET Prueba_Activa= 0, Prueba_Cerrada = 1 WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba' ";
			mysqli_query($conexion,$Actualiza);
    	?>
		<div class="Secundario">
			<div class="encabezado">
	    		<h1 class="anula">Vs_100.com</h1>
		    </div>
	    	<div class="encabezado_2">
		    	<div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
			</div>
	    	<hr>
			<h4>Has concluido tu prueba para el tema</h4>
			<p class="pais"><?php echo $Tema;?></p>
			<hr>
			<div class="ultimaPregunta">
		    	<p class="Inicio_1">Los puntos acumulados son: xxxxx.</p>
		    	<p class="Inicio_1">El tiempo en responder fue: xxxxx</p>
		    	<p class="Inicio_1">Tu posición fue la Nº xxxxxx, de xxxxx sigue intentando.</p>
		    	<p class="Inicio_1">Reporte de respuesta.</p>
		    	<br>
		    	<p class="Inicio_1">Tabla de resultados.</p>
		    	<div class="Gratis_2">
			    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de Vs_100</p>
			    	<br>
			    </div>
	    	</div>
	    	<nav class="navegacion_1" style="margin-top: 15%;">
				<a class="nav_7" href="../../controlador/entrada.php" class="">Inicio</a>
				<a class="nav_7" href="../../controlador/cerrarSesion.php">Cerrar Sesión</a>
			</nav>
		</div>
	</body>
</html>

<?php
			}
			else{//sino a respondido la pregunta previa entra en esta sección
		?>
			<div class="Secundario">
				<div>
		    		<h1 class="anula">Vs_100.com</h1>
		    	</div>
			
				<div class="Cuarto_4">
					<p>No ha respondido correctamente la pregunta Nº 10, debe dar una respuesta correcta</p>
				</div>
				<br>
				<nav class="navegacion">
					<div class="nav_2"><a href="preguntaVenezuela_10.php">Volver</a></div>
				</nav>
			</div>
			
		<?php	}
		?>


	