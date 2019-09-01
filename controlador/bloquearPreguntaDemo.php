 <?php
	include("../conexion/Conexion_BD.php");
	
	$Tema= $_GET["val_4"];//recibe el nombre del Tema desde bloqueo.js
	$Pregunta= $_GET["val_5"];//recibe el ID_Pregunta desde bloqueo.js
	$ID_PD= $_GET["val_6"];//recibe el ID_Pregunta desde bloqueo.js
 
	// echo "Tema de la prueba= " .  $Tema . "<br>"; //Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax 
	// echo "ID_Pregunta= " . $Pregunta . "<br>";//Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax
	// echo "ID_PD= " . $ID_PD . "<br>"; //Esto se puede ver en preguntaxxxx_00.php porque es una solicitud ajax realizada en ese archivo

		  // ------------------------------------------------------------------------------------------------------
		  // -------------------------------------------------------------------------------------------------------
		    //Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional colombiana
		    date_default_timezone_set('America/Bogota');
		    $HoraServidorPHP =date("Y-m-d  H:i:s");
		    // echo "Hora PHP de respuesta" . $HoraServidorPHP . "<br>";

		    //CUando se trabaje en local se utiliza la funcion NOW() para introducir la hora respuesta de mysql
		  // --------------------------------------------------------------------------------------------
		  // --------------------------------------------------------------------------------------------


	//se consulta que tipo de respuesta tiene esta pregunta
	$Consulta= "SELECT * FROM respuestas_demo WHERE ID_Pregunta='$Pregunta' AND Tema= '$Tema' AND ID_PD ='$ID_PD' ORDER BY ID_Respuesta DESC LIMIT 1";
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

		$Restar="UPDATE participante_demo SET puntos= (puntos - $Castigo) WHERE ID_PD ='$ID_PD'";
		mysqli_query($conexion,$Restar);

		//se inserta en la BD que el participante respondio incorrectamente nuevamente
		$insertar= "INSERT INTO respuestas_demo(ID_Pregunta, ID_PD, Tema, Correcto, Hora_Pregunta, Hora_Respuesta, puntoGanado) VALUES('$Pregunta', '$ID_PD', '$Tema', 0, '$Hora_Pregunta', '$HoraServidorPHP', '$puntoDescontado')";
		mysqli_query($conexion,$insertar);
		?>
			<iframe src="../../grafico/GraficoCol_Respuestas_Demo.php" 
				marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="no" border="0" 
					frameborder="0" height="300">
			</iframe> 
			<audio autoplay src="../../audio/Grafico.mp3" loop></audio>
		<?php
		
		echo "<h3 class='bloqueo_2_b'>Nuevamente su respuesta fue equivocada, sera penalizado con 2,25 centesimas de sus puntos</h3>";
		?>
		<!-- Se refresca la pagina -->
		<div class="contenedor_6" id="Flecha">
			<a  href='javascript:history.go(0)'><span class="icon-arrow-up parpadea" title="Siguiente"></span></a>					
		</div>	<?php
	}
			else if($Verificar["Correcto"] == "Sin_Respuesta"){//si no se habia respondido esta pregunta
				$Restar="UPDATE participante_demo SET puntos= (puntos - $Castigo) WHERE ID_PD ='$ID_PD'";
				mysqli_query($conexion,$Restar);

		  //   	//se inserta en la BD que el participante respondio incorrectamente
				// $insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PD, Tema, Correcto, Hora_Respuesta) VALUES('$Pregunta', '$participante','$ID_PD', '$Tema', 0 $HoraServidorPHP)";
				// mysqli_query($conexion,$insertar);

				//se actualiza en la BD la hora a la que respondio la pregunta
				$Actualizar_5= "UPDATE respuestas_demo SET correcto = 0, Hora_Respuesta = '$HoraServidorPHP', puntoGanado= '$puntoDescontado'  WHERE ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PD = '$ID_PD'";
				mysqli_query($conexion,$Actualizar_5);

				?>
					<iframe src="../../grafico/GraficoCol_Respuestas_Demo.php" 
						marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="no" border="0" 
							frameborder="0" height="300">
					</iframe> 
					<audio autoplay src="../../audio/Grafico.mp3" loop></audio>
				<?php

				 echo "<h3 class='bloqueo_2'>Respuesta incorrecta, fue penalizado con  2,25 centesimas de sus puntos.</h3>";
				 ?>
				 <!-- Se refresca la pagina -->
				 <div class="contenedor_6" id="Flecha">
					 <a  href='javascript:history.go(0)'><span class="icon-arrow-up parpadea" title="Siguiente"></span></a>					
				 </div>	<?php
			}	
			else if($Verificar["Correcto"] == 1){// si existe una respuesta correcta
				echo "<h3 class='bloqueo_3'>Anteriormente usted respondio correctamente esta pregunta, pero ahora se ha equivocado, no tomaremos en cuenta su equivocación</h3>";
			}
?>		