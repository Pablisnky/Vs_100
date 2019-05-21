<?php   
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una nueva.

	 if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{//se entra en esta seccion porque se tiene almacenado el ID_Participante en una variable SESSION

		define("PREGUNTA_ACTUAL", 10); // definiendo una constante para identificar el número de la pregunta actual
		define("PREGUNTA_ANTERIOR", 9); // definiendo una constante para identificar el número de la pregunta anterior

	    $Num_Pregunta= PREGUNTA_ACTUAL;

	    $_SESSION["Pregunta"] = PREGUNTA_ACTUAL;//se crea la SESION pregunta, necesaria en Temporizador_2	
	    // echo "Pregunta Nº " . $_SESSION["Pregunta"] . "<br>";

	    $participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	    // echo "ID_Participante: " . $participante . "<br>";

	    $Tema= "Demo";
	    // echo "El tema de la prueba es: " . $Tema . "<br>";

	    $CodigoPrueba= "demo";

		//se evalua si se ha respondido la pregunta anterior
		include("../../controlador/cabeceraPreguntas.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Pregunta 10</title>

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
		<script src="../../javascript/Funciones_varias.js"></script>
	</head>	

	<?php
		//Se consulta si el participante a respondido la pregunta anterior
		$Consulta="SELECT * FROM respuestas_demo WHERE ID_Participante='$participante' AND Correcto='1' AND Tema='$Tema' AND ID_PP ='$CodigoPrueba'";
		$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion)); 
		$Respondida= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
		// echo $Respondida;

		if($Respondida>8){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php
	?>

	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->

	    <input type="text" class="ocultar" id="Tema" value="Demo">
		<input type="text" class="ocultar" id="ID_Pregunta" value= "<?PHP echo PREGUNTA_ACTUAL;?>">
		<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
	    <input type="text" class="ocultar" id="ID_PP" value="<?php echo $CodigoPrueba;?>"><!-- se utiliza para enviar a puntaje.js-->
	    <input type="text" class="ocultar" id="Pregunta_Num" value="<?php echo $Num_Pregunta;?>"><!-- se utiliza para enviar a puntaje.js-->

	    <div class="Secundario">
			<div class="encabezado">
	    		<h1 class="anula">Vs_100.com</h1>
	    	</div>
	    	<div class="encabezado_2">
	    	    <div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
			</div>
			<h4>Pregunta Nº <?PHP echo PREGUNTA_ACTUAL;?></h4>
			<div>
				<p class="pregunta">A quien le crecia la nariz por mentir:</p>
			</div>
			<div class="Quinto">
				<div class="Quinto_2">
					<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo();">Dumbo</p>
					<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Al burrito sabanero</p>
				</div>
				<div class="Quinto_2">
					<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Campanita</p>
					<p id="respuesta_d" class="efecto" onclick="llamar_sombrear_04d(); setTimeout(llamar_puntaje,200)">Pinocho</p>
				</div>
			</div>

				<div class="respuestaPreguntas" id="RespuestaPreguntas"><!--con el id recibe informacion desde ajax-->
					<div id="Temporizador_2">
						<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta y el tiempo maximo para responder-->
						<?php include("../../controlador/Temporizador_Demo.php");?>
					</div>
				</div>
					
			<nav class="navegacion_1">
				<a class="nav_7" href="../../index.php">Inicio</a>
				<a class="nav_7" href="../../controlador/cerrarSesion.php">Cerrar Sesión</a>
				<a class="nav_7" href="ultimaDemo.php">Siguiente</a>
			</nav>
		</div>
	</body>
</html>

<script>

//--------------------------------------------------------------------------------------------------------------------
		var http_request = false;
        var peticion= conexionAJAX();

        function conexionAJAX(){
            http_request = false;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                http_request = new XMLHttpRequest();
                if (http_request.overrideMimeType){
                    http_request.overrideMimeType('text/xml');
                }
            } else if (window.ActiveXObject){ // IE
                try {
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e){
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

function llamar_sombrear_04d(){
	var C= document.getElementById("respuesta_c");
	C.style.color="white";
	
	var aleatorio = parseInt(Math.random()*999999999);
    E=document.getElementById("ID_Participante").value;//se inserta el ID_Participante desde este mismo archivo.
    F=document.getElementById("Tema").value;//se inserta el nombre del libro desde este mismo archivo.
    G=document.getElementById("Pregunta_Num").value;//se toma el numero de la pregunta desde este mismo archivo.
	H=document.getElementById("ID_PP").value;//se toma el ID de la prueba.
	var url="respuesta.php?val_1=" + E  + "&val_2=" + F + "&val_3=" + G + "&val_4=" + H + "&r=" + aleatorio;
    http_request.open('GET',url,false);     
    peticion.onreadystatechange = respuesta_sombrear_04d;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                         

function respuesta_sombrear_04d(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('RespuestaPreguntas').innerHTML=peticion.responseText;//se recoje el numero de pacientes
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
}

//--------------------------------------------------------------------------------------------------------------


</script>
					
			<?php
		}
		else{//sino a respondido la pregunta previa entra en esta sección, porque la variable $_Session es menor 1
			//echo "Cantidad de preguntas respondidas= ". $Respondida;
		?>
			<div class="Secundario">
				<div>
					<h1 class="anula">Vs_100.com</h1>
				</div>
				<div class="Cuarto_4">
					<p>No ha respondido correctamente la pregunta Nº <?PHP echo PREGUNTA_ANTERIOR;?>, debe dar una respuesta correcta</p>
				</div>
				<a class="nav_1" href="preguntaDemo_09.php">Volver</a>			
			</div>	
		<?php	
		}
	}
	?>