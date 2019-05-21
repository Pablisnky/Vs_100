<?php   
    session_start();  
    $corroborar = $_SESSION["verifica"];
    if ($corroborar == 44){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>ViajeSurAmerica</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Juego de preguntas sobre suramerica."/>
        <meta name="keywords" content="suramerica, latinoamerica"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

        <link rel="stylesheet" type="text/css" href="css/EstilosViajeSurAmerica.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="css/MediaQuery_EstilosViajeSurAmerica.css">

        <script type="text/javascript" src="javascript/Funciones_varias.js" ></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400|Caveat');
        </style>         
    </head>	    
    <body>
    	<div class="Secundario">
            <!--titulo y menu principal-->
                    <?php include("mvc/vista/modulos/header.html");?>

          <div onclick= "ocultarMenu()">
        	    <div id="AcuseContacto_01">    
                    <?php
                        $nombre=$_POST["nombre"];
                        $apellido=$_POST["apellido"];
                        $correo=$_POST["correo"];
                        $Asunto=$_POST["asunto"];
                        $Contenido=$_POST["contenido"];

                        /*echo $nombre . "<br>";
                        echo $apellido . "<br>";
                        echo $correo . "<br>";
                        echo $asunto . "<br>";
                        echo $Contenido . "<br>";*/

                        echo "<p class='Inicio_1'><b class='Inicio_1'>$nombre.</b> Recibimos su mensaje, le agradecemos su valioso aporte para construir una mejor aplicación.</p>";


                        include("conexion/Conexion_BD.php");
                        mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente

                        //se insertan los datos a la BD
                        $insertar= "INSERT INTO contacto(Nombre, Apellido, Correo) VALUES('$nombre', '$apellido', '$correo')" ;
                        mysqli_query($conexion,$insertar);
                    ?>   
            	</div> 
        </div>
        
        <footer>
                <p class="">Sitio web desarrollado por HOREBI, San Felipe_Yaracuy_Venezuela_(+58) 0424-516.59.38</p>
        </footer> 
    </div>


<?php
 
    $email_to = "pablo@Viajesuramerica.com";
 
    $email_subject = $Asunto;  

    $email_message = $Contenido;

    $headers = 'From: '.$correo."\r\n".
 
    'Reply-To: '.$correo."\r\n" .
 
    'X-Mailer: PHP/' . phpversion();
 
    @mail($email_to, $email_subject, $email_message, $headers); 

 }
 else{   
// Si no viene del formulario de registro Registro.php o trata de recargar página lo enviamos al index.html  
echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=index.html'>";  
} 
?>

