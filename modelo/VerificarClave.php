<?php
    //Se conecta a la base de datos
    include("../conexion/Conexion_BD.php");

	$ClaveRecivida= $_GET["val_1"];
	// echo "La clave resivida es: " . $Verifica . "<br>";

    //se descifra la contraseña con un algoritmo de desencriptado.
        

	$Consulta= "SELECT clave FROM usuarios";
    $Recordset= mysqli_query($conexion, $Consulta);
    while($Clave= mysqli_fetch_array($Recordset)){
        if($ClaveRecivida == password_verify($ClaveRecivida, $Clave["clave"])){
        	echo "La contraseña que introdujo ya existe en nuestros registros"; ?>
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


                    