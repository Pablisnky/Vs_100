<?php
	$participante= $_GET["ID_Participante"];//se recibe desde participaciones.php
	// echo "ID_Participante= " . $participante . "<br>";
	define("ID_PARTICIPANTE", $participante);

	$Tema= $_GET["Tema"];//se recibe desde participaciones.php
	//  echo "El tema de la prueba es: " . $Tema . "<br>";
	 
	$Capitulo= $_GET["Capitulo"];//se recibe desde participaciones.php
	// echo "El Capitulo de la prueba es: " . $Capitulo . "<br>";

	$CodigoPrueba =$_GET["codigoPrueba"];//se recibe desde participaciones.php
	// echo "Codigo prueba= " . $CodigoPrueba . "<br>";

	$ID_Prueba= $_GET["ID_Prueba"];//se recibe desde participaciones.php
    // echo "ID_Prueba= " . $ID_Prueba . "<br>";
    
    //conexion a la BD
    include("../conexion/Conexion_BD.php");
	
	 //sesion creada en entrada.php
	// $CapituloHoy = $_SESSION["Capitulo"];
	// echo "Capitulo= " . $CapituloHoy . "<br>";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Reavivados Final <?php echo $Tema;?></title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_EstilosVs_100.css">
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script src="../../javascript/puntaje.js"></script>
		<script src="../../javascript/bloqueo.js"></script>
	</head>	
	<body>
        <header>
			<input class="input_1" type="text" readonly name="nombre" value="<?php echo $ParticipanteNombre;?>">
            <?php include("modulos/header_usuario_2.html");?>
        </header>
		<?php
	    	//se realiza una consulta para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante=ID_PARTICIPANTE";
			$Recordset = mysqli_query($conexion,$Consulta);
			$Participante= mysqli_fetch_array($Recordset);
		?>
			<?php 				
				if($Tema == "Reavivados"){ ?>
					<h4 class="ultima_1">Resultados del test<h4> 
					<h4 class="ultima_1"><?php echo $Capitulo;?></h4> <?php
				} 
				else{  ?>           				
					<h4 class="ultima_1">Has concluido tu prueba sobre:</h4>
					<h4 class="ultima_1"><?php echo $Tema;?></h4>  <?php
				}  
			?>
			<div class="tabla_3">
				<table>
					<caption class="caption_lider">Respuestas correctas</caption>
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
					 // puntos descontados por cada pregunta incorrecta
						$Consulta_3="SELECT ID_Pregunta, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo, SUM(puntoGanado) As penalizacion FROM respuestas WHERE ID_PP='$CodigoPrueba' AND puntoGanado <= 0.000 GROUP BY ID_Pregunta ";
						$Recordset_3 = mysqli_query($conexion, $Consulta_3);
					if(mysqli_num_rows($Recordset_3)!=0){
				?>
					<table>
						<caption class="caption_lider">Respuestas incorrectas</caption>
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
		<!-- Se incluyen la tabla de bonificación -->
		<?php
			// include("bonos.php");
		?>
		<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
		<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->

		<div class="Secundario">
			<div class="ultimaPregunta">
				<?php
			    	//se obtienen los puntos ganados por el participante en la actual prueba
			    	$Consulta="SELECT * FROM participantes_pruebas WHERE ID_Participante=ID_PARTICIPANTE AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";
					$Recordset = mysqli_query($conexion, $Consulta);
					$Participante= mysqli_fetch_array($Recordset);

					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$Decimal = str_replace('.', ',', $Participante["Puntos"]);
					
					//Puntos ganados en la prueba
					// echo "Puntos ganados en la prueba: " . $Decimal . "<br>";
					
					//(Reavivados)se consulta los puntos acumulados en la semana
			    	$Consulta_0="SELECT SUM(Puntos) AS Acumulado FROM participantes_pruebas WHERE ID_Participante=ID_PARTICIPANTE AND Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago))";
					$Recordset_0= mysqli_query($conexion, $Consulta_0);
					$Participante_0= mysqli_fetch_array($Recordset_0);
					$Acumulado= $Participante_0["Acumulado"];
					// echo "Puntos globales= " . $Acumulado . "<br>";
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$Decimal_0 = str_replace('.', ',', $Acumulado);

			    	//se realiza una consulta para obtener el tiempo total de respuesta del participante
			    	$Consulta_1="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS TiempoTotal FROM respuestas WHERE ID_Participante=ID_PARTICIPANTE AND ID_PP = '$CodigoPrueba' AND Correcto= 1";
					$Recordset_1 = mysqli_query($conexion, $Consulta_1);
					$Tiempo= mysqli_fetch_array($Recordset_1);

					// if($Tema == "Reavivados"){
					// 	//Se consulta si el participant existe en la tabla de resultados globales
					// 	$Consulta_9="SELECT ID_Participante FROM posicion_general_rea WHERE ID_Participante = ID_PARTICIPANTE";
					// 	$Recordset_9 = mysqli_query($conexion, $Consulta_9);
					// 	if(mysqli_num_rows($Recordset_9) == 0){
							
					// 	}
					// 	else{

					// 	}
						
					// 	//se consulta si el participante sigue optando por el bono de constancia
					// }
 				?>
				<p class="Inicio_5">Tiempo en responder el test:</p>
				<p><?php echo $Tiempo["TiempoTotal"];?></p>
				<?php
					if($Tema == "Reavivados"){  ?>	
						<p class="Inicio_5">Puntos obtenidos:</p>
						<p><?php echo $Decimal;?></p>
						 <p class="Inicio_5">Bono de prioridad:</p>
						<?php
						//se consulta si participo antes de las siete de la mañana
						$Consulta_2= "SELECT ID_Participante, HOUR(TIME(Fecha_pago)) as hora FROM participantes_pruebas WHERE ID_Participante=ID_PARTICIPANTE AND HOUR(TIME(Fecha_pago)) < '7' AND Tema = 'Reavivados' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE()";
						$Recordset_2 = mysqli_query($conexion,$Consulta_2);
						$Resultado_2= mysqli_num_rows($Recordset_2);
						// echo $Resultado_2["hora"];
							if($Resultado_2 == 1){    
								$Bono_Prioridad= 1.000  ?>
								<p>1 Punto</p>   <?php
							}
							else{    ?>
								<p>Opción de bono perdida</p> 	<?php   
								$Bono_Prioridad= 0;
							}    ?>
						<p class="Inicio_5">Bono de constancia:</p>
						<?php
						// Las semanas en PHP cominezan los dias lunes, por eso se le suma una unidad para que haga el cambio el dia domingo y muestre la semana por adelantado al servidor PHP
							if($DiaSemana== 0){
								$Semana = $Semana + 1; 
								// echo "Semana modificada :" .  $Semana;
							}

						//se consulta si ha participado todos los dias en el test
							$Consulta_A="SELECT * FROM participacion_semanal WHERE ID_Participante=ID_PARTICIPANTE AND N_semana='$Semana'";
							// $Rellenado[]="";
							$Recordset_A = mysqli_query($conexion,$Consulta_A);
							while($Resultado= mysqli_fetch_array($Recordset_A)){
								$Rellenado[]= $Resultado["Dia_semana"];
							}
							// $Rellenado= array_pad($Dias,7,"a");
							//   var_dump($Rellenado) . "<br>";
							
							//Se recorre el array para ver que dias tiene, estos son los dias que el participante hizo el test
							$long= count($Rellenado);
							for($i=0; $i < $long; $i++){
								$Rellenado[$i];
								//   echo "El array contiene los numeros: " .  $Rellenado[$i] . "<br>";
							}
						
							if(in_array(1, $Rellenado)){  
								if($DiaSemana < 1){ ?>
									<p>Opción de bono curso</p>   <?php
								}
								else{
									echo "<p>Bono en curso</p>";
								}
							}
							else{
								echo "<p>Opción de Bono en curso</p>";
								// echo "<p>Bono logrado, 4 puntos se sumaran a su cuenta</p>";
							}    ?>

						<p class="Inicio_5">Bono de liderazgo:</p>
						<p>Código en desarrollo</p>   <?php
					}
					else{	?>
						<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal;?></p>
						<?php
					}

					//Se entrega el puntaje total del dia
					//Se verifica que tipo de variables son los sumandos, deben ser numeros no string
					// echo gettype($Bono_Prioridad);

					// Se cambian a double 
					settype($Bono_Prioridad, "double");

					$Total_Puntos= $Participante["Puntos"] + $Bono_Prioridad;  
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$TotalDecimal = str_replace('.', ',', $Total_Puntos);?>
					<p class="Inicio_5">Total puntos acumulados hoy:</p>    <?php
					echo $TotalDecimal;
				
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
			    	$Consulta_6="SELECT DISTINCT(ID_Participante) FROM participantes_pruebas WHERE  ID_Participante != ALL (SELECT ID_Participante FROM `participantes_pruebas` WHERE ID_Prueba= 5 AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE())";
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
					$Consulta_11="SELECT participantes_pruebas.ID_Participante, participantes_pruebas.Puntos, participante.Nombre,  participante.Apellido, participante.Iglesia, participante.SubRegion, ID_PP FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE ID_Prueba=  '$ID_Prueba' ORDER BY Puntos DESC LIMIT 1";
					$Recordset_11= mysqli_query($conexion, $Consulta_11);
					$Resultado_11= mysqli_fetch_array($Recordset_11);
					$Participante_11= $Resultado_11["Nombre"];

					if($Tema != "Reavivados"){	?>
						<p class="Inicio_5">Tu posición es de Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4a;?> participantes.</p> 		
						<p class="Inicio_5"> </p> 
						<div class="tabla_3">
							<table>
								<caption class="caption_lider">Actualmente el lider de la prueba es:</caption>
								<thead>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Iglesia</th>
									<th>Región</th>
								</thead>
								<tbody>	
									<tr>
										<td class="tabla_0"><?php echo $Participante_11;?></td>
										<td class="tabla_0"><?php echo $Resultado_11["Apellido"];?></td>
										<td class="tabla_0"><?php echo $Resultado_11["Iglesia"];?></td>
										<td class="tabla_0"><?php echo $Resultado_11["SubRegion"];?></td>
									</tr>
									<tr>
										<td colspan="3" class="tabla_1">Puntos totales</td>
										<td class="tabla_1"><?php echo $Resultado_11["Puntos"];?></td>
									</tr>
								</tbody>
							</table>		
						</div>

						<?php
					}
						
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

								//(reavivados)Se consulta su posicion semanal segun sus puntos
								// $Consulta_5="SELECT COUNT(*) AS PusRea FROM posicion_general_rea WHERE PuntosTotales >= '$Acumulado' ";
								// $Recordset_5 = mysqli_query($conexion, $Consulta_5);
								// $Posicion=  mysqli_fetch_array($Recordset_5);
								// echo "Ocupas el puesto Número= " . $Posicion['PusRea'] . "<br>";

								//Se consulta el nombre del lider de hoy 
								$Consulta_31="SELECT * FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() ORDER BY Puntos DESC LIMIT 1";
								$Recordset_31= mysqli_query($conexion, $Consulta_31);
								$Resultado_31= mysqli_fetch_array($Recordset_31);
								$Participante_31= $Resultado_31["Nombre"];
								$Participante_32= $Resultado_31["Apellido"];
								$Participante_33= $Resultado_31["Iglesia"];
								$Participante_34= $Resultado_31["SubRegion"];
								// echo "Nombre lider: " . $Participante_31 . "<br>";
								// echo "Apellido lider: " . $Participante_32 . "<br>";
								// echo "Iglesia lider: " . $Participante_33 . "<br>";
								// echo "SubRegion lider: " . $Participante_34 . "<br>";
										?>							
								<!-- <p class="Inicio_5">Total puntos ganados hoy</p>
								<p>Se entrega suma de respuestas y bonos sino tiene liderazgo</p>
								<p>Te encuentras entre los lideres, por lo que el bono de liderazgo esta activado, al cierre del test se dara tu puntuación final</p>
								<p class="Inicio_5">Tu posición hoy es de Nº <?php echo $PosicionBiblia['Pus'];?> de <?php echo $Participante_4;?> participantes.</p> 
								<small>A esta hora los resultados son parciales, pueden cambiar si otros usuarios participan en el test, a partir del 01-11-19 el test diario se cerrará a las 6:30 pm e inmediatamente se entregará un reporte con resultados absolutos</small>  -->
								
								<?php
								if($Participante_6 >= 2){  ?>
									<strong class="Inicio_8"><?php echo $Participante_6;?> participantes aún no han respondido esta prueba</strong>  <?php 
								}
								else if($Participante_6 == 1){  ?> 
									<strong class="Inicio_8"><?php echo $Participante_6;?> participante aún no ha respondido esta prueba</strong>  <?php 
								}  
								?>
								<!-- <p class="Inicio_5">Tu posición esta semana es de Nº <?php //echo $Posicion['PusRea'];?> de <?php// echo $Participante_4;?> participantes.</p>  -->
								<div class="tabla_4">
									<table>
										<caption class="caption_lider">Lider de hoy</caption>
										<thead>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Iglesia</th>
											<th>Región</th>
										</thead>
										<tbody>	
											<tr>
												<td class="tabla_0"><?php echo $Participante_31;?></td>
												<td class="tabla_0"><?php echo $Participante_32;?></td>
												<td class="tabla_0"><?php echo $Participante_33;?></td>
												<td class="tabla_0"><?php echo $Participante_34;?></td>
											</tr> <?php
											//Se consulta el puntaje del dia del lider
											$Consulta_20="SELECT * FROM participantes_pruebas WHERE Tema='Reavivados' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() ORDER BY Puntos DESC LIMIT 1";
											$Recordset_20= mysqli_query($conexion, $Consulta_20);
											$Participante_20= mysqli_fetch_array($Recordset_20);
											$Acumulado_2= $Participante_20["Puntos"];
											// echo "Puntos globales= " . $Acumulado . "<br>";
											
											//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
											$Decimal_2 = str_replace('.', ',', $Acumulado_2);  ?>
											<tr>
												<td colspan="4" class="tabla_1"><?php echo  $Decimal_2;?> Puntos</td>
											</tr>
										</tbody>
									</table>
									
									<table>
										<caption class="caption_lider">Lider de la semana</caption>
										<thead>
											<th>Nombre</th>
											<th>Apellido</th>
											<th>Iglesia</th>
											<th>Región</th>
										</thead>
										<tbody>	<?php
											//Se consulta el nombre del lider de la semana 
											$Consulta_31="SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.SubRegion FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1";
											$Recordset_31= mysqli_query($conexion, $Consulta_31);
											$Resultado_31= mysqli_fetch_array($Recordset_31);
											$Participante_30= $Resultado_31["ID_Participante"];
											$Participante_31= $Resultado_31["Nombre"];
											$Participante_32= $Resultado_31["Apellido"];
											$Participante_33= $Resultado_31["Iglesia"];
											$Participante_34= $Resultado_31["SubRegion"];
											// echo "ID lider: " . $Participante_30 . "<br>";
											// echo "Nombre lider: " . $Participante_31 . "<br>";
											// echo "Apellido lider: " . $Participante_32 . "<br>";
											// echo "Iglesia lider: " . $Participante_33 . "<br>";
											// echo "SubRegion lider: " . $Participante_34 . "<br>";
											?>
											<tr>
												<td class="tabla_0"><?php echo $Participante_31;?></td>
												<td class="tabla_0"><?php echo $Participante_32;?></td>
												<td class="tabla_0"><?php echo $Participante_33;?></td>
												<td class="tabla_0"><?php echo $Participante_34;?></td>
											</tr> <?php
											//Se consulta el puntaje de la semana del lider
											$Consulta_20="SELECT SUM(Puntos) AS Acumulado FROM participantes_pruebas WHERE ID_Participante='$Participante_30' AND Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago))";
											$Recordset_20= mysqli_query($conexion, $Consulta_20);
											$Participante_20= mysqli_fetch_array($Recordset_20);
											$Acumulado_2 = $Participante_20["Acumulado"];
											// echo "Puntos semanales Lider= " . $Acumulado_2 . "<br>";
											
											//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
											$Decimal_2 = str_replace('.', ',', $Acumulado_2);  ?>
											<tr>
												<td colspan="4" class="tabla_1"><?php echo  $Decimal_2;?> Puntos</td>
											</tr>
										</tbody>
									</table>		
								</div>
										<?php
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
			<div class="navegacion_2">
				<a class="nav_10" href="../controlador/entrada.php">Inicio</a>
				<a class="nav_10_a" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>
			</div>
		</div>
		<footer>
		    <?php include("modulos/footer.php");?>
		</footer>
	</body>
</html>	