<?php   
    session_start();  
    $corroborar = $_SESSION["Trivia"];
    if($corroborar == "xx"){// Anteriormente en trivia.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['Trivia']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;

        $Nombre=$_POST["nombre"];
        $Cedula=$_POST["cedula"];
        $Correo=$_POST["correo"];

        // echo "Nombre= " . $Nombre . "<br>";
        // echo "Cedula= " . $Cedula . "<br>";
        // echo "Correo= " . $Correo . "<br>"; 
    
        //Se verifica que el participante no haya dejado campos sin llenar
        if(empty($Nombre) OR empty($Cedula) OR empty($Correo)){
            echo"<script>alert('Faltan campos por llenar');window.location.href='../vista/trivia.php';</script>";
           
        }
        else{//Verifica si el usuario que se va a recibir desde trivia.php no esta participando en la prueba disponible del dia
            include("../conexion/Conexion_BD.php");

            //Se consulta si el participante ya esta inscrito en la prueba del dia
            $Consulta = "SELECT participante_trivia.ID_ParticipanteTrivia FROM participante_trivia INNER JOIN trivia_inscritos ON participante_trivia.ID_ParticipanteTrivia=trivia_inscritos.ID_ParticipanteTrivia WHERE participante_trivia.cedula_ciudadania= '$Cedula' ";
            $Recordset= mysqli_query($conexion, $Consulta);

            if(mysqli_num_rows($Recordset) == 0){//El participante no esta inscrito
                // Se consulta el ID_PruebaTrivia que esta disponible para hoy
                $Consulta = "SELECT * FROM pruebas_trivias WHERE CupoMax != 1 ORDER BY fecha DESC LIMIT 1";
                $Recordset= mysqli_query($conexion, $Consulta);
                $CupoAbierto= mysqli_fetch_array($Recordset);
                $PruebaCupo= $CupoAbierto["ID_PTD"];
                // echo "ID_Prueba con cupo =" . $PruebaCupo . "<br>";
                
                if($CupoAbierto["CupoMax"] == ''){//La prueba no existe
                    echo "CupoMax= vacio" . "<br>";
                    //Se inscribe al participante en la trivia
                    //Si no existe una prueba o si esta cerrada se abre una prueba nueva con un numero aleatorio para seleccionar dicha prueba mas tarde (1=true-se alcanzo el cupo maximo; 0=false-aun no se alcanza el cupo maximo)

                    //generamos un número aleatorio
                    mt_srand (time());
                    $Aleatorio = mt_rand(1000000,999999999);
                    // echo "Aleatorio= " . $Aleatorio . "<br>";

                    //Se registra al participante
                    $Insertar = "INSERT INTO participante_trivia(nombre, cedula_ciudadania, correo, fecha_regitro, Aleatorio) VALUES('$Nombre','$Cedula','$Correo', NOW(),'$Aleatorio')";
                    mysqli_query($conexion, $Insertar);

                    //Se consulta el ID_ParticipanteTrivia recien insertado
                    $Consulta_1= "SELECT ID_ParticipanteTrivia FROM participante_trivia WHERE Aleatorio = $Aleatorio";
                    $Recordset_1= mysqli_query($conexion, $Consulta_1);
                    $Resultado=mysqli_fetch_array($Recordset_1);
                    $ID_ParticipanteTrivia= $Resultado["ID_ParticipanteTrivia"];

                    //Se crea una nueva prueba
                    $Insertar_1 = "INSERT INTO pruebas_trivias(fecha,CupoMax) VALUES( NOW(), 0)";
                    mysqli_query($conexion, $Insertar_1);

                    //Se consulta el ID_PruebaTrivia recien generada
                    $Consulta_3= "SELECT ID_PTD FROM pruebas_trivias ORDER BY fecha DESC";
                    $Recordset_3= mysqli_query($conexion, $Consulta_3);
                    $Resultado=mysqli_fetch_array($Recordset_3);
                    $ID_PruebaTrivia= $Resultado["ID_PTD"];

                    //Se realiza la operacion de inscripcion en la tabla trivia_incritos
                    $Insertar_2 = "INSERT INTO trivia_inscritos(ID_ParticipanteTrivia, ID_PTD) VALUES('$ID_ParticipanteTrivia','$ID_PruebaTrivia' )";
                    mysqli_query($conexion, $Insertar_2);

                    //Se crea una sesion con el ID_ParticipanteTrivia
                    $_SESSION["ID_ParticipanteTrivia"]= $ID_ParticipanteTrivia;
                    
                    //Se crea una sesion con el ID_PTD (PruebaTriviaDiaria)
                    $_SESSION["ID_PTD"]= $ID_PruebaTrivia;

                    header("Location:../vista/pregunta_trivia.php");
                }        
                else if($CupoAbierto["CupoMax"] == '0'){//La prueba esta abierta                 
                    //Se consulta cuantos participantes tiene la prueba del dia
                    $Consulta_3= "SELECT COUNT(ID_ParticipanteTrivia) AS participantes FROM trivia_inscritos INNER JOIN pruebas_trivias ON trivia_inscritos.ID_PTD=pruebas_trivias.ID_PTD WHERE CupoMax=0 ";
                    $Recordset_3= mysqli_query($conexion, $Consulta_3);
                    $Verificar= mysqli_fetch_array($Recordset_3); 
                    if($Verificar['participantes'] < 3 ){
                        // echo "CupoMax < 3" . "<br>";

                        //generamos un número aleatorio
                        mt_srand (time());
                        $Aleatorio_2 = mt_rand(1000000,999999999);
                        // echo "Aleatorio= " . $Aleatorio_2 . "<br>";

                        //Se registra al participante
                        $Insertar = "INSERT INTO participante_trivia(nombre, cedula_ciudadania, correo, fecha_regitro, Aleatorio) VALUES('$Nombre','$Cedula','$Correo', NOW(),'$Aleatorio_2')";
                        mysqli_query($conexion, $Insertar);
                        
                        //Se consulta el ID_ParticipanteTrivia recien insertado
                        $Consulta_1= "SELECT ID_ParticipanteTrivia FROM participante_trivia WHERE Aleatorio = $Aleatorio_2";
                        $Recordset_1= mysqli_query($conexion, $Consulta_1);
                        $Resultado=mysqli_fetch_array($Recordset_1);
                        $ID_ParticipanteTrivia= $Resultado["ID_ParticipanteTrivia"];
                        
                        //Se consulta el ID_PTD con cupo
                        $Consulta_3= "SELECT ID_PTD FROM pruebas_trivias WHERE CupoMax=0";
                        $Recordset_3= mysqli_query($conexion, $Consulta_3);
                        $Resultado_3=mysqli_fetch_array($Recordset_3);
                        $ID_PruebaTrivia= $Resultado_3["ID_PTD"];

                        //Se realiza la operacion de inscripcion en la tabla trivia_incritos
                        $Insertar_2 = "INSERT INTO trivia_inscritos(ID_ParticipanteTrivia, ID_PTD) VALUES('$ID_ParticipanteTrivia','$ID_PruebaTrivia' )";
                        mysqli_query($conexion, $Insertar_2);

                        //Se crea una sesion con el ID_ParticipanteTrivia
                        $_SESSION["ID_ParticipanteTrivia"]= $ID_ParticipanteTrivia;

                        //Se crea una sesion con el ID_PTD (PruebaTriviaDiaria)
                        $_SESSION["ID_PTD"]= $ID_PruebaTrivia;

                        header("Location:../vista/pregunta_trivia.php");
                    }
                    else if($Verificar['participantes'] = 3){
                        // echo "CupoMax=  3" . "<br>";
                        //Se consulta el ID_Prueba que alcanzo el maximo
                        $Consulta_4= "SELECT ID_PTD FROM pruebas_trivias WHERE CupoMax=0";
                        $Recordset_4= mysqli_query($conexion, $Consulta_4);
                        $PruebaAbierta= mysqli_fetch_array($Recordset_4);
                        $ID_Prueba_4= $PruebaAbierta["ID_PTD"];
                        echo "ID_Prueba, ultimo cupo =" .  $ID_Prueba_4 . "<br>";

                        //Se cierra el cupo de la prueba
                        $Actualizar = "UPDATE pruebas_trivias SET CupoMax= 1 WHERE ID_PTD='$ID_Prueba_4' ";
                        mysqli_query($conexion, $Actualizar);
                
                        //Se crea una nueva prueba
                        $Insertar_1 = "INSERT INTO pruebas_trivias(fecha,CupoMax) VALUES( NOW(), 0)";
                        mysqli_query($conexion, $Insertar_1);

                        //Se consulta el ID_PruebaTrivia recien generada
                        $Consulta_3= "SELECT ID_PTD FROM pruebas_trivias ORDER BY fecha DESC";
                        $Recordset_3= mysqli_query($conexion, $Consulta_3);
                        $Resultado=mysqli_fetch_array($Recordset_3);
                        $ID_PruebaTrivia= $Resultado["ID_PTD"];
                        // echo "ID_Prueba generada= " . $ID_PruebaTrivia . "<br>";

                        //generamos un número aleatorio
                        mt_srand (time());
                        $Aleatorio_3 = mt_rand(1000000,999999999);
                        // echo "Aleatorio= " . $Aleatorio_3 . "<br>";

                        //Se registra al participante
                        $Insertar = "INSERT INTO participante_trivia(nombre, cedula_ciudadania, correo, fecha_regitro, Aleatorio) VALUES('$Nombre','$Cedula','$Correo', NOW(),'$Aleatorio_3')";
                        mysqli_query($conexion, $Insertar);

                        //Se consulta el ID_ParticipanteTrivia recien insertado
                        $Consulta_1= "SELECT ID_ParticipanteTrivia FROM participante_trivia WHERE Aleatorio = $Aleatorio_3";
                        $Recordset_1= mysqli_query($conexion, $Consulta_1);
                        $Resultado=mysqli_fetch_array($Recordset_1);
                        $ID_ParticipanteTrivia= $Resultado["ID_ParticipanteTrivia"];

                        //Se realiza la operacion de inscripcion en la tabla trivia_incritos
                        $Insertar_2 = "INSERT INTO trivia_inscritos(ID_ParticipanteTrivia, ID_PTD) VALUES('$ID_ParticipanteTrivia','$ID_PruebaTrivia' )";
                        mysqli_query($conexion, $Insertar_2); 

                        //Se crea una sesion con el ID_ParticipanteTrivia
                        $_SESSION["ID_ParticipanteTrivia"]= $ID_ParticipanteTrivia;

                        //Se crea una sesion con el ID_PTD (PruebaTriviaDiaria)
                        $_SESSION["ID_PTD"]= $ID_PruebaTrivia;

                        header("Location:../vista/pregunta_trivia.php");
                    }
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
    }
    else{ 
        // Si no viene del formulario trivia.php.php o trata de recargar página lo enviamos al index.html  
        echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../index.php'>";  
    } 
    ?>