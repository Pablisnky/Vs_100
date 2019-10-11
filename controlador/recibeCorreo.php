<?php
// session_start();  

include("../conexion/Conexion_BD.php");
include("../modulos/muestraError.php");

// $corroborar = $_SESSION["verifica"];
// if ($corroborar == 44){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
//     unset($_SESSION['verifica']);//se borra la $_SESSION verifica.

    //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
   
    //echo $verifica;
    $Correo= $_POST["correo"];
    // echo "Correo= " . $Correo . "<br>";

    //Generamos un numero aleatorio que será el código de recuperación de contraseña
    //alimentamos el generador de aleatorios
    mt_srand (time());
    // //generamos un número aleatorio
    $Aleatorio = mt_rand(100000,999999);
    // echo "Nº aleatorio= " . $Aleatorio . "<br>"; 

    //Se inserta el código aleatorio en la tabla "codigo-recuperacion y se asocia al correo del usuario
    $Insertar_1= "INSERT INTO codigo_recuperacion(correo, codigoAleatorio)VALUES('$Correo', '$Aleatorio')";
    mysqli_query($conexion, $Insertar_1) or DIE ('Falló primera conexión a la base de datos');
    
    //Se envia correo al usuario informandole el código que debe insertar para verificar
    $email_to = $Correo;
    $email_subject = "Recuperación de contraseña";  
    $email_message ="Código de recuperación de contraseña: " . $Aleatorio;
    $headers = 'From: '. "admin@horebi.com" ."\r\n".

    'Reply-To: '. "admin@horebi.com"."\r\n" .

    'X-Mailer: PHP/' . phpversion();

    @mail($email_to, $email_subject, $email_message, $headers); 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Recuperación clave</title>
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
                <p class='Inicio_16'>Se ha enviado un código de recuperación de contraseña al correo suministrado.</p> 
                <form action="InsertarCodigo.php"  method="POST">
                    <input class="input_5" type="text" name="ingresar" placeholder="Ingresar Código"> 
                    <input type= "text" style="display:none" value="<?php echo $Correo;?>" name="correo">
                    <input type="submit" value="enviar">
                </form>  
            </div> 
        </div>
        <footer>
            <?php include("../vista/modulos/footer.php");?>
        </footer>
    </body>
</html>

<?php
//  }
//  else{   
// // Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al index.html  
// echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../index.php'>";  
// } 
?>