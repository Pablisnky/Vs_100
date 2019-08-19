<?php
session_start();  
    $corroborar = $_SESSION["verifica"];
    // // echo $corroborar;

    if ($corroborar == 44){// Anteriormente en Registro.php se generó la variable $_SESSION["verfica"] con un valor de 1906; aqui se constata que se halla pasado por la pagina de registro de usuario Registro.php, si no es asi no se puede entrar en esta página.
        unset($_SESSION['verifica']);//se borra la $_SESSION verifica.

        //se verifica la sesion para evitar que refresquen la pagina que procesa el formulario o entren directamente a la pagina que procesa el formulario y asi nos envien multiples veces el formulario; 
        //echo $verifica;

        $Cedula=$_POST["cedula"];
        $Telefono=$_POST["telefono"];
        $Deposito=$_POST["deposito"];
        $Tema=$_POST["tema"];
        $Categoria=$_POST["categoria"];
        
        // echo "Cedula de identidad: " . $Cedula . "<br>";
        // echo "Telefono: " .  $Telefono . "<br>";
        // echo  "Deposito: " . $Deposito . "<br>";
        // echo  "Tema: " . $Tema . "<br>"; 
        // echo  "Categoria: " . $Categoria . "<br>"; 

        $participante_1= $_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en entrada.php        
        // echo "Sesion Nombre participante:" .  $participante_1 . "<br>";

        $Participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el ID del participante, sesion creada en validarSesion.php
        // echo "Sesion ID_Participante:" .  $Participante . "<br>";

        $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
        // echo "Nombre Participante:" .  $ParticipanteNombre . "<br>"; 
  
        include("../conexion/Conexion_BD.php");

        // Se consulta que prueba tiene cupo abierto
        $Consulta = "SELECT * FROM pruebas WHERE Tema= '$Tema' AND Categoria= '$Categoria' AND CupoMax != 1";
        $Recordset= mysqli_query($conexion, $Consulta);
        $CupoAbierto= mysqli_fetch_array($Recordset);
        // echo "ID_Prueba con cupo =" . $CupoAbierto["CupoMax"] . "<br>";

        if($CupoAbierto["CupoMax"] == ''){
            //Si no existe una prueba o si esta cerrada se abre una prueba nueva con un numero aleatorio para seleccionar dicha prueba mas tarde (1=true-se alcanzo el cupo maximo; 0=false-aun no se alcanza el cupo maximo)
            //generamos un número aleatorio
            mt_srand (time());
            $Aleatorio = mt_rand(1000000,999999999);
            //echo "Aleatorio= " . $Aleatorio . "<br>";

            $Insertar = "INSERT INTO pruebas(Categoria, Tema, CupoMax, Aleatorio) VALUES('$Categoria','$Tema','0','$Aleatorio')";
            mysqli_query($conexion, $Insertar);
    
            //Se consulta el numero aleatorio que tiene la prueba que se va a generar para sacar el ID_Prueba
            $Consulta_2=  "SELECT ID_Prueba FROM pruebas WHERE Aleatorio= '$Aleatorio'";
            $Recordset_2= mysqli_query($conexion, $Consulta_2);
            $PruebaAbierta= mysqli_fetch_array($Recordset_2);
            $ID_Prueba= $PruebaAbierta["ID_Prueba"];
            //echo "ID_Prueba generada= " . $ID_Prueba . "<br>";

            //Se inscribe al participante en la prueba que haya cupo
            $Insertar_1 = "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Fecha_pago) VALUES('$Participante','$ID_Prueba','$Categoria','$Tema','$Deposito', NOW())";
            mysqli_query($conexion, $Insertar_1); 
        }
        else if($CupoAbierto["CupoMax"] == '0'){
            //Se consulta el ID_Prueba de la prueba disponible
            $Consulta_2=  "SELECT ID_Prueba FROM pruebas WHERE Tema= '$Tema' AND Categoria= '$Categoria' GROUP BY ID_Prueba DESC LIMIT 1";
            $Recordset_2= mysqli_query($conexion, $Consulta_2);
            $PruebaAbierta= mysqli_fetch_array($Recordset_2);
            $ID_Prueba_2= $PruebaAbierta["ID_Prueba"];
            // echo "ID_Prueba_2 =" .  $ID_Prueba_2 . "<br>";

            //Se consulta cuantos participantes tiene la prueba que aun tiene cupo
            $Consulta_3= "SELECT DISTINCT(ID_Prueba), COUNT(ID_Prueba) AS participantes FROM participantes_pruebas WHERE ID_Prueba = '$ID_Prueba_2'";
            $Recordset_3= mysqli_query($conexion, $Consulta_3);
            $Verificar= mysqli_fetch_array($Recordset_3); 
                if($Verificar['participantes'] < 20 ){
                    global $ID_Prueba_2;
                    // Se inscribe al participante en la prueba que haya cupo
                    $Insertar_1 = "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Fecha_pago) VALUES('$Participante','$ID_Prueba_2', '$Categoria', '$Tema','$Deposito', NOW())";
                    mysqli_query($conexion, $Insertar_1); 
                   
                }
                else if($Verificar['participantes'] = 20){
                    //Se consulta el ID_Prueba que alcanzo el maximo cupo
                    $Consulta_2=  "SELECT ID_Prueba FROM pruebas WHERE Tema= '$Tema' AND Categoria= '$Categoria' GROUP BY ID_Prueba DESC LIMIT 1";
                    $Recordset_2= mysqli_query($conexion, $Consulta_2);
                    $PruebaAbierta= mysqli_fetch_array($Recordset_2);
                    $ID_Prueba_3= $PruebaAbierta["ID_Prueba"];
                    // echo "ID_Prueba =" .  $ID_Prueba . "<br>";

                    //Se cierra el cupo de la prueba
                    $Actualizar = "UPDATE pruebas SET CupoMax= 1 WHERE ID_Prueba='$ID_Prueba_3' ";
                    mysqli_query($conexion, $Actualizar);
    
                    //generamos un número aleatorio
                    mt_srand (time());
                    $Aleatorio_2 = mt_rand(1000000,999999999);

                    $Insertar_5 = "INSERT INTO pruebas(Categoria, Tema, CupoMax, Aleatorio) VALUES('$Categoria','$Tema','0','$Aleatorio_2')";
                    mysqli_query($conexion, $Insertar_5);

                    //Se consulta el numero aleatorio que tiene la prueba generada para sacar el ID_Prueba
                    $Consulta_4=  "SELECT ID_Prueba FROM pruebas WHERE Aleatorio= '$Aleatorio'";
                    $Recordset_4= mysqli_query($conexion, $Consulta_4);
                    $CupoAbierto= mysqli_fetch_array($Recordset_4);
                    $ID_Prueba_4= $CupoAbierto["ID_Prueba"];
                    // echo "ID_Prueba generada= " . $ID_Prueba . "<br>";

                    //Se inscribe al participante en la prueba que haya cupo
                    $Insertar_1 = "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Fecha_pago) VALUES('$Participante','$ID_Prueba_4','$Categoria','$Tema','$Deposito', NOW())";
                    mysqli_query($conexion, $Insertar_1); 
                }
        }

        //Se insertan los datos del pago en la BD
        $insertar_3= "INSERT INTO registro_pago(cedula, telefono, deposito, tema, fecha_registro) VALUES('$Cedula', '$Telefono', '$Deposito','$Tema', NOW())";
        mysqli_query($conexion, $insertar_3);              
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20</title>
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
      
    <header class="fixed_1" >
        <div>
            <h1 style="cursor: default; font-size: 5vw; height: 10%; text-align: center; padding-left: 2%">Versus_20</h1>
        </div>
    </header>
        <div class="Secundario">
            <div onclick= "ocultarMenu()">
        	    <div class="AcuseContacto_01"> 
                    <div id="entrada_1">
                        <!--Se muestra en pantalla el nombre del participante-->
                        <p class='span_0'><?php echo $participante_1;?></p>
                    </div>        
                    <p class='Inicio_7'>Recibimos el codigo de tu deposito, verificaremos tu pago y en 24 horas te enviamos un correo de confirmación.</p>
                    <p class='Inicio_7'>Recuerda que el dia viernes desde las 06:00am hasta las 06:00 pm la prueba estará disponible para responderla.</p>
                    <p class='Inicio_7'>En caso de que no se reuna la plaza mínima para lanzar la prueba su dinero le sera reembolsado.</p>
                    <p class='Inicio_7'>Si resultas ganador, puedes retirar tu premio por una agencia de ApuestasCucuta con tu cedula de ciudadanía.</p>                         
            	</div> 
                <div class="contenedor_3">
                    <a class="nav_7" onclick="cerrar()">Inicio</a><!-- 
                    <a class="nav_7" href="cerrarSesion.php" >Cerrar Sesión</a> -->
                </div>
        </div>
    </div>

<?php
    $email_to = "pcabeza7@gmail.com"; 
    $email_subject = "Nuevo registro en Versuss_20";  
    $email_message = "Inscripción en la prueba" . " " . $Tema;
    $headers = 'From: '. "pc@vs_100.com" . "\r\n".
 
    'Reply-To: '. "pc@vs_100.com" . "\r\n" .
 
    'X-Mailer: PHP/' . phpversion();
 
    @mail($email_to, $email_subject, $email_message, $headers); 

 }
 else{   
    // Si no viene del formulario registro_Pago.php.php o trata de recargar página lo enviamos al index.html  
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0; url=../index.php'>";  
} 
?>

<script type="text/javascript">
    function cerrar(){//esta funcion es llamada desde este archivo
        // Se recarga la ventana padre
        window.opener.location.reload();
        // se cierra la vnetana POPUP
        window.close();
    }
</script>

