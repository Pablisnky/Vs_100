<?php
    if($InsigniasGanadas>1){  ?>
        <label class="label_4">+<?php echo $InsigniasGanadas?></label>     
        <acronym title="Insignia de Maestro" lang="es"><img class="imagen_9" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()"></acronym>   <?php
        // echo $ID_Participante_1;<?php 
    } 
    else{   ?>                        
        <acronym title="Insignia de Maestro" lang="es"><img class="imagen_9" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()"></acronym>   <?php
        // echo $ID_Participante_1;
    }
?>