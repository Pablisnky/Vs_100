<?php   
session_start();    //se inicia sesion para llamar a una variable almacenada en validarSesion.php

	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	    //echo $participante;

	$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
	// echo "El tema de la prueba es: " . $Tema;

	$CodigoPrueba =$_SESSION["codigoPrueba"];
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Final</title>

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
			include("../../conexion/Conexion_BD.php");	

	    	//se realiza una consulta para obtener el nombre del participante
	    	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";//se plantea la consulta
			$Recordset = mysqli_query($conexion,$Consulta);//se manda a ejecutar la consulta
			$Participante= mysqli_fetch_row($Recordset);
		?>
		<input type="text" class="ocultar" id="Tema" value="Colombia">
		<input type="text" class="ocultar" id="ID_Pregunta" value= "10">
		<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
		<?php
			//Consulta realizada para verificar que la pregunta anterior esta respondida y puede entrar en esta.
			$Consulta_3="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND ID_Pregunta = 10 AND Tema= '$Tema' ";
			$Recordset_3 = mysqli_query($conexion,$Consulta_3);
			$Respondida= mysqli_num_rows($Recordset_3);//se suman los registros que tiene la consulta realizada.
				//echo $Respondida;	

		    if($Respondida>0){//Condicion que impide entrar a una pregunta sino a respondido la pregunta previa, $_SESSION creada en sumaPuntaje.php

		   	//se actualiza en la BD que no tiene esta prueba pendiente
			$Actualiza="UPDATE participantes_pruebas SET Prueba_Activa= 0, Prueba_Cerrada = 1 WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba' ";
			mysqli_query($conexion,$Actualiza);
    	?>
		<div class="Secundario">
			<div class="encabezado">
	    		<h1 class="anula">Vs_100.com</h1>
		    </div>
	    	<div class="encabezado_2">
		    	<div id="mostrarPuntos"></div><!-- recibe el puntaje del participante desde Ajax en puntaje.js-->
			</div>
	    	<hr>
			<h4>Has concluido tu prueba para el tema</h4>
			<p class="pais"><?php echo $Tema;?></p>
			<hr>
			<div class="ultimaPregunta">
				<?php
			    	//se realiza una consulta para obtener los puntos del participante
			    	$Consulta="SELECT * FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema' AND ID_PP = '$CodigoPrueba'";//se plantea la consulta
					$Recordset = mysqli_query($conexion, $Consulta);//se manda a ejecutar la consulta
					$Participante= mysqli_fetch_array($Recordset);

			    	//se realiza una consulta para obtener el tiempo de respuesta del participante
			    	$Consulta_1="SELECT SEC_TO_TIME(SUM(TIMEDIFF(Hora_Respuesta,Hora_Pregunta))) AS TiempoTotal FROM respuestas WHERE ID_PP = '$CodigoPrueba' ";
					$Recordset_1 = mysqli_query($conexion, $Consulta_1);//se manda a ejecutar la consulta
					$Tiempo= mysqli_fetch_array($Recordset_1);
  
 ?>
		    	<p class="Inicio_1">Los puntos acumulados son: <?php echo $Participante["Puntos"];?></p>
		    	<p class="Inicio_1">El tiempo en responder fue: <?php echo $Tiempo["TiempoTotal"];?></p>
		    	<p class="Inicio_1">El tiempo en responder cada pregunta:</p>
		    	<div style="background-color: ; width: 20%; margin: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Pregunta</th>
                            <th>Tiempo</th>
                            <!--<th  style="font-size: 0.9vw; background-color: #040652; color: white;">ULTIMA PARTICIPACION</th>-->
                        </tr>
                    </thead>
                    <?php
					//Se consulta el tiempo que tardo en responder una pregunta
					$Consulta_2="SELECT ID_Pregunta, TIMEDIFF(Hora_Respuesta,Hora_Pregunta) AS tiempo FROM respuestas WHERE ID_PP = '$CodigoPrueba' AND Correcto = 1";
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
		    	<p class="Inicio_1">Tu posición fue la Nº xxxxxx, de xxxxx sigue intentando.</p>
		    	<p class="Inicio_1">Reporte de respuesta.</p>
		    	<br>
		    	<p class="Inicio_1">Tabla de resultados.</p>
		    	<div class="Gratis_2">
			    	<p class="Inicio_3">Gracias por acompañarnos y ser parte de la comunidad de Vs_100</p>
			    	<br>
			    </div>
	    	</div>
	    	<nav class="">
				<a class="nav_7" href="../../controlador/entrada.php" class="">Inicio</a>
				<a class="nav_7" href="../../controlador/cerrarSesion.php">Cerrar Sesión</a>
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
					<div class="nav_1"><a href="preguntaCristianismo_10.php">Volver</a></div>
				</nav>
			</div>
			
		<?php	}
		?>
