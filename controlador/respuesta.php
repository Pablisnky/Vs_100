<?php
session_start();

	$Participante = $_GET["val_1"];//se recibe el ID_Participante desde pregunta.php
	$Tema = $_GET["val_2"];//se recibe el nombre del Tema desde pregunta.php
	$Pregunta = $_GET["val_3"];//se recibe el numero de la pregunta desde pregunta.php
	$CodigoPrueba =  $_GET["val_4"];//se recibe el ID de la prueba desde pregunta.php
	$Puntaje= $_SESSION["Puntos"];//creada en posicionReavivadosPalabra.php
	// echo "ID_Participante= " . $Participante . "<br>";
	// echo "Tema= " . $Tema . "<br>";
	//  echo "Pregunta= " . $Pregunta . "<br>";
	//  echo "Codigo prueba= " . $CodigoPrueba . "<br>";

	$Aleatorio_1= $_SESSION["Preguna_1"];//Sesion creada en posicionReavivadosPalabra.php
	$Aleatorio_2= $_SESSION["Preguna_2"];//Sesion creada en posicionReavivadosPalabra.php
	$Aleatorio_3= $_SESSION["Preguna_3"];//Sesion creada en posicionReavivadosPalabra.php
	$Aleatorio_4= $_SESSION["Preguna_4"];//Sesion creada en posicionReavivadosPalabra.php
	$Aleatorio_5= $_SESSION["Preguna_5"];//Sesion creada en posicionReavivadosPalabra.php

	// echo "El indice cero del array es= " . $_SESSION["Preguna_1"] . "<br>";
	// echo "El indice uno del array es= " . $_SESSION["Preguna_2"] . "<br>";
	// echo "El indice dos del array es= " . $_SESSION["Preguna_3"] . "<br>";
	// echo "El indice tres del array es= " . $_SESSION["Preguna_4"] . "<br>";
	// echo "El indice cuatro del arra es= " . $_SESSION["Preguna_5"] . "<br>";
	include("../conexion/Conexion_BD.php");

	//consulta para verificar si existe una respuesta correcta en la pregunta
	$Consulta= "SELECT * FROM respuestas WHERE ID_Pregunta='$Pregunta' AND ID_Participante= '$Participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba' ORDER BY ID_Respuesta DESC LIMIT 1";
	$Recordset= mysqli_query($conexion,$Consulta);
	$Verificar= mysqli_fetch_array($Recordset);
	// echo $Verificar["Correcto"];
	
		  // ------------------------------------------------------------------------------------
		  // ------------------------------------------------------------------------------------
		    //Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional colombiana
		    date_default_timezone_set('America/Bogota');
		    $HoraServidorPHP =date("Y-m-d  H:i:s");
		    //echo "Hora PHP de respuesta" . $HoraServidorPHP . "<br>";

		    //Cuando se trabaje en local se utiliza la funcion NOW() de mysql
		  // -------------------------------------------------------------------------------------
		  // -------------------------------------------------------------------------------------
	
	//si existe una respuesta correcta en la base de datos.
	if(($Verificar["Correcto"]) == "1"){ 
		echo "<h3 class='bloqueo_2'>Su repuesta es correcta, pero no sumará puntos porque ya respondio esta pregunta</h3>";
	}
	else if(($Verificar["Correcto"]) == "Sin_Respuesta"){
		// se actualiza la hora de respuesta a la BD
		$Actualizar_4="UPDATE respuestas SET Hora_Respuesta= '$HoraServidorPHP' WHERE ID_Participante='$Participante' AND Tema='$Tema' AND ID_Pregunta='$Pregunta' AND ID_PP = '$CodigoPrueba' ORDER BY ID_Respuesta DESC LIMIT 1";
		mysqli_query($conexion, $Actualizar_4);

		//se verifica si el tiempo de respuesta esta vencido
		$Consulta_3="SELECT HoraMaximo FROM respuestas WHERE ID_Participante='$Participante' AND Tema='$Tema' AND ID_Pregunta='$Pregunta' AND ID_PP = '$CodigoPrueba'";
		$Recordset_3= mysqli_query($conexion,$Consulta_3);
	   	$Verificar= mysqli_fetch_array($Recordset_3);
	   	$Verificar["HoraMaximo"];
	   	$HM= $Verificar["HoraMaximo"];//hora limite de respuesta, despues de esta hora no sumará puntos
	   	// echo "Hora maxima que tiene el participante para responder= " . $HM . "<br>";

		//se consulta la hora de respuesta almacenada en la BD
		$Consulta_4="SELECT Hora_Respuesta FROM respuestas WHERE ID_Participante='$Participante' AND Tema='$Tema' AND ID_Pregunta='$Pregunta' AND ID_PP = '$CodigoPrueba'";
		$Recordset_4= mysqli_query($conexion,$Consulta_4);
	   	$Verificar= mysqli_fetch_array($Recordset_4);
	   	$Verificar["Hora_Respuesta"];//Hora en la que el participante respondio
	   	// echo "Hora en la que el participante respondio= " . $Verificar["Hora_Respuesta"] . "<br>";

	   	if($HM < $Verificar["Hora_Respuesta"]){
			echo "<h3 class='bloqueo_2'>Correcto, desafortunadamente no sumará puntos por tiempo vencido </h3>";
			?>
				<iframe src="../grafico/Grafico_Respuestas.php" 
					marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="no" border="0" 
						frameborder="0" height="300">
				</iframe> 
				<audio autoplay src="../audio/Grafico.mp3" loop></audio>
			<?php
			//se actualiza en la BD la hora a la que responido la pregunta
			$Actualizar_4= "UPDATE respuestas SET correcto = 1, Hora_Respuesta = '$HoraServidorPHP' WHERE ID_Participante='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
			mysqli_query($conexion,$Actualizar_4);
		}
		else{
			echo "<h3 class='bloqueo_2'>" . "Correcto" . "<br>" .  $_SESSION['Versiculo'] . "<br>" . "</h3>";
			//Se inserta el numero del versiculo por medio de sesion creada en cada pregunta
			// echo "<h3 class='bloqueo_2'>"  . $_SESSION['Versiculo'] . "</h3>";
			//Se destruye la session creada en cada pregunta, para que vuelva a ser creada en la proxima pregunta
			unset($_SESSION["Versiculo"]);

			//se actualiza en la BD la hora a la que respondio la pregunta
			$Actualizar_5= "UPDATE respuestas SET correcto = 1, Hora_Respuesta = '$HoraServidorPHP' WHERE ID_Participante='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
			mysqli_query($conexion,$Actualizar_5);

			include("prorroteoPuntos.php");	?>
			<iframe  src="../grafico/Grafico_Respuestas.php" marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="no" border="0" frameborder="0" height="300">
			</iframe> 	
			<audio autoplay src="../audio/Grafico.mp3" loop></audio>
			<?php
		}
	}
	else{//Solo queda el caso de que Correcto == 0
		//Se consulta la hora en la que se realizó la pregunta para introducirlo nuevamente en la consulta $insertar
		$Hora_Pregunta= $Verificar["Hora_Pregunta"];

		echo "<h3 class='bloqueo_3'>" . "Su repuesta es correcta, pero no sumará puntos porque anteriormente falló en su respuesta" . "<br>" . $_SESSION['Versiculo'] . "<br>" . "</h3>";
		
		$insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Correcto, Hora_Pregunta, Hora_Respuesta) VALUES('$Pregunta', '$Participante', '$CodigoPrueba', '$Tema', 1, '$Hora_Pregunta', '$HoraServidorPHP')";
		mysqli_query($conexion, $insertar);
	}	
	
	//Se inserta la pregunta que le toco de las 12 formuladas, solo si anterioremnete se habia equivocado.
		
		if($Puntaje==0){
			$Puntuar= "UPDATE respuestas SET Num_Pregunta_Alea= $Aleatorio_1 WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba' AND ID_Pregunta= '$Pregunta'";
			mysqli_query($conexion, $Puntuar);
		}
		else if ($Puntaje==1){
			$Puntuar_1= "UPDATE respuestas SET Num_Pregunta_Alea= $Aleatorio_2 WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba' AND ID_Pregunta= '$Pregunta'";
			mysqli_query($conexion, $Puntuar_1);
		}
		else if ($Puntaje==2){
			$Puntuar_2= "UPDATE respuestas SET Num_Pregunta_Alea= $Aleatorio_3 WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba' AND ID_Pregunta= '$Pregunta'";
			mysqli_query($conexion, $Puntuar_2);
		}
			else if ($Puntaje==3){
			$Puntuar_3= "UPDATE respuestas SET Num_Pregunta_Alea= $Aleatorio_4 WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba' AND ID_Pregunta= '$Pregunta'";
			mysqli_query($conexion, $Puntuar_3);
		}
		else if ($Puntaje==4){
			$Puntuar_4= "UPDATE respuestas SET Num_Pregunta_Alea= $Aleatorio_5 WHERE ID_Participante='$Participante' AND ID_PP = '$CodigoPrueba' AND ID_Pregunta= '$Pregunta'";
			mysqli_query($conexion, $Puntuar_4);
		}
?>