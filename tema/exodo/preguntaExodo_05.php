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
		<script src="../../javascript/Funciones_varias.js"></script>

		<style>
      		@import url('https://fonts.googleapis.com/css?family=Lato|Raleway:400|Montserrat|Indie+Flower');
    	</style> 
	</head>	
	<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->
		
		<div id="Horapregunta"></div>
		<?php
			include("../../conexion/Conexion_BD.php");
		    mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

	    	$participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
    		//echo $participante;
    		$_SESSION["Libro"] = "Exodo";//se crea la SESION libro, necesaria en Temporizador_2.
    		$_SESSION["Pregunta"] = 15;//se crea la SESION pregunta, necesaria en Temporizador_2	

	    	//Consulta realizada para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";
			$Recordset = mysqli_query($conexion,$Consulta);
			$Participante= mysqli_fetch_row($Recordset);
		?>

			<input type="text" class="ocultar" id="Libro" hidden value="Exodo">
			<input type="text" class="ocultar" id="ID_Pregunta" hidden value= "15">
			<input type="text" class="ocultar" id="ID_Participante" hidden value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
		<?php
			//Consulta realizada para verificar que la pregunta anterior esta respondida y puede entrar en esta.
			$Consulta_3="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND ID_Pregunta = 14";
			$Recordset_3 = mysqli_query($conexion,$Consulta_3);
			$Respondida= mysqli_num_rows($Recordset_3);//se suman los registros que tiene la consulta realizada.
			//echo $Respondida;	

	    	if($Respondida>0){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php
	    ?>

		<div class="Secundario">
			<div class="encabezado">
	    		<h1 class="anula">BIBLIONARIO<span class="nombre">por Pablo Cabeza</span></h1>
	    	</div>
	    	<div class="encabezado_2">
	  			<p class="p_1"><?php echo $Participante[2]; ?></p>
			    <div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
			    <p class="p_1">puntos.</p>
			</div>

			<h4>Pregunta Nº 15</h4>
			<div class="pregunta">
				<p>¿Cuando Moises estaba en Madián, quien le dijo que regresara a Egipto porque ya habían muerto todos los que querían matarle</p>
			</div>
			<div class="Quinto">
				<ul>
					<li id="principiantes_05a" class="efecto" onclick="cerrar(); sombrear_05a(); llamar_bloqueo()">Sefora.</li>
					<li id="principiantes_05b" class="efecto" onclick="cerrar(); sombrear_05b(); llamar_bloqueo()">Aaron.</li>
					<li id="principiantes_05c" class="efecto" onclick="cerrar(); sombrear_05c(); llamar_bloqueo()">Un egipcio.</li>
					<li id="principiantes_05d" class="efecto" onclick="cerrar(); llamar_sombrear_05d(); setTimeout(llamar_puntaje,200);">Dios.</li>
				</ul>
			</div>
			<div class="respuestaPreguntas" id="respuestaPreguntas"></div><!--con el id recibe informacion desde ajax-->
			
				<div id="Temporizador_2" style="text-align: center; font-family: verdana;">
					<?php include("../../Sesiones_Cookies/Temporizador_2.php");?>
				</div>
									
			<nav class="navegacion_1">
				<div class="nav_2"><a class="nav_7" href="../../Sesiones_Cookies/entrada.php" class="">Inicio</a></div>
				<div class="nav_2"><a class="nav_7" href="../../Sesiones_Cookies/cerrarSesion.php">Cerrar Sesión</a></div>
				<div class="nav_2"><a class="nav_7" href="../exodo/preguntaExodo_06.php">Siguiente</a></div>
			</nav>
		</div>
		<aside>
			<!--<img src="../../images/logo_1.png">-->
		</aside>
	</body>
</html>

<script>
function sombrear_05a(){
	var A= document.getElementById("principiantes_05a");
	var B= document.getElementById("principiantes_05b");
	var C= document.getElementById("principiantes_05c");
	var D= document.getElementById("principiantes_05d");
	A.style.backgroundColor="red";
	A.style.color="white";
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

function sombrear_05b(){
	var A= document.getElementById("principiantes_05a");
	var B= document.getElementById("principiantes_05b");
	var C= document.getElementById("principiantes_05c");
	var D= document.getElementById("principiantes_05d");
	A.style.backgroundColor="";
	A.style.color="black";
	B.style.backgroundColor="red";
	B.style.color="white";
	B.style.borderStyle="solid";
	B.style.borderWidth="1px";
	B.style.borderColor="black";
	C.style.backgroundColor="";
	C.style.color="black";
	D.style.backgroundColor="";
	D.style.color="black";
}

function sombrear_05c(){
	var A= document.getElementById("principiantes_05a");
	var B= document.getElementById("principiantes_05b");
	var C= document.getElementById("principiantes_05c");
	var D= document.getElementById("principiantes_05d");
	A.style.backgroundColor="";
	A.style.color="black";
	B.style.backgroundColor="";
	B.style.color="black";
	C.style.backgroundColor="red";
	C.style.color="white";
	C.style.borderStyle="solid";
	C.style.borderWidth="1px";
	C.style.borderColor="black";
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

function llamar_sombrear_05d(){
	var A= document.getElementById("principiantes_05a");
	var B= document.getElementById("principiantes_05b");
	var C= document.getElementById("principiantes_05c");
	var D= document.getElementById("principiantes_05d");
	A.style.backgroundColor="";
	A.style.color="black";
	B.style.backgroundColor="";
	B.style.color="black";
	C.style.backgroundColor="";
	C.style.color="black";
	D.style.color="white";
	
	var aleatorio = parseInt(Math.random()*999999999);
    E=document.getElementById("ID_Participante").value;//se inserta el ID_Participante desde este mismo archivo.
    F=document.getElementById("Libro").value;//se inserta el nombre del libro desde este mismo archivo.
    var url="respuestaExodo_05.php?val_1=" + E  + "&val_2=" + F + "&r=" + aleatorio;
    http_request.open('GET',url,false);     
    peticion.onreadystatechange = respuesta_sombrear_05d;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                                                           
function respuesta_sombrear_05d(){
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
					<p>No ha respondido correctamente la pregunta Nº 14, debe dar una respuesta correcta</p>
				</div>
				<br>
				<nav class="navegacion">
					<div class="nav_2"><a href="preguntaExodo_04.php">Volver</a></div>
				</nav>		
			</div>
			<aside>
				<!--<img src="../../images/logo_1.png">-->
			</aside>

		<?php
			}}
		?>