<?php 
	session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	include("../conexion/Conexion_BD.php");

	$Tema= $_GET["Tema"];//recibe el tema de la prueba desde temas.php
    // echo "Tema= " . $Tema . "<br>";

    $Categoria= $_GET["Categoria"];//recibe el tema de la prueba desde temas.php
    // echo "Categoria= " . $Categoria . "<br>";

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

    if($ID_Prueba == 5){
        //Se evalua si ya respondio la prueba diaria
        $Consulta_0= "SELECT Prueba_Cerrada FROM participantes_pruebas WHERE DATE_FORMAT(Fecha_pago, '%Y-%m-%d') = CURDATE() AND Tema= 'Reavivados' AND ID_Participante= '$Participante'";
        $Recordset = mysqli_query($conexion, $Consulta_0);
        if(mysqli_num_rows($Recordset) == 1) {

            echo " Ya participastes en la prueba de hoy, espera hasta mañana" . "<br>";
            
//--------------------------------------------
           //esta parte del codigo en construccion
            echo "¿Quisieras responder las pruebas de los capitulos anteriores?" . "<br>";
            echo "<a href='inscripcionRPSP.php'>Si</a>" . "<br>";
//--------------------------------------------
                     
            ?>
            <label class="bloqueo" onclick="cerrar()">Regresar</label> 

            <script type="text/javascript">
                function cerrar(){
                    // Se recarga la ventana padre
                    window.opener.location.reload();
                    // se cierra la ventana POPUP
                    this.window.close();
                }
            </script>
            <?php
            exit();
        }
        else{//No ha participado en la prueba diaria
            //Se genera un numero aleatorio para insertarlo como Nº de deposito
            mt_srand (time());
            $Aleatorio = mt_rand(1000000,999999999);
            // echo "Aleatorio= " . $Aleatorio . "<br>";
            
            //Se activa la prueba reavivados en la BD 
            $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba', '$Categoria', '$Tema', '$Aleatorio',1 ,1 , NOW())" ;
            mysqli_query($conexion, $Insertar) or DIE ('Falló conexión a la base de datos');

            //Se da la señal de que participo en la prueba de hoy
            $Insertar_2= "INSERT INTO pruebas_reavivados(ID_Participante, Fecha) VALUES('$Participante', NOW())" ;
            mysqli_query($conexion, $Insertar_2) or DIE ('Falló conexión a la base de datos');

        }   ?>
        
        <script type="text/javascript">
            // Se recarga la ventana padre
            window.opener.location.reload();
            // se cierra la ventana POPUP
            this.window.close();
        </script>
        <?php
    }
        else{//Si el tema no es reavivadoss
        //Se genera un numero aleatorio para insertarlo como Nº de deposito
        mt_srand (time());
        $Aleatorio = mt_rand(1000000,999999999);
        // echo "Aleatorio= " . $Aleatorio . "<br>";

        //Se activa la prueba en la BD 
        $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba', '$Categoria', '$Tema', '$Aleatorio',1 ,1 , NOW())" ;
        mysqli_query($conexion, $Insertar) or DIE ('Falló conexión a la base de datos');	

        //Se consulta el codigo de la prueba
        $Consulta= "SELECT ID_PP FROM participantes_pruebas WHERE ID_Participante= '$Participante' AND Tema= '$Tema' AND Prueba_Cerrada= 0";
        $Recordset = mysqli_query($conexion, $Consulta);
        $Resultado= mysqli_fetch_array($Recordset); 
        $CodigoID_PP= $Resultado["ID_PP"];  
    }      
?>
<script type="text/javascript">
    // Se recarga la ventana padre
    window.opener.location.reload();
    // se cierra la ventana POPUP
    this.window.close();
</script>