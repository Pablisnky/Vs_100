<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
  		// echo "La sesion no fue creada";
  		header("location:../vista/principal.php");		
	}
	else{ ?>

<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
			<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
		</head>	
		<body>
			<div class="Secundario">
				<p class="Inicio_9">Cierre de pruebas.</p>	
                <table style="width:50% !important">
                	<thead >
                        <tr>
                            <th style="width: 10% !important;">ID_PRUEBA</th>
                            <th style="width: 10% !important;">ID_PARTICIPANTE</th>
                            <th style="width: 10% !important;">POSICIÓN</th>
                        </tr>
                    </thead>
                    <tbody>
                    		<?php
							include("../conexion/Conexion_BD.php");
	
							$Tema= $_SESSION["Tema"];//en esta sesion se tiene guardado el tema de la prueba, sesion creada en seleccionTema.php
							// echo "El tema de la prueba es: " . $Tema . "<br>";

						    switch($Tema){
						        case 'Biblia_Genesis': 
						        	  $ID_Prueba = 1;
						       	break;
						        case 'Biblia_Exodo': 
						        	  $ID_Prueba = 2;
						       	break;
						        case 'Biblia_Jeremias': 
						        	  $ID_Prueba = 3;
						       	break;
						    }
				                //Se consulta la posicion en una prueba especifica según sus puntos
				            	$Consulta_5="SELECT (@cont := @cont+1) AS Puesto, A.* FROM participantes_pruebas A, (SELECT @cont := 0) AS B WHERE ID_Prueba = $ID_Prueba ORDER BY Puntos DESC";
								$Recordset_5 = mysqli_query($conexion, $Consulta_5);
								while($Posicion= mysqli_fetch_array($Recordset_5)){ 

									$ID_Prueba= $Posicion['ID_Prueba'];
									$ID_Participante= $Posicion['ID_Participante'];
									$Puesto= $Posicion['Puesto'];  ?>
							
                    				<tr>
			                			<td><?php echo $Posicion['ID_Prueba'];?></td>
			                			<td><?php echo $Posicion['ID_Participante'];?></td>
			                			<td><?php echo $Posicion['Puesto'];?></td>
						                		  <?php
											    $Insertar= "INSERT INTO posicion_prueba(ID_Prueba, ID_Participante, posicion) VALUES('$ID_Prueba','$ID_Participante','$Puesto')";
												mysqli_query($conexion, $Insertar);   
				                
										// $Actualizar= "UPDATE participantes_pruebas JOIN posicion_prueba ON participantes_pruebas.ID_Participante=posicion_prueba.ID_Participante SET participantes_pruebas.posicion=posicion_prueba.posicion ";
										// mysqli_query($conexion, $Actualizar);
			                       }?> </tr> 
                    </tbody>
                </table>
			</div>
</div>
    		</div>
			</body>
		</html>   
<?php  }  ?>
