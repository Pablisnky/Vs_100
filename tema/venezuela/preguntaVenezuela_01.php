<?php   
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{//se entra en esta seccion porque se tiene almacenado el ID_Participante en una variable SESSION

		define("PREGUNTA_ACTUAL", 1);  // definiendo una constante para identificar el número de la pregunta
	    $Num_Pregunta= PREGUNTA_ACTUAL;
	    $_SESSION["Pregunta"] = PREGUNTA_ACTUAL;//se crea la SESION pregunta, necesaria en Temporizador_2	
	    //echo "Pregunta Nº " . $_SESSION["Pregunta"];

	    $participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	    // echo "ID_Participante: " . $participante . "<br>";

	    $Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
	    // echo "El tema de la prueba es: " . $Tema;
		
		$CodigoPrueba= $_SESSION["codigoPrueba"] ;// en esta sesion se tiene guardado el codigo de la prueba
		
		include("../../conexion/Conexion_BD.php");

		//se realiza una consulta para obtener el nombre del participante, el numero de cedula y el numero de deposito
	    $Consulta="SELECT * FROM participante INNER JOIN registro_pago ON participante.Cedula=registro_pago.cedula WHERE ID_Participante='$participante'";//se plantea la consulta
		$Recordset = mysqli_query($conexion,$Consulta);//se manda a ejecutar la consulta
		$Participante= mysqli_fetch_row($Recordset); 
		$Cedula= $Participante[3];
		$Deposito= $Participante[13];
		 // echo "Cedula Participante: " . $Cedula ."<br>";
		 // echo "Deposito Participante: " . $Deposito ."<br>";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100</title>

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

	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->

		<input type="text" class="ocultar" id="Tema" value="Venezuela"><!-- se utiliza para enviar a puntaje.js-->
		<input type="text" class="ocultar" id="ID_Pregunta" value= "<?php echo PREGUNTA_ACTUAL;?>">
	    <input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
	    <input type="text" class="ocultar" id="ID_PP" value="<?php echo $CodigoPrueba;?>"><!-- se utiliza para enviar a puntaje.js-->
	    <input type="text" class="ocultar" id="Pregunta_Num" value="<?php echo $Num_Pregunta;?>"><!-- se utiliza para enviar a puntaje.js-->

			<div class="Secundario">
				<div class="encabezado">
					<h1 class="anula">Vs_100.com</h1>
			    </div>
			    <div class="encabezado_2">
				    <div id="mostrarPuntos"></div><!-- recibe el puntaje y el nombre del participante por medio de llamar_puntaje() llamada al cargar el documento desde sumaPuntaje.php-->
				</div>
				<h4>Pregunta Nº <?php echo PREGUNTA_ACTUAL;?></h4>
				<div class="">
					<p class="pregunta">Venezuela limita por el norte con el Mar Caribe, ¿En cual oceano se encuentra dicho Mar?</p>
				</div>
				<div class="Quinto">
					<div class="Quinto_2">
						<p id="respuesta_a" class="efecto" onclick="llamar_sombrear_01a(); setTimeout(llamar_puntaje,200);">Atlántico.</p><!-- llamar_puntaje() se encuentra en puntaje.js -->
						<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Pacífico.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
					</div>
					<div class="Quinto_2">
						<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Índico.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
						<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Caribeño.</p><!-- llamar_bloqueo() se encuentra en bloqueo.js -->
					</div>

				</div>

				<div class="respuestaPreguntas" id="RespuestaPreguntas"><!--con el id recibe informacion desde ajax-->
					<div id="Temporizador_2">
						<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta, el tiempo maximo para responder y se muestra un temporizador en pantalla-->
						<?php include("../../controlador/Temporizador_2.php");?>
					</div>
				</div>						
				<nav class="navegacion_1">
					<a class="nav_7" href="../../controlador/entrada.php" class="">Inicio</a>
					<a class="nav_7" href="../../controlador/cerrarSesion.php">Cerrar Sesión</a>
					<a class="nav_7" href="preguntaVenezuela_02.php">Siguiente</a>
				</nav>
		</div>		
	</body>
</html>

<script>
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
        // else{
        //     alert("Instancia creada exitosamente ok");
        // }
        return http_request;
    } 
function llamar_sombrear_01a(){
	var A= document.getElementById("respuesta_a");
	A.style.color="white";

    var aleatorio = parseInt(Math.random()*999999999);
    E=document.getElementById("ID_Participante").value;//se toma el ID_Participante desde este mismo archivo.
    F=document.getElementById("Tema").value;//se toma el nombre del libro desde este mismo archivo.
    G=document.getElementById("Pregunta_Num").value;//se toma el numero de la pregunta desde este mismo archivo.
    H=document.getElementById("ID_PP").value;//se toma el ID de la prueba.
    var url="respuesta.php?val_1=" + E  + "&val_2=" + F + "&val_3=" + G + "&val_4=" + H + "&r=" + aleatorio;
    http_request.open('GET',url,false);     
    peticion.onreadystatechange = respuesta_sombrear_01a;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           

function respuesta_sombrear_01a(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('RespuestaPreguntas').innerHTML=peticion.responseText;//se recoje el numero de pacientes
        } 
        // else{
        //     alert('Hubo problemas con la petición.');
        // }
    }
}
</script>

	<?php
			}
		?>