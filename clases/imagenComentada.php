<?php
    class imagenComentada{
        function ImagenIndex(){ 
            if(date("Y-m-d")=="2020-01-06"){
                echo "<img class='imagen_11' src='images/Job_Amigos.jpg'/>"; 
                echo "<p class='p_9'>\"Para sus compañeros, las quejas de Job eran indicio de un espíritu orgulloso, rebelde y blasfemo.\"</p>";
            }
            else{
                echo "<img class='imagen_11' src='images/Queja_de_Job.jpg'/>";
                echo "<p class='p_9'>Job se lamenta y le dice a Dios \"Tú me has llenado de arrugas; testigo es mi flacura\"</p>";
            }
        }
        function ImagenComentario(){
            echo "<img class='imagen_11' alt='Nehemias dirigiendo el coro' src='../images/Ester_Mardoqueo.jpg'/>";
        }

    }
?>