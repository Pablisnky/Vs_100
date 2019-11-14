<?php //Archivo llamado desde ultima.php
session_start();
$participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en 
$ID_PP= $_SESSION["codigoPrueba"];
$Num_Pregunta= $_GET["pregunta"];//se recibe desde ultima.php


	// echo "Numero de pregunta= " . $Num_Pregunta . "<br>";
	// echo "ID_Participante= " . $participante . "<br>";
	// echo "Codigo prueba= " . $ID_PP . "<br>";

    include("../conexion/Conexion_BD.php");

    //Se consulta que pregunta de las doce corresponde con la primera que se le hizo al participante
    $Consulta_1="SELECT Num_Pregunta_Alea FROM respuestas WHERE ID_Participante='$participante' AND ID_PP = '$ID_PP' AND ID_Pregunta= $Num_Pregunta";
    $Recordset_1= mysqli_query($conexion, $Consulta_1); 
    while($Pregunta_Alea= mysqli_fetch_array($Recordset_1)){
        $PreguntaParticipante= $Pregunta_Alea["Num_Pregunta_Alea"];
        // echo "La pregunta aleatoria fue la Nº: " . $PreguntaParticipante;
    }
?>
    
    <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
    <?php
    include("../tema/biblia/ReavivadosPalabra/11_19/12/preguntaBiblia_ReavivadosPalabra_$PreguntaParticipante.php");
    ?>
<html>
<label onclick = "window.close()" style="cursor:pointer;">Cerrar</label>
</html>
	 