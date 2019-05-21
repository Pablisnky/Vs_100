<?php
	$Participante = $_GET["val_1"];//se recibe el ID_Participante desde preguntaGenesis_01.php
	$Libro = $_GET["val_2"];//se recibe el nombre del libro desde preguntaGenesis_01.php

		include("../../conexion/Conexion_BD.php");
	    mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente
				
				//se consulta en la BD si el participante esta bloqueado.
    			//se obtienen las horas que faltan para terminar el bloqueo del participante
				$Consulta_2= "SELECT SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , NOW(), TiempoBloqueo ))*60) AS diferencia FROM  participante WHERE ID_Participante ='$Participante'";
				$Recordset_3= mysqli_query($conexion,$Consulta_2);
				$Faltan=  mysqli_fetch_array($Recordset_3);
				$Incremento=$Faltan["diferencia"];

				if($Incremento >'00:00:00'){ //Si el participante esta bloqueado
					
			    	echo "<h3>Usted esta penalizado porque antes respodio incorrectamente.</h3>";
			    	echo "<h3 style='margin-bottom: 0.5%;'>Debe esperar.</h3>";
					//echo "<h3>$Incremento</h3>";
					?>

		    		<style>
					    #principiantes_05d{
					       	background-color: red;
							color: white;
							border-style: solid;
							border-width: 1px;
							border-color: black;          
				        }
			    	</style>
			    	<?php
		    	}
		    	else{//si el participante no esta bloqueado

		    		//Se cambia el status del participante y se desbloquea, 0=false
			    	$Actualizar=" UPDATE participante SET Status= 0 WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Actualizar);

					//se configura el sistema para que trabaje con la hora nacional.
					date_default_timezone_set('America/Caracas');
					$horaPHP = date("Y-m-d  H:i:s");

					//Se corrige la hora del servidor PHP local
				   $salto_horario_PHPLocal = -0.5 * 60 * 60;//se restan 30 minutas, porque el servidor PHPLocal esta adelantado
				   $horaPHPlocal = date("Y-m-d  H:i:s", time()  + $salto_horario_PHPLocal);

					//se inserta la hora de respuesta a la BD
					$Insertar_4="UPDATE respuestas SET Hora_Respuesta= '$horaPHPlocal' WHERE ID_Participante='$Participante' AND Libro='$Libro' AND ID_Pregunta='15'";
						mysqli_query($conexion,$Insertar_4);

					//consulta para verificar si existe una respuesta correcta en la pregunta Nº 15
			    	$Consulta= "SELECT * FROM respuestas WHERE ID_Pregunta='15' AND ID_Participante= '$Participante' AND Libro='$Libro'";
			    	$Recordset= mysqli_query($conexion,$Consulta);
	   		 		$Verificar= mysqli_fetch_array($Recordset);

	   		 		if(($Verificar["Correcto"])==1){ //si existe una respuesta correcta en la base de datos.
			    		echo "<h3>Su repuesta es correcta y la encuentra en Éxodo 4:19. Pero no sumara puntos porque ya respondio esta pregunta</h3>";
			    		//echo "<h2>Existe una respuesta correcta =1 en la BD</p>";
			    		//echo "<h2>Opcion 5</p>";
			       	    	?>
				    	<style>
				            #principiantes_05d{
				            	background-color: green;
								color: white;
								border-style: solid;
								border-width: 1px;
								border-color: black;          
			            	}
			    		</style>
						<?php }

					else{/*sino existe una respuesta correcta en la BD*/
						//Se inserta en la BD que el participante respondio correctamente.
						$Actualizar="UPDATE respuestas SET Correcto= 1 WHERE ID_Participante='$Participante' AND Libro='$Libro' AND ID_Pregunta='15'";
						  mysqli_query($conexion,$Actualizar);

						//se verifica si el tiempo de respuesta esta vencido
						$Consulta_3="SELECT HoraMaximo FROM respuestas WHERE ID_Participante='$Participante' AND Libro='$Libro' AND ID_Pregunta='15'";
						$Recordset_3= mysqli_query($conexion,$Consulta_3);
	   		 			$Verificar= mysqli_fetch_array($Recordset_3);
	   		 			$Verificar["HoraMaximo"];
	   		 			$HM= $Verificar["HoraMaximo"];
	   		 				

						//se consulta la hora de respuesta almacenada en la BD
						$Consulta_4="SELECT Hora_Respuesta FROM respuestas WHERE ID_Participante='$Participante' AND Libro='$Libro' AND ID_Pregunta='15'";
						$Recordset_4= mysqli_query($conexion,$Consulta_4);
	   		 			$Verificar= mysqli_fetch_array($Recordset_4);
	   		 			$Verificar["Hora_Respuesta"];

	   		 			if($HM < $Verificar["Hora_Respuesta"]){
			 				echo "<h2>Correcto, sin embargo no sumará puntos por tiempo vencido </h2> <p>Éxodo 4:19.</p>";
						}
						else{
							echo "<h2>Correcto. Felicitaciones</h2> <p>Éxodo 4:19.</p>";
							//echo "<h2>No existen registros en la BD 2</p>";
							//Se suman 5 puntos por cada respuesta correcta, solo si se respondio a tiempo.

							include("../prorroteoPuntos.php");
						}

			    	  	?>
				    	<style>
				            #principiantes_05d{
				            	background-color: green;
								color: white;
								border-style: solid;
								border-width: 1px;
								border-color: black;          
			            	}
			    		</style>
						<?php } }  ?>



