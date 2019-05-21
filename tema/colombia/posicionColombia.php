<?php   
session_start();//se inicia sesion para llamar a las variables $_SESSION creadas en otros archivos, o para crearlas si es necesario

	include("../../conexion/Conexion_BD.php");

    $Pais= $_GET["pais"];//se recibe desde seeccionPais.php
	$participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
	//echo "ID_Participante= " . $participante . "<br>";
	//echo "Pais= " . $Pais . "<br>";

	//Se consulta en la BD cuantos puntos a acumulado
	//Consulta realizada para obtener el puntaje del libro seleccionado y mostrarlo en pantalla
		$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND Pais='Colombia'";
		$Recordset = mysqli_query($conexion,$Consulta) or die (mysqli_error($conexion)); 
		$Puntaje= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
		//echo " " . "<span style='font-size:25px;'>$Puntaje</span>" ;
	
	if ($Puntaje==0){
			header("location:preguntaColombia_01.php");
		}
	else if ($Puntaje==1){
			header("location:preguntaColombia_02.php");
			}
	else if($Puntaje==2){
			header("location:preguntaColombia_03.php");
			}
	else if($Puntaje==3){
			header("location:preguntaColombia_04.php");
			}	
	else if($Puntaje==4){
			header("location:preguntaColombia_05.php");
			}
	else if($Puntaje==5){
			header("location:ultimaColombia.php");
			}	
	else if($Puntaje==6){
			header("location:preguntaColombia_07.php");
			}	
	else if($Puntaje==7){
			header("location:preguntaColombia_08.php");
			}
	else if($Puntaje==8){
			header("location:preguntaColombia_09.php");
			}
	else if($Puntaje==9){
			header("location:preguntaColombia_10.php");
			}
	else if($Puntaje==10){
			header("location:preguntaColombia_01.php");
			}
	else if($Puntaje==11){
			header("location:preguntaColombia_02.php");
			}
	else if($Puntaje==12){
			header("location:preguntaColombia_03.php");
			}
	else if($Puntaje==13){
			header("location:preguntaColombia_04.php");
			}
	else if($Puntaje==14){
			header("location:preguntaColombia_05.php");
			}
	else if($Puntaje==15){
			header("location:preguntaColombia_06.php");
			}
	else if($Puntaje==16){
			header("location:ultimaPreguntaGratis.php");
			}
	/*else if($Puntaje==17){
			header("location:preguntaColombia_08.php");
			}
	else if($Puntaje==18){
			header("location:preguntaColombia_09.php");
			}
	else if($Puntaje==19){
			header("location:preguntaColombia_10.php");
			}
	else if($Puntaje==20){
			header("location:ultimaPreguntaGratis.php");
			}*/

			

