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
			if($Puntaje < 5){
				include("../audio/FondoBiblia_1.php");
			}

			//Se evalua si no se han creado las sesiones que almacenan los indices del array aleatorio
			if(empty($_SESSION["Preguna_1"])){
				// echo "Se crea el array aleatorio";
				
			$valores = array();
			$x = 0;
			//Se genera una lista de numeros aleatorios para ubicar al participante en una pregunta segun este numero

			while($x < 12){
				$num_aleatorio = rand(1,12);
				// echo "EL Numero aleatorio es: " . $num_aleatorio . "<br>";
				if (!in_array($num_aleatorio,$valores)) {
				  array_push($valores,$num_aleatorio);
				  $x++;
				}
			  }			  
			//    print_r($valores);
			  
			  $_SESSION["Preguna_1"]= $valores[0];//se crea una $_SESSION llamada Preguna_1 que almacena el valor del indice 0 del array valores
			//   echo "El indice cero del array es= " . $_SESSION["Preguna_1"] . "<br>";

			  $_SESSION["Preguna_2"]= $valores[1];//se crea una $_SESSION llamada Preguna_1 que almacena el valor del indice 1 del array valores
			//   echo "El indice uno del array es= " . $_SESSION["Preguna_2"] . "<br>";

			  $_SESSION["Preguna_3"]= $valores[2];//se crea una $_SESSION llamada Preguna_1 que almacena el valor del indice 2 del array valores
			//   echo "El indice dos del array es= " . $_SESSION["Preguna_3"] . "<br>";

			  $_SESSION["Preguna_4"]= $valores[3];//se crea una $_SESSION llamada Preguna_1 que almacena el valor del indice 3 del array valores
			//   echo "El indice tres del array es= " . $_SESSION["Preguna_4"] . "<br>";

			  $_SESSION["Preguna_5"]= $valores[4];//se crea una $_SESSION llamada Preguna_1 que almacena el valor del indice 4 del array valores
			//   echo "El indice cuatro del array es= " . $_SESSION["Preguna_5"] . "<br>";

			  
				 $Aleatorio_1= $_SESSION["Preguna_1"];
				 $Aleatorio_2= $_SESSION["Preguna_2"];
				 $Aleatorio_3= $_SESSION["Preguna_3"];
				 $Aleatorio_4= $_SESSION["Preguna_4"];
				 $Aleatorio_5= $_SESSION["Preguna_5"];
				
			}
			else{
				// echo "No se crea el array aleatorio" . "<br>";
				$Aleatorio_1= $_SESSION["Preguna_1"];
				$Aleatorio_2= $_SESSION["Preguna_2"];
				$Aleatorio_3= $_SESSION["Preguna_3"];
				$Aleatorio_4= $_SESSION["Preguna_4"];
				$Aleatorio_5= $_SESSION["Preguna_5"];
			}
			
			if($Puntaje==0){
					include("preguntaBiblia_ReavivadosPalabra_$Aleatorio_1.php");
			}
			else if ($Puntaje==1){
					include("preguntaBiblia_ReavivadosPalabra_$Aleatorio_2.php");
			}
			else if ($Puntaje==2){
					include("preguntaBiblia_ReavivadosPalabra_$Aleatorio_3.php");
			}
			else if ($Puntaje==3){
					include("preguntaBiblia_ReavivadosPalabra_$Aleatorio_4.php");
			}
			else if ($Puntaje==4){
					include("preguntaBiblia_ReavivadosPalabra_$Aleatorio_5.php");
			}
			else if ($Puntaje==5){
					include("../vista/ultima.php");
			}