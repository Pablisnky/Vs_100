<?php
    class imagenComentada{
        function ImagenIndex(){ 
            if(date("Y-m-d")=="2020-01-10"){
                echo "<img class='imagen_11' src='images/Job_reprochaAmigos.jpg'/>"; 
                echo "<p class='p_9'>Job le reclama a sus amigos \"¿Por qué me perseguís como Dios,
                Y ni aun de mi carne os saciáis?.\"</p>";
            }
            else{
                echo "<img class='imagen_11' src='images/job_acusado_2.jpg'/>";
                echo "<p class='p_9'>Los amigos de Job lo acusan de ser un malvado y haberse ganado tal aflicción</p>";
            }
        }
        function ImagenComentario(){
            echo "<img class='imagen_11' alt='Nehemias dirigiendo el coro' src='../images/Ester_Mardoqueo.jpg'/>";
        }

    }
?>