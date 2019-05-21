<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	
    if(!isset($_SESSION["Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
  		header("location:../index.html");			
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
?>
		
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Inicio</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas para ganar dinero."/>
		<meta name="keywords" content="juego, preguntas, dinero"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
		<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosViajeSurAmerica.css"> 
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>	
	</head>	
			<body>
				<div class="Secundario">
					<header>
			    		<h1 style="cursor: default;">Vs 100.com</h1>
					</header>
					<section style="background-color:;">
						<?php
							include("../conexion/Conexion_BD.php");

			                $participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
			                 // echo "ID_Participante:" .  $participante . "<br>";
			   				
			   				//Consulta realizada para obtener el nombre del participante y mostrarlo en pantalla
						    $Consulta_0="SELECT * FROM participante WHERE ID_Participante='$participante'";
							$Recordset_0 = mysqli_query($conexion,$Consulta_0);
							$Participante= mysqli_fetch_row($Recordset_0);
							// echo "nombre Participante:" . $Participante[1];				 
						?>
					
						<div id="entrada_1">
							<!--Se muestra en pantalla el nombre del participante-->
							<?php echo "<span class='span_0'>$Participante[1]</span>" ?>
						</div>

						<div id="EntradaParticipante">
							<div class="entrada">
								<?php
									//Consulta realizada para obtener el puntaje total del participante y mostrarlo en pantalla
									$Consulta_1="SELECT * FROM participante WHERE ID_Participante='$participante'";
									$Recordset_1 = mysqli_query($conexion, $Consulta_1);
									$Puntaje= mysqli_fetch_row($Recordset_1);//devuelve una sola fila de la tabla.
									if($Puntaje[8]){
										
									}
									echo  "<span class='span_1'>$Puntaje[8]</span>" . "<br>";
									echo "<hr>";
									echo "<span class='span_2'>Contrincantes</span> ";
								?>
							</div>
							<div class="entrada">
								<p>Tema de la prueba</p>
								<p>Venezuela</p>
							</div>
							<div class="entrada">
								<?php 
									//Se consulta cual es la posicion por puntos dentro del grupo de participantes y se muestra en pantalla
					           		$sql_posicion_usuario= "SELECT COUNT(ID_Participante) AS Posicion FROM participante WHERE Puntos > $Puntaje[8]"; 
									$resultset_posicion = mysqli_query($conexion, $sql_posicion_usuario); 
									$posicion_usuario_buscado = mysqli_fetch_array($resultset_posicion);
									$PosicionUsuario=$posicion_usuario_buscado['Posicion'];
									$PosicionUsuario++;

									echo "<span  class='span_1'>$PosicionUsuario</span>" . "<span class='span_3'>COP</span>" ."<br>";
									echo "<hr>";
									echo "<span  class='span_2'>Premio</span> ";		
						        ?>   
							</div>	
						</div>
					</section>
					<section class="entrada_5">
						<p>Registre su pago.</p>
						<br>
						<div id="mostrarTiempoBLoqueo">
							<div style="background-color: ; margin: auto; width: 40%;">
								<form action="" method="POST"  name="registroGratis" onsubmit="return validar_01()">
									<input type="text" name="cedula" id="Cedula" placeholder="Cedula"  onchange="" autocomplete="off">
									<input type="text" name="telefono" id="Telefono" placeholder="Telefono"  onchange="" autocomplete="off">
									<input type="email" name="deposito" id="Deposito" placeholder="Deposito" autocomplete="off"">

									<input type="submit"  value="Enviar" style="margin-top: 6%;">
								</form>
							</div>
						</div>
					
						<a class="nav_7" href="cerrarSesion.php" >Cerrar Sesión</a>
					</section>
			</body>
		</html>

		 <?php 
	}
		//Se corrige la hora del servidor PHP
		//$salto_horario = -4 * 60 * 60; //(se restan 4 horas)
		//$fecha = date('Y-m-d H:i:s', time() + $salto_horario);
		//echo "Hora real del servidor = " . date('H:i:s', time()) . "<br>";

		//-------------------------------------------------------------------------------------------------
		//-------------------------------------------------------------------------------------------------
		//se configura el sistema para que trabaje con la hora nacional.
		date_default_timezone_set('America/Caracas');
		//echo "Hora del servidor PHP= " . date("Y-m-d  H:i:s")."<br>";

		//Hora del servidor MySQL
		$Consulta_5="SELECT now()";
		$Recordset_3= mysqli_query($conexion,$Consulta_5);
		$Verificar= mysqli_fetch_array($Recordset_3);
		$H_S= $Verificar["now()"];
		//echo "Hora del servidor MySQL= " . $H_S . "<br>";

		//Se corrige la hora del servidor PHP local
		$salto_horario_PHPLocal = -0.5 * 60 * 60;//se restan 30 minutas, porque el servidor PHP local esta adelantado
		$PHPlocal = date("Y-m-d  H:i:s", time()  + $salto_horario_PHPLocal);
		//echo "Hora del servidor PHP corregida = " . $PHPlocal . "<br>" . "<br>";

		//------------------------------------------------------------------------------------------------------
		//-------------------------------------------------------------------------------------------------

		//echo "Año actual= " . date("Y")."<br>";
		//echo "Fecha actual= " . date("d M y")."<br>";
		//echo "Fecha actual= " . date("d/m/Y")."<br>";
		//echo "Fecha y hora actual del servidor (12Hr)= " .  date("m/d/Y h:i")."<br>";
		  
		    //echo mktime(20 ,21, 22, 6, 14, 2011)."<br />";
		    //echo date("d/m/Y", mktime(20 ,21, 22, 6, 14, 2011))."<br />";
		    //echo date("d/m/Y", 1308079282)."<p />";
		    //echo strtotime( "2011-10-22" )."<br />";
		    //echo strtotime( "2011/10/22 20:30:05" )."<br />"; 
	
?>

 		

