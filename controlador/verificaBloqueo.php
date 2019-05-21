<?php   
	$participante=$_SESSION["Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php, no hace falta iniciar sesion porque este archivo va a ser incluido en seleccionPais que ya tiene una sesion iniciada
	//echo "Participante= " . $participante;
	
	include("conexion/Conexion_BD.php");
    mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

	//se consulta en la BD si el participante ya esta bloqueado.
    //se obtienen las horas que faltan para terminar el bloqueo del participante y se entrega en formato 00:00:00
	$Consulta_2= "SELECT SEC_TO_TIME((TIMESTAMPDIFF(MINUTE , NOW(), TiempoBloqueo ))*60) AS diferencia FROM  participante WHERE ID_Participante ='$participante'";
	$Recordset_3= mysqli_query($conexion,$Consulta_2);
	$Faltan=  mysqli_fetch_array($Recordset_3);
	$Incremento=$Faltan["diferencia"];

		if($Incremento > '00:00:00'){ //Si el participante esta bloqueado
	    	echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=Sesiones_Cookies/entrada.php'>";  
		 
		 	exit();
			//echo "<h3>$Incremento</h3>";
			//echo "<h3>La cookie de bloqueo esta en tiempo de ejecucion.</h3>";
	    	//echo "<h3>opcion 1</h3>";  	
	    }