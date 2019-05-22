<?php
session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario
	include("../conexion/Conexion_BD.php");

	$Tema= $_GET["seleccion"]; //Se recibe desde entrada.php
	// echo "Tema seleccionado: " . $Tema . "<br>";

	$CodigoPrueba = $_GET["codigo"]; //Se recibe desde entrada.php
	// echo "Codigo prueba: " . $CodigoPrueba . "<br>";

	$_SESSION["Tema"]= $Tema;//se crea una nueva sesion, en esta sesion se guardará el tema de la prueba
	$_SESSION["codigoPrueba"]= $CodigoPrueba;//se crea una nueva sesion, en esta sesion se guardará el codigo de la prueba

	$Participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	// echo "ID_Participante:" .  $Participante . "<br>";
	
	if ($Tema == "Colombia"){
		header("location:Tema/colombia/posicionColombia.php?Tema=Colombia");
	}
	else if($Tema == "Venezuela"){
		header("location:../tema/venezuela/posicionVenezuela.php");
	}
	else if($Tema == "Cristianismo"){
		header("location:../tema/cristianismo/posicionCristianismo.php");
	}

			

