<?php
// session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	// include("../../conexion/Conexion_BD.php");

	$Tema= $_SESSION["Tema"] ;//se crea una nueva sesion, en esta sesion se guardará el tema de la prueba
	$CodigoPrueba= $_SESSION["codigoPrueba"] ;// en esta sesion se tiene guardado el codigo de la prueba
	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	// echo "ID_Participante= " . $participante . "<br>";
	// echo "Tema= " . $Tema . "<br>";
	// echo "Codigo prueba= " . $CodigoPrueba . "<br>";

	//Se consulta en la BD cuantos puntos a acumulado
	//Consulta realizada para obtener la cantidad de respuestas correctas y posicionar al participante en la que le corresponde
	$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND Tema='$Tema' AND ID_PP ='$CodigoPrueba'";
	$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion)); 
	$Puntaje= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
	//echo "Puntos: " . $Puntaje;
		if ($Puntaje==0){
				include("preguntaColombia_01.php");
		}
		else if ($Puntaje==1){
				include("preguntaColombia_02.php");
		}
		else if ($Puntaje==2){
				include("preguntaColombia_03.php");
		}
		else if ($Puntaje==3){
				include("preguntaColombia_04.php");
		}
		else if ($Puntaje==4){
				include("preguntaColombia_05.php");
		}
		else if ($Puntaje==5){
				include("preguntaColombia_06.php");
		}
		else if ($Puntaje==6){
				include("preguntaColombia_07.php");
		}
		else if ($Puntaje==7){
				include("preguntaColombia_08.php");
		}
		else if ($Puntaje==8){
				include("preguntaColombia_09.php");
		}
		else if ($Puntaje==9){
				include("preguntaColombia_10.php");
		}
		else if ($Puntaje==10){
				include("../vista/ultima.php");
		}

	

			

