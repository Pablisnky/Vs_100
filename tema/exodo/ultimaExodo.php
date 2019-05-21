<?php   
session_start();    //se inicia sesion para llamar a una variable almacenada en validarSesion.php
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Biblionario</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas biblicas."/>
		<meta name="keywords" content="citas biblicas, biblia"/>
		<meta name="author" content="HOREBI"/>

		<link rel="stylesheet" type="text/css" href="../../css/EstilosBiblionario.css"/>
		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower');
    	</style> 
	</head>	
	<body onload= "llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje por libro del participante -->
		<?php
			include("../../Conexion_BD.php");
	    	mysqli_query($conexion,"SET NAMES 'utf8'");

	    	$participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	    	//echo $participante;		

	    	//Consulta realizada para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";
			$Recordset = mysqli_query($conexion,$Consulta);
			$Participante= mysqli_fetch_row($Recordset);
			//Consulta realizada para obtener el nombre del participante
		?>

		<input type="text" id="ID_Participante" hidden value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->

		<?php
	    	//if($_SESSION["Puntos"]>=9){//sesion creada en sumaPuntaje.php, contiene el total de puntos acumulado por participante

	    ?>

		<div class="Secundario">
			<p class="p_1"><?php echo $Participante[2]; ?> has acumulado<p/>
	    	<div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
	    	<p class="p_1">puntos en el libro de Éxodo</p>
	    	<hr>
	    	<h4>Has concluido la version demostrativa para el libro de Genesis</h4>
			
			<hr>
			<div class="ultimaPregunta">
		    	<p class="Inicio_1">Haz ganado unos valiosos puntos, continua avanzando y te premiaremos.</p>
		    	<div class="banco">
			    	<p class="Inicio_3"> <span>Primer lugar:</span> Computadora Hp Portátil I7.</p>
			    	<p class="Inicio_3"> <span>Segundo lugar:</span> Telefono Celular Samsung J7.</p>
			    	<p class="Inicio_3"> <span>Tercer lugar:</span> Teléfono Celular Huawei P8.</p>
			    </div>
		    	<p class="Inicio_1" style="margin-top: 1%;"> Animate, el reto solo dura 30 dias y comienza el 1 de marzo de 2018</p>
		    	<p class="Inicio_1">Aun quedan cupos disponibles para participar</p>
		    	<p class="Inicio_1">2 Pagos quincenales por 17.000 pesos cada uno, o un unico pago de 28.000 pesos</p>
		    
	    		<a href="../../datosBancarios.php" class="buttonCuatro">Inscripción</a>
	    	</div>
			
			<div class="Cuarto_2">
				<button onclick="Cerrar_1()">Inicio</button>
				<button onclick="Atras()">Atras</button>
				<input type="text" id="Libro" hidden value="Genesis">
				<input type="text" id="ID_Pregunta" hidden value= "10">
				<!-- <button value="Reload Page" onclick="history.go(0)">Intente de nuevo</button> -->
			</div>
		</div>
		<aside>
			<!--<img src="../../images/logo_1.png">-->
		</aside>
	</body>
</html>

	<script>
		function Atras(){
			window.open("preguntaExodo_10.php","Pregunta1","width=1100px,height=600px,scrollbars=NO,left=120px")
		}

		function Cerrar_1(){
			window.close();
		}
	</script>
