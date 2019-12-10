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
                            <p class="Inicio_21">Galería de participantes que han alcanzado honores dentro de nuestra comunidad, bien sea con el máximo puntaje de una semana o que han ganado una insignia para su perfil.</p> 
                        <div class="contenedor_14_a">
                            <div>
                                <input type="radio" name="insignias" id="Semanal_2" onclick="Lideres_Sem()"><br>
                                <label class="radio" for="Semanal_2" onclick="Lideres_Sem()">Lider por semanas</label>
                            </div>
                            <div>
                                <input type="radio" name="insignias" id="Insignias" onclick="Insignias()"><br>
                                <label class="radio" for="Insignias" onclick="Insignias()">Participantes con Insignias</label>
                            </div>
                        </div>

                        <!--Contiene los participantes con mayor puntaje en una semana -->
                        <div id="Contenedor_24">
                            <hr>        
                            <p class="Inicio_21">Participantes lideres por semana</p>           
                            <div class="contenedor_25">
                                <div>
                                    <img class="imagen_9" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
                                </div>
                                <div>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                                </div>
                                <div class="contenedor_32"> 
                                    <label class="Inicio_10"><?php echo "Alexandra Martinez";?></label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 49-2019</label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 126,636</label>
                                    <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
                                    <label class="Inicio_11 b_1"><?php echo "Filadelfia - Bucaramanga"?></label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 2"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 3"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 4"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 5"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 6"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 7"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 8"?></label>
                                    <label class="Inicio_11">sábado 07 de diciembre de 2019</label>
                                </div>
                            </div>

                            <div class="contenedor_25">
                                <div>
                                    <label class="label_4">+3</label> 
                                    <img class="imagen_9" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
                                </div>
                                <div>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                                </div>
                                <div class="contenedor_32"> 
                                    <label class="Inicio_10"><?php echo "Kathy Rozo";?></label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 48-2019</label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 167,678</label>
                                    <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
                                    <label class="Inicio_11 b_1"><?php echo "Peniel - Pamplona"?></label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
                                    <label class="Inicio_11 b_1"><?php echo "Esdras 5"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Esdras 6"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Esdras 7"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Esdras 8"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Esdras 9"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Esdras 10"?></label>
                                    <label class="Inicio_11 b_1"><?php echo "Nehemías 1"?></label>
                                    <label class="Inicio_11">sábado 30 de noviembre de 2019</label>
                                </div>
                            </div>

                            <hr class="hr_4">
                            <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                            <label class="Inicio_10"><?php echo "Alfredo Ortega";?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 47-2019</label>
                            <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 129,060</label>
                            <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
                            <label class="Inicio_11 b_1"><?php echo "Filadelfia - Bucaramanga"?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 34"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 35"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 36"?></label>
                            <label class="Inicio_11 b_1"><?php echo "Esdras 1"?></label>
                            <label class="Inicio_11 b_1"><?php echo "Esdras 2"?></label>
                            <label class="Inicio_11 b_1"><?php echo "Esdras 3"?></label>
                            <label class="Inicio_11 b_1"><?php echo "Esdras 4"?></label>
                            <label class="Inicio_11">sábado 23 de noviembre de 2019</label>

                            <hr class="hr_4">
                            <label class="Inicio_10"><?php echo "Declarado desierto";?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 46-2019</label>
                            <label class="Inicio_11">sábado 16 de noviembre de 2019</label>
                            <label class="Inicio_11">Fallas tecnicas no permitieron realizar el reto semanal</label>

                            <hr class="hr_4">
                            <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                            <label class="Inicio_10"><?php echo "Elisabeth Contreras";?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 45-2019</label>
                            <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 148,22</label>
                            <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
                            <label class="Inicio_11 b_1"><?php echo "Peniel - Pamplonita"?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 20"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 21"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 22"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 23"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 24"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 25"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 26"?></label>
                            <label class="Inicio_11">sábado 09 de noviembre de 2019</label>

                            <hr class="hr_4">
                            <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "IMG-20190602-WA0002.jpg";?>">
                            <label class="Inicio_10"><?php echo "Luje Mala";?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 44-2019</label>
                            <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 135,643</label>
                            <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
                            <label class="Inicio_11 b_1"><?php echo "Peniel - Pamplona"?></label>
                            <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 13"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 14"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 15"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 16"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 17"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 18"?></label>
                            <label class="Inicio_11 b_1"><?php echo "2 Crónicas 19"?></label>
                            <label class="Inicio_11">sábado 02 de noviembre de 2019</label>
                        </div>	

                        <!-- Contiene los participantes con una insignias -->                        
                        <br><br><br>
                        <div id="Contenedor_25">
                            <?php
                                include("../controlador/sabiosConInsignias.php");
                            ?>                            
                        </div> 
                    </div> 
                </div>
                <footer> 
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