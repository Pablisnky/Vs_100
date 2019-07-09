<?php   
// session_start();    //se inicia sesion para llamar a una variable almacenada en validarSesion.php

	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	//echo $participante;

	$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
	// echo "El tema de la prueba es: " . $Tema;

	$CodigoPrueba =$_SESSION["codigoPrueba"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Final <?php echo $Tema;?></title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas biblicas."/>
		<meta name="keywords" content="citas biblicas, biblia"/>
		<meta name="author" content="HOREBI"/>
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
		    <h4><?php echo $Participante["Nombre"];?></h4>
			<h4>Has concluido tu prueba sobre <?php echo $Tema;?></h4>
			<br>
			<div class="ultimaPregunta">
				<?php
			    	//se realiza una consulta para obtener los puntos del participante
			    	$Consulta="SELECT * FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";//se plantea la consulta
					$Recordset = mysqli_query($conexion, $Consulta);//se manda a ejecutar la consulta
					$Participante= mysqli_fetch_array($Recordset);
					
					//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
			 		$Decimal = str_replace('.', ',', $Participante["Puntos"]); 

			    	//se realiza una consulta para obtener el tiempo total de respuesta del participante
			    	$Consulta_1="SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(TIMEDIFF(Hora_Respuesta,Hora_Pregunta)))) AS TiempoTotal FROM respuestas WHERE ID_Participante='$participante' AND ID_PP = '$CodigoPrueba' AND Correcto= 1";
					$Recordset_1 = mysqli_query($conexion, $Consulta_1);//se manda a ejecutar la consulta
					$Tiempo= mysqli_fetch_array($Recordset_1);
 				?>

		    	<p class="Inicio_5">Puntos acumulados: <?php echo $Decimal;?></p>
            	<?php
            		//Se busca en que posicion queo el participante
            		//Se consulta cuantos puntos tiene un participante  
            		$Puesto= $Participante["Puntos"];
            		// echo "Puntos acumulados= " . $Puesto . "<br>";

            		//Se consulta su posicion segun sus puntos
            		$Consulta_5="SELECT COUNT(*) AS Pus FROM participantes_pruebas WHERE puntos >= '$Puesto' AND Tema='$Tema' ";
					$Recordset_5 = mysqli_query($conexion, $Consulta_5);//se manda a ejecutar la consulta
					$Posicion=  mysqli_fetch_array($Recordset_5);//Se obtienen los resultados
					// echo "Ocupas el puesto Nº= " . $Posicion['Pus'] . "<br>";

					//Se consulta cuantos participantes hay en la prueba
			    	$Consulta_4="SELECT * FROM participantes_pruebas WHERE Tema='$Tema'" ;//se plantea la consulta
					$Recordset_4 = mysqli_query($conexion, $Consulta_4);//se manda a ejecutar la consulta
					$Participante_4= mysqli_num_rows($Recordset_4);
					// echo "El total de participantes son= " . $Participante_4 . "<br>";
            	?>
		    	<p class="Inicio_5">Te ubicas en la posición Nº <?php echo $Posicion['Pus'];?> de <?php echo $Participante_4;?> participantes.</p>
		    	<p class="Inicio_5">Tiempo total: <?php echo $Tiempo["TiempoTotal"];?></p>
		    	<p class="Inicio_5">Tiempo por pregunta:</p>
		    	<div class="tabla_3">
                <table>
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Tiempo</th>
                        </tr>
                    </thead>
                    <?php
					//Se consulta el tiempo que tardo en responder una pregunta
					$Consulta_2="SELECT ID_Pregunta, TIMEDIFF(Hora_Respuesta,Hora_Pregunta) AS tiempo FROM respuestas WHERE  ID_Participante='$participante' AND ID_PP = '$CodigoPrueba' AND Correcto = 1";
					$Recordset_2 = mysqli_query($conexion, $Consulta_2);//se manda a ejecutar la consulta
					while($TiempoPregunta= mysqli_fetch_array($Recordset_2)){  ?>
                    <tbody>
                        <tr>
                            <td class="tabla_0"><?php echo $TiempoPregunta["ID_Pregunta"];?></td>
                            <td class="tabla_1"><?php echo $TiempoPregunta["tiempo"];?></td> 
                            <!-- <td class="tabla_1"><?php// echo date("d-m-Y", strtotime($participantes["fecha_Registro"])); ?></td><!se cambia el formato de la fecha de registro--> 
                            <!--<td><?php// echo date("d-m-Y", strtotime($participantes[0])); ?></td>se cambia el formato de la fecha de ultima participacion-->           
                        </tr>
                        <?php  
                    }   ?> 
                    </tbody>
                 </table>
			    </div>
		    	<div class="Gratis_2">
			    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de Vs_100</p>
			    </div>
	    	</div>
	    	<nav>
				<a class="nav_7" href="../controlador/entrada.php">Inicio</a>
				<a class="nav_7" href="../controlador/cerrarSesion.php">Cerrar Sesión</a>
			</nav>
		</div>
	</body>
</html>