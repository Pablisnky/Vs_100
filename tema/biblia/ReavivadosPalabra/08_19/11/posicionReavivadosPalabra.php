<?php
// session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	// include("../../conexion/Conexion_BD.php");
		
	$Tema= $_SESSION["Tema"] ;//se crea una nueva sesion, en esta sesion se guardará el tema de la prueba
	$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en 
	$ID_PP = $_GET["ID_PP"];
	// echo "ID_Participante= " . $participante . "<br>";
	// echo "Tema= " . $Tema . "<br>";
	// echo "Codigo prueba= " . $ID_PP . "<br>";

		//Se consulta en la BD cuantos puntos a acumulado 
		//Consulta realizada para obtener la cantidad de respuestas correctas y posicionar al participante en la que le corresponde
		$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND Tema='$Tema' AND ID_PP ='$ID_PP'";
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
		
	

			

