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
        
        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/> 
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
        <link rel="shortcut icon" type="image/png" href="../images/logo.png">

        <script type="text/javascript" src="../javascript/Ciudades.js"></script> 
        <script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
        <script type="text/javascript" src="../javascript/validar_Campos.js"></script>
		<script type="text/javascript" src="../javascript/Regiones.js" ></script>	
        <script type="text/javascript" src="../javascript/Municipios.js"></script>  
        <script type="text/javascript" src="../javascript/Municipios_Colombia.js"></script>
    </head>     
    <body>
        <header>
			<input class="input_1" type="text" readonly name="nombre" value="<?php echo $ParticipanteNombre;?>">
            <?php include("../vista/modulos/header_usuario.html");?>
        </header>
        <div> 
            <section style="margin-top: 5%;"> 
                <h3 style="margin-bottom: 2.5%;">Editar perfil</h3>                
                <form action="recibe_Perfil.php" method="POST" enctype="multipart/form-data" name="Afiliacion" autocomplete="off" class="Afiliacion_0">
                    <!--En este formulario se utilizo el enctype correspondiente porque se va a enviar una imagen-->
                    <div style="float: left; width: 40%; margin-left: 10%;">

                        <!-- INFORMACION PERSONAL-->
                        <a id="marcador_01" class="ancla_2"></a>
                        <?php
                            include("datos_Personales.php");
                        ?>
                        <!-- FOTOGRAFIA PERFIL-->
                        <a id="marcador_02" class="ancla_2"></a>
                        <?php
                            //Muestra la seccion del formulario que contiene la fotografia de perfil del afiliado
                            include("FotoPerfil.php");
                        ?>
                        <!-- CAMBIAR CONTRASEÑA -->
                        <a id="marcador_07" class="ancla_2"></a>
                        <fieldset class="Afiliacion_4"> 
                            <legend>Cambiar contraseña</legend>
                            <p style="font-size: 14px; margin-left: 2%; color: #040652;">Le enviaremos un codigo a su correo al solicitar cambio de contraseña.</p><br><br>
                            
                            <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="EnviarCorreo.php">Solicitar código</a> 
                            <br>
                            <input type="password" name="valorB"  id="ValorB"  placeholder="Insertar código">
                            <Hr>
                        </fieldset>
                    </div>
                    <!-- INIDCE LATERAL DERECHO -->
                    <div style="background-color:; width: 20%; margin-left: 65%; margin-top: 3%; float: right; position: fixed;">
                        <p style="background-color: #BEBFDD; text-align: center; margin-left: 0%; margin-bottom: 2%; font-size: 18px;">Secciones</p>
                        <a class="marcador" href="#marcador_01">Datos personales</a><br>
                        <a class="marcador" href="#marcador_01">Datos de congregación</a><br>
                        <a class="marcador" href="#marcador_02">Fotografia</a><br>
                        <a class="marcador" href="#marcador_07">Cambiar contraseña</a>
                    </div>  
                    <div id="Perfil_06" style="background-color:; position: fixed; width: 20%; margin-left: 63%; display: flex; justify-content: center; margin-top: 25%">
                        <input type="submit" value= "Guardar" style="width: 30%; margin-right: 14%; color:rgba(194, 245, 19,1);"  onclick=""> <!--return validar_10()-->
                        <a style="font-size:13px;  box-sizing:border-box; margin-top:0%;  color:rgba(194, 245, 19,1);" href="configurarT.php">Volver</a>         
                    </div>             
                </form>                 
            </section> 
       </div>
       <!-- <footer>   
            <?php
                // include("../modulos/footer/footer.php");
            ?>
        </footer>-->
    </body>
    </html>
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  -->

<script type="text/javascript">
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

// ----------------------------------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------------------------------
    //Ajusta el texto recuperado de la BD en el texarea donde va el motivo de la consulta
    function resize_1(){
        var text = document.getElementById('PerfilProf');
            text.style.height = 'auto';
            text.style.height = text.scrollHeight+'px';
    }

// -------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------
                           
    function cambiarValores(){
        var A= document.getElementById("CambiarValor");
        var B= document.getElementById("ValorA");
        var C= document.getElementById("ValorB");
        if(A.checked == false){
            B.disabled = false;
            C.disabled = false;
            //B.style.backgroundColor="red";
        }
        else{
            B.disabled = true;
            C.disabled = true;
        }
    }
</script>
