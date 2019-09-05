<?php 
	session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
    include("../conexion/Conexion_BD.php");
    include("../modulos/muestraError.php");

	$Tema= $_GET["Tema"];//recibe el tema de la prueba desde temas.php
    // echo "Tema= " . $Tema . "<br>";

    $Participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el ID del participante, sesion creada en validarSesion.php
    // echo "ID_Participante= " . $Participante . "<br>";

    switch($Tema){
        case 'Genesis': 
        	$ID_Prueba = 1;
       	break;
        case 'Exodo': 
            $ID_Prueba = 2;
       	break;
        case 'Jeremias': 
        	$ID_Prueba = 3;
       	break;
        case 'Doctrina': 
            $ID_Prueba = 4;
        break;
        case 'Reavivados': 
            $ID_Prueba = 5;
        break;
    }

    if($ID_Prueba == 5){//Reavivados
        //Se evalua si ya respondio la prueba diaria
        $Consulta_0= "SELECT Prueba_Cerrada FROM participantes_pruebas WHERE DATE_FORMAT(Fecha_pago, '%Y-%m-%d') = CURDATE() AND Tema= 'Reavivados' AND ID_Participante= '$Participante'";
        $Recordset = mysqli_query($conexion, $Consulta_0);
        if(mysqli_num_rows($Recordset) == 1) {

            echo "<p class='p4'>Ya participastes en la prueba de hoy, mañana continuamos estudiando</p>" . "<br>";
            
            //--------------------------------------------
            //esta parte del codigo en construccion
            // echo "¿Quisieras responder las pruebas de los capitulos anteriores?" . "<br>";
            // echo "<a href='inscripcionRPSP.php'>Si</a>" . "<br>";
            //--------------------------------------------
                     
            ?>
            <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
            <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
            <a class="label buttonCuatro" href="javascript:history.go(-1)">Regresar</a> 
            <?php
            exit();
        }
        else{//No ha participado en la prueba diaria
            //Se genera un numero aleatorio para insertarlo como Nº de deposito
            mt_srand (time());
            $Aleatorio = mt_rand(1000000,999999999);
            // echo "Aleatorio= " . $Aleatorio . "<br>";
            
            //Se activa la prueba reavivados en la BD 
            $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba', '$Tema', '$Aleatorio',1 ,1 , NOW())";
            mysqli_query($conexion, $Insertar) or DIE ('Falló primera conexión a la base de datos');
        
            header("location:entrada.php");
        }   
    }
    else{//Si el tema no es reavivadoss
        //Se genera un numero aleatorio para insertarlo como Nº de deposito
        mt_srand (time());
        $Aleatorio = mt_rand(1000000,999999999);
        // echo "Aleatorio= " . $Aleatorio . "<br>";

        //Se activa la prueba en la BD 
        $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba','$Tema', '$Aleatorio',1 ,1 , NOW())" ;
        mysqli_query($conexion, $Insertar) or DIE ('Falló conexión a la base de datos');	
    }      

    header("location:entrada.php");
?>