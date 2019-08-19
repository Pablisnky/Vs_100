<?php
session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	include("../conexion/Conexion_BD.php");

	$Tema= $_SESSION["Tema"] ;//se crea una nueva sesion, en esta sesion se guardará el tema de la prueba
	$CodigoPrueba= $_SESSION["codigoPrueba"] ;// en esta sesion se tiene guardado el codigo de la prueba
	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en 
	// echo "ID_Participante= " . $participante . "<br>";
	// echo "Tema= " . $Tema . "<br>";
	// echo "Codigo prueba= " . $CodigoPrueba . "<br>";

	//Se consulta que pruebas de Reavidado por su Palabra no ha respondido o ha respondido incompletamente.
	$Consulta_1="SELECT * FROM participantes_pruebas WHERE ID_Participante='$participante' AND Tema='$Tema' AND Prueba_Cerrada = 0";
	$Recordset_1 = mysqli_query($conexion, $Consulta_1) or die (mysqli_error($conexion)); 
	
	echo "El capitulo de hoy ya lo has superado" . "<br>";
	echo "Pero tienes capitulos anteriores por responder."  . "<br>";

	while($Resultado_1= mysqli_fetch_array($Recordset_1)){
	   $Resultado_1["ID_Prueba"];

       echo "ID_Pruebas pendietes por responder= " . $Resultado_1["ID_Prueba"];
    }
	
	//Consulta realizada para obtener la cantidad de respuestas correctas y posicionar al participante en la que le corresponde
	$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND Tema='$Tema' AND ID_PP ='$CodigoPrueba'";
	$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion)); 
	$Puntaje= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
	//echo "Puntos: " . $Puntaje;
		if($Puntaje==0){
				include("preguntaBiblia_ReavivadosPalabra_01.php");
		}
		else if ($Puntaje==1){
				include("preguntaBiblia_ReavivadosPalabra_02.php");
		}
		else if ($Puntaje==2){
				include("preguntaBiblia_ReavivadosPalabra_03.php");
		}
		else if ($Puntaje==3){
				include("preguntaBiblia_ReavivadosPalabra_04.php");
		}
		else if ($Puntaje==4){
				include("preguntaBiblia_ReavivadosPalabra_05.php");
		}
		else if ($Puntaje==5){
				include("../vista/ultima.php");
		}