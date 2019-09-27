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
				<link rel="stylesheet" type="text/css" media="(min-width: 1500px)" href="../css/MediaQuery_EstilosVs_100_Grande.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
				<link rel="shortcut icon" type="image/png" href="../images/logo.png">

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

									<input style="margin-bottom: 2%; " type="password" name="clave" id="Clave" value="<?php if (isset($Cookie_clave )) echo $Cookie_clave ;?>">
												
									<input  type="checkbox" id="Recordar" name="recordar" value="1">
									
									<span class="recordar">Recordar datos en este equipo.</span>
									
									<input class="input_3" type="submit" name="Boton_Sesion" value="Entrar">
									<hr>
									<p class="Inicio_1">¿Olvidaste tu contraseña <span class="span_7">Reavivados</span> ?
									<label class="a_4" onclick="NotificarContrasena()">Recuperala</label></p>
								</fieldset>
							</form>			
						</div>	
								<p class="Inicio_1">¿No tienes cuenta en <span class="span_7">Reavivados</span> ?<br>
								<a class="a_4" href="registro.php">Registrate</a></p> 
					</div>                    
					<div class="contenedor_16"  id="Contenedor_16">
						<form action="../controlador/recibeCorreo.php" method="POST" autocomplete="off"> 
							<fieldset class="Afiliacion_4" style="background-color: #F4FCFB; border-radius: 15px;">
								<p class="span_9">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
								<br>
								<input class="etiqueta_35" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
								<input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
							</fieldset>
						</form>       
					</div> 
        			<div class="tapa_2" id="Tapa_2" onclick="quitarTapa_2()"></div><!--Este Div es la parte oscura, quitarTapa_2() esta al final de este archivo-->
				</div >  
				<footer>
					<?php include("modulos/footer.php");?>
				</footer>
			</body>
		</html>		<?php
   	} 
   	else{ // Si el participante no esta recordado en el equipo entra aqui.
		// echo "No se crearon las Cookies";
		?>
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
				<link rel="stylesheet" type="text/css" media="(min-width: 1500px)" href="../css/MediaQuery_EstilosVs_100_Grande.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
				<link rel="shortcut icon" type="image/png" href="../images/logo.png">

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
									<br>
								<input style="margin-bottom: 2%;" type="email" name="correo" id="Correo" placeholder="e-mail" autocomplete="off">
								<input style="margin-bottom: 1%;" type="password" name="clave" id="Clave" placeholder="Contraseña" autocomplete="off">
												
								<input  type="checkbox" id="Recordar" name="recordar" value="1">
												
								<span class="recordar">Recordar datos en este equipo.</span>
				
								<input class="input_3" type="submit" value="Entrar" onclick=""><!-- validar_02() se encuentra en return validar_02()validarFormularios.js -->
								<hr>
								<p class="Inicio_1">¿Olvidaste tu contraseña <span class="span_7">Reavivados</span> ?
								<label class="a_4" onclick="NotificarContrasena()">Recuperala</label></p>
								</fieldset>
							</form>
						</div>	
								<p class="Inicio_1">¿No tienes cuenta en <span class="span_7">Reavivados</span> ?<br>
								<a href="registro.php">Registrate</a></p> 		
					</div>  
					<div class="contenedor_16"  id="Contenedor_16">
						<form action="../controlador/recibeCorreo.php" method="POST" autocomplete="off"> 
							<fieldset class="Afiliacion_4" style="background-color: #F4FCFB; border-radius: 15px;">
								<p class="span_9">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
								<br>
								<input class="etiqueta_35" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
								<input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
							</fieldset>
						</form>       
					</div> 
        			<div class="tapa_2" id="Tapa_2" onclick="quitarTapa_2()"></div><!--Este Div es la parte oscura, quitarTapa_2() esta al final de este archivo-->
				</div>
				<footer>
					<?php include("modulos/footer.php");?>
				</footer>
			</body>
		</html>		<?php 
	}	?>

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>