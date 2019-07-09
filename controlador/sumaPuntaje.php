<?php 
	session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	include("../conexion/Conexion_BD.php");
	
	$participante= $_GET["val_3"];//recibe el ID_Participante desde puntaje.js
	$CodigoPrueba= $_GET["val_4"];//recibe el ID_PP desde puntaje.js
	// echo "ID_Participante= ". $participante . "<br>";
	// echo "ID_PP= " . $CodigoPrueba . "<br>";

		//Consulta realizada para obtener el puntaje del participante despues de haber actualizado 
		$Consulta="SELECT * FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE participante.ID_Participante='$participante' AND participantes_pruebas.ID_PP = '$CodigoPrueba'";
		$Recordset = mysqli_query($conexion,$Consulta);
		$Puntaje=  mysqli_fetch_array($Recordset);
			
		$_SESSION["PuntosPais"]= $Puntaje["Puntos"];//se crea una sesion que almacena el puntaje del usuario

		//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
 		$Decimal = str_replace('.', ',', $Puntaje["Puntos"]); 
		
		echo "<p class='p_1'>$Puntaje[1]</p>";
		echo "<p class='p_1'>$Decimal</p>";
		echo "<p class='p_1'>Puntos</p>";
		//Respuesta es mostrada en preguntaXxxxxx_00.php porque alli se realizó la petición al servidor utilizando AJAX
?>