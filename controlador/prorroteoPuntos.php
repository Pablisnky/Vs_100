<?php
	session_start();
	include("../conexion/Conexion_BD.php");

    $Pregunta= $_SESSION["Pregunta"];//sesion creada en preguntaXXXX_00.php (en cada pregunta)
    //echo $Pregunta . "<br>";

  	$Participante= $_SESSION["ID_Participante"];

  	$Tema= $_SESSION["Tema"];//sesion creada en preguntaXXXX_00.php

	$CodigoPrueba= $_SESSION["codigoPrueba"] ;// en esta sesion se tiene guardado el codigo de la prueba
  	
    			//se obtienen los minutos que faltan para dar una respuesta, para esto se necesita HoraMaximo y Hora_Respuesta
  				//Se consulta la hora de HoraMaximo
				$Consulta_2= "SELECT DATE_FORMAT(HoraMaximo, '%H:%i:%s') FROM respuestas WHERE ID_Participante ='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
				$Recordset_3= mysqli_query($conexion,$Consulta_2);
				$Tiempo=  mysqli_fetch_array($Recordset_3);
				$horafin= $Tiempo["DATE_FORMAT(HoraMaximo, '%H:%i:%s')"];
				// echo "Hora final guardada en BD=" . $horafin . "<br>";

				//Se consulta la hora de HoraRespuesta
				$Consulta_5= "SELECT DATE_FORMAT(Hora_Respuesta, '%H:%i:%s') FROM respuestas WHERE ID_Participante ='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
				$Recordset_5= mysqli_query($conexion, $Consulta_5);
				$Tiempo_5=  mysqli_fetch_array($Recordset_5);
				$horaini= $Tiempo_5["DATE_FORMAT(Hora_Respuesta, '%H:%i:%s')"];
				// echo "Hora respuesta guardada en BD=" . $horaini . "<br>";
				
				//Se llama a la funcion que calcula la diferencia entre ambas horas
					$horai=substr($horaini,0,2);
					$mini=substr($horaini,3,2);
					$segi=substr($horaini,6,2);
				 
					$horaf=substr($horafin,0,2);
					$minf=substr($horafin,3,2);
					$segf=substr($horafin,6,2);
				 
					$ini=((($horai*60)*60)+($mini*60)+$segi);
					$fin=((($horaf*60)*60)+($minf*60)+$segf);
				 
					$dif=$fin-$ini;
				 
					$difh=floor($dif/3600);
					$difm=floor(($dif-($difh*3600))/60);
					$difs=$dif-($difm*60)-($difh*3600);
					$TiempoRespuesta= date("H:i:s",mktime($difh,$difm,$difs));		
					// echo "diferencia =" . $TiempoRespuesta;

$TiempoPermitido= "00:01:55";
$Premio= 5.045; //se agregan los 0,045 que se descuentan para que no este un nivel por debao al comenzar el bucle;

// Se convierten los tiempos en segundos
list($horas, $minutos, $segundos) = explode(':', $TiempoPermitido);
$TiempoPermitido_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
// echo "Tiempo permitido= " .  $TiempoPermitido_segundos . "<br>";  

list($horas, $minutos, $segundos) = explode(':', $TiempoRespuesta);
$TiempoRespuesta_segundos = ($horas * 3600 ) + ($minutos * 60 ) + $segundos;
// echo "Tiempo respuesta= " .  $TiempoRespuesta_segundos . "<br>";

echo "<br>";

	if($TiempoRespuesta_segundos >= $TiempoPermitido_segundos){
		$PuntosGanados = 5;
		echo "<h3 class='bloqueo_3_a'>Puntos ganados = "  . $PuntosGanados . "</h3>";
	}
	else if($TiempoRespuesta_segundos < $TiempoPermitido_segundos){
		for($TiempoPermitido_segundos; $TiempoPermitido_segundos >= $TiempoRespuesta_segundos; $TiempoPermitido_segundos-1) {
				$TiempoPermitido_segundos--;
				$Premio= $Premio - 0.04347;
			// echo "Tiempo transcurrido: " . $TiempoPermitido_segundos-- . "<br>";
			// echo "Puntos ganados: " . $Premio= $Premio - 0.045;
			// echo "<br><br>";

			//Se guarda el resultado del ciclo en un array
			$Puntos[] = $Premio;
		}

		//Se solicita el ultimo elemento guardado en el array
		$PuntosGanados= end($Puntos);

		//Se formatean los puntos para que solo tengan tres decimales y se muestre con coma el separador de decimales
		$PuntosFormateados= number_format($PuntosGanados, 3, ",", ".");
		echo "<h3 class='bloqueo_3_a'>Puntos ganados = " . $PuntosFormateados . "</h3>";
	}
	else if($TiempoRespuesta_segundos < 0){
		$PuntosGanados = 0;
		echo "<h3 class='bloqueo_3_a'>Puntos ganados = " .  $PuntosGanados . "</h3>";
	}

	// se introduce en la BD los puntos ganados
	$Sumar="UPDATE participantes_pruebas SET Puntos= (Puntos + $PuntosGanados) WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba'";
	$Puntuar= "UPDATE respuestas SET puntoGanado= $PuntosGanados WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba' AND ID_Pregunta= '$Pregunta'";
	mysqli_query($conexion,$Sumar);
	mysqli_query($conexion, $Puntuar);