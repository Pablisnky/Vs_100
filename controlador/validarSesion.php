<?php
session_start();//se inicia sesion para crear una $_SESSION que almacene el ID_Participante, esta $_SESSION sera exigida cada vez que se entre en una pagina del area de afiliados, con esto se garantiza que se accedio a la cuenta del usuario haciendo login

	include("../conexion/Conexion_BD.php");
    
    //Verifica si los campo que se van a recibir desde principal.php.php estan vacios
    if(empty($_POST["correo"]) || empty($_POST["clave"])){

        echo"<script>alert('Debe Llenar todos los campos vacios');window.location.href='../vista/principal.php';</script>";
    }
    else{
        //sino estan vacios se sanitizan y se reciben
        $Usuario = filter_input( INPUT_POST, 'correo', FILTER_SANITIZE_STRING);
        $Clave = filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING);
        // echo "Correo: " .  $Usuario . "<br>";
        // echo "Clave: " . $Clave . "<br>";

        //con los datos recibidos se verifica en la BD si el usuario esta registrado
        $Consulta="SELECT * FROM participante WHERE Correo='$Usuario' AND Password= '$Clave'";
    	$Recordset = mysqli_query($conexion,$Consulta);
    	$Participante= mysqli_fetch_row($Recordset);//Devuelve la primera fila de la tabla virtual que genera la consulta, que en este caso, la consulta generará solo una fila.

        if($Usuario == $Participante[5] AND $Clave == $Participante[7]){
            // $Participante[5] Almacena el email.
            //$Participante[7] Almacena la clave.  

        	//ahora se verifica si el usuario quería memorizar su cuenta en este ordenador, si hizo click en "recordar datos en este equipo" en principal.php
            if(isset($_POST['recordar']) && $_POST['recordar'] == 1){//se recibe desde principal.php
                //es que pidió memorizar el usuario
                //1) creo una marca aleatoria en el registro de este usuario
                //alimentamos el generador de aleatorios
                mt_srand (time());
                //generamos un número aleatorio
                $aleatorio = mt_rand(1000000,999999999);
                //echo "Nº aleatorio= " . $aleatorio . "<br>"; 
                //2) meto la marca aleatoria en el registro correspondiente al usuario
                $Actualizar=" UPDATE participante SET Aleatorio='$aleatorio' WHERE ID_Participante='$Participante[0]' ";
                mysqli_query($conexion,$Actualizar);

                //3) ahora meto una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria porque el usuario marca la casilla de recordar
                setcookie("id_usuario", $Participante[0], time()+(60));//segundos*minutos*horas*dias
                setcookie("marcaAleatoria", $aleatorio, time()+(60*60*24*365));
            }
                    
            $_SESSION["ID_Participante"]= $Participante[0];//se crea una $_SESSION llamada Participante que almacena el ID del participante para  forzar a que entre a su cuenta solo despues de logearse.
            // echo "La sesion ID_Participante= " . $_SESSION["ID_Participante"] . "<br>";

            $_SESSION["Nombre_Participante"]= $Participante[1];//se crea una $_SESSION llamada Participante que almacena el ID del participante para  forzar a que entre a su cuenta solo despues de logearse.
            
    	    header("location:entrada.php");//Se da acceso y se Redirije a la pagina "entrada.php" para comenzar con las preguntas del biblionario
        }
        else{ ?>

            <script>
                alert("su EMAIL y CONTRASEÑA no coinciden");
                history.back();
            </script> 
            
            <?php  
        }  
    }  ?>