<?php
	session_start();
	include("../../conexion/Conexion_BD.php");

    //echo "Entro a prorroteo" . "<br>";

    $Pregunta= $_SESSION["Pregunta"];//sesion creada en preguntaXXXX_00.php (en cada pregunta)
    // echo $Pregunta . "<br>";
  	$Participante= $_SESSION["ID_Participante"];
  	// echo $Participante;
  	$Tema= "Demo";
  					
    			//se obtienen los minutos que faltan para dar una respuesta, para esto se necesita HoraMaximo y Hora_Respuesta
  				//Se consulta la hora de HoraMaximo
				$Consulta_2= "SELECT  DATE_FORMAT(HoraMaximo, '%H:%i:%s') FROM respuestas_demo WHERE ID_Participante ='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema'";
				$Recordset_3= mysqli_query($conexion,$Consulta_2);
				$Tiempo=  mysqli_fetch_array($Recordset_3);
				$horafin= $Tiempo["DATE_FORMAT(HoraMaximo, '%H:%i:%s')"];
				//echo "Hora final guardada en BD=" . $horafin . "<br>";

				//se calcula la Hora de Respuesta
				//Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional venezolana
			    date_default_timezone_set('America/Bogota');
    			$horaini = date("H:i:s");
    			//echo "Hora inicial entregada por servidor PHP=" . $horaini . "<br>";

				//Se corrige la hora del servidor PHP local, desactivado en remoto
    			//$salto_horario_PHPLocal = -0.5 * 60 * 60;//se restan 30 minutas, porque el servidor PHP esta adelantado
    			//$horaini = date("H:i:s", time()  + $salto_horario_PHPLocal);
    			//echo "Hora inicial entregada por servidor PHP=" . $horaini . "<br>";
				
				//Se llama a la funcion que calcula la diferencia entre ambas horas
					$horai=substr($horaini,0,2);
					$mini=substr($horaini,3,2);
					$segi=substr($horaini,6,2);
				 
					$horaf=substr($horafin,0,2);
					$minf=substr($horafin,3,2);
					$segf=substr($horafin,6,2);
				 
					$ini=((($horai*60)*60)+($mini*60)+$segi);
					$fin=((($horaf*60)*60)+($minf*60)+$segf);
				 
					$dif=$fin-$ini;
				 
					$difh=floor($dif/3600);
					$difm=floor(($dif-($difh*3600))/60);
					$difs=$dif-($difm*60)-($difh*3600);
					$TiempoRespuesta= date("H:i:s",mktime($difh,$difm,$difs));		
					//echo "diferencia =" . $TiempoRespuesta;

				if($TiempoRespuesta >= '00:01:30'){
					$Premio=5;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante'";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:29'){ //Si el participante esta bloqueado
				   	$Premio=4.94;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
			   	}
		    	else if($TiempoRespuesta =='00:01:28'){
		    		$Premio=4.88;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
		    	else if($TiempoRespuesta =='00:01:27'){
		    		$Premio=4.82;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:26'){
		    		$Premio=4.76;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:25'){
		    		$Premio=4.70;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:24'){
		    		$Premio=4.64;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:23'){
		    		$Premio=4.58;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:22'){
		    		$Premio=4.52;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:21'){
		    		$Premio=4.46;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:20'){
		    		$Premio=4.40;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:19'){
		    		$Premio=4.34;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:18'){
		    		$Premio=4.28;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:17'){
		    		$Premio=4.22;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:16'){
		    		$Premio=4.16;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:15'){
		    		$Premio=4.10;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:14'){
		    		$Premio=4.04;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:13'){
		    		$Premio=3.98;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:12'){
		    		$Premio=3.92;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:11'){
		    		$Premio=3.86;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:10'){
		    		$Premio=3.80;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:09'){
		    		$Premio=3.74;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:08'){
		    		$Premio=3.68;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:07'){
		    		$Premio=3.62;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:06'){
		    		$Premio=3.56;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:05'){
		    		$Premio=3.50;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:04'){
		    		$Premio=3.44;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:03'){
		    		$Premio=3.38;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:02'){
		    		$Premio=3.32;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:01'){
		    		$Premio=3.26;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:01:00'){
		    		$Premio=3.20;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:59'){
		    		$Premio=3.14;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:58'){
		    		$Premio=3.08;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:57'){
		    		$Premio=3.02;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:56'){
		    		$Premio=2.96;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:55'){
		    		$Premio=2.90;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:54'){
		    		$Premio=2.84;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:53'){
		    		$Premio=2.78;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:52'){
		    		$Premio=2.72;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:51'){
		    		$Premio=2.66;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:50'){
		    		$Premio=2.60;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:49'){
		    		$Premio=2.54;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:48'){
		    		$Premio=2.48;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:47'){
		    		$Premio=2.42;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:46'){
		    		$Premio=2.36;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:45'){
		    		$Premio=2.30;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:44'){
		    		$Premio=2.24;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:43'){
		    		$Premio=2.18;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:42'){
		    		$Premio=2.12;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:41'){
		    		$Premio=2.06;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:40'){
		    		$Premio=2.00;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:39'){
		    		$Premio=1.94;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:38'){
		    		$Premio=1.88;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:37'){
		    		$Premio=1.82;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}else if($TiempoRespuesta =='00:00:36'){
		    		$Premio=1.76;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:35'){
		    		$Premio=1.70;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:34'){
		    		$Premio=1.64;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:33'){
		    		$Premio=1.58;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:32'){
		    		$Premio=1.52;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:31'){
		    		$Premio=1.46;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:30'){
		    		$Premio=1.40;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:29'){
		    		$Premio=1.34;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:28'){
		    		$Premio=1.28;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:27'){
		    		$Premio=1.22;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}else if($TiempoRespuesta =='00:00:26'){
		    		$Premio=1.16;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:25'){
		    		$Premio=1.10;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:24'){
		    		$Premio=1.04;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:23'){
		    		$Premio=0.98;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:22'){
		    		$Premio=0.92;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:21'){
		    		$Premio=0.86;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:20'){
		    		$Premio=0.80;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:19'){
		    		$Premio=0.74;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:18'){
		    		$Premio=0.68;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:17'){
		    		$Premio=0.62;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:16'){
		    		$Premio=0.56;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:15'){
		    		$Premio=0.50;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:14'){
		    		$Premio=0.44;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:13'){
		    		$Premio=0.38;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:12'){
		    		$Premio=0.32;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:11'){
		    		$Premio=0.26;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:10'){
		    		$Premio=0.20;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:09'){
		    		$Premio=0.14;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:08'){
		    		$Premio=0.08;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:07'){
		    		$Premio=0.02;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:06'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:05'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:04'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:03'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:02'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:01'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else if($TiempoRespuesta =='00:00:00'){
		    		$Premio=0.01;
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}
				else{
		    		$Premio= "";
					$Sumar="UPDATE participante_demo SET puntos= (puntos + $Premio) WHERE ID_Participante='$Participante' ";
					mysqli_query($conexion,$Sumar);
				}


				