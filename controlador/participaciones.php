<?php
session_start();
	if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["ID_Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login, sesion creada en validarSesion.php
  		
  		header("location:../vista/principal.php");		
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
		include("../conexion/Conexion_BD.php");

		$participante=$_SESSION["ID_Participante"];
    	//  echo "ID_Participante:" .  $participante . "<br>";

	    //se consulta en cuantas pruebas el participante se ha inscrito y se obtiene (fecha,puntos y tema)
	    $Consulta= "SELECT COUNT(*) AS Participacion FROM participantes_pruebas WHERE ID_Participante = '$participante' AND Prueba_Cerrada = 1";
	    $Recordset=mysqli_query($conexion,$Consulta); 
	    $participantes= mysqli_fetch_array($Recordset);
	    $Participaciones= $participantes["Participacion"];
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Inicio</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas para ganar dinero."/>
				<meta name="keywords" content="juego, preguntas, dinero"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
			   	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
        		<link rel="shortcut icon" type="../image/png" href="../images/logo.png">

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
			</head>	
			<body>
				<header style="position: fixed;  width: 100%; ">
					<?php include("../vista/modulos/header_usuario.php");?>   		
				</header>
					<br><br><br><br><br><br>
				<div class="Secundario" onclick="ocultarMenu()">
					<?php 
					if($Participaciones == 0){ ?> 	
						<div class="participaciones_1">
							<p class='Inicio_9'>Aun no haz participado en ningúna prueba</p>
						</div>  <?php  
					}
					else{  ?>
						<p class="Inicio_9">Has participado en <?php echo $Participaciones;?> pruebas.</p>	
						<div class="participaciones">
			                <table>
			                    <thead>
			                        <tr>
			                            <th></th>
			                            <th>FECHA</th>
			                            <th>TEST</th>
			                            <th>PUNTOS</th>
			                            <!-- <th>DETALLES</th> -->
			                        </tr>
			                    </thead>
			                    <tbody>
				                    <?php
				                        $i = 1;
				                        //se consulta las pruebas en las que el participante ha participado
									    $Consulta= "SELECT Puntos, Fecha_pago, Tema, reavi_capitulo.capitulo FROM participantes_pruebas INNER JOIN reavi_capitulo ON participantes_pruebas.Fecha_pago=reavi_capitulo.fecha WHERE ID_Participante = '$participante' AND Prueba_Cerrada = 1 ORDER BY Fecha_pago DESC";
									    $Recordset=mysqli_query($conexion, $Consulta); 					            		
				                        while($Pruebas= mysqli_fetch_array($Recordset)){  
											
					                        //Se cambia el formato de los puntos, la Pruebase decimal es recibida con punto desde la BD y se cambia a coma
					                    	$Decimal = str_replace('.', ',', $Pruebas["Puntos"]); ?>
					                        <tr class="tabla_10">
												<td class="tabla_2"><?php echo $i;?></td>
												
												<td class="tabla_7"><?php echo date("d-m-Y", strtotime($Pruebas["Fecha_pago"])); ?></td>
												<?php
													if($Pruebas["Tema"]=="Reavivados"){	?>
														<td class="tabla_8"><?php echo $Pruebas["capitulo"];?></td> 	<?php
													}
													else{	?>
														<td class="tabla_8"><?php echo $Pruebas["Tema"];?></td>

														<?php
													}    ?>												
					                            <td class="tabla_9">
													<?php echo $Decimal;?> </td> 

												<td class="tabla_2"><a href="../vista/detalleTest.php?ID_Participante=<?php echo $participante?>&Tema=<?php echo $Pruebas['capitulo'];?>&Capitulo=<?php echo $Pruebas['capitulo'];?>&ID_Prueba=<?php echo $Pruebas['ID_Prueba'];?>&codigoPrueba=<?php echo $Pruebas['ID_PP']?>"><!--O--></a>
												</td> <?php -
					                         $i++;
					                    }   
			                        	  ?>      			                        	
			                        </tr>
			                    </tbody>
                			</table> 
                		<?php
                	}  ?> 
				</div>
			</div>
		</div>
		<footer>
			<?php include("../vista/modulos/footer.php");?>
		</footer>
	</body>
</html>   <?php
	}  ?>
