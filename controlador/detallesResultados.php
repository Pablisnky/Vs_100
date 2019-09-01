<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
  		// echo "La sesion no fue creada";
  		header("location:../vista/principal.php");		
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
		include("../conexion/Conexion_BD.php");

		$participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
        // echo "ID_Participante:" .  $participante . "<br>";

        $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
        // echo "Nombre Participante:" .  $ParticipanteNombre . "<br>";
    }
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

        <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script> 
    </head>	
    <body>
        <header style="position: fixed;  width: 100%; margin-top:; ">
               <input class="input_1" type="text" name="nombre" value="<?php echo $ParticipanteNombre;?>">
            <?php include("../vista/modulos/header_usuario.html");?>   		
        </header>