<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	
    if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
    
  		header("location:../principal.html");			
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
	//se crea la sesión verifica, para validar que el participante envio los datos desde este formulario
	$corroborar = 44;  
	$_SESSION["verifica"] = $corroborar;

	$Tema= $_GET["Tema"];
	$_SESSION["Tema"]= $Tema;//se crea una $_SESSION llamada Tema que almacena el tema de la prueba que selecciona el participante
	// echo "sesión: " .  $_SESSION["Tema"] . "<br>";

    $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
    // echo "Nombre Participante:" .  $ParticipanteNombre . "<br>";
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
		<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>	
	</head>	
		<body>
			<div class="Secundario">
				<header>
			   		<h1 style="cursor: default;">Vs 100.com</h1>
				   	<input class="input_1" type="text" name="nombre" value="<?php echo $ParticipanteNombre;?>">
				</header>
				<section style="background-color:;">
					<?php
						include("../conexion/Conexion_BD.php");

			            $participante=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en entrada.php
			                 // echo "$participante:" .  $participante . "<br>";				 
					?>
					<div style="background-color: ">
						<p>Tema de la prueba</p>
						<p><?php echo $Tema;?></p>
					</div>
				</section>
				<section class="entrada_5">
					<br><br>
					<div class="RegistroPago">
						<p>Una vez realizado el pago de su participación, registre los datos del deposito bancario.</p>
						<div class="RegistroPago_1">
							<form action="recibePago.php" method="POST" name="registroGratis" onsubmit="return validar_01()">
								<fieldset class="Afiliacion_4">
								<input type="text" name="cedula" id="Cedula" placeholder="Cedula" autocomplete="off">
								<input type="text" name="telefono" id="Telefono" placeholder="Telefono" autocomplete="off">
								<input type="text" name="deposito" id="Deposito" placeholder="Nº Deposito bancario" autocomplete="off"">
								<input type="text" name="tema" value="<?php echo $Tema;?>" style="display: none;">
								<input type="submit" value="Registrar" style="margin-top: 6%;">
								</fieldset>
							</form>
						</div>
						<!-- <a class="nav_7" href="../informacion_Pago.php">Datos bancarios para depositos.</a> -->
						<div style=" display: flex; justify-content: space-between; width: 20%; margin: auto;">
							<a class="nav_7" href="javascript:history.go(-1)">Regresar</a>
							<a class="nav_7" href="cerrarSesion.php" >Cerrar Sesión</a>
						</div>
					</div>
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
?>

 		

