<?php
// session_start();    //se inicia sesion para llamar a una variable x

include_once("../clases/nombreApellido.php");

	// $verifica = $_SESSION["verifica_pregunta"];
	// if($verifica == 2010){// Anteriormente en pregunta.php se generó la variable $_SESSION["verifica_pregunta"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
	//  	unset($_SESSION['verifica_pregunta']);//se borra la $_SESSION verifica_pregunta.
	
		//se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 

		$ID_Participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
		// echo "ID_Participante= " . $ID_Participante . "<br>";

		$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
		//  echo "El tema de la prueba es: " . $Tema . "<br>";

		$CodigoPrueba =$_SESSION["codigoPrueba"];
		// echo "Codigo prueba= " . $CodigoPrueba . "<br>";

		$ID_Prueba= $_SESSION["ID_Prueba"];
		// echo "ID_Prueba= " . $ID_Prueba . "<br>";
			
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

				<link rel="stylesheet" type="text/css" href="../../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../../css/MediaQuery_EstilosVs_100.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
				<link rel="shortcut icon" type="image/png" href="../images/logo.png">

				<script src="../../javascript/puntaje.js"></script>
				<script src="../../javascript/bloqueo.js"></script>
			</head>	
			<body>
				<?php
//*******************************************************************************************
					//Se cierra la prueba
					$Actualizar="UPDATE participantes_pruebas SET Prueba_Cerrada= 1, Prueba_Activa= 0 WHERE ID_Participante='$ID_Participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";
					mysqli_query($conexion, $Actualizar);

//*******************************************************************************************
					//Se pide el primer nombre del participante
					$P_Nombre= new NombreApellido();										
				?>
					<h4 class="ultima_1"><?php $P_Nombre->PrimerNombre($NombreCompleto);?></h4>
					<?php 				
						if($Tema == "Reavivados"){ ?>
							<h4 class="ultima_1">Has concluido tu test diario<h4> <?php
						} 
						else{  ?>           				
							<h4 class="ultima_1">Has concluido tu prueba sobre:</h4>
							<h4 class="ultima_1"><?php echo $Tema;?></h4>  <?php
						}

						
//*******************************************************************************************
					//Se consulta si gano la insignia maestro
					$Consulta_50="SELECT Puntos FROM participantes_pruebas WHERE ID_Participante='$ID_Participante' AND ID_PP = '$CodigoPrueba'";
					$Recordset_50 = mysqli_query($conexion,$Consulta_50);
					$PuntosInsignia= mysqli_fetch_array($Recordset_50);
					if($PuntosInsignia["Puntos"] == 25.000 ||  $PuntosInsignia["Puntos"] == 26.000){	?>         
						<div class="contenedor_34">
							<p class="Inicio_32">Lograste la</p>
							<p class="Inicio_32 Inicio_32a">Insignia Maestro</p>
                            <img class="imagen_13" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
							<p class="Inicio_33">Cinco respuestas perfectamente respondidas, alcanzaste el máximo de puntos en cada una</p>
						</div>    <?php   
					}	?>

<!-- ******************************************************************************************* -->

					<div class="tabla_3">
						<table>
							<caption class="caption_lider">Respuestas correctas</caption>
							<thead>
								<tr>
									<th>Pregunta</th>
									<th>Puntos</th>
									<th>Tiempo</th>
									<th>Ver pregunta</th>
								</tr>
							</thead>
							<?php
							//Se consulta el tiempo que tardo en responder una pregunta 
							$Consulta_2a="SELECT ID_Pregunta, puntoGanado, Num_Pregunta_Alea, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo FROM respuestas WHERE ID_PP='$CodigoPrueba' AND Correcto = 1 AND puntoGanado > 0.000 GROUP BY ID_Pregunta";
							$Recordset_2a = mysqli_query($conexion, $Consulta_2a);			
							while($TiempoPregunta= mysqli_fetch_array($Recordset_2a)){ 
								$Pregunta_Alea= $TiempoPregunta['Num_Pregunta_Alea']; 
								$N_Pregunta= $TiempoPregunta['ID_Pregunta']; 
								// echo "Pregunta aleatoria: " . $Pregunta_Alea;
							?>
								<tbody>
									<tr>
										<td class="tabla_0"><?php echo $TiempoPregunta["ID_Pregunta"];?></td>
										<td class="tabla_1"><?php echo $TiempoPregunta["puntoGanado"];?></td> 
										<td class="tabla_0"><?php echo $TiempoPregunta["tiempo"];?></td>
										<script>
											//Se cambia la varible php a javascript
											var jsvar= '<?php echo $Pregunta_Alea; ?>'; 
											// alert(jsvar);
										</script>
										<td class="tabla_7"><a href="../controlador/MostrarPregunta.php?pregunta=<?php echo $Pregunta_Alea;?>&N_Pregunta=<?php echo $N_Pregunta;?>" target="_blank">O</a><span class="span_12">Nuevo</span></td>         
									</tr>
								</tbody>
									<?php  
							}   ?> 
						</table>
						<?php
							// puntos descontados por cada pregunta incorrecta
							$Consulta_3="SELECT ID_Pregunta, Num_Pregunta_Alea, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo, SUM(puntoGanado) As penalizacion FROM respuestas WHERE ID_PP='$CodigoPrueba' AND puntoGanado <= 0.000 GROUP BY ID_Pregunta ";
							$Recordset_3 = mysqli_query($conexion, $Consulta_3);
							if(mysqli_num_rows($Recordset_3)!=0){	?>
								<table>
									<caption class="caption_lider">Respuestas incorrectas</caption>
									<thead>
										<tr>
											<th>Pregunta</th>
											<th>Puntos</th>
											<th>Tiempo</th>
											<th>Ver pregunta</th>
										</tr>
									</thead>
									<?php
									while($Pregunta_Alea_2= mysqli_fetch_array($Recordset_3)){ 
										$Pregunta_Alea_3= $Pregunta_Alea_2['Num_Pregunta_Alea'];
										$N_Pregunta= $Pregunta_Alea_2['ID_Pregunta'];  
										// echo "Pregunta aleatoria: " . $Pregunta_Alea_3; 
											?>
										<tbody>
											<tr>
												<td class="tabla_0"><?php echo $Pregunta_Alea_2["ID_Pregunta"];?></td>
												<td class="tabla_1"><?php echo $Pregunta_Alea_2["penalizacion"];?></td>
												<td class="tabla_0"><?php echo $Pregunta_Alea_2["tiempo"];?></td>
												<script>
													//Se cambia la varible php a javascript
													var jsvar= '<?php echo $Pregunta_Alea_2; ?>'; 
												</script>
												<td class="tabla_7"><a href="../controlador/MostrarPregunta.php?pregunta=<?php echo $Pregunta_Alea_3;?>&N_Pregunta=<?php echo $N_Pregunta;?>" target="_blank">O</a><span class="span_12">Nuevo</span></td>           
										</tr><?php
										} ?>
									</tbody>
								</table>
								<?php
							}
					?>
				</div>

<!-- ******************************************************************************************* -->
				<!-- Se incluyen la tabla de bonificación solo en el tema Reavivados-->
				<?php
					if($Tema=="Reavivados"){
						include("bonos.php");
					}
				?>
<!-- ******************************************************************************************* -->
				<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
				<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $ID_Participante;?>"><!-- se utiliza para enviar a puntaje.js-->

				<div class="Secundario">
					<div class="ultimaPregunta">
						<?php
							//se obtienen los puntos ganados por el participante en la actual prueba
							$Consulta="SELECT * FROM participantes_pruebas WHERE ID_Participante='$ID_Participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";
							$Recordset = mysqli_query($conexion, $Consulta);
							$Participante= mysqli_fetch_array($Recordset);

							//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
							$Decimal = str_replace('.', ',', $Participante["Puntos"]);
							
							//Puntos ganados en la prueba
							// echo "Puntos ganados en la prueba: " . $Decimal . "<br>";
///**********************************************************************************************
							//(Reavivados)se consulta los puntos acumulados en la semana
							$Consulta_0="SELECT SUM(Puntos) AS Acumulado FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago))";
							$Recordset_0= mysqli_query($conexion, $Consulta_0);
							$Participante_0= mysqli_fetch_array($Recordset_0);
							$Acumulado= $Participante_0["Acumulado"];
							// echo "Puntos semanales= " . $Acumulado . "<br>";
							
							//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
							$Decimal_0 = str_replace('.', ',', $Acumulado);
							// echo "Puntos semanales= " . $Decimal_0 . "<br>";
///**********************************************************************************************

							//se realiza una consulta para obtener el tiempo total de respuesta del participante
							$Consulta_1="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS TiempoTotal FROM respuestas WHERE ID_Participante='$participante' AND ID_PP = '$CodigoPrueba' AND Correcto= 1";
							$Recordset_1 = mysqli_query($conexion, $Consulta_1);
							$Tiempo= mysqli_fetch_array($Recordset_1);

							if($Tema == "Reavivados"){
								//Se consulta si el participant existe  en la tabla de resultados globales en la semana en curso
								$Consulta_9="SELECT ID_Participante FROM posicion_general_rea WHERE ID_Participante = '$participante' AND WEEK(fecha)=WEEK(CURDATE())";
								$Recordset_9 = mysqli_query($conexion, $Consulta_9);
								if(mysqli_num_rows($Recordset_9) == 0){
									//Se inserta el puntaje global acumulado en reavivados si el participante no ha participado en la semana en curso
									$Insertar= "INSERT INTO posicion_general_rea(PuntosTotales,ID_Participante,fecha)VALUES('$Acumulado','$participante',CURDATE())";
									mysqli_query($conexion, $Insertar);
									
									//Se actualiza el puntaje global acumulado en reavivados
									$Actualizar= "UPDATE posicion_general_rea SET PuntosTotales= $Acumulado WHERE ID_Participante = '$participante') AND fecha=CURDATE()";
									mysqli_query($conexion, $Actualizar);
								}
								else{
									//Se actualiza el puntaje global acumulado en reavivados
									$Actualizar= "UPDATE posicion_general_rea SET PuntosTotales= '$Acumulado' WHERE ID_Participante = '$participante' AND fecha=CURDATE()";
									mysqli_query($conexion, $Actualizar);
								}
								
								//se consulta si el participante sigue optando por el bono de constancia
							}
						?>
						<p class="Inicio_5">Tiempo en responder el test:</p>
						<p><?php echo $Tiempo["TiempoTotal"];?></p>
						<?php
							if($Tema == "Reavivados"){  ?>	
								<p class="Inicio_5">Puntos obtenidos hoy:</p>
								<p><?php echo $Decimal;?></p>
								<p class="Inicio_5">Bono de prioridad:</p>
								<?php
								//se consulta si participo antes de las siete de la mañana
								$Consulta_2= "SELECT ID_Participante, HOUR(TIME(Fecha_pago)) as hora FROM participantes_pruebas WHERE ID_Participante='$participante' AND HOUR(TIME(Fecha_pago)) < '8' AND Tema = 'Reavivados' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE()";
								$Recordset_2 = mysqli_query($conexion,$Consulta_2);
								$Resultado_2= mysqli_num_rows($Recordset_2);
								echo $Resultado_2["hora"];
								if($Resultado_2 != 0){    
									$Bono_Prioridad= 1.000  ?>
									<p>1 Punto</p>   <?php
								}
								else{    ?>
									<p>Opción de bono perdida</p> 	<?php   
									$Bono_Prioridad= 0;
								}   ?>			
								<p class="Inicio_5">Bono de constancia:</p>
								<?php
							// $Semana= date("W");
							// echo "Numero de Semana:" . $Semana . "<br>";
							// $DiaSemana=  date("w"); //regresa el dia de la semana, toma como primer dia el domingo = 0
							// echo "Dia de la semana:" . $DiaSemana . "<br>";
								// Las semanas en PHP comienzann los dias lunes, por eso se le suma una unidad para que haga el cambio el dia domingo y muestre la semana por adelantado al servidor PHP
								if($DiaSemana== 0){
									$Semana = $Semana + 1; 
									//   echo "Semana modificada :" .  $Semana;
								}
								else{
									// echo "Semana :" .  $Semana . "<br>";
								}
								
								//se consulta si ha participado todos los dias en el test
								$Consulta_A="SELECT * FROM participacion_semanal WHERE ID_Participante='$participante' AND N_semana='$Semana'";
								// $Rellenado[]="";
								$Recordset_A = mysqli_query($conexion,$Consulta_A);
								while($Resultado= mysqli_fetch_array($Recordset_A)){
									$Rellenado[]= $Resultado["Dia_semana"];
								}
								// $Rellenado= array_pad($Dias,7,"a");
								// echo "el array contiene los numeros:";
								//   var_dump($Rellenado) . "<br>";
								
								// --------
								// $long= count($Rellenado);
								// for($i=0; $i < $long; $i++){
								// 	$Rellenado[$i];
								// 	//   echo "El array contiene los numeros: " .  $Rellenado[$i] . "<br>";
								// }
								// ---------
								// echo "Dia de la semana: " . $DiaSemana;
								if($DiaSemana == 0){ 
									if(in_array(1, $Rellenado)){ ?>
										<p>Opción de bono curso</p>   <?php
									}
									else{
										echo "<p>Opción de bono perdida</p>";
									}
								}

								//Se recorre el array hasta el lunes
								for($i=0; $i < 1; $i++){
									$Rellenado[$i];
									// echo "El array contiene los numeros: " .  $Rellenado[$i] . "<br>";
									
								}
								
								if($DiaSemana == 1){ 
									if(in_array(1, $Rellenado)){ ?>
										<p>Opción de bono curso</p>   <?php
									}
									else{
										echo "<p>Opción de bono perdida</p>";
									}
								}  ?>

								<p class="Inicio_5">Bono de liderazgo:</p>
								<p>Código en desarrollo</p>   <?php
							}
							else{//Sino es reavivados	?>
								<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal;?></p>
								<?php
							}
							if($Tema=="Reavivados"){
								//Se entrega el puntaje total del dia
								//Se verifica que tipo de variables son los sumandos, deben ser numeros no string
								// echo gettype($Bono_Prioridad);

								// Se cambian a double 
								settype($Bono_Prioridad, "double");

								$Total_Puntos= $Participante["Puntos"] + $Bono_Prioridad;  
								//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
								$TotalDecimal = str_replace('.', ',', $Total_Puntos);?>
								<p class="Inicio_5">Total puntos acumulados hoy:</p>    <?php
								echo $TotalDecimal . "<br>";
								
								//Se actualizan los puntos obtenidos tomando en cuenta los bonos
								$Actualizar_8="UPDATE participantes_pruebas SET Puntos= '$Total_Puntos' WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";
								mysqli_query($conexion, $Actualizar_8);

								// Puntos semanales calculados arriba en linea 165
								?>
								<p class="Inicio_5">Total puntos acumulados en la semana:<span class="span_12">Nuevo</span></p>  <?php
								echo $Decimal_0 . "<br>";

								//Se consulta su posicion en la semana segun sus puntos semanales 
								$Consulta_5="SELECT COUNT(*) AS Pus FROM posicion_general_rea WHERE PuntosTotales >= '$Decimal_0' AND WEEK(fecha)=WEEK(CURDATE()) ";
								$Recordset_5 = mysqli_query($conexion, $Consulta_5);
								$Posicion=  mysqli_fetch_array($Recordset_5);
								// echo "En la semana ocupas el puesto Nº= " . $Posicion['Pus'] . "<br>";?>
								<!-- <p class="Inicio_5">Posicion en la semana:<span class="span_12">Nuevo</span>   </p>  -->
								<?php 
								// switch($Posicion['Pus']){
									// case 1:
									// case 3:
									// case 11:
									// 	echo $Posicion['Pus'] . "<sup style=font-size:15px>ra</sup>";
									// break;
									// case 2:
									// case 12:
									// 	echo $Posicion['Pus'] . "<sup style=font-size:15px>da</sup>";
									// break;
									// case 4:
									// case 5:
									// case 6:
									// 	echo $Posicion['Pus'] . "<sup style=font-size:15px>ta</sup>";
									// break;
									// case 7:
									// case 10:
									// 	echo $Posicion['Pus'] . "<sup style=font-size:15px>ma</sup>";
									// break;
									// case 8:
									// 	echo $Posicion['Pus'] . "<sup style=font-size:15px>va</sup>";
									// break;
									// case 9:
									// 	echo $Posicion['Pus'] . "<sup style=font-size:15px>na</sup>";
									// break;
									// default:
									//    echo $Posicion['Pus'];
								// }
							}
						
							//Se busca en que posicion quedo el participante
							//Se consulta cuantos puntos acumulo en la prueba un participante  
							$Puesto= $Participante["Puntos"];
							//echo "Puntos acumulados= " . $Puesto . "<br>";

							//Se consulta su posicion en la semana segun sus puntos 
							$Consulta_5="SELECT COUNT(*) AS Pus FROM participantes_pruebas WHERE Puntos >= '$Puesto' AND ID_Prueba='$ID_Prueba'";
							$Recordset_5 = mysqli_query($conexion, $Consulta_5);
							$Posicion=  mysqli_fetch_array($Recordset_5);
							echo "<br>";
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
										<caption class="caption_lider">Actualmente el líder de la prueba es:</caption>
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
												<td class="tabla_0"><?php							
													//Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
													if($Resultado_11["Iglesia"]== "Otro"){
														echo $Resultado_11["Otra_Iglesia"];
													}
													else{
														echo $Resultado_11["Iglesia"];
													}	?>
												</td>
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
										
										// (reavivados)Se consulta su posicion semanal segun sus puntos
										$Consulta_5="SELECT COUNT(*) AS PusRea FROM posicion_general_rea WHERE PuntosTotales >= '$Acumulado' ";
										$Recordset_5 = mysqli_query($conexion, $Consulta_5);
										$Posicion=  mysqli_fetch_array($Recordset_5);
										// echo "EN la semana ocupas el puesto Número= " . $Posicion['PusRea'] . "<br>";

										//Se consulta el nombre del lider de hoy 
										$Consulta_31="SELECT * FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() ORDER BY Puntos DESC LIMIT 1";
										$Recordset_31= mysqli_query($conexion, $Consulta_31);
										$Resultado_31= mysqli_fetch_array($Recordset_31);
										$Participante_31= $Resultado_31["Nombre"];
										$Participante_32= $Resultado_31["Apellido"];
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
										// if($Participante_6 >= 2){  ?>
										 	<!-- <strong class="Inicio_8"><?php echo $Participante_6;?> participantes aún no han respondido esta prueba</strong>  <?php  
										// }
										// else if($Participante_6 == 1){  ?> 
										// 	<strong class="Inicio_8"><?php echo $Participante_6;?> participante aún no ha respondido esta prueba</strong>  <?php 
										// }  
										?>
										<!-- <p class="Inicio_5">Tu posición esta semana es de Nº <?php //echo $Posicion['PusRea'];?> de <?php// echo $Participante_4;?> participantes.</p>  -->
										<div class="tabla_4">
											<table>
												<caption class="caption_lider">Líder de hoy</caption>
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
														<td class="tabla_0"><?php				
															//Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
															if($Resultado_31["Iglesia"]== "Otro"){
																echo $Resultado_31["Otra_Iglesia"];
															}
															else{
																echo $Resultado_31["Iglesia"];
															}	?>
														</td>
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
												<caption class="caption_lider">Líder de la semana</caption>
												<thead>
													<th>Nombre</th>
													<th>Apellido</th>
													<th>Iglesia</th>
													<th>Región</th>
												</thead>
												<tbody>	<?php
													//Se consulta el nombre del lider de la semana 
													$Consulta_31="SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia,  participante.Otra_Iglesia,  participante.SubRegion FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1";
													$Recordset_31= mysqli_query($conexion, $Consulta_31);
													$Resultado_31= mysqli_fetch_array($Recordset_31);
													$Participante_30= $Resultado_31["ID_Participante"];
													$Participante_31= $Resultado_31["Nombre"];
													$Participante_32= $Resultado_31["Apellido"];
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
														<td class="tabla_0"><?php				
															//Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
															if($Resultado_31["Iglesia"]== "Otro"){
																echo $Resultado_31["Otra_Iglesia"];
															}
															else{
																echo $Resultado_31["Iglesia"];
															}	?>
														</td>
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
					<img class="imagen_3" alt="Logotipo horebi.com" src="../images/logo.png">
					<label class="Inicio_23">horebi.com</label>
					<!-- <span class="span_7">Reavivados</span>  -->
					<p class="p_8">El propósito de esta plataforma es incentivar la lectura bíblica y exaltar el sábado como día especial de dedicación a Jehová.</p>
					<?php include("modulos/footer.php");?>
				</footer>
			</body>
		</html>	
		<?php 
	// }   
	// else{ // Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al formulario de registro  
	// 	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=principal.php'>";  
	// } 

	?>