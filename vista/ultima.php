<?php
// session_start();    //se inicia sesion para llamar a una variable 

	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	// echo "ID_Participante= " . $participante . "<br>";

	$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
	//  echo "El tema de la prueba es: " . $Tema . "<br>";

	$CodigoPrueba =$_SESSION["codigoPrueba"];
	// echo "Codigo prueba= " . $CodigoPrueba . "<br>";

	$ID_Prueba= $_SESSION["ID_Prueba"];
	// echo "ID_Prueba= " . $ID_Prueba . "<br>";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20 Final <?php echo $Tema;?></title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_EstilosVs_100.css">
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>
	</head>	
	<body>
		<?php
			//Se cierra la prueba
			$Actualizar="UPDATE participantes_pruebas SET Prueba_Cerrada= 1, Prueba_Activa= 0 WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";
			mysqli_query($conexion, $Actualizar);

	    	//se realiza una consulta para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";
			$Recordset = mysqli_query($conexion,$Consulta);
			$Participante= mysqli_fetch_array($Recordset);
		?>
		<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
		<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->

		<div class="Secundario">
			<h4 class="ultima_1"><?php echo $Participante["Nombre"];?></h4>
			<?php 				
				if($Tema == "Reavivados"){ ?>
					<h4 class="ultima_1">Has concluido tu prueba diaria sobre <br> <span class="span_5">"Reavivados por su palabra"</span></h4>  <?php
				} 
				else{  ?>           				
					<h4 class="ultima_1">Has concluido tu prueba sobre:</h4>
					<h4 class="ultima_1"><?php echo $Categoria . "_" . $Tema;?></h4>  <?php
				}  
			?>
			<div class="tabla_3">
				<table>
					<caption class="caption_correc">Respuestas correctas</caption>
					<thead>
						<tr>
							<th>Pregunta</th>
							<th>Puntos</th>
							<th>Tiempo</th>
						</tr>
					</thead>
					<?php
					//Se consulta el tiempo que tardo en responder una pregunta  
					$Consulta_2="SELECT ID_Pregunta, puntoGanado, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo FROM respuestas WHERE ID_PP='$CodigoPrueba' AND Correcto = 1 AND puntoGanado > 0 GROUP BY ID_Pregunta ";
					$Recordset_2 = mysqli_query($conexion, $Consulta_2);					
					while($TiempoPregunta= mysqli_fetch_array($Recordset_2)){  ?>
						<tbody>
							<tr>
								<td class="tabla_0"><?php echo $TiempoPregunta["ID_Pregunta"];?></td>
								<td class="tabla_1"><?php echo $TiempoPregunta["puntoGanado"];?></td> 
								<td class="tabla_0"><?php echo $TiempoPregunta["tiempo"];?></td> 
								<!-- <td class="tabla_1"><?php// echo date("d-m-Y", strtotime($participantes["fecha_Registro"])); ?></td><!se cambia el formato de la fecha de registro--> 
								<!--<td><?php// echo date("d-m-Y", strtotime($participantes[0])); ?></td>se cambia el formato de la fecha de ultima participacion-->           
							</tr>
							<?php  
					}   ?> 
						</tbody>
				</table>
				<?php
					 // puntos descontados por cada pregunta incorre
						$Consulta_3="SELECT ID_Pregunta, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo, SUM(puntoGanado) As penalizacion FROM respuestas WHERE ID_PP='$CodigoPrueba' AND puntoGanado <= 0.000 GROUP BY ID_Pregunta ";
						$Recordset_3 = mysqli_query($conexion, $Consulta_3);
					if(mysqli_num_rows($Recordset_3)!=0){
				?>
					<table>
						<caption class="caption_incorrec">Respuestas incorrectas</caption>
						<thead>
							<tr>
								<th>Pregunta</th>
								<th>Puntos</th>
								<th>Tiempo</th>
							</tr>
						</thead>
						<?php
						while($PuntosPregunta= mysqli_fetch_array($Recordset_3)){  
						?>
						<tbody>
							<tr>
								<td class="tabla_0"><?php echo $PuntosPregunta["ID_Pregunta"];?></td>
								<td class="tabla_1"><?php echo $PuntosPregunta["penalizacion"];?></td>
								<td class="tabla_0"><?php echo $PuntosPregunta["tiempo"];?></td>  
						</tr><?php
						 } ?>
					</tbody>
				</table>
			<?php
			}
			?>
		</div>
			<div class="ultimaPregunta">
				<?php
			    	//se realiza una consulta para obtener los puntos del participante
			    	$Consulta="SELECT * FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";
					$Recordset = mysqli_query($conexion, $Consulta);
					$Participante= mysqli_fetch_array($Recordset);
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$Decimal = str_replace('.', ',', $Participante["Puntos"]); 
					
					//(Reavivados)se consulta los puntos acumulados en todas las pruebas
			    	$Consulta_0="SELECT SUM(Puntos) AS Acumulado FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema'";
					$Recordset_0= mysqli_query($conexion, $Consulta_0);
					$Participante_0= mysqli_fetch_array($Recordset_0);
					$Acumulado= $Participante_0["Acumulado"];
					// echo "Puntos globales= " . $Acumulado . "<br>";
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$Decimal_0 = str_replace('.', ',', $Acumulado);

			    	//se realiza una consulta para obtener el tiempo total de respuesta del participante
			    	$Consulta_1="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS TiempoTotal FROM respuestas WHERE ID_Participante='$participante' AND ID_PP = '$CodigoPrueba' AND Correcto= 1";
					$Recordset_1 = mysqli_query($conexion, $Consulta_1);
					$Tiempo= mysqli_fetch_array($Recordset_1);

					if($Tema == "Reavivados"){
						//Se consulta si el participant existe en la tabla de resultados gloales
						$Consulta_9="SELECT ID_Participante FROM posicion_general_rea WHERE ID_Participante = '$participante'";
						$Recordset_9 = mysqli_query($conexion, $Consulta_9);
						if(mysqli_num_rows($Recordset_9) == 0){
							//Se inserta el puntaje global acumulado en reavivados si el participante no existe
							$Insertar= "INSERT INTO posicion_general_rea(PuntosTotales,ID_Participante)VALUES('$Acumulado','$participante')";
							mysqli_query($conexion, $Insertar);
							
							//Se actualiza el puntaje global acumulado en reavivados
							$Actualizar= "UPDATE posicion_general_rea SET PuntosTotales= $Acumulado WHERE ID_Participante = '$participante')";
							mysqli_query($conexion, $Actualizar);
						}
						else{
							//Se actualiza el puntaje global acumulado en reavivados
							$Actualizar= "UPDATE posicion_general_rea SET PuntosTotales= '$Acumulado' WHERE ID_Participante = '$participante'";
							mysqli_query($conexion, $Actualizar);
						}
					}
					
 				?>
				<p class="Inicio_5">Tiempo total: <?php echo $Tiempo["TiempoTotal"];?></p>
				<?php
					if($Tema == "Reavivados"){  ?>	
						<p class="Inicio_5">Puntos ganados hoy: <?php echo $Decimal;?></p> 
						<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal_0;?></p><?php
					}
					else{	?>
						<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal;?></p>
						<?php
					}
				
            		//Se busca en que posicion quedo el participante
            		//Se consulta cuantos puntos acumulo en la prueba un participante  
            		$Puesto= $Participante["Puntos"];
            		//  echo "Puntos acumulados= " . $Puesto . "<br>";

            		//Se consulta su posicion segun sus puntos
            		$Consulta_5="SELECT COUNT(*) AS Pus FROM participantes_pruebas WHERE Puntos >= '$Puesto' AND ID_Prueba='$ID_Prueba'";
					$Recordset_5 = mysqli_query($conexion, $Consulta_5);
					$Posicion=  mysqli_fetch_array($Recordset_5);
					// echo "Ocupas el puesto Nº= " . $Posicion['Pus'] . "<br>";

					//Se consulta cuantos participantes hay en la prueba
			    	$Consulta_4="SELECT * FROM participantes_pruebas WHERE Tema='$Tema' AND ID_Prueba='$ID_Prueba'";
					$Recordset_4 = mysqli_query($conexion, $Consulta_4);
					$Participante_4a= mysqli_num_rows($Recordset_4);
					//  echo "El total de participantes son= " . $Participante_4a . "<br>";

					//Se consulta cuantos participantes faltan por responder la prueba
			    	$Consulta_6="SELECT DISTINCT(ID_Participante) FROM participantes_pruebas WHERE  ID_Participante != ALL (SELECT ID_Participante FROM `participantes_pruebas` WHERE ID_Prueba= 5 and DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE())";
					$Recordset_6 = mysqli_query($conexion, $Consulta_6);
					$Participante_6= mysqli_num_rows($Recordset_6);
					// echo "Faltan por responder " . $Participante_6 . " participantes";

					//Se consulta si es una prueba libre o una de pago
					$Consulta_7= "SELECT Categoria FROM participantes_pruebas WHERE Categoria= 'Biblia' AND Tema = '$Tema'";
					$Recordset_7 = mysqli_query($conexion, $Consulta_7);
					$Prueba= mysqli_fetch_array($Recordset_7);
					// echo $Prueba["Deposito"];

					//Se consulta cuantos participantes diferentes hay en una la prueba
					$Consulta_4="SELECT DISTINCT(ID_Participante) FROM participantes_pruebas WHERE Tema='$Tema' AND ID_Prueba='$ID_Prueba'";
					$Recordset_4 = mysqli_query($conexion, $Consulta_4);
					$Participante_4= mysqli_num_rows($Recordset_4);
					// echo "El total de participantes es= " . $Participante_4 . "<br>";

					//Se consulta el nombre del lider de la prueba
					$Consulta_11="SELECT participantes_pruebas.ID_Participante, participante.Nombre, ID_PP FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE ID_Prueba=  '$ID_Prueba' ORDER BY Puntos DESC LIMIT 1";
					$Recordset_11= mysqli_query($conexion, $Consulta_11);
					$Resultado_11= mysqli_fetch_array($Recordset_11);
					$Participante_11= $Resultado_11["Nombre"];

					if($Tema != "Reavivados"){	?>
						<p class="Inicio_5">Tu posición es de Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4a;?> participantes.</p> 		
						<p class="Inicio_5">Actualmente el lider de la prueba es: <?php echo $Participante_11;?></p> 

						<?php
					}
						if($Prueba["Categoria"] == "Biblia"){
							if($Tema == "Reavivados"){  		
								//(Reavivados)Se consulta su posicion del dia segun sus puntos
								$Consulta_5="SELECT DISTINCT(ID_Participante), COUNT(ID_Participante) AS Pus FROM participantes_pruebas WHERE Puntos >= '$Puesto' AND ID_Prueba='$ID_Prueba' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE()";
								$Recordset_5 = mysqli_query($conexion, $Consulta_5);  
								$PosicionBiblia=  mysqli_fetch_array($Recordset_5);
								
								//(reavivados)Se consulta su posicion general segun sus puntos
								$Consulta_5="SELECT COUNT(*) AS PusRea FROM posicion_general_rea WHERE PuntosTotales >= '$Acumulado' ";
								$Recordset_5 = mysqli_query($conexion, $Consulta_5);
								$Posicion=  mysqli_fetch_array($Recordset_5);
								// echo "Ocupas el puesto Número= " . $Posicion['PusRea'] . "<br>";

								//Se consulta el nombre del lider de la prueba
								$Consulta_11="SELECT participantes_pruebas.ID_Participante, participante.Nombre, participante.Iglesia, participante.SubRegion, ID_PP FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE ID_Prueba=  '$ID_Prueba' ORDER BY Puntos DESC LIMIT 1";
								$Recordset_11= mysqli_query($conexion, $Consulta_11);
								$Resultado_11= mysqli_fetch_array($Recordset_11);
								$Participante_11= $Resultado_11["Nombre"];
										?>							
								<p class="Inicio_5">Tu posición hoy es de Nº <?php echo $PosicionBiblia['Pus'];?> de <?php echo $Participante_4;?> participantes.</p>  
								
								<?php
								if($Participante_6 >= 2){  ?>
									<strong class="Inicio_8"><?php echo $Participante_6;?> participantes aún no han respondido esta prueba</strong>  <?php 
								}
								else if($Participante_6 == 1){  ?> 
									<strong class="Inicio_8"><?php echo $Participante_6;?> participante aún no ha respondido esta prueba</strong>  <?php 
								}  
								?>

								<!-- <small class="small_1">Resultados definitivos del dia, al cierre de la prueba. (8:00 pm)</small> -->
								<p class="Inicio_5">Tu posición general es de Nº <?php echo $Posicion['PusRea'];?> de <?php echo $Participante_4;?> participantes.</p> 
								<div class="tabla_4">
									<table>
										<caption class="caption_lider">lider general de la prueba</caption>
										<thead>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Iglesia</th>
											<th>Región</th>
										</thead>
										<tbody>	
											<tr>
												<td class="tabla_0"><?php echo $Participante_11;?></td>
												<td class="tabla_0">Diaz</td>
												<td class="tabla_0"><?php echo $Resultado_11["Iglesia"];?></td>
												<td class="tabla_0"><?php echo $Resultado_11["SubRegion"];?></td>
											</tr>
										</tbody>
									</table>		
								</div>
										<?php
								}	
						} 
						else{ 
						}  ?>
		    <div class="Gratis_2">
				<?php
					if($Tema == "Reavivados"){ 
						echo "<h4>Mañana continuamos.</h4>";
					}
				?>
				<audio id="FondoComercial_1" autoplay src="../audio/DarknessInMetropolis.mp3" loop></audio>
		    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de Reavivados</p>
		    </div>
	    	</div>
			<nav class="navegacion_2">
				<a class="nav_10" href="../controlador/entrada.php">Inicio</a>
				<a class="nav_10" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>
			</nav>
		</div>
	</body>
</html>	