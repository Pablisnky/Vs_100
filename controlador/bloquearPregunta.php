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


		  // ------------------------------------------------------------------------------------------------------
		  // -------------------------------------------------------------------------------------------------------
		    //Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional colombiana
		    date_default_timezone_set('America/Bogota');
		    $HoraServidorPHP =date("Y-m-d  H:i:s");
		    // echo "Hora PHP de respuesta" . $HoraServidorPHP . "<br>";

		    //CUando se trabaje en local se utiliza la funcion NOW() para introducir la hora respuesta de mysql
		  // -----------------------------------------------------------------------------------------
		  // -----------------------------------------------------------------------------------------

			//se consulta que tipo de respuesta tiene esta pregunta
			$Consulta= "SELECT * FROM respuestas WHERE ID_Participante= '$participante' AND ID_Pregunta='$Pregunta' AND Tema= '$Tema' AND ID_PP ='$CodigoPrueba' ORDER BY ID_Respuesta DESC LIMIT 1";
	    	$Recordset= mysqli_query($conexion,$Consulta);
		    $Verificar= mysqli_fetch_array($Recordset);
			// echo $Verificar["Correcto"];

			//Se restan 2.25 puntos por cada bloqueo.
			$Castigo=2.25;
			$puntoDescontado= -2.25;
			
			//si existe una respuesta incorrecta para esta pregunta.
		    if($Verificar["Correcto"] == "0"){
		    	//Se consulta la hora en la que se realizó la pregunta para introducirlo nuevamente en la consulta $insertar
		    	$Hora_Pregunta= $Verificar["Hora_Pregunta"];

				$Restar="UPDATE participantes_pruebas SET Puntos= (Puntos - $Castigo) WHERE ID_Participante='$participante' AND ID_PP ='$CodigoPrueba' ";
				mysqli_query($conexion,$Restar);

		     	//se inserta en la BD que el participante respondio incorrectamente nuevamente
				$insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Correcto, Hora_Pregunta, Hora_Respuesta, puntoGanado) VALUES('$Pregunta', '$participante','$CodigoPrueba', '$Tema', 0, '$Hora_Pregunta', '$HoraServidorPHP', '$puntoDescontado' )";
				mysqli_query($conexion, $insertar);
	
				echo "<h3 class='bloqueo_2'>Nuevamente su respuesta fue equivocada, sera penalizado con 2,25 centesimas de sus puntos</h3>";
				//echo "<h3>La cookie de bloqueo no esta en tiempo de ejecucón.</h3>";
				//echo "<h3>No hay registro en la BD.</h3>";
				//echo "<h3>Se crea la cookie de bloqueo</h3>";
				//echo "<h3>opcion 2</h3>";
			}
			else if($Verificar["Correcto"] == "Sin_Respuesta"){//si no se habia respondido esta pregunta
				//Se restan 2.25 puntos por cada bloqueo.
				$Restar="UPDATE participantes_pruebas SET Puntos= (Puntos - $Castigo) WHERE ID_Participante='$participante' AND ID_PP ='$CodigoPrueba'";
				mysqli_query($conexion,$Restar);

		  //   	//se inserta en la BD que el participante respondio incorrectamente
				// $insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Correcto, Hora_Respuesta) VALUES('$Pregunta', '$participante','$CodigoPrueba', '$Tema', 0 NOW())";
				// mysqli_query($conexion,$insertar);

				//se actualiza en la BD la hora a la que respondio la pregunta
				$Actualizar_5= "UPDATE respuestas SET correcto = 0, Hora_Respuesta = '$HoraServidorPHP',  puntoGanado= '$puntoDescontado' WHERE ID_Participante='$participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
				mysqli_query($conexion,$Actualizar_5);

			 	echo "<h3 class='bloqueo_2'>Respuesta incorrecta, será penalizado con  2,25 centesimas de sus puntos.</h3>";
			}	
			else if($Verificar["Correcto"] == 1){// si existe una respuesta correcta
				echo "<h3>Anteriormente usted respondio correctamente esta pregunta, pero ahora se ha equivocado, no tomaremos en cuenta su equivocación</h3>";
			}	
	?>
			<!-- Se refresca la pagina -->
			<div class="contenedor_6" id="Flecha">
				<a  href='javascript:history.go(0)'><span class="icon-arrow-up parpadea" title="Siguiente"></span></a>					
			</div>
