<?php
	include("../conexion/Conexion_BD.php");
	
	$participante= $_GET["val_3"];//recibe el ID_Participante desde bloqueo.js
	$Tema= $_GET["val_4"];//recibe el nombre del Tema desde bloqueo.js
	$Pregunta= $_GET["val_5"];//recibe el ID_Pregunta desde bloqueo.js
	$CodigoPrueba= $_GET["val_6"];//recibe el ID_Pregunta desde bloqueo.js

	// echo "ID_Participante= " . $participante . "<br>";//Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax 
	// echo "Tema de la prueba= " .  $Tema . "<br>"; //Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax 
	// echo "ID_Pregunta= " . $Pregunta . "<br>"; //Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax realizada en ese archivo
	// echo "Codigo de prueba= " . $CodigoPrueba . "<br>";

			//se consulta que tipo de respuesta tiene esta pregunta
			$Consulta= "SELECT * FROM respuestas WHERE ID_Participante= '$participante' AND ID_Pregunta='$Pregunta' AND Tema= '$Tema' AND ID_PP ='$CodigoPrueba' ORDER BY ID_Respuesta DESC LIMIT 1";
	    	$Recordset= mysqli_query($conexion,$Consulta);
		    $Verificar= mysqli_fetch_array($Recordset);
			// echo $Verificar["Correcto"];
			
			//si existe una respuesta incorrecta para esta pregunta.
		    if($Verificar["Correcto"] == "0"){
				//Se restan 2.25 puntos por cada bloqueo.
				$Castigo=2.25;
				$Restar="UPDATE participantes_pruebas SET Puntos= (Puntos - $Castigo) WHERE ID_Participante='$participante' AND ID_PP ='$CodigoPrueba' ";
				mysqli_query($conexion,$Restar);

		  //   	//se inserta en la BD que el participante respondio incorrectamente nuevamente
				$insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Correcto, Hora_Respuesta) VALUES('$Pregunta', '$participante','$CodigoPrueba', '$Tema', 0, NOW())";
				mysqli_query($conexion,$insertar);
	
				echo "<h3>Nuevamente su respuesta fue equivocada, sera penalizado con 2,25 centesimas de sus puntos</h3>";
				//echo "<h3>La cookie de bloqueo no esta en tiempo de ejecucón.</h3>";
				//echo "<h3>No hay registro en la BD.</h3>";
				//echo "<h3>Se crea la cookie de bloqueo</h3>";
				//echo "<h3>opcion 2</h3>";
			}
			else if($Verificar["Correcto"] == "Sin_Respuesta"){//si no se habia respondido esta pregunta
				//Se restan 2.25 puntos por cada bloqueo.
				$Castigo=2.25;
				$Restar="UPDATE participantes_pruebas SET Puntos= (Puntos - $Castigo) WHERE ID_Participante='$participante' AND ID_PP ='$CodigoPrueba'";
				mysqli_query($conexion,$Restar);

		  //   	//se inserta en la BD que el participante respondio incorrectamente
				// $insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Correcto, Hora_Respuesta) VALUES('$Pregunta', '$participante','$CodigoPrueba', '$Tema', 0 NOW())";
				// mysqli_query($conexion,$insertar);

				//se actualiza en la BD la hora a la que responido la pregunta
				$Actualizar_5= "UPDATE respuestas SET correcto = 0, Hora_Respuesta = NOW() WHERE ID_Participante='$participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
				mysqli_query($conexion,$Actualizar_5);

			 	echo "<h3>Su respuesta fue equivocada, será penalizado con 2,25 centesimas de sus puntas.</h3>";
			}	
			else if($Verificar["Correcto"] == 1){// si existe una respuesta correcta
				echo "<h3>Anteriormente usted respondio correctamente esta pregunta, pero ahora se ha equivocado, no tomaremos en cuenta su equivocación</h3>";
			}	
?>
			<!-- Se refresca la pagina -->
			<a class="bloqueo" href="javascript:history.go(0)">Nuevo intento</a>