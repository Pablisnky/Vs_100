<?php
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");

	$Verifica= $_GET["val_1"];
	// echo $Verifica . "<br>";

	$Consulta= "SELECT Cedula FROM participante";
    $Recordset= mysqli_query($conexion, $Consulta);
    while($Cedula= mysqli_fetch_array($Recordset)){
        if($Cedula["Cedula"] == $Verifica){
        	echo "La cedula que introdujo ya existe en nuestros registros";  ?>
             <style>
                .contenedor_11{
                	background-color:yellow;  
                    display: block;
                    text-align: center;     
                }
            </style>
            <?php
        }
        else{

        }
    }

?>


                    