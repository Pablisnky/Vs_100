<?php
	$Participante = $_GET["val_1"];//se recibe el ID_Participante desde preguntaXxxx.php
	$Tema = $_GET["val_2"];//se recibe el nombre del Tema desde preguntaXxxx.php
	$Pregunta = $_GET["val_3"];//se recibe el numero de la pregunta desde preguntaXxxx.php
	$CodigoPrueba =  $_GET["val_4"];//se recibe el ID de la prueba desde preguntaXxxx.php
	// echo "ID_Participante= " . $Participante . "<br>";
	// echo "Tema= " . $Tema . "<br>";
	// echo "Pregunta= " . $Pregunta . "<br>";
	// echo "Codigo prueba= " . $CodigoPrueba . "<br>";

	include("../../conexion/Conexion_BD.php");
		
// ---------------------------------------------------------------------------------------------------	
// ---------------------------------------------------------------------------------------------------	
// Se decidio insertar la hora de respuesta por medio de la BD con la funcion NOW()	
	
	// // se configura el sistema para que trabaje con la hora nacional.
	// date_default_timezone_set('America/Bogota');
	// $horaPHP = date("Y-m-d  H:i:s");
					
	// // Se corrige la hora del servidor PHP local
	// $salto_horario_PHPLocal = -0.5 * 60 * 60;//se restan 30 minutas, porque el servidor PHPLocal esta adelantado
	// $horaPHPlocal = date("Y-m-d  H:i:s", time()  + $salto_horario_PHPLocal);

// ---------------------------------------------------------------------------------------------------	
// ---------------------------------------------------------------------------------------------------

	//consulta para verificar si existe una respuesta correcta en la pregunta
	$Consulta= "SELECT * FROM respuestas_demo WHERE ID_Pregunta='$Pregunta' AND ID_Participante= '$Participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba' ORDER BY ID_Respuesta DESC LIMIT 1";
	$Recordset= mysqli_query($conexion,$Consulta);
	$Verificar= mysqli_fetch_array($Recordset);
	// echo $Verificar["Correcto"];
	
	//si existe una respuesta correcta en la base de datos.
	if(($Verificar["Correcto"]) == 1){ 
		echo "<h3>Su repuesta es correcta, pero no sumará puntos porque ya respondio esta pregunta</h3>";
	}
	else if(($Verificar["Correcto"]) == "Sin_Respuesta"){
		// se actualiza la hora de respuesta a la BD
		$Actualizar_4="UPDATE respuestas_demo SET Hora_Respuesta= NOW() WHERE ID_Participante='$Participante' AND Tema='$Tema' AND ID_Pregunta='$Pregunta' AND ID_PP = '$CodigoPrueba' ORDER BY ID_Respuesta DESC LIMIT 1";
		mysqli_query($conexion, $Actualizar_4);

		//se verifica si el tiempo de respuesta esta vencido
		$Consulta_3="SELECT HoraMaximo FROM respuestas_demo WHERE ID_Participante='$Participante' AND Tema='$Tema' AND ID_Pregunta='$Pregunta' AND ID_PP = '$CodigoPrueba'";
		$Recordset_3= mysqli_query($conexion,$Consulta_3);
	   	$Verificar= mysqli_fetch_array($Recordset_3);
	   	$Verificar["HoraMaximo"];
	   	$HM= $Verificar["HoraMaximo"];//hora limite de respuesta, despues de esta hora no sumará puntos
	   	// echo "Hora maxima que tiene el participante para responder= " . $HM . "<br>";

		//se consulta la hora de respuesta almacenada en la BD
		$Consulta_4="SELECT Hora_Respuesta FROM respuestas_demo WHERE ID_Participante='$Participante' AND Tema='$Tema' AND ID_Pregunta='$Pregunta' AND ID_PP = '$CodigoPrueba'";
		$Recordset_4= mysqli_query($conexion,$Consulta_4);
	   	$Verificar= mysqli_fetch_array($Recordset_4);
	   	$Verificar["Hora_Respuesta"];//Hora en la que el participante respondio
	   	// echo "Hora en la que el participante respondio= " . $Verificar["Hora_Respuesta"] . "<br>";

	   	if($HM < $Verificar["Hora_Respuesta"]){
			// echo "<h3>Correcto, desafortunadamente no sumará puntos por tiempo vencido </h3>";

			//se actualiza en la BD la hora a la que responido la pregunta
			$Actualizar_4= "UPDATE respuestas_demo SET correcto = 1, Hora_Respuesta = NOW() WHERE ID_Participante='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
			mysqli_query($conexion,$Actualizar_4);
		}
		else{
			echo "<h3>Correcto. Felicitaciones</h3>";
			//se actualiza en la BD la hora a la que respondio la pregunta
			$Actualizar_5= "UPDATE respuestas_demo SET correcto = 1, Hora_Respuesta = NOW() WHERE ID_Participante='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
			mysqli_query($conexion,$Actualizar_5);

			include("prorroteoPuntos_Demo.php");								
		}
	}
	else{
		echo "<h3>Su repuesta es correcta, pero no sumará puntos porque antes respondio erradamente</h3>";
		$insertar= "INSERT INTO respuestas_demo(ID_Pregunta, ID_Participante, ID_PP, Tema, Correcto, Hora_Respuesta) VALUES('$Pregunta', '$Participante', '$CodigoPrueba', '$Tema', 1, NOW())";
		mysqli_query($conexion,$insertar);
	}	  ?>