<?php   
session_start(); //se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

 	if(!isset($_SESSION["Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a index.html
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.html");			
	}

	else{
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Biblionario</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas biblicas."/>
		<meta name="keywords" content="citas biblicas, biblia"/>
		<meta name="author" content="Pablo Cabeza"/>

		<link rel="stylesheet" type="text/css" href="../../css/EstilosBiblionario.css"/>
		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower');
    	</style> 
	</head>	
	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->
		<?php

			include("../../conexion/Conexion_BD.php");
		    mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente
		    
	    	$participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, variable sesion creada en validarSesion.php
	    	//echo $participante;		

	    	//Consulta realizada para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";
			$Recordset = mysqli_query($conexion,$Consulta);
			$Participante= mysqli_fetch_row($Recordset);

			//Consulta realizada para obtener el puntaje del participante 
			$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1'";
			$Recordset = mysqli_query($conexion,$Consulta);
			$PuntajeSiguiente= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
		?>
			
			<input type="text" class="ocultar" id="Libro" hidden value="Exodo">
			<input type="text" class="ocultar" id="ID_Pregunta" hidden value= "17">
			<input type="text" class="ocultar" id="ID_Participante" hidden value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
		<?php

	    	if($PuntajeSiguiente>5){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, varible %_SESSION creada en PosicionExodo.php,

	    ?>
		<div class="Secundario">
			<div class="encabezado">
	    		<h1>BIBLIONARIO<span class="nombre">por Pablo Cabeza</span></h1>
	    	</div>
	    	<div class="encabezado_2">
	  			<p class="p_1"><?php echo $Participante[2]; ?></p>
			    <div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
			    <p class="p_1">puntos.</p>
			</div>

			<h4>Pregunta Nº 17</h4>
			<div class="pregunta">
				<p>¿Cuando Pablo les escribe a los romanos, les dice que tiene muchos deseos de verlos para impartirles:?</p>
			</div>
			<div class="Quinto">
				<ul>
					<li id="principiantes_07a" class="efecto" onclick="sombrear_07a(); llamar_bloqueo()">El evangelio de Cristo.</li>
					<li id="principiantes_07b" class="efecto" onclick="sombrear_07b(); llamar_bloqueo()">Un Don espiritual.</li>
					<li id="principiantes_07c" class="efecto" onclick="sombrear_07c(); llamar_bloqueo()">Clase de armar tiendas .</li>
					<li id="principiantes_07d" class="efecto" onclick="llamar_sombrear_07d(); setTimeout(llamar_puntaje,200);">Como llego a ser cristiano.</li>
				</ul>
			</div>
			<div class="respuestaPreguntas" id="respuestaPreguntas"></div><!--con el id recibe informacion desde ajax-->
			<nav class="navegacion">
				<div class="nav_2"><a  href="../../Sesiones_Cookies/entrada.php" class="">Inicio</a></div>
				<div class="nav_2"><a href="../../Sesiones_Cookies/cerrarSesion.php">Cerrar Sesión</a></div>
				<div class="nav_2"><a  href="../exodo/preguntaExodo_08.php">Siguiente</a></div>
			</nav>
		</div>
		<aside>
			<!--<img src="../../images/logo_1.png">-->
		</aside>
	</body>
</html>

<script>
function sombrear_07a(){
	var A= document.getElementById("principiantes_07a");
	var B= document.getElementById("principiantes_07b");
	var C= document.getElementById("principiantes_07c");
	var D= document.getElementById("principiantes_07d");
	A.style.backgroundColor="red";
	A.style.color="black";
	A.style.borderStyle="solid";
	A.style.borderWidth="1px";
	A.style.borderColor="black";
	B.style.backgroundColor="";
	B.style.color="black";
	C.style.backgroundColor="";
	C.style.color="black";
	D.style.backgroundColor="";
	D.style.color="black";
}

function sombrear_07b(){
	var A= document.getElementById("principiantes_07a");
	var B= document.getElementById("principiantes_07b");
	var C= document.getElementById("principiantes_07c");
	var D= document.getElementById("principiantes_07d");
	A.style.backgroundColor="";
	A.style.color="black";
	B.style.backgroundColor="red";
	B.style.color="black";
	C.style.backgroundColor="";
	C.style.color="black";
	D.style.backgroundColor="";
	D.style.color="black";
}

function sombrear_07c(){
	var A= document.getElementById("principiantes_07a");
	var B= document.getElementById("principiantes_07b");
	var C= document.getElementById("principiantes_07c");
	var D= document.getElementById("principiantes_07d");
	A.style.backgroundColor="";
	A.style.color="black";
	B.style.backgroundColor="";
	B.style.color="black";
	C.style.backgroundColor="red";
	C.style.color="black";
	D.style.backgroundColor="";
	D.style.color="black";
}

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

function llamar_sombrear_07d(){
	var A= document.getElementById("principiantes_07a");
	var B= document.getElementById("principiantes_07b");
	var C= document.getElementById("principiantes_07c");
	A.style.backgroundColor="";
	A.style.color="black";
	B.style.backgroundColor="";
	B.style.color="black";
	C.style.backgroundColor="";
	C.style.color="black";
	
	
	var aleatorio = parseInt(Math.random()*999999999);
    E=document.getElementById("ID_Participante").value;//se inserta el ID_Participante desde este mismo archivo.
    F=document.getElementById("Libro").value;//se inserta el nombre del libro desde este mismo archivo.
    var url="respuestaGenesis_07.php?val_1=" + E  + "&val_2=" + F + "&r=" + aleatorio;
    http_request.open('GET',url,false);     
    peticion.onreadystatechange = respuesta_sombrear_07d;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}
function respuesta_sombrear_07d(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('respuestaPreguntas').innerHTML=peticion.responseText;//se recoje el numero de pacientes
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
			else{
		?>
			<div class="Secundario">
				<div>
		    		<h1>BIBLIONARIO<span class="nombre">por Pablo Cabeza</span></h1>
		    	</div>
				<div class="Cuarto_4">
					<p>No ha respondido correctamente la pregunta Nº 6, debe dar una respuesta correcta</p>
				</div>
				<nav class="navegacion">
					<div class="nav_2"><a href="preguntaExodo_06.php">Volver</a></div>
				</nav>	
			</div>
			<aside>
				<!--<img src="../../images/logo_1.png">-->
			</aside>

		<?php
			}}
		?>