<?php
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");

	$Verifica= $_GET["val_1"];
	// echo $Verifica . "<br>";

	$Consulta= "SELECT Correo FROM participante";
    $Recordset= mysqli_query($conexion, $Consulta);
    while($Correo= mysqli_fetch_array($Recordset)){
        if($Correo["Correo"] == $Verifica){
        	echo "El correo que introdujo ya existe en nuestros registros";  ?>
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


                    