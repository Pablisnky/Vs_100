<?php
session_start();    //se inicia sesion para llamar a una variable 

	$participanteDemo= $_SESSION["ID_PD"];//en esta sesion se guarda el id del participante, sesion creada en recibe_demo.php
	// echo "ID_Participante: " . $participanteDemo . "<br>";

	$Tema= "Demo";
	// echo "El tema de la prueba es: " . $Tema;

	$CodigoPrueba= "demo";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Final <?php echo $Tema;?></title>

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
			include("../../conexion/Conexion_BD.php");	

	    	//se realiza una consulta para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante_demo WHERE ID_PD='$participanteDemo'";//se plantea la consulta
			$Recordset = mysqli_query($conexion, $Consulta);//se manda a ejecutar la consulta
			$ParticipanteDemo= mysqli_fetch_array($Recordset);
		?>
		
		<input type="text" class="ocultar" id="Tema" value="Demo"> 
    	<input type="text" class="ocultar" id="ID_PP" value="<?php echo $participanteDemo;?>"><!-- se utiliza para enviar a puntaje.js-->
		<?php
				//Se consulta si el participante a respondido la pregunta anterior
				$Consulta="SELECT * FROM respuestas_demo WHERE ID_PD='$participanteDemo' AND Correcto='1' AND Tema='$Tema'";
				$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion)); 
				$Respondida= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
				// echo $Respondida;

				if($Respondida>9){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php

		    	//se actualiza en la BD que no tiene esta prueba pendiente
				$Actualiza="UPDATE participante_demo SET Prueba_Activa= 0 WHERE ID_PD='$participanteDemo' AND Tema='$Tema' ";
				mysqli_query($conexion,$Actualiza);
	    	?>
			<div class="Secundario">
				<div class="encabezado">
		    		<h1 class="anula">Vs_100.com</h1>
		    	</div>
		    <h4><?php echo $ParticipanteDemo["usuario"];?></h4>
			<h4>Has concluido tu prueba Demo</h4>
			<br>
			<div class="ultimaPregunta">
				<?php
			    	//se realiza una consulta para obtener los puntos totales del participante
			    	$Consulta="SELECT * FROM participante_demo WHERE ID_PD='$participanteDemo'";//se plantea la consulta
					$Recordset = mysqli_query($conexion, $Consulta);//se manda a ejecutar la consulta
					$Participante= mysqli_fetch_array($Recordset);
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
			 		$Decimal = str_replace('.', ',', $Participante["puntos"]);

			    	//se realiza una consulta para obtener el tiempo de respuesta del participante
			    	$Consulta_1="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS TiempoTotal FROM respuestas_demo WHERE ID_PD='$participanteDemo' ";
					$Recordset_1 = mysqli_query($conexion, $Consulta_1);//se manda a ejecutar la consulta
					$Tiempo= mysqli_fetch_array($Recordset_1);
 				?>
		    	<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal;?></p>
            	<?php
            		//Se busca en que posicion queo el participante
            		//Se consulta cuantos puntos tiene un participante  
            		$Puesto= $Participante["puntos"];
            		// echo "Puntos acumulados= " . $Puesto . "<br>";

            		//Se consulta su posicion segun sus puntos
            		$Consulta_3="SELECT COUNT(*) AS Pus FROM participante_demo WHERE puntos >= '$Puesto'  ";
					$Recordset_3 = mysqli_query($conexion, $Consulta_3);//se manda a ejecutar la consulta
					$Posicion=  mysqli_fetch_array($Recordset_3);//Se obtienen los resultados
					// echo "Ocupas el puesto Nº= " . $Posicion['Pus'] . "<br>";

					//Se consulta cuantos participantes hay en la prueba
			    	$Consulta_4="SELECT * FROM participante_demo";//se plantea la consulta
					$Recordset_4 = mysqli_query($conexion, $Consulta_4);//se manda a ejecutar la consulta
					$Participante_4= mysqli_num_rows($Recordset_4);
					// echo "El total de participantes son= " . $Participante_4 . "<br>";
            	?>
		    	<p class="Inicio_5">Te ubicas en la posición Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4;?> participantes.</p>
		    	<p class="Inicio_5">Tiempo total: <?php echo $Tiempo["TiempoTotal"];?></p>
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
						$Consulta_2="SELECT ID_Pregunta, puntoGanado, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo FROM respuestas_demo WHERE  ID_PD='$participanteDemo' AND Correcto = 1 AND puntoGanado > 0 GROUP BY ID_Pregunta ";
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
	                 // puntos descontados por cada pregunta incorre
						$Consulta_3="SELECT ID_Pregunta, SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS tiempo, SUM(puntoGanado) As penalizacion FROM respuestas_demo WHERE ID_PD='$participanteDemo' AND puntoGanado <= 0.000 GROUP BY ID_Pregunta ";
						$Recordset_3 = mysqli_query($conexion, $Consulta_3);//se manda a ejecutar la consulta
						while($PuntosPregunta= mysqli_fetch_array($Recordset_3)){  ?>
	                    <tbody>
	                        <tr>
	                            <td class="tabla_0"><?php echo $PuntosPregunta["ID_Pregunta"];?></td>
	                            <td class="tabla_1"><?php echo $PuntosPregunta["penalizacion"];?></td>
	                            <td class="tabla_0"><?php echo $PuntosPregunta["tiempo"];?></td>  
	                    </tr><?php
	                     } ?>
	                </tbody>
	            </table>
            </div>
		    	<div class="Gratis_2">
			    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de Vs_100</p>
					<a class="nav_7" href="../../vista/registro.php">Registra una cuenta</a>
					<a class="nav_7" href="../../vista/participantes.php">Ver tabla de resultados</a>
			    </div>
	    	</div>

	    	<nav class="navegacion_1" style="margin-top:;">
			</nav>
		</div>
	</body>
</html>

<?php
			}
			else{//sino a respondido la pregunta previa entra en esta sección
		?>
			<div class="Secundario">
				<div>
		    		<h1 class="anula">Vs_100.com</h1>
		    	</div>
			
				<div class="Cuarto_4">
					<p>No ha respondido correctamente la pregunta Nº 10, debe dar una respuesta correcta</p>
				</div>
				<br>
				<nav class="navegacion">
					<div class="nav_1"><a href="preguntaDemo_10.php">Volver</a></div>
				</nav>
			</div>
			
		<?php	}
		?>


	