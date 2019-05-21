<?php   
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login
    	
  		header("location:../../index.php");			
	}
	else{//se entra en esta seccion porque se tiene almacenado el ID_Participante en una variable SESSION

	$Pais= "Colombia";
	define("PREGUNTA_ACTUAL",2,false);  // definiendo una constante para identificar el número de la pregunta
	define("PREGUNTA_ANTERIOR",1,false);  // definiendo una constante para identificar el número de la pregunta

	//se evalua si se ha respondido la pregunta anterior
	include("../../mvc/modelo/cabeceraPreguntas.php");

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
		<script src="../../javascript/Funciones_varias.js"></script>
		<script src="../../mvc/vista/javascript/formatoRespuesta.js"></script>

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower|Caveat');
    	</style> 
	</head>	

	<?php
		if($Respondida>0){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php
	?>

	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->
		
	    	<input type="text" class="ocultar" id="Pais"  value="Colombia">
			<input type="text" class="ocultar" id="ID_Pregunta"  value= "<?PHP echo PREGUNTA_ACTUAL;?>">
			<input type="text" class="ocultar" id="ID_Participante"  value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->

		    <div class="Secundario">
		    	<div class="encabezado">
		    		<h1 class="anula">ViajeSurAmerica.com</h1>
		    	</div>
		    	<div class="encabezado_2">
				    <div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
				</div>
				<h4>Pregunta Nº <?PHP echo PREGUNTA_ACTUAL;?></h4>
				<div>
					<p class="pregunta">Las unidades de medida que se emplean en Colombia para especificar el peso de los alimentos y el volumen de la gasolina, son unidades del sistema:</p>
				</div>
				<div class="Quinto">
					<div class="Quinto_2">
						<p id="respuesta_a" class="efecto" onclick="cerrar(); opcion_a(); llamar_bloqueo()">Internacional.</p>
						<p id="respuesta_b" class="efecto" onclick="cerrar(); opcion_b(); llamar_bloqueo()">Colombiano.</p>
					</div>
					<div class="Quinto_2">
						<p id="respuesta_c" class="efecto" onclick="cerrar(); opcion_c(); llamar_bloqueo()">Métrico.</p>
						<p id="respuesta_d" class="efecto" onclick="cerrar(); llamar_sombrear_02d(); setTimeout(llamar_puntaje,200);">Ingles.</p>
					</div>
				</div>

				<div class="respuestaPreguntas" id="RespuestaPreguntas"><!--con el id recibe informacion desde ajax-->
					<div id="Temporizador_2">
						<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta y el tiempo maximo para responder-->
						<?php include("../../Sesiones_Cookies/Temporizador_2.php");?>
					</div>
				</div>
					
					<nav class="navegacion_1">
						<a class="nav_7" href="../../Sesiones_Cookies/entrada.php" class="">Inicio</a>
						<a class="nav_7" href="../../Sesiones_Cookies/cerrarSesion.php">Cerrar Sesión</a>
						<a class="nav_7" href="preguntaColombia_03.php">Siguiente</a>
						</nav>
					</div>
				</body>
			</html>

			<script>
//--------------------------------------------------------------------------------------------------------------------------
			var http_request = false;
	        var peticion= conexionAJAX();

	        function conexionAJAX(){
	            http_request = false;
	            if (window.XMLHttpRequest){ // Mozilla, Safari,...
	                http_request = new XMLHttpRequest();
	                if (http_request.overrideMimeType){
	                    http_request.overrideMimeType('text/xml');
	                }
	            } 
	            else if (window.ActiveXObject){ // IE
		            try {
		                http_request = new ActiveXObject("Msxml2.XMLHTTP");
		            } 
		            catch (e){
		                try{
		                    http_request = new ActiveXObject("Microsoft.XMLHTTP");
		                } catch (e) {}
		            }
		        }
	            if (!http_request){
	                alert('No es posible crear una instancia XMLHTTP');
	                return false;
	            }
	          	/*else{
	                alert("Instancia creada exitosamente ok");
	            }*/
	           return http_request;
	        } 

			function llamar_sombrear_02d(){
				var D= document.getElementById("respuesta_d");
				D.style.color="white";

			    var aleatorio = parseInt(Math.random()*999999999);
			    E=document.getElementById("ID_Participante").value;//se inserta el ID_Participante desde este mismo archivo.
			    F=document.getElementById("Pais").value;//se inserta el nombre del libro desde este mismo archivo.
			    var url="respuestaColombia_02.php?val_1=" + E  + "&val_2=" + F + "&r=" + aleatorio;
			    http_request.open('GET',url,false);     
			    peticion.onreadystatechange = respuesta_sombrear_02d;
			    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
			    peticion.send("null");
			}                                                           
			function respuesta_sombrear_02d(){
			    if (peticion.readyState == 4){
			         if (peticion.status == 200){
			           document.getElementById('RespuestaPreguntas').innerHTML=peticion.responseText;//se recoje el numero de pacientes
			        } 
			        else{
			            alert('Hubo problemas con la petición.');
			        }
			    }
			}
//--------------------------------------------------------------------------------------------------------------------------

			</script>
					
			<?php
		}
		else{//sino a respondido la pregunta previa entra en esta sección, porque la variable $_Session es menor 1
			//echo "Cantidad de preguntas respondidas= ". $Respondida;
		?>
			<div class="Secundario">
				<div>
					<h1 class="anula">ViajeSurAmerica.com</h1>
				</div>
				<div class="Cuarto_4">
					<p>No ha respondido correctamente la pregunta Nº <?PHP echo PREGUNTA_ANTERIOR;?>, debe dar una respuesta correcta</p>
				</div>
				<a class="nav_2" href="preguntaColombia_01.php">Volver</a>			
			</div>	
		<?php	
		}
	}
	?>