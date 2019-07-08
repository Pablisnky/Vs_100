<?php   
    session_start();  

	include("../conexion/Conexion_BD.php");
   	$verifica = $_SESSION["verifica"];
    if($verifica == 1906){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
 		unset($_SESSION['verifica']);//se borra la $_SESSION verifica.
 
    	//se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
    	//echo $verifica;
		// se reciben los datos enviados del formulario de registro-
					
		$Nombre = htmlspecialchars($_POST["nombre"]);
		$Cedula = htmlspecialchars($_POST["cedula"]);
		$Correo = htmlspecialchars($_POST["correo"]);
		$Clave = $_POST["clave"];
		$ConfirmarClave = $_POST["confirmarClave"];

		// echo "<p class='Inicio_2'>Nombre: $nombre</p>" ;
		// echo "<p class='Inicio_2'>Apellido: $apellido</p>";
		// echo "<p class='Inicio_2'>Cedula: $cedula</p>";
		// echo "<p class='Inicio_2'>Correo: $correo</p>";
		// echo "<p class='Inicio_2'>Usuario: $Usuario</p>";
		// echo "<p class='Inicio_2'>Clave: $Clave</p>";
		// echo "<p class='Inicio_2'>Confirmar clave: $ConfirmarClave</p>"; 

		$_SESSION["Usuario"]= $Nombre;//se crea una sesion que almacena el Nombre del usuario.

		//Se insertan los datos del participante en la tabla paricipante, la información de su cuenta entra en la tabla usuarios 
		$insertar= "INSERT INTO participante(Nombre, Cedula, Correo, fechaRegistro) VALUES('$Nombre','$Cedula','$Correo', NOW())";
		mysqli_query($conexion, $insertar);

		//Se comparan ambas contraseñas
		if($Clave == $ConfirmarClave){
	    	//se cifra la contraseña con un algoritmo de encriptación
	    	$ClaveCifrada= password_hash($Clave, PASSWORD_DEFAULT);

			//Se consulta en la tabla participante el ID_Usuario del usuario que se esta afiliando
			$Consulta= "SELECT ID_Participante FROM participante WHERE Cedula ='$Cedula'";
			$Recordset= mysqli_query($conexion, $Consulta); 
			$Resultado= mysqli_fetch_array($Recordset);
			$ID_Participante= $Resultado["ID_Participante"];
			// echo "El ID_Afiliado es= " . $ID_Usuario . "<br>";

			//Se insertan los datos de la cuenta del participante en la base de datos. 
			$insertar_2= "INSERT INTO usuarios(ID_Participante, clave) VALUES('$ID_Participante', '$ClaveCifrada')";
			mysqli_query($conexion, $insertar_2);
		}
		else{
			echo "Fallo la confirmación de la contraseña";
		}	?>

		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Versus_20 Registro</title>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
				<meta name="description" content="Juego de preguntas sobre suramerica."/>
				<meta name="keywords" content="suramerica, latinoamerica"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
				<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

				<script type="text/javascript" src="javascript/Funciones_varias.js" ></script>
			</head>
			<body style="height: 140%">
				<div class="Secundario"> 
					<header>
						<?php include("modulos/header.html");?>
					</header>
					<div onclick= "ocultarMenu()">
						<h2 id="registro">Datos registrados</h2>
						<p class="agradecimientos"><?php echo $Nombre;?>, Hemos recibido tus datos, ahora eres miembro de la comunidad Vs_100.</p>
					</div>	
					<div class="nav_5">
						<a href="principal.php">Inicia sesión</a>
					</div>
				</div>
			</body>
		</htnl>	<?php 
	}   
	else{ // Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al formulario de registro  
		echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=Registro.php'>";  
	} 
?>



