<?php   
    // session_start();  
    // $corroborar = $_SESSION["Trivia"];
    // if ($corroborar == "xx"){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        // unset($_SESSION['Trivia']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;

        $Nombre=$_POST["nombre"];
        $Cedula=$_POST["cedula"];
        $Correo=$_POST["correo"];

        echo "Nombre= " . $Nombre . "<br>";
        echo "Cedula= " . $Cedula . "<br>";
        echo "Correo= " . $Correo . "<br>"; 
    
        //Se verifica que el participante no haya dejado campos sin llenar
        if(empty($Nombre) AND empty($Cedula) AND empty($Correo)){
            echo"<script>alert('Faltan campos por llenar');window.location.href='../vista/trivia.php';</script>";
        }
        else{//Verifica si el usuario que se va a recibir desde trivia.php no esta participando en la prueba disponible del dia
            include("../conexion/Conexion_BD.php");

            //Se consulta si el participante ya esta inscrito en la prueba del dia
            $Consulta = "SELECT participante_trivia.ID_PT FROM participante_trivia INNER JOIN trivia_inscritos ON participante_trivia.ID_PT=trivia_inscritos.ID_PruebaTrivia WHERE participante_trivia.cedula_ciudadania= '$Cedula' ";
            $Recordset= mysqli_query($conexion, $Consulta);

            if(mysqli_num_rows($Recordset) == 0){//El participante no esta inscrito
                // Se consulta el ID_PruebaTrivia que esta disponible para hoy
                $Consulta = "SELECT * FROM pruebas_trivias WHERE CupoMax != 1 ORDER BY fecha DESC LIMIT 1";
                $Recordset= mysqli_query($conexion, $Consulta);
                $CupoAbierto= mysqli_fetch_array($Recordset);
                $PruebaCupo= $CupoAbierto["ID_PruebaTrivia"];
                echo "ID_Prueba con cupo =" . $PruebaCupo . "<br>";
                
                if($CupoAbierto["CupoMax"] == ''){
                    echo "Entramos aqui" . "<br>";
                    //Se inscribe al participante en la trivia
                    //Si no existe una prueba o si esta cerrada se abre una prueba nueva con un numero aleatorio para seleccionar dicha prueba mas tarde (1=true-se alcanzo el cupo maximo; 0=false-aun no se alcanza el cupo maximo)

                    //generamos un número aleatorio
                    mt_srand (time());
                    $Aleatorio = mt_rand(1000000,999999999);
                    echo "Aleatorio= " . $Aleatorio . "<br>";

                    //Se registra al participante
                    $Insertar = "INSERT INTO participante_trivia(nombre, cedula_ciudadania, correo, fecha_regitro, Aleatorio) VALUES('$Nombre','$Cedula','$Correo', NOW(),'$Aleatorio')";
                    mysqli_query($conexion, $Insertar);

                    //Se consulta el ID_PT
                    $Consulta_1= "SELECT ID_PT FROM participante_trivia WHERE Aleatorio = $Aleatorio";
                    $Recordset_1= mysqli_query($conexion, $Consulta_1);
                    $Resultado=mysqli_fetch_array($Recordset_1);
                    $ID_PT=$Resultado["ID_PT"];

                    //Se inscribe al participante en la trivia
                    $Insertar_1 = "INSERT INTO pruebas_trivias(fecha,CupoMax) VALUES( NOW(), 0)";
                    mysqli_query($conexion, $Insertar_1);

                    //Se consulta el ID_PruebaTrivia recien generada
                    $Consulta_3= "SELECT ID_PruebaTrivia FROM pruebas_trivias ORDER BY fecha DESC";
                    $Recordset_3= mysqli_query($conexion, $Consulta_3);
                    $Resultado=mysqli_fetch_array($Recordset_3);
                    $ID_PruebaTrivia=$Resultado["ID_PruebaTrivia"];

                    //Se almacena la operacion de iscripcion en la tabla trivia_incritos
                    $Insertar_2 = "INSERT INTO trivia_inscritos(ID_PT, ID_PruebaTrivia) VALUES('$ID_PT','$ID_PruebaTrivia' )";
                    mysqli_query($conexion, $Insertar_2);
                }        
                else if($CupoAbierto["CupoMax"] == '0'){//La prueba esta abierta                 
                    // //Se consulta cuantos participantes tiene la prueba que aun tiene cupo
                    $Consulta_3= "SELECT COUNT(ID_PruebaTrivia) AS participantes FROM trivia_inscritos ORDER BY ID_TI DESC LIMIT 1";
                    $Recordset_3= mysqli_query($conexion, $Consulta_3);
                    $Verificar= mysqli_fetch_array($Recordset_3); 
                    if($Verificar['participantes'] < 3 ){
                        echo "QUedan cupos";
                        // global $ID_Prueba_2;
                        // // Se inscribe al participante en la prueba que haya cupo
                        // $Insertar_1 = "INSERT INTO pruebas_trivias(ID_PT, fecha,CupoMax) VALUES('$Participante','$ID_Prueba_2', '$Categoria', '$Tema','$Deposito', NOW())";
                        // mysqli_query($conexion, $Insertar_1); 
                        
                    }
                    // else($Verificar['participantes'] = 3){
                    //     //Se consulta el ID_Prueba que alcanzo el maximo cupo
                    //     $Consulta_2= "SELECT ID_Prueba FROM pruebas_trivias GROUP BY ID_Prueba DESC LIMIT 1";
                    //     $Recordset_2= mysqli_query($conexion, $Consulta_2);
                    //     $PruebaAbierta= mysqli_fetch_array($Recordset_2);
                    //     $ID_Prueba_3= $PruebaAbierta["ID_Prueba"];
                    //     // echo "ID_Prueba =" .  $ID_Prueba . "<br>";

                    //     //Se cierra el cupo de la prueba
                    //     $Actualizar = "UPDATE pruebas SET CupoMax= 1 WHERE ID_Prueba='$ID_Prueba_3' ";
                    //     mysqli_query($conexion, $Actualizar);
            
                    //     //generamos un número aleatorio
                    //     mt_srand (time());
                    //     $Aleatorio_2 = mt_rand(1000000,999999999);

                    //     $Insertar_5 = "INSERT INTO pruebas(Categoria, Tema, CupoMax, Aleatorio) VALUES('$Categoria','$Tema','0','$Aleatorio_2')";
                    //     mysqli_query($conexion, $Insertar_5);

                    //     //Se consulta el numero aleatorio que tiene la prueba generada para sacar el ID_Prueba
                    //     $Consulta_4=  "SELECT ID_Prueba FROM pruebas WHERE Aleatorio= '$Aleatorio'";
                    //     $Recordset_4= mysqli_query($conexion, $Consulta_4);
                    //     $CupoAbierto= mysqli_fetch_array($Recordset_4);
                    //     $ID_Prueba_4= $CupoAbierto["ID_Prueba"];
                    //     // echo "ID_Prueba generada= " . $ID_Prueba . "<br>";

                    //     //Se inscribe al participante en la prueba que haya cupo
                    //     $Insertar_1 = "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Fecha_pago) VALUES('$Participante','$ID_Prueba_4','$Categoria','$Tema','$Deposito', NOW())";
                    //     mysqli_query($conexion, $Insertar_1); 
                    // }
                }
            }
            else{    
                echo "<p style='color:yellow; position: absolute; top: 45%; left: 25%; font-size: 30px; font-family:arial;'>Ya esta inscrito en la trivia de hoy</p>"; 
                echo "<a style='background-color:white; padding: 1% 2%; font-size: 20px; font-family:arial;text-decoration:none; border-radius: 15px;position: absolute; top: 55% left: 45%;' href='../vista/Trivia.php'>Regresar</a>"   ?> 
                <style>
                    body{
                        background-color: rgba(0,0,0,0.85) !important;
                    }
                </style>
                <?php
            }
        }
            // // Se insertan los datos en la BD
            // include("../conexion/Conexion_BD.php");
            // $Insertar= "INSERT INTO participante_trivia(nombre,cedula_ciudadania,correo,fecha_regitro)VALUES('$nombre', '$Cedula', '$correo', NOW() )";
            // mysqli_query($conexion,$Insertar) or DIE ('Falló conexión a la base de datos');


            // header("Location:../controlador/temas_Trivia.php");
      
    // }
    // else{   
    //     // Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al index.html  
    //     echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../index.php'>";  
    // } 
?>