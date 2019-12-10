<?php
// session_start();
   include("../clases/nombreApellido.php");
    $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
	// echo "Nombre Participante:" .  $ParticipanteNombre . "<br>";
    
    $Nombre= new NombreApellido();
?>
    <link rel="stylesheet" type="text/css" href="../iconos/icono_menu/style_menu.css"/> <!--galeria icomoon.io  -->
    <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">

    <h1 class="cursor">Reavivados</h1>
    
    <input class="input_1" type="text" readonly name="nombre" value="<?php echo $Nombre->PrimerNombre($ParticipanteNombre);?>">
    <input type="checkbox" id="MenuRes">
    <label id="ComandoMenu" class="comandoMenu" onclick="mostrarMenu()"><span class="icon-menu"></span></label>
    <nav id="MenuResponsive" class="menuResponsive">
        <ul id="MenuContenedor">
            <li><a href="entrada.php">Inicio</a></li>
            <li><a href="perfil.php">Mi perfil</a></li>
            <li><a href="participaciones.php">Resultados</a></li>
            <li><a href="participacionHoy_Cont.php">Sabios</a></li>
            <li><a href="cerrarSesion.php">Cerrar sesión</a></li> 
        </ul>
    </nav>

