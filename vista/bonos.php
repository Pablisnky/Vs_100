<?php
$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
//   echo "ID_Participante= " . $participante . "<br>";
?>

<!--Se inserta en ultima.php linea 120 -->
<link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria icomoon.io  -->

<?php
	//Se inserta la semana, el dia y numero de semana 
	$Semana= date("W");
	//date("w") regresa el dia de la semana, toma como primer dia el domingo = 0
	$DiaSemana=  date("w");
	//   echo "Semana:" . $Semana . "<br>";
	//   echo "Dia de la semana:" . $DiaSemana . "<br>";
	 $Insertar= "INSERT INTO participacion_semanal(ID_Participante, N_Semana, Dia_semana, Fecha_participacion) VALUES('$participante','$Semana', '$DiaSemana', NOW())";
	 mysqli_query($conexion, $Insertar);
	
	//se consulta cuales dias participo en el test
	$Consulta_A="SELECT * FROM participacion_semanal WHERE ID_Participante='$participante' AND N_semana='$Semana'";
	// $Rellenado[]="";
	$Recordset_A = mysqli_query($conexion,$Consulta_A);
	while($Resultado= mysqli_fetch_array($Recordset_A)){
		$Rellenado[]= $Resultado["Dia_semana"];
	}
	// $Rellenado= array_pad($Dias,7,"a");
	// var_dump($Rellenado) . "<br>";
	
	//Se recorre el array para ver que dias tiene, estos son los dias que el participante hizo el test
	$long= count($Rellenado);
	for($i=0; $i < $long; $i++){
		 $Rellenado[$i];
		//  echo "El array contiene los numeros: " .  $Rellenado[$i] . "<br>";
	}
?>
<div class="tabla_3">
	<table >
		<caption class="caption_lider">Sistema de Bonificación</caption>
		<thead>
			<th>Constancia</th>
			<th>Liderazgo</th>
			<th>Prioridad</th>
			<!-- <th>Evangelización</th> -->
		</thead>
		<tbody>	
			<tr>
				<td>
					<div class="contenedor_20">
						<div>
							<?php
							$IndiceDom = in_array('0', $Rellenado, true);
							if($IndiceDom){  ?>
								<label class="tabla_5">Dom</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>  <?php   
							}
							else{ 
								if($DiaSemana > 0){ ?> 
									<label class="tabla_5">Dom</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							}    ?>
						</div>
						<div>
							<?php
							$IndiceLun = in_array('1', $Rellenado, true);
							if($IndiceLun){  ?>
							<label class="tabla_5">Lun</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>  <?php   
							}
							else{
								if($DiaSemana < 1){ ?> 
									<label class="tabla_5">Lun</label> <?php
								}   
								else{ ?>
									<label class="tabla_5">Lun</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							}    ?>
						</div>
						<div>
							<?php
							$IndiceMar = in_array('2', $Rellenado, true);
							if($IndiceMar){  ?>
							<label class="tabla_5">Mar</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>   <?php   
							}
							else{ 
								if($DiaSemana < 3){ ?> 
									<label class="tabla_5">Mar</label> <?php
								}   
								else{ ?>
									<label class="tabla_5">Mar</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							}    ?>
						</div>
						<div>
							<?php
							$IndiceMir = in_array('3', $Rellenado, true);
							if($IndiceMir){  ?>
							<label class="tabla_5">Mie</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>  <?php   
							}
							else{ 
								if($DiaSemana < 4){ ?> 
									<label class="tabla_5">Mie</label> <?php
								}   
								else{ ?>
									<label class="tabla_5">Mie</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							}    ?>
						</div>
						<div>
							<?php
							$IndiceJue = in_array('4', $Rellenado, true);
							if($IndiceJue){  ?>
							<label class="tabla_5">Jue</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>  <?php   
							}
							else{
								if($DiaSemana < 5){ ?> 
									<label class="tabla_5">Jue</label> <?php
								}   
								else{ ?>
									<label class="tabla_5">Jue</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							} ?>
						</div>
						<div>
							<?php
							$IndiceVie = in_array('5', $Rellenado, true);
							if($IndiceVie){  ?>
							<label class="tabla_5">Vie</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>  <?php   
							}
							else{ 
								if($DiaSemana < 6){ ?> 
									<label class="tabla_5">Vie</label> <?php
								}   
								else{ ?>
									<label class="tabla_5">Vie</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							}    ?>
						</div>
						<div>
							<?php
							$IndiceSab = in_array(6, $Rellenado, true);
							if($IndiceSab){  ?>
							<label class="tabla_5">Sab</label><label class="tabla_6"><?php echo "<span class='icon icon-checkmark'></span>"?></label>  <?php   
							}
							else{ 
								if($DiaSemana < 7){ ?> 
									<label class="tabla_5">Sab</label> <?php
								}   
								else{ ?>
									<label class="tabla_5">Sab</label><label class="tabla_6"><?php echo "<span class='icon icon-cross'></span>"?></label>    <?php
								}   
							}    ?>
						</div>
					</div>
					<?php
						// if(($IndiceDom == 1) AND ($IndiceLun == 1) AND ($IndiceMar == 1) AND ($IndiceMie == 1) AND ($IndiceJue == 1) AND ($IndiceVie == 1) AND ($IndiceSab == 1)){   ?>
							<!-- <label class="label_1">Opción de bono en curso</label>-->   <?php 
						// }
						// else{
							// echo "<label class='label_1'>Opción de bono perdida</label>";
						// }
					?>
				</td>
				<div>
				<!-- Bono de liderazgo -->
				<td class="tabla_0 td_1">Código en desarrollo</td>
				<!-- Bono de prioridad -->
				<td class="tabla_0">
					<?php
						//se consulta si participo antes de las siete de la mañana
						$Consulta_2= "SELECT ID_Participante, HOUR(TIME(Fecha_pago)) as hora FROM participantes_pruebas WHERE ID_Participante='$participante' AND HOUR(TIME(Fecha_pago)) < '7' AND Tema = 'Reavivados' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE()";
						$Recordset_2 = mysqli_query($conexion,$Consulta_2);
						$Resultado_2= mysqli_num_rows($Recordset_2);
						// echo $Resultado_2["hora"];
						if($Resultado_2 == 1){    ?>
							<label class="tabla_6"><span class='icon icon-checkmark'></span></label><?php
						}
						else{    ?>
							<label class="tabla_6"><span class='icon icon-cross'></span></label> <?php
						}
					?>
				</td>
				
				<!-- Bono de evangelización -->
				<!-- <td class="tabla_0">Código en desarrollo</td> -->
			</tr>
		</tbody>
	</table>	
			<label class="Inicio_18  buttonCinco" onclick="verBonos()">Conoce el sistema de bonos</label>	
</div>

