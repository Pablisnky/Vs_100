<?php
session_start();

include("../conexion/Conexion_BD.php");
include("../modulos/muestraError.php");

if(!isset($_POST["enviar_2"])){//sino se a pulsado el boton enviar de este archivo se entra en el formulario

    //se recibe desde recibeCodigo.php
    $CodigoUsuario= $_POST["ingresar"];
    $CorreoUsuario= $_POST["correo"];

    // echo "Código usuario= " . $CodigoUsuario . "<br>";
    // echo "Córreo usuario= " . $CorreoUsuario . "<br>";

    //Se comprueba el código enviado por el usuario con el código que hay en la BD
    $Consulta_1= "SELECT * FROM codigo_recuperacion WHERE codigoAleatorio = '$CodigoUsuario' AND correo ='$CorreoUsuario'";
    $Recordset = mysqli_query($conexion, $Consulta_1);
    if(mysqli_num_rows($Recordset) == 0){//Si el codigo que envia el usuario es diferente al del sistema
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

                <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
                <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
                <link rel="shortcut icon" type="image/png" href="../images/logo.png">

                <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
            </head>	
            <body>
                <header>
                    <?php include("../vista/modulos/header.html");?>
                </header>
                    <?php
                    echo "<p class='Inicio_16'>Código invalido</p>"; 
                    echo "<a class='Inicio_16' href='javascript:history.go(-1)'>Regesar</a>"; 
                    exit(); ?>
            </body>
            <?php
    }
    else{//Si los códigos coinciden se permite hacer el cambio de contraseña    ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Recuperacion clave</title>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="description" content="Juego de preguntas sobre suramerica."/>
                <meta name="keywords" content="suramerica, latinoamerica"/>
                <meta name="author" content="Pablo Cabeza"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

                <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
                <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
                <link rel="shortcut icon" type="image/png" href="../images/logo.png">

                <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
            </head>	    
            <body>
                <div class="Secundario">
                    <header>
                        <?php include("../vista/modulos/header.html");?>
                    </header>
                    <div class="contenedor_19" onclick= "ocultarMenu()"> 
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <fieldset class="Afiliacion_4">
                                <input class="input_5" class='Inicio_1' type="password" name="clave" placeholder="Nueva clave">
                                <input class="input_5" class='Inicio_1' type="password" name="repiteClave" placeholder="Repetir clave">
                                <input type="text" value="<?php echo $CorreoUsuario;?>" name="correo"  style="display:none">
                                <input type="submit" value="enviar" name="enviar_2">   
                            </fieldset>                  
                        </form>  
                    </div> 
                </div>
                <footer>
                    <?php include("../vista/modulos/footer.php");?>
                </footer>
            </body>
        </html>

    <?php 
    }
}  
else{//Si se ha pulsado el boton enviar de este archivo se reciven las claves
    //Se reciben datos desde este mismo archivo
    $ClaveNueva= $_POST["clave"];
    $RepiteClaveNueva= $_POST["repiteClave"];
    $Correo = $_POST["correo"];

    // echo "Clave nueva= " . $ClaveNueva . "<br>"; 
    // echo "Repite clave nueva= " . $RepiteClaveNueva . "<br>";
    // echo "Correo= " . $Correo . "<br>";

    //Se verifica que las claves recibidas sean iguales
    if($ClaveNueva == $RepiteClaveNueva){    
        //se cifra la contraseña con un algoritmo de encriptación
        $ClaveCifrada= password_hash($ClaveNueva, PASSWORD_DEFAULT);
        // echo "Clave cifrada= " . $ClaveCifrada . "<br>";

        //Se consulta el ID_Participante correspondiente al correo
        $Consulta_2="SELECT ID_Participante FROM participante WHERE Correo = '$Correo'";
        $Recordset_2 = mysqli_query($conexion,$Consulta_2);
        $Resultado_2 = mysqli_fetch_array($Recordset_2);
        $ID_Usuario = $Resultado_2["ID_Participante"];
        // echo "ID_Usuario: " . $ID_Usuario .  "<br>";

        //Se actualiza en la base de datos la clave del usuario 
        $Actualizar= "UPDATE usuarios SET clave = '$ClaveCifrada' WHERE ID_Participante= '$ID_Usuario'";
        mysqli_query($conexion,$Actualizar);

        //Se destruyen las cookies que recuerdan la contraseña antigua, creadas en validarSesion.php
        // echo "Cookie_usuario= " . $_COOKIE["id_usuario"] . "<br>";
        // echo "Cookie_clave= " . $_COOKIE["clave"] . "<br>";

        setcookie("id_usuario",'',time()-100);
        setcookie("clave",'',time()-100);
        
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

                <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
                <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
                <link rel="shortcut icon" type="image/png" href="../images/logo.png">

                <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
            </head>	
            <body>
                <header>
                    <?php include("../vista/modulos/header.html");?>
                </header>
                    <p class='Inicio_16'>Contraseña cambiada exitosamente</p>
                    <a class='Inicio_16' href='../vista/principal.php'>Inicie sesión</a>
            </body>
            <?php
    }
    else{
        echo "Las contraseñas no coinciden";
    }
}?>