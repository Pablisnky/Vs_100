<?php 
    session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
    
    //Se conecta con la BD
    include("../conexion/Conexion_BD.php");
    //Se evita que se muestren los errores en remotoreavivados por su palabrayoutube
    include("../modulos/muestraError.php");

	$Tema= $_GET["Tema"];//recibe el tema de la prueba desde entrada.php
    // echo "Tema= " . $Tema . "<br>";

    $Participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el ID del participante, sesion creada en validarSesion.php
     echo "ID_Participante= " . $Participante . "<br>";

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
        $Consulta_0= "SELECT Prueba_Cerrada FROM participantes_pruebas WHERE DATE_FORMAT(Fecha_pago, '%Y-%m-%d') = CURDATE() AND Tema= 'Reavivados' AND ID_Participante= '$Participante' AND Prueba_Cerrada = 1";
        $Recordset = mysqli_query($conexion, $Consulta_0);
        if(mysqli_num_rows($Recordset) == 1){

            echo "<p class='p4'>Ya participastes en la prueba de hoy, mañana continuamos estudiando</p>" . "<br>";                    
            ?>
            <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
            <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
            <a class="label buttonCuatro" href="javascript:history.go(-1)">Regresar</a> 
            <?php
            exit();
        }
        else{//No ha participado en la prueba diaria
            //se evalua si la prueba comenzó a contestarla y quedo a medias


            //Es primera vez que entra a la prueba
            //Se genera un numero aleatorio para insertarlo como Nº de deposito
            mt_srand (time());
            $Aleatorio = mt_rand(1000000,999999999);
            echo "Aleatorio= " . $Aleatorio . "<br>";
            
            //Se activa la prueba reavivados en la BD 
            $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba', '$Tema', '$Aleatorio',1 ,1 , NOW())";
            mysqli_query($conexion, $Insertar) or DIE ('Falló primera conexión a la base de datos');
        
            // header("location:entrada.php");

			//Se consulta en la BD los datos de la prueba que acaba de registrarse para poder ser redireccionado a la prueba
			$Consulta_0="SELECT ID_PP,ID_Prueba,Categoria,Tema,DATE_FORMAT(Fecha_pago, '%Y/%m/%d') AS Fecha_pago FROM participantes_pruebas WHERE ID_Participante='$Participante' AND (Prueba_Activa = 1 AND Prueba_Pagada = 1 AND Prueba_Cerrada = 0)";
			$Recordset_0 = mysqli_query($conexion, $Consulta_0); 
			if(mysqli_num_rows($Recordset_0) != 0){ 
				while($Registro_2= mysqli_fetch_array($Recordset_0)){ 
					echo "el tema de la prueba es: " . $Registro_2['Tema'] . "<br>"; 
					$Tema= $Registro_2['Tema'];
				    echo "el codigo de la prueba es: " . $Registro_2['ID_PP'] . "<br>";
					$ID_PP= $Registro_2["ID_PP"];
					echo "ID_PP = " . 	$ID_PP	 ."<br>";
					//se verifica que pruebas tiene pendientes o pruebas activas
					// $Pendiente= $Registro_2[0]; //campo "ID_PP" en tabla participantes_pruebas 
					// $Activa= $Participante[14]; //campo "activa" en tabla participantes_pruebas 
					// echo "Prueva pendiente= " . $Pendiente ."<br>"; 
					// echo "Prueva Activa= " . $Activa ."<br>";  
					$ID_Prueba= $Registro_2["ID_Prueba"]; 
					echo "ID_Prueba= " . $ID_Prueba ."<br>"; 
					$Categoria= $Registro_2["Categoria"]; 
					echo "ID_Prueba= " . $ID_Prueba ."<br>";
                    $Fecha= $Registro_2["Fecha_pago"];
                    echo "Fecha= " . $Fecha ."<br>";
                    header("location:../vista/pregunta.php?tema=$Tema&ID_PP=$ID_PP&fecha=$Fecha&ID_Prueba=$ID_Prueba");
                }
            }
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

    // header("location:entrada.php");
?>