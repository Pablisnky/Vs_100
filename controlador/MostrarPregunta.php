<?php //Archivo llamado desde ultima.php
session_start();
    $participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en 
    $ID_PP= $_SESSION["codigoPrueba"];
    $CapituloHoy = $_SESSION["Capitulo"];//en esta sesion se tiene guardado el nombre del capitulo estudiado, sesion creada en index.php
    // echo "Capitulo de hoy: " . $CapituloHoy . "<br>"; 
    $Num_Pregunta= $_GET["pregunta"];//se recibe desde ultima.php
    $ID_Pregunta= $_GET["N_Pregunta"];//se recibe desde ultima.php

	// echo "Numero de pregunta= " . $Num_Pregunta . "<br>";
	// echo "ID_Participante= " . $participante . "<br>";
    // echo "Codigo prueba= " . $ID_PP . "<br>";
    
    include("../conexion/Conexion_BD.php");

    //Se consulta que pregunta de las doce corresponde con la primera que se le hizo al participante
    $Consulta_1="SELECT Num_Pregunta_Alea FROM respuestas WHERE ID_Participante='$participante' AND ID_PP = '$ID_PP' AND ID_Pregunta= '$ID_Pregunta'";
    $Recordset_1= mysqli_query($conexion, $Consulta_1); 
    while($Pregunta_Alea= mysqli_fetch_array($Recordset_1)){
        $PreguntaParticipante= $Pregunta_Alea["Num_Pregunta_Alea"];
        //  echo "La pregunta aleatoria es la Nº " . $PreguntaParticipante . "<br>";
    }
?>    
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
            <link rel="stylesheet" type="text/css" href="../css/MediaQuery_EstilosVs_100.css"/>
        </head>
        <body>
            <header>
                <h1>Reavivados</h1>
                <span class='Inicio_14 Inicio_17'><?php echo $CapituloHoy; ?></span>
                <h4>Pregunta Nº <?php echo $ID_Pregunta;?></h4>
                <br>
            </header>
            <?php
                //Se utiliza la hora de Colombia
                date_default_timezone_set('America/Bogota');
                $FechaServidorPHP =date("Y-m-d");
                // echo $FechaServidorPHP . "<br>";
                
                if($FechaServidorPHP == "2020-01-07"){
                    include("../tema/biblia/ReavivadosPalabra/01_20/07/preguntaBiblia_ReavivadosPalabra_$PreguntaParticipante.php");
                }
                else{
                    include("../tema/biblia/ReavivadosPalabra/01_20/06/preguntaBiblia_ReavivadosPalabra_$PreguntaParticipante.php");
                }
            ?>
            <label class="nav_13" onclick ="window.close()">Cerrar</label>
        </body>
    </html>