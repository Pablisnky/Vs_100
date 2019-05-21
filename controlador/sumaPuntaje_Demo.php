<?php 
	session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	include("../conexion/Conexion_BD.php");
    mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente
	
	$participante= $_GET["val_3"];//recibe el ID_Participante desde puntaje.js

	//Consulta realizada para obtener el puntaje del participante despues de haber actualizado 
	$Consulta="SELECT * FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE participante.ID_Participante='$participante' ";
	$Recordset = mysqli_query($conexion,$Consulta);
	$Puntaje=  mysqli_fetch_array($Recordset);
		
	$_SESSION["PuntosPais"]= $Puntaje[15];//se crea una sesion que almacena el puntaje del usuario
	
	echo "<p class='p_1'>$Puntaje[1]</p> ";
	echo "<p class='p_2'>" . $Puntaje[16] . "</p>";
	echo "<p class='p_1'> Puntos</p>"
	//Respuesta es mostrada en preguntaXxxxxx_00.php porque alli se realizó la petición al servidor utilizando AJAX
?>