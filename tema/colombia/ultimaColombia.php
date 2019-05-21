<?php   
session_start();    //se inicia sesion para llamar a una variable 
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ViajeSurAmerica</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../../css/EstilosViajeSurAmerica.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_EstilosViajeSurAmerica.css">

		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower|Caveat');
    	</style> 
	</head>	
	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje por libro del participante -->
		<?php
			include("../../conexion/Conexion_BD.php");

	    	$participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	    	//echo $participante;		

	    	//se realiza una consulta para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";//se plantea la consulta
			$Recordset = mysqli_query($conexion,$Consulta);//se manda a ejecutar la consulta
			$Participante= mysqli_fetch_row($Recordset);
		?>
		
			<input type="text" class="ocultar" id="Pais" value="Colombia">
			<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
			<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->

			<?php
				//Consulta realizada para verificar que la pregunta anterior esta respondida y puede entrar en esta.
				$Consulta_3="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND ID_Pregunta = 5 AND Pais= 'Colombia' ";
				$Recordset_3 = mysqli_query($conexion,$Consulta_3);
				$Respondida= mysqli_num_rows($Recordset_3);//se suman los registros que tiene la consulta realizada.
				//echo $Respondida;	

		    	if($Respondida>0){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php
	    	?>

			<div class="Secundario">
				<div class="encabezado">
		    		<h1 class="anula">ViajeSurAmerica.com</h1>
		    	</div>
	    	<div class="encabezado_2">
			    <div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
			</div>
	    	<hr>
			<h4>Has concluido nuestro Demo para</h4>
			<p class="pais"> Colombia.</p>

			<hr>
			<div class="ultimaPregunta">
		    	<p class="Inicio_1">Ganastes unos valiosos puntos, te estaremos avisando cuando entremos en producción para que continues acumulando puntos.</p>
		    	<div id="Gratis_2">
			    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de ViajeSurAmerica</p>
			    	<br>
			    	<P class="Inicio_3" style="margin-bottom: -4%; font-weight: bolder;" >Atte. Pablo Cabeza.</p>
			    	<br>
			    	<small>pcabeza7@gmail.com</small>
			    </div>
		    
	    	</div>

	    	<nav class="navegacion_1" style="margin-top: 15%;">
				<a class="nav_7" href="../../Sesiones_Cookies/entrada.php" class="">Inicio</a>
				<a class="nav_7" href="../../Sesiones_Cookies/cerrarSesion.php">Cerrar Sesión</a>
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
		    		<h1 class="anula">ViajeSurAmerica.com</h1>
		    	</div>
			
				<div class="Cuarto_4">
					<p>No ha respondido correctamente la pregunta Nº 5, debe dar una respuesta correcta</p>
				</div>
				<br>
				<nav class="navegacion">
					<div class="nav_2"><a href="preguntaColombia_05.php">Volver</a></div>
				</nav>
			</div>
			
		<?php	}
		?>


	