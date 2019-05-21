<!--Formulario de Login para los usuarios registrados-->
<?php   
	include("../conexion/Conexion_BD.php");
	mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

	//Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD de ViajeSuramerica, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
	if(isset($_COOKIE["id_usuario"]) AND isset($_COOKIE["marcaAleatoria"])){//Si la variable $_COOKIE esta establecida o creada se entra aqui para recuperar la informacion del usuario y autorellenar el formulario
		
	$Cookie_usuario = $_COOKIE["id_usuario"];
    $Cookie_marca_aleatoria = $_COOKIE["marcaAleatoria"];

	if($_COOKIE["id_usuario"]!="" || $_COOKIE["marcaAleatoria"]!=""){
		$Consulta_1 = "SELECT * FROM participante WHERE ID_Participante= '$Cookie_usuario' AND Aleatorio='$Cookie_marca_aleatoria' ";
		$Recordset= mysqli_query($conexion,$Consulta_1);
		$Autorizado= mysqli_fetch_array($Recordset);
		$email = $Autorizado[6];
		$clave = $Autorizado[7];
		// echo "Correo= " . $email . "<br>";
		// echo "Clave" . $clave . "<br>";
	}	
?>
	<!DOCTYPE html>
	<html lang="es">
		<head>
			<title>Vs_100 login</title>

			<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
			<meta name="description" content="Juego de preguntas biblicas."/>
			<meta name="keywords" content="citas biblicas, biblia"/>
			<meta name="author" content="Pablo Cabeza"/>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

			<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        	<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_EstilosViajeSurAmerica.css">
        	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
		</head>	
		<body>
		<div class="Secundario">
            <!--titulo y menu principal-->
			<?php include("modulos/header.html");?>
			<div onclick="ocultarMenu()">
				<div id="Inicio">
					<h2>Inicia sesión</h2>
									
					<form action="../controlador/validarSesion.php" method="POST">
						<!-- el formulario se autorellena con la informacion recuperada de la BD porque existian las cookies-->
						<br>
						<input style="margin-bottom: 2%; " type="email" name="correo" id="Correo" placeholder="e-mail" autocomplete="off" value="<?php if (isset($Autorizado[6])) echo $Autorizado[6];?>">

						<input style="margin-bottom: 1%; " type="password" name="clave" id="Clave" placeholder="Contraseña" autocomplete="off" value="<?php if (isset($Autorizado[7])) echo $Autorizado[7];?>">
									
			            <input  type="checkbox" id="Recordar" name="recordar" value="1">
			            <label for="Recordar"><span class="recordar">Recordar e-mail y contraseña en este equipo.</span></label>
			            <br>
						<input type="submit" name="Boton_Sesion" value="Entrar">
						<hr>
						<p>¿No tienes cuenta en Vs_100.com? <a href="Registro.php">Registrate aqui.</a></p>
						<!--<a style="height: 10px; text-align: left;" href="Sesiones_Cookies/llamarcookie.php">Ver cookie</a> En este archivo se pueden ver las cookies que se crearon en una visita anterior al sitio web por medio de validarSesion.php-->		
					</form>			
				</div>	
				<nav class="navegacion" style="border-top-style: solid;	border-width: 0.5px; border-color: white;">
					<div class="nav_2"><a  href="index.html" style="color: white;">Inicio</a></div>
					<div class="nav_2"><a  href="participantes.php" style="color: white;">Participantes</a></div>
					<div class="nav_2"><a  href="creditos.html" style="color: white;">Creditos</a></div>
					<div class="nav_2"><a  href="principal.php" class="Posicion">Login</a></div>
					<div class="nav_2"><a  href="instrucciones.html" style="color: white;">Instrucciones</a></div>
					<div class="nav_2"><a  href="contacto.php" style="color: white;">Contacto</a></div>
				</nav>
			</div>
		</div>
       <?php
   	} 
   	else{ ?> <!--Si el participante no esta recordado en el equipo entra aqui.-->
  

<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

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
       		<!--titulo y menu principal-->
			<?php include("modulos/header.html");?>

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
						<br><hr>
						<p>¿No tienes cuenta en Vs_100.com?<br>
						<a href="registro.php">Registrate aqui.</a></p> 
						<!--<a style="height: 10px; text-align: left;" href="controlador/llamarcookie.php">Ver cookie</a>En este archivo se pueden ver las cookies que se crearon en una visita anterior al sitio web por medio de validarSesion.php-->
						</fieldset>
					</form>
				</div>			
			</div>
		</div>
   	</body>
</html>
		<?php 
	} ?>

<!-- /////   JAVASCRIPT   /////   JAVASCRIPT   /////   JAVASCRIPT   /////   JAVASCRIPT   /////   JAVASCRIPT   /////   JAVASCRIPT   ///// -->

<script type="text/javascript" src="../javascript/validarFormularios.js"></script>