 <?php
    include("../conexion/Conexion_BD.php");
    
	//se recibe datos desde Funciones_Ajax.js
	$ID_ParticipanteTrivia= $_GET["val_4"];
	$ID_Pregunta= $_GET["val_5"];
	$ID_PTD= $_GET["val_6"];
 
	// echo "ID_ParticipanteTrivia= " .  $ID_ParticipanteTrivia . "<br>"; //Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax 
	// echo "ID_Pregunta= " . $ID_Pregunta . "<br>";//Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax
	// echo "ID_PTD= " . $ID_PTD . "<br>"; //Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax realizada en ese archivo

	// -----------------------------------------------------------------------------------------
	// -----------------------------------------------------------------------------------------
	//Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional colombiana
	date_default_timezone_set('America/Bogota');
	$HoraServidorPHP =date("Y-m-d  H:i:s");
	// echo "Hora servidor PHP" . $HoraServidorPHP . "<br>";

	//Cuando se trabaje en local se utiliza la funcion NOW() para introducir la hora respuesta de mysql
	// -----------------------------------------------------------------------------------------
	// -----------------------------------------------------------------------------------------

	//se consulta que tipo de respuesta tiene esta pregunta
	$Consulta= "SELECT * FROM respuestas_trivias WHERE ID_Pregunta='$ID_Pregunta' AND ID_PTD ='$ID_PTD' AND ID_ParticipanteTrivia = $ID_ParticipanteTrivia";
   	$Recordset= mysqli_query($conexion, $Consulta);
    $Verificar= mysqli_fetch_array($Recordset);
	 // echo $Verificar["Correcto"];

	//Se restan 2.25 puntos por cada bloqueo.
	$Castigo=2.25;
	$puntoDescontado= -2.25;
			
	//si existe una respuesta incorrecta para esta pregunta.
    if($Verificar["Correcto"] == "0"){
	   	//Se consulta la hora en la que se realizó la pregunta para introducirlo nuevamente en la consulta $insertar
	   	$Hora_Pregunta= $Verificar["Hora_Pregunta"];

		$Restar="UPDATE participante_trivia SET puntos= (puntos - $Castigo) WHERE ID_ParticipanteTrivia ='$ID_ParticipanteTrivia'";
		mysqli_query($conexion,$Restar);

		//se inserta en la BD que el participante respondio incorrectamente nuevamente
		$insertar= "INSERT INTO respuestas_trivias(ID_ParticipanteTrivia, ID_Pregunta, ID_PTD, Correcto, Hora_Pregunta, Hora_Respuesta, punto_ganado) VALUES('$ID_ParticipanteTrivia','$ID_Pregunta', '$ID_PTD', 0, '$Hora_Pregunta', '$HoraServidorPHP', '$puntoDescontado')";
		mysqli_query($conexion,$insertar);
		
		echo "<h3>Nuevamente su respuesta fue equivocada, sera penalizado con 2,25 centesimas de sus puntos</h3>";
	}
	else if($Verificar["Correcto"] == "Sin_Respuesta"){//si no se habia respondido esta pregunta
		$Restar="UPDATE participante_trivia SET puntos= (puntos - $Castigo) WHERE ID_ParticipanteTrivia ='$ID_ParticipanteTrivia'";
		mysqli_query($conexion,$Restar);

		//se inserta en la BD que el participante respondio incorrectamente
		// $insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PTD, Tema, Correcto, Hora_Respuesta) VALUES('$Pregunta', '$participante','$ID_PTD', 0 $HoraServidorPHP)";
		// mysqli_query($conexion,$insertar);

		//se actualiza en la BD la hora a la que respondio la pregunta
		$Actualizar_5= "UPDATE respuestas_trivias SET correcto = 0, Hora_Respuesta = '$HoraServidorPHP', punto_ganado= '$puntoDescontado'  WHERE ID_Pregunta='$ID_Pregunta'  AND ID_PTD = '$ID_PTD' AND ID_ParticipanteTrivia = $ID_ParticipanteTrivia";
		mysqli_query($conexion,$Actualizar_5);

		echo "<h3>Su respuesta fue equivocada, será penalizado con 2,25 centesimas de sus puntos.</h3>";
	}	
	else if($Verificar["Correcto"] == 1){// si existe una respuesta correcta
		echo "<h3>Anteriormente usted respondio correctamente esta pregunta, pero ahora se ha equivocado, no tomaremos en cuenta su equivocación</h3>";
	}
?>
	<!-- Se refresca la pagina -->
	<a class="bloqueo" href="javascript:history.go(0)">Nuevo intento</a> 
	<!-- <a class="bloqueo" href="javascript:void(document.getElementById('RespuestaPreguntas').style.display='none')">Nuevo intento</a> -->