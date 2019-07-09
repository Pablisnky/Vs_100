<?php 
	session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	include("../conexion/Conexion_BD.php");
	
	$ParticipanteDemo= $_GET["val_3"];//recibe el ID_Participante desde puntaje.js
	// echo "ID_PD= " . $ParticipanteDemo;

	//Consulta realizada para obtener el puntaje del participante despues de haber actualizado 
	$Consulta="SELECT * FROM participante_demo WHERE ID_PD='$ParticipanteDemo' ";
	$Recordset = mysqli_query($conexion, $Consulta);
	$Puntaje=  mysqli_fetch_array($Recordset);
		
	// $_SESSION["PuntosPais"]= $Puntaje[15];//se crea una sesion que almacena el puntaje del usuario

	//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
 	$Decimal = str_replace('.', ',', $Puntaje["puntos"]); 
	
	echo "<p class='p_1'>$Puntaje[1]</p>";
	echo "<p class='p_1'>" . $Decimal . "</p>";
	echo "<p class='p_1'> Puntos</p>"
	//Respuesta es mostrada en preguntaXxxxxx_00.php porque alli se realizó la petición al servidor utilizando AJAX
?>