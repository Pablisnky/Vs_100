<?php
// session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

    // include("../../conexion/Conexion_BD.php");
    $ID_ParticipanteTrivia = $_SESSION["ID_ParticipanteTrivia"];//en esta sesion se tiene guardado el ID_ParticipanteTrivia, sesion creada en recibe_Trivia.php

	//en esta sesion se tiene guardado el ID_PTD (PruebaTriviaDiaria) sesion creada en recibe_Trivia.php.php
    $ID_PruebaTrivia= $_SESSION["ID_PTD"];
    
	// echo "ID_Participante= " . $ID_ParticipanteTrivia . "<br>";
	// echo "ID_pruevaTrivia= " . $ID_PruebaTrivia . "<br>";

	//Se consulta en la BD cuantos puntos a acumulado
	//Consulta realizada para obtener la cantidad de respuestas correctas y posicionar al participante en la que le corresponde
	$Consulta="SELECT * FROM respuestas_trivias WHERE ID_ParticipanteTrivia='$ID_ParticipanteTrivia' AND Correcto='1' AND ID_PTD ='$ID_PruebaTrivia'";
	$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion)); 
	$Puntaje= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
	//echo "Puntos: " . $Puntaje;
		if($Puntaje==0){
				include("preguntaTrivia01_01.php");
		}
		else if($Puntaje==1){
				include("preguntaTrivia01_02.php");
		}
		else if($Puntaje==2){
				include("preguntaTrivia01_03.php");
		}
		else if($Puntaje==3){
				include("preguntaTrivia01_04.php");
		}
		else if($Puntaje==4){
				include("preguntaTrivia01_05.php");
		}
		else if ($Puntaje=5){
				include("../vista/ultimaTrivia.php");
		}

	

			

