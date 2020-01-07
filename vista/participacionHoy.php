<?php
    session_start();
    if(empty($_SESSION["Capitulo"])){
        header("location:../index.php");
    }
    else{        
        include("../conexion/Conexion_BD.php");

        $CapituloHoy = $_SESSION["Capitulo"];
        // echo $CapituloHoy; 
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Participaciones</title>

                <meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
                <meta name="description" content="Juego de preguntas biblicas."/>
                <meta name="keywords" content="citas biblicas, biblia"/>
                <meta name="author" content="Pablo Cabeza"/>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

                <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
                <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100_Grande.css">
                <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
                <link rel="stylesheet" type="text/css" href="../iconos/icono_tilde_exis/style_tilde_exis.css"/><!--galeria icomoon.io  -->
                <link rel="shortcut icon" type="image/png" href="../images/logo.png">

                <script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
            </head>	
            <body onload="Lideres_D()">
                <div class="Secundario">
                    <header>
                        <?php include("modulos/header.html");?>
                    </header>
                    <div onclick="ocultarMenu()">
                        <div class="contenedor_14">
                            <div>
                                <input type="radio" name="lideres" id="Diario" checked onclick="Lideres_D()"><br>
                                <label class="radio" for="Diario" onclick="Lideres_D()">Del día</label>
                            </div>
                            <div>
                                <input type="radio" name="lideres" id="Semanal" onclick="Lideres_S()"><br>
                                <label class="radio" for="Semanal" onclick="Lideres_S()">De la semana</label>
                            </div>
                            <div>
                                <input type="radio" name="lideres" id="Salon" onclick="Salon()"><br>
                                <label class="radio" for="Salon" onclick="Salon()">Salón del sabio</label>
                            </div>
                        </div>

                        <!-- Del dia -->
                        <div id="Contenedor_12_b">
                            <h2 class="h_1">Los tres más sabios estudiando</h2>
                            <span class="Inicio_14 Inicio_15 "><?php echo $CapituloHoy;?></span>	
                        </div>
                        <div class="contenedor_12" id="Contenedor_12">
                            <?php
                                include("../controlador/sabiosDia.php");
                            ?>
                        </div>

                        <!-- De la semana -->
                        <div class="contenedor_18" id="Contenedor_18">
                            <h2 class="h_1" id="Contenedor_12_a1">Los tres más sabios de esta semana</h2>
                        </div>
                        <div class="contenedor_12_a" id="Contenedor_12_a">
                            <?php
                                include("../controlador/sabiosSemana.php");
                            ?>                            
                        </div>	
                        
                        <!-- Salon del sabio -->
                        <div class="contenedor_12_c" id="Contenedor_12_c">
                            <h2 class="h_1" id="Contenedor_12_a1">Salón del sabio</h2> 
                            <p class="Inicio_21">Galería de participantes que han alcanzado honores dentro de nuestra comunidad.</p> 
                            <div class="contenedor_14_a">
                                <div>
                                    <input type="radio" name="insignias" id="Semanal_2" onclick="Lideres_Sem()"><br>
                                    <label class="radio" for="Semanal_2" onclick="Lideres_Sem()">Lider por semanas</label>
                                </div>
                                <div>
                                    <input type="radio" name="insignias" id="Insignias"  onclick="Insignia()"><br>
                                    <label class="radio" for="Insignias" onclick="Insignia()">Participantes con Insignias</label>
                                </div>
                            </div>

                            <!--Contiene los participantes con mayor puntaje en una semana -->
                            <div id="Contenedor_50">       
                                <div id="Contenedor_52">
                                    <?php
                                        include("../controlador/sabiosSalon.php");
                                    ?>                            
                                </div>  
                                <!-- Contiene los participantes con insignias -->                    
                                <div id="Contenedor_51">                             
                                    <?php
                                        include("../controlador/sabiosConInsignias.php");
                                    ?>                            
                                </div>  
                            </div>
                        </div> 
                    </div>
                </div>
                <footer class="piePagina_5"> 
                    <img class="imagen_3" alt="Logotipo horebi.com" src="../images/logo.png">
                    <label class="Inicio_23">horebi.com</label>
                    <!-- <span class="span_7">Reavivados</span>  -->
                    <p class="p_8">El propósito de esta plataforma es incentivar la lectura bíblica y exaltar el sábado como día especial de dedicación a Jehova.</p>
                    <?php include("modulos/footer.php");?>
                </footer>
            </body>
        </html>
        <?php	
    }	?>