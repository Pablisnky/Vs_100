<?php
	include("../conexion/Conexion_BD.php");
	
	//Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
	if(isset($_COOKIE["id_usuario"]) AND isset($_COOKIE["clave"])){//Si la variable $_COOKIE esta establecida o creada
	    $Cookie_usuario = $_COOKIE["id_usuario"];
		$Cookie_clave = $_COOKIE["clave"];
		// echo "Cookie usuario =" . $Cookie_usuario ."<br>";
		// echo "Cookie clave =" .  $Cookie_clave ."<br>";
		
		//se entra aqui para recuperar la informacion del usuario y autorellenar el formulario
    	if($_COOKIE["id_usuario"]!="" || $_COOKIE["clave"]!=""){
			$Consulta_1 = "SELECT * FROM participante WHERE ID_Participante= '$Cookie_usuario' ";
			$Recordset= mysqli_query($conexion, $Consulta_1);
			$Autorizado= mysqli_fetch_array($Recordset);
			$email = $Autorizado["Correo"];
			// echo "Correo guardado en cookie= " . $email ."<br>";
		}	?>

		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>horebi login</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas biblicas."/>
				<meta name="keywords" content="citas biblicas, biblia"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
			</head>	
			<body onload="autofocusInicioSesion()">
				<div class="Secundario">
					<header>
						<?php include("modulos/header.html");?>
					</header>
					<div onclick="ocultarMenu()">
						<div class="Inicio_2">
							<h2>Inicia sesión</h2>									
							<form action="../controlador/validarSesion.php" method="POST">
								<fieldset class="Afiliacion_4">
									<!-- el formulario se autorellena con la informacion recuperada de la BD porque existian las cookies-->
									<br>
									<input style="margin-bottom: 2%; " type="email" name="correo" id="Correo" value="<?php if (isset($email)) echo $email;?>">

									<input style="margin-bottom: 1%; " type="password" name="clave" id="Clave" value="<?php if (isset($Cookie_clave )) echo $Cookie_clave ;?>">
												
									<input  type="checkbox" class="recordar_1" id="Recordar" name="recordar" value="1">
									<label for="Recordar"><span class="recordar">Recordar e-mail y contraseña en este equipo.</span></label>
									<br>
									<input type="submit" name="Boton_Sesion" value="Entrar">
									<hr>
									<p class="p_2">¿No tienes cuenta en reavivados?<a href="Registro.php">Registrate aqui.</a></p>
									<!--<a style="height: 10px; text-align: left;" href="Sesiones_Cookies/llamarcookie.php">Ver cookie</a> En este archivo se pueden ver las cookies que se crearon en una visita anterior al sitio web por medio de validarSesion.php-->		
								</fieldset>
							</form>			
						</div>	
					</div>
				</div   <?php
   	} 
   	else{ // Si el participante no esta recordado en el equipo entra aqui.
		// echo "No se crearon las Cookies";
		?>

		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Vs_100 Login</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas biblicas."/>
				<meta name="keywords" content="citas biblicas, biblia"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
			</head>	
			<body onload="autofocusInicioSesion()">
				<div class="Secundario">
					<header>
						<?php include("modulos/header.html");?>
					</header>
					<div onclick= "ocultarMenu()">
						<div class="Inicio_2">
							<h2>Inicia sesión</h2>
							<form action="../controlador/validarSesion.php" method="POST">
								<fieldset class="Afiliacion_4">
								<input style="margin-bottom: 2%;" type="email" name="correo" id="Correo" placeholder="e-mail" autocomplete="off">
								<input style="margin-bottom: 1%;" type="password" name="clave" id="Clave" placeholder="Contraseña" autocomplete="off">		
								<input type="checkbox" class="recordar_1" id="Recordar" name="recordar" value="1">
								<label for="Recordar"><span class="recordar">Recordar e-mail y contraseña en este equipo.</span></label>
								<input type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
								<hr>
								<p class="Inicio_1  Inicio_1a">¿No tienes cuenta en <span class="span_7">Reavivados</span> ?<br>
								<a href="registro.php">Registrate aqui.</a></p> 
								<!--<a style="height: 10px; text-align: left;" href="controlador/llamarcookie.php">Ver cookie</a>En este archivo se pueden ver las cookies que se crearon en una visita anterior al sitio web por medio de validarSesion.php-->
								</fieldset>
							</form>
						</div>			
					</div>
				</div>
				<footer>
					<?php include("modulos/footer.php");?>
				</footer>
			</body>
		</html>
		<?php 
	}	?>

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>