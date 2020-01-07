<?php
	include("../conexion/Conexion_BD.php");
    
    //Se busca si el participante ha logrado insignias
    $Consulta_40 = "SELECT COUNT('Nombre') AS Total FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND Tema='Reavivados' AND ID_Participante= '$participante'";
    $Recordset_40 = mysqli_query($conexion, $Consulta_40);
    $Cantidad = mysqli_fetch_array($Recordset_40);
    if($Cantidad["Total"] == 0){   ?>
        <P class="etiqueta_3">Aún no has ganado insignias. En <b>"instrucciones"</b> del menu principal están los detallles para obtenerlas.</P>   <?php
    }
    else{   ?>
        <P class="etiqueta_3">Has logrado <?php echo $Cantidad["Total"];?> Insignias Maestro</p> 
        <div style="width: 10%; margin:auto"> 
        <img class="imagen_9" alt="Insignia" src="../images/In_Maestro.png"> 
        </div>
    <?php

    }
   ?>