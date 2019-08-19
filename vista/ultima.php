<?php
// session_start();    //se inicia sesion para llamar a una variable 

	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	// echo "ID_Participante= " . $participante . "<br>";

	$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
	//  echo "El tema de la prueba es: " . $Tema . "<br>";

	$Categoria= $_SESSION["Categoria"];//en esta sesion se tiene guardado la categoria de la prueba, sesion creada en seleccionTema.php
	// echo "La categoria de la prueba es: " . $Categoria . "<br>";

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
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";//se plantea la consulta
			$Recordset = mysqli_query($conexion,$Consulta);//se manda a ejecutar la consulta
			$Participante= mysqli_fetch_array($Recordset);
		?>
		<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
		<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->

		<div class="Secundario">
			<h4 class="ultima_1"><?php echo $Participante["Nombre"];?></h4>
			<?php 				
				if($Tema == "Reavivados"){ ?>
					<h4 class="ultima_1">Has concluido tu prueba diaria sobre <br> Reavivados por su palabra</h4>  <?php
				} 
				else{  ?>           				
					<h4 class="ultima_1">Has concluido tu prueba sobre:</h4>
					<h4 class="ultima_1"><?php echo $Categoria . "_" . $Tema;?></h4>  <?php
				}  
			?>
			<div class="ultimaPregunta">
				<?php
			    	//se realiza una consulta para obtener los puntos del participante
			    	$Consulta="SELECT * FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";//se plantea la consulta
					$Recordset = mysqli_query($conexion, $Consulta);//se manda a ejecutar la consulta
					$Participante= mysqli_fetch_array($Recordset);
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$Decimal = str_replace('.', ',', $Participante["Puntos"]); 
					
					//(Reavivads)se consulta los puntos acumulados en todas las pruebas
			    	$Consulta_0="SELECT SUM(Puntos) AS Acumulado FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema'";
					$Recordset_0= mysqli_query($conexion, $Consulta_0);
					$Participante_0= mysqli_fetch_array($Recordset_0);
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
					$Decimal_0 = str_replace('.', ',', $Participante_0["Acumulado"]);

			    	//se realiza una consulta para obtener el tiempo total de respuesta del participante
			    	$Consulta_1="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS TiempoTotal FROM respuestas WHERE ID_Participante='$participante' AND ID_PP = '$CodigoPrueba' AND Correcto= 1";
					$Recordset_1 = mysqli_query($conexion, $Consulta_1);//se manda a ejecutar la consulta
					$Tiempo= mysqli_fetch_array($Recordset_1);
 				?>
		    	<p class="Inicio_5">Tiempo total: <?php echo $Tiempo["TiempoTotal"];?></p>
		    	<p class="Inicio_5">Puntos ganados hoy: <?php echo $Decimal;?></p>
		    	<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal_0;?></p>
            	<?php
            		//Se busca en que posicion quedo el participante
            		//Se consulta cuantos puntos tiene un participante  
            		$Puesto= $Participante["Puntos"];
            		// echo "Puntos acumulados= " . $Puesto . "<br>";

            		//Se consulta su posicion segun sus puntos
            		$Consulta_5="SELECT COUNT(*) AS Pus FROM participantes_pruebas WHERE Puntos >= '$Puesto' AND ID_Prueba='$ID_Prueba'";
					$Recordset_5 = mysqli_query($conexion, $Consulta_5);//se manda a ejecutar la consulta
					$Posicion=  mysqli_fetch_array($Recordset_5);//Se obtienen los resultados
					// echo "Ocupas el puesto Nº= " . $Posicion['Pus'] . "<br>";

					//Se consulta cuantos participantes hay en la prueba
			    	$Consulta_4="SELECT * FROM participantes_pruebas WHERE Tema='$Tema' AND ID_Prueba='$ID_Prueba'";//se plantea la consulta
					$Recordset_4 = mysqli_query($conexion, $Consulta_4);//se manda a ejecutar la consulta
					$Participante_4= mysqli_num_rows($Recordset_4);
					 // echo "El total de participantes son= " . $Participante_4 . "<br>";

					//Se consulta cuantos participantes faltan por responder la prueba
			    	$Consulta_6="SELECT ID_Prueba FROM participantes_pruebas WHERE ID_Prueba='$ID_Prueba' AND Prueba_Cerrada= 0";//se plantea la consulta
					$Recordset_6 = mysqli_query($conexion, $Consulta_6);//se manda a ejecutar la consulta
					$Participante_6= mysqli_num_rows($Recordset_6);
					// echo "Faltan por responder " . $Participante_6 . " participantes";

					// Se consulta si es una prueba libre o una de pago
					$Consulta_7= "SELECT Categoria FROM participantes_pruebas WHERE Categoria= 'Biblia' AND Tema = '$Tema'";
					$Recordset_7 = mysqli_query($conexion, $Consulta_7);
					$Prueba= mysqli_fetch_array($Recordset_7);
					// echo $Prueba["Deposito"];

					if($Prueba["Categoria"] == "Biblia"){ 
						//Se consulta su posicion del dia segun sus puntos
						$Consulta_5="SELECT DISTINCT(ID_Participante), COUNT(ID_Participante) AS Pus FROM participantes_pruebas WHERE Puntos >= '$Puesto' AND ID_Prueba='$ID_Prueba' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE()";
						$Recordset_5 = mysqli_query($conexion, $Consulta_5);  
						$PosicionBiblia=  mysqli_fetch_array($Recordset_5);

						//Se consulta cuantos participantes hay en la prueba el dia de hoy
						$Consulta_4="SELECT DISTINCT(ID_Participante) FROM participantes_pruebas WHERE Tema='$Tema' AND ID_Prueba='$ID_Prueba'";//se plantea la consulta
						$Recordset_4 = mysqli_query($conexion, $Consulta_4);//se manda a ejecutar la consulta
						$Participante_4= mysqli_num_rows($Recordset_4);
						// echo "El total de participantes son= " . $Participante_4 . "<br>";

						//Se consulta la posicion general del participante
						$Consulta_8="SELECT (@numero:= @numero + 1) AS Posicion, ID_Participante, SUM(Puntos) AS Suma FROM participantes_pruebas CROSS JOIN (SELECT @numero:= 0) r WHERE ID_Prueba=5 GROUP BY ID_Participante ORDER BY Suma DESC ";
						$Recordset_8 = mysqli_query($conexion, $Consulta_8);
						while($PosicionBibliaGeneral=  mysqli_fetch_array($Recordset_8)){
							echo "TU Posicion Gneral: " . $PosicionBibliaGeneral['Posicion'] . "<br>";
						}

						//Se ordenan los resultados en una tabla para sacar la posicion general

						//Se consulta su posicion segun sus puntos
						$Consulta_5="SELECT COUNT(*) AS Pus FROM participantes_pruebas WHERE Puntos >= '$Puesto' AND ID_Prueba='$ID_Prueba'";
						$Recordset_5 = mysqli_query($conexion, $Consulta_5);//se manda a ejecutar la consulta
						$Posicion=  mysqli_fetch_array($Recordset_5);//Se obtienen los resultados
						// echo "Ocupas el puesto Nº= " . $Posicion['Pus'] . "<br>";
							?>

						<p class="Inicio_5">Tu posición hoy fue de Nº <?php echo $PosicionBiblia['Pus'];?> de <?php echo $Participante_4;?> participantes.</p> 
						<p class="Inicio_5">Tu posición general es de Nº <?php echo $PosicionBibliaGeneral['Posicion'];?> de <?php echo $Participante_4;?> participantes.</p> 
						<p class="Inicio_5">Actualmente el lider general de la prueba es:<?php echo "Pablito";?></p>  <?php
					} 
					else{ 
		    			if($Participante_6 == 0){  ?>           	
		    				<p class="Inicio_5">Te ubicas en la posición Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4;?> participantes.</p>  <?php
		    			}   
		    			if($Participante_6 >= 2){  ?>
		    				<p class="Inicio_5">Temporalmente te encuentras en la posición Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4;?> participantes.</p> 
		    				<strong class="Inicio_8"><?php echo $Participante_6;?> participantes aún no han respondido esta prueba</strong>  <?php 
		    			}
		    			else if($Participante_6 == 1){  ?>
		    				<p class="Inicio_5">Temporalmente te ubicas en la posición Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4;?> participantes.</p> 
		    				<strong class="Inicio_8"><?php echo $Participante_6;?> participante aún no ha respondido esta prueba</strong>  <?php 
		    			}  
		    		}  ?>
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
						$Recordset_2 = mysqli_query($conexion, $Consulta_2);//se manda a ejecutar la consulta					
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
							$Recordset_3 = mysqli_query($conexion, $Consulta_3);//se manda a ejecutar la consulta
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
			<div>
				<?php
				//Se consulta si el usuario tiene pruebas pendientes po responde del tema "Reavivados por su palabra"
				if($Tema == "Reavivados"){
					$Consulta_7="SELECT ID_PP, DATE_FORMAT(Fecha_pago, '%Y/%m/%d') AS Fecha_pago FROM participantes_pruebas WHERE Tema = 'Reavivados' AND ID_Participante = '$participante' AND Prueba_Cerrada= 0";
					$Recordset= mysqli_query($conexion, $Consulta_7);
					if(mysqli_num_rows($Recordset)!=0){  ?>
						<p>Aún tienes las siguientes pruebas diarias sobre "Reavivados por su palabra" sin responder</p>
						<table>
							<thead>
								<th>Pruebas anteriores pendientes</th>
							</thead>
							<tbody>
								<?php
									while($Resultado= mysqli_fetch_array($Recordset)){ ?>
										<tr>
											<td><a href="../tema/biblia/ReavivadosPalabra/fecha.php?fecha=<?php echo $Resultado["Fecha_pago"]?>&ID_PP=<?php echo $Resultado["ID_PP"]?>"><?php echo $Resultado["Fecha_pago"]?></a></td>
										</tr>  <?php
									}   ?>
							</tbody>   
						</table>  <?php
					} 
				}	?>
			</div>
		    <div class="Gratis_2">
				<?php
					if($Tema == "Reavivados"){ 
						echo "<h4>Mañana continuamos.</h4>";
					}
				?>
		    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de Versus_20</p>
		    </div>
	    	</div>
			<nav class="navegacion_2">
				<a class="nav_10" href="../controlador/entrada.php">Inicio</a>
				<a class="nav_10" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>
			</nav>
		</div>
	</body>
</html>	