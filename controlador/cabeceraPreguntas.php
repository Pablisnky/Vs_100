<?php
	//Se encarga de poner la cabeza que tiene cada pregunta, nombre de participante y puntos acumulados en todo el juego
	include("../../conexion/Conexion_BD.php");
		mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

	   	$participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
    	//echo $participante;	
	   	$_SESSION["Tema"] = "$Tema";//se crea la SESION Tema, necesaria en Temporizador_2.
    	$_SESSION["Pregunta"] = PREGUNTA_ACTUAL;//se crea la SESION pregunta, necesaria en Temporizador_2	
   		//echo "Pregunta Nº " . $_SESSION["Pregunta"] . "<br>";	
    	$PreguntaAnterior= PREGUNTA_ANTERIOR; //en la consulta a la BD no se puede escribir directamente la constante "PREGUNTA_ANTERIOR"

	   	//se realiza una consulta para obtener el nombre del participante
	   	$Consulta="SELECT * FROM participante WHERE ID_Participante='$participante'";//se plantea la consulta
		$Recordset = mysqli_query($conexion,$Consulta);//se manda a ejecutar la consulta
		$Participante= mysqli_fetch_row($Recordset);

		//Consulta realizada para obtener el puntaje del participante 
		$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1'";
		$Recordset = mysqli_query($conexion,$Consulta);
		$PuntajeSiguiente= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
		
	   	//Consulta realizada para verificar que la pregunta anterior esta respondida y puede entrar en esta.
		$Consulta_3="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND ID_Pregunta = $PreguntaAnterior AND Tema= '$Tema'";
		$Recordset_3 = mysqli_query($conexion,$Consulta_3);
		$Respondida= mysqli_num_rows($Recordset_3);//se suman los registros que tiene la consulta realizada.
		//echo $Respondida;	