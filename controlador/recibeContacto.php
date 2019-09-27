<?php   
    session_start();  
    $corroborar = $_SESSION["verifica"];
    if ($corroborar == 44){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $correo=$_POST["correo"];
        $Contenido=$_POST["contenido"];

        /*echo $nombre . "<br>";
        echo $apellido . "<br>";
        echo $correo . "<br>";
        echo $Contenido . "<br>";*/
        // Se envia mensaje por correo

 
        $email_to = "pcabeza7@gmail.com";
        $email_subject = "Mensaje de usuario de Reavivados";  
        $email_message = $Contenido;
        $headers = 'From: '.$correo."\r\n".
 
        'Reply-To: '.$correo."\r\n" .
 
        'X-Mailer: PHP/' . phpversion();
 
        @mail($email_to, $email_subject, $email_message, $headers); 
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Contactenos</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Juego de preguntas sobre suramerica."/>
        <meta name="keywords" content="suramerica, latinoamerica"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

        <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
    </head>	    
    <body>
    	<div class="Secundario">
            <header>
                <?php include("../vista/modulos/header.html");?>
            </header>
            <div onclick= "ocultarMenu()">
        	    <div id="AcuseContacto_01"> 
                    <p class='Inicio_1'><b class='Inicio_1'><?php echo $nombre?></b> Recibimos su mensaje, le agradecemos su valioso aporte para construir una mejor aplicación.</p>                 
            	</div> 
            </div> 
        </div>
        <footer>
            <?php include("../vista/modulos/footer.php");?>
        </footer>
    </body>
</html>


<?php

 }
 else{   
// Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al index.html  
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../index.php'>";  
} 
?>

