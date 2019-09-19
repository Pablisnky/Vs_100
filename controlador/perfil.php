<?php
    session_start();//Se reanuda la sesion abierta en validarSesion.php llamada Afiliado
    
	$participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
    // echo "ID_Participante:" .  $participante . "<br>";

    $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
    // echo "Nombre Participante:" .  $ParticipanteNombre . "<br>";

    //Se accede al servidor de base de datos
    include("../conexion/Conexion_BD.php");
    //Administra los errores del sistema e impide mostrarlos en remoto
    include("../modulos/muestraError.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Perfil Usuario</title>
        <meta charset="utf-8"/>
        <meta name="description" content="Consulta médica, solicitud de citas, directorio medico, perfil de doctor"/>
        <meta name="keywords" content="consulta, medico, doctor, directorio"/>
        <meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/> 
       	<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>    
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <!-- <script type="text/javascript" src="../javascript/Ciudades.js"></script>  -->
        <script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../javascript/Funciones_Ajax.js"></script>
        <script type="text/javascript" src="../javascript/validar_Campos.js"></script>
		<script type="text/javascript" src="../javascript/Regiones.js" ></script>	
        <script type="text/javascript" src="../javascript/Municipios.js"></script>  
        <script type="text/javascript" src="../javascript/Municipios_Colombia.js"></script>
        <script>document.getElementById("Codigo").addEventListener("click", llamar_EnviarCodigo, false);</script>
    </head>     
    <body>
        <header>
			<input class="input_1" type="text" readonly name="nombre" value="<?php echo $ParticipanteNombre;?>">
            <?php include("../vista/modulos/header_usuario.html");?>
        </header>
        <div class="Secundario" onclick="ocultarMenu()"> 
            <section style="margin-top: 5%;"> 
                <h2>Editar perfil</h2>                
                <form action="recibe_Perfil.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div class="contenedor_10">

                        <!-- INFORMACION PERSONAL-->
                        <a id="marcador_01" class="ancla_2"></a>
                        <?php
                            include("datos_Personales.php");
                        ?>
                        <!-- FOTOGRAFIA PERFIL-->
                        <a id="marcador_03" class="ancla_2"></a>
                        <?php
                            //Muestra la seccion del formulario que contiene la fotografia de perfil del afiliado
                            include("FotoPerfil.php");
                        ?>
                        <!-- CAMBIAR CONTRASEÑA -->
                        <a id="marcador_04" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4"> 
                            <legend>Cambiar contraseña</legend>
                            <p  class="etiqueta_3">Le enviaremos un codigo a su correo al solicitar cambio de contraseña.</p><br><br>
                            
                            <label class="a_4" id="Codigo">Solicitar código</label> 
                            <br>
                            <input type="password" name="valorB"  id="ValorB"  placeholder="Insertar código">
                        </fieldset>
                    </div>
                    <!-- INIDCE LATERAL DERECHO -->
                    <div class="contenedor_8">
                        <p class="p_7">Secciones</p>
                        <a class="marcador" href="#marcador_01">Datos personales</a><br>
                        <a class="marcador" href="#marcador_02">Datos de congregación</a><br>
                        <a class="marcador" href="#marcador_03">Fotografia</a><br>
                        <a class="marcador" href="#marcador_04">Cambiar contraseña</a>
                    </div>  
                    <div id="Perfil_06" class="contenedor_9">
                        <input type="submit" value= "Guardar" style="width: 30%; margin-right: 14%; color:rgba(194, 245, 19,1);"  onclick=""> <!--return validar_10()-->
                        <a class="buttonCuatro a_6" style="" href="entrada.php">Volver</a>         
                    </div>             
                </form>                 
            </section> 
       </div>
       <!-- <footer >   
            <?php //include("../vista/modulos/footer.php"); ?> 
        </footer> -->
    </body>
    </html>
