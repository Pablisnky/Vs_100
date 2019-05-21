<?php
session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario
	include("../conexion/Conexion_BD.php");

	$Tema= $_GET["seleccion"]; //Se recibe desde entrada.php
	// echo "Tema seleccionado: " . $Tema . "<br>";

	$CodigoPrueba = $_GET["codigo"]; //Se recibe desde entrada.php
	// echo "Codigo prueba: " . $CodigoPrueba . "<br>";

	$_SESSION["Tema"]= $Tema;//se crea una nueva sesion, en esta sesion se guardará el tema de la prueba
	$_SESSION["codigoPrueba"]= $CodigoPrueba;//se crea una nueva sesion, en esta sesion se guardará el codigo de la prueba

	$Participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	// echo "ID_Participante:" .  $participante . "<br>";

	//Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional colombiana
	date_default_timezone_set('America/Bogota');
    $PHPlocal =date("Y-m-d  H:i:s");
    // echo "Hora inicio pregunta: " . $PHPlocal;
	
	if ($Tema=="Colombia"){
		//verifica si la pregunta 1 de Colombia ya a sido respondida, en caso de no hallar un registro es que no se ha entrado a esa pregunta
    	$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$Participante' AND Tema ='$Tema'";
    	$Recordset= mysqli_query($conexion,$Consulta);
    	$VerificarPregunta= mysqli_num_rows($Recordset);

		//se inserta en la BD la hora en la que el participante entro a una pregunta, la hora es tomada del servidor MySQL
    	if($VerificarPregunta== 0){
        
        	$insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, Tema, Hora_Pregunta) VALUES(1, '$Participante', '$Tema','$PHPlocal')" ;//En local se itiliza la hora MySQL por medio de now() sin parentesis en vezde $fecha
        	mysqli_query($conexion,$insertar);
  
	        // se suman 2 minutos al tiempo que esta registrado en la BD como de apertura de una pregunta (HoraPregunta).
	        //El servidor remoto MySQL tiene 2 horas de atrazo, por eso se añaden 120 minutos mas.
	        //El servidor local MySQL tiene la hora correcta, por eso se añaden 2 minutos.    
	        $Consulta_2="SELECT DATE_ADD(NOW(),INTERVAL 2 minute) AS minutos";//este codigo  funciona para añadir tiempo , (6 hour - 3 minute)(en local 2 minutos, en remoto 122 minutos)
	        $Recordset_2= mysqli_query($conexion,$Consulta_2);
	        $Minutos=  mysqli_fetch_array($Recordset_2);
	        $Incremento_2=$Minutos["minutos"];
	        //echo $Incremento_2;

	        //se introduce en la BD la hora a la cual terminara la oportunidad de dar una respuesta
	        $Actualizar_2=" UPDATE respuestas SET HoraMaximo= '$Incremento_2'  WHERE ID_Participante='$Participante' AND ID_Pregunta='1' AND Tema ='$Tema'";
	        mysqli_query($conexion,$Actualizar_2);
        }

		header("location:Tema/colombia/posicionColombia.php?Tema=Colombia");
	}
	else if($Tema=="Venezuela"){
		//verifica si ya existe la prueba con el codigo ID_PP y la pregunta.
  //   	$Consulta="SELECT * FROM respuestas INNER JOIN participantes_pruebas ON respuestas.ID_PP=participantes_pruebas.ID_PP WHERE participantes_pruebas.ID_Participante='$Participante' AND participantes_pruebas.Tema ='$Tema' AND participantes_pruebas.ID_PP = '$CodigoPrueba'";
  //   	$Recordset= mysqli_query($conexion,$Consulta);
  //   	$VerificarPregunta= mysqli_num_rows($Recordset);

		// //se inserta en la BD la hora en la que el participante entro a una pregunta, la hora es tomada del servidor MySQL
  //   	if($VerificarPregunta == 0){//sino hay ninguan pregunta respondida inserta un registro en la BD
        
  //       	// $insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, Tema, Hora_Pregunta) VALUES(1, '$Participante', '$Tema','$PHPlocal')" ;//En local se itiliza la hora MySQL por medio de now() sin parentesis en vezde $fecha
  
	 //        // se suman 2 minutos al tiempo que esta registrado en la BD como de apertura de una pregunta (HoraPregunta).
	 //        //El servidor remoto MySQL tiene 2 horas de atrazo, por eso se añaden 120 minutos mas.
	 //        //El servidor local MySQL tiene la hora correcta, por eso se añaden 2 minutos.    
	 //        $Consulta_2="SELECT DATE_ADD(NOW(),INTERVAL 2 minute) AS minutos";//este codigo  funciona para añadir tiempo , (6 hour - 3 minute)(en local 2 minutos, en remoto 122 minutos)
	 //        $Recordset_2= mysqli_query($conexion,$Consulta_2);
	 //        $Minutos=  mysqli_fetch_array($Recordset_2);
	 //        $Incremento_2=$Minutos["minutos"];
	 //        // echo $Incremento_2;

	 //        //se introduce en la BD la hora a la cual terminara la oportunidad de dar una respuesta
	 //        $insertar_6= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Hora_Pregunta, HoraMaximo) VALUES(1, '$Participante', '$CodigoPrueba', '$Tema', NOW(), '$Incremento_2')";
	 //        mysqli_query($conexion,$insertar_6);
  //       }
		header("location:../tema/venezuela/posicionVenezuela.php");
	}

			

