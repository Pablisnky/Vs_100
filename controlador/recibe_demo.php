<?php
session_start();//se inicia sesion para crear una $_SESSION que almacene el ID_Participante, esta $_SESSION sera exigida cada vez que se entre en una pagina del area de afiliados, con esto se garantiza que se accedio a la cuenta del usuario haciendo login

    include("../conexion/Conexion_BD.php");

    include("../modulos/muestraError.php");
    
    //Verifica si el usuario que se va a recibir desde principal.php esta vacio
    if(empty($_POST["usuario"])){
        echo"<script>alert('Debe Llenar todos los campos vacios');window.location.href='../vista/demo.php';</script>";
    }
    else{
        // Se consulta si ya existe un usuario registrado con el nickname que se introduojo
        $Consulta= "SELECT usuario FROM participante_demo";
        $Recordset= mysqli_query($conexion, $Consulta);
        
        while($Correo= mysqli_fetch_array($Recordset)){
            if($Correo["usuario"] == $_POST["usuario"]){
                // echo $Correo["usuario"];
                ?>
                    <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                    <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
                <?php
                echo "<p class='p_3'>El usuario que introdujo ya existe en nuestros registros</p>"; 
                echo "<a class='a_2' href='../vista/demo.php'>Regresar</a>"   ?> 
                <style>
                    body{
                        background-color: rgba(0,0,0,0.85) !important;
                    }
                </style>

                <?php
            exit();
            }
        }

        //sino estan vacios se sanitizan y se reciben
        // $Usuario = filter_input( INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
        $Usuario= $_POST["usuario"];
        // echo "Usuario: " .  $Usuario . "<br>";

        //se insertan los datos a la BD
        $insertar= "INSERT INTO participante_demo(usuario, fecha_Registro) VALUES('$Usuario',NOW())";
        mysqli_query($conexion,$insertar) or DIE ('Falló conexión a la base de datos');

        //se realiza una consulta para obtener el ID_PD del participante en el demo
        $Consulta="SELECT ID_PD, usuario FROM participante_demo WHERE usuario= '$Usuario'";//se plantea la consulta
        $Recordset = mysqli_query($conexion, $Consulta);//se manda a ejecutar la consulta
        $Usuario_2= mysqli_fetch_array($Recordset); 
        $ID_PD= $Usuario_2["ID_PD"];
        $Usuario=  $Usuario_2["usuario"];
         // echo "ID_Participante en el Demo= " . $ID_PD . "<br>";
         // echo "Nombre de usuario en el Demo= " . $Usuario . "<br>";
      
        //se crea una $_SESSION llamada $ID_PD que almacena el ID del participante para  forzar a que entre a su cuenta solo despues de logearse.
        $_SESSION["ID_PD"]= $ID_PD;
        $_SESSION["Usuario"]= $Usuario;

        //  echo "La sesion ID_Participante= " . $_SESSION["ID_PD"] . "<br>";
        //  echo "La sesion Usuario= " . $_SESSION["Usuario"] . "<br>";

    	header("location:../tema/demo/preguntaDemo_01.php");//Se da acceso y se Redirije a la pagina "entrada.php" para comenzar con las preguntas del biblionario
    }
    ?>