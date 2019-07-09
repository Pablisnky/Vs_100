<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	
    if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
    
  		header("location:../principal.html");			
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
	//se crea la sesión verifica, para validar que el participante envio los datos desde este formulario
	$corroborar = 44;  
	$_SESSION["verifica"] = $corroborar;
	// echo $_SESSION["verifica"];

	$Tema= $_GET["Tema"];
	$_SESSION["Tema"]= $Tema;//se crea una $_SESSION llamada Tema que almacena el tema de la prueba que selecciona el participante
	// echo "sesión: " .  $_SESSION["Tema"] . "<br>";

    $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
    // echo "Nombre Participante:" .  $ParticipanteNombre . "<br>";
?>
		
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20 Inicio</title>

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
				   	<input class="input_1" type="text" name="nombre" value="<?php echo $ParticipanteNombre;?>">
						<?php include("../vista/modulos/header_usuario.html");?> 
				</header>
				<section>
					<?php
						include("../conexion/Conexion_BD.php");

			            $participante=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en entrada.php
			                 // echo "$participante:" .  $participante . "<br>";				 
					?>
					<div style="background-color: ; margin-bottom: 2%;">
						<h2>Tema de la prueba</h2>
						<h4><?php echo $Tema;?></h4>
					</div>
				</section>
				<section>
					<p>Una vez realizado el pago de su participación, registre los datos del deposito bancario.</p>
					<div class="contenedor_1" >
						<div class="contenedor_2">
							<fieldset class="Afiliacion_4">	
								<legend>Depositos para Colombia</legend>						
								<p>Bancolombia</p>														
								<p>Cuenta de ahorros</p>					
								<p>13017178677</p>
							</fieldset>
						</div>
						<div class="contenedor_2">
							<form action="recibePago.php" method="POST" name="registroGratis" onsubmit="return validar_01()">
								<fieldset class="Afiliacion_4">
									<legend>Registrar pago</legend>
									<input type="text" name="cedula" id="Cedula" placeholder="Cedula" autocomplete="off">
									<input type="text" name="telefono" id="Telefono" placeholder="Telefono" autocomplete="off">
									<input type="text" name="deposito" id="Deposito" placeholder="Nº Consignación bancaria" autocomplete="off"">
									<input type="text" name="tema" value="<?php echo $Tema;?>" style="display: none;">
									<input type="text" name="categoria" value="<?php echo $Tema;?>" style="display: none;">
									<input type="submit" value="Registrar" style="margin-top: 6%;">
								</fieldset>
							</form>
						</div>
					</div>
					<!-- <a class="nav_7" href="../informacion_Pago.php">Datos bancarios para depositos.</a> -->
					<div class="contenedor_3">
						<a class="nav_7" href="javascript:history.go(-1)">Regresar</a>
						<a class="nav_7" href="cerrarSesion.php" >Cerrar Sesión</a>
					</div>
				</section>
			</body>
		</html>
<?php   }   ?>