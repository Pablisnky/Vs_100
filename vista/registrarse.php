<?php   
    session_start();  
   $verifica = $_SESSION["verifica"];
    if ($verifica == 1906){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;
 
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Vs_100 Registro</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">

		<script type="text/javascript" src="javascript/Funciones_varias.js" ></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Caveat');
        </style>
    </head>
    <body style="height: 140%">
		<div class="Secundario"> 
					<!--titulo y menu principal-->
					<?php include("modulos/header.html");?>
				<div onclick= "ocultarMenu()">

				<div id="Gratis">
				<!-- se reciben los datos enviados del formulario de registro-->
						<?php
							$nombre = htmlspecialchars($_POST["nombre"]);
							$apellido = htmlspecialchars($_POST["apellido"]);
							$cedula = htmlspecialchars($_POST["cedula"]);
							$telefono = htmlspecialchars($_POST["telefono"]);
							$departamento = htmlspecialchars($_POST["departamento"]);
							$correo = htmlspecialchars($_POST["correo"]);
							$clave = htmlspecialchars($_POST["clave"]);
							$FechaRegistro = date("Y-m-d");

							echo "<p class='Inicio_2'>Nombre: $nombre</p>" ;
							echo "<p class='Inicio_2'>Apellido: $apellido</p>";
							echo "<p class='Inicio_2'>Cedula: $cedula</p>";
							echo "<p class='Inicio_2'>Telefono: $telefono</p>";
							echo "<p class='Inicio_2'>Departamento: $departamento</p>";
							echo "<p class='Inicio_2'>Correo: $correo</p>";
						?>
				</div>

				<h2 id="registro">Datos registrados</h2>
				<p class="agradecimientos"><?php echo $nombre;?>, Hemos recibido tus datos, ahora eres miembro de la comunidad Vs_100.com</p>
					<?php

						include("../conexion/Conexion_BD.php");
					    mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

						$insertar= "INSERT INTO participante(Nombre, Apellido, Departamento, Correo, Password, FechaRegistro) VALUES('$nombre','$apellido','$departamento','$correo','$clave','$FechaRegistro')";
					    
					    mysqli_query($conexion,$insertar);

					    $_SESSION["Usuario"]= $nombre;//se crea una sesion que almacena el Nombre del usuario.
			?>
			<div class="nav_5">
				<a href="principal.php">Inicia sesión</a>
			</div>
			
		</div>
	</div>
	</body>
</htnl>

   <?php }   
else   
{   
// Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al formulario de registro  
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=Registro.php'>";  
} 
?>



