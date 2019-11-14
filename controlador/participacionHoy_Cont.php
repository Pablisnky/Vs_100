<?php
    session_start();
    $CapituloHoy = $_SESSION["Capitulo"]; 
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
				<?php include("../vista/modulos/header_usuario.php");?>
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
                        <div id="Contenedor_12_b">
                            <h2 class="h_1">Los tres más sabios estudiando</h2>
                            <span class="Inicio_14 Inicio_15 "><?php echo $CapituloHoy;?></span>	
                        </div>
                        <div class="contenedor_12" id="Contenedor_12">
                            <!-- //Del dia -->
                            <div class="contenedor_13_a">  <?php
                                include("../conexion/Conexion_BD.php");
                    
                                //Se busca el primer lugar del dia
                                $Consulta_1 = "SELECT participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais, participante.SubRegion, participante.Fotografia,participantes_pruebas.Puntos FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos DESC LIMIT 0,1";
                                $Recordset_1 = mysqli_query($conexion, $Consulta_1);
                                while($Resultado_1 =mysqli_fetch_array($Recordset_1)){
                                    $Fotografia= $Resultado_1["Fotografia"];
                                    $Nombre= $Resultado_1["Nombre"];
                                    $Apellido= $Resultado_1["Apellido"];
                                    $Puntos= $Resultado_1["Puntos"];
                                    //Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
                                    if($Resultado_1["Iglesia"]== "Otro"){
                                        $Iglesia= $Resultado_1["Otra_Iglesia"];
                                    }
                                    else{
                                        $Iglesia= $Resultado_1["Iglesia"];
                                    }
                                    $SubRegion= $Resultado_1["SubRegion"];
                                    $Pais= $Resultado_1["Pais"];

                                    //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                    $Decimal_1 = str_replace('.', ',',  $Puntos);
                            ?>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                    <?php
                                        if($Apellido == "NoEspecifico"){ ?>
                                            <label class="Inicio_10"><?php echo $Nombre;?></label> <?php
                                        }
                                        else{     ?>
                                            <label class="Inicio_10"><?php echo $Nombre . " " . $Apellido;?></label> <?php
                                        }
                                    ?>
                                    <label class="Inicio_11"><?php echo $Decimal_1;?> Puntos</label>
                                    <label class="Inicio_11"><?php echo $Iglesia . "-" . $SubRegion . "-" . $Pais;?></label>
                                    <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                <?php } ?>
                            </div>
                            <div class="contenedor_13_b">
                                <?php
                                    //Se busca el segundo lugar del dia
                                    $Consulta_2 = "SELECT participante.Nombre, participante.Apellido, participante.Fotografia, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participantes_pruebas.Puntos FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos  DESC LIMIT 1,1";
                                    $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                                    while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                        $Fotografia= $Resultado_2["Fotografia"];
                                        $Nombre_2= $Resultado_2["Nombre"];
                                        $Apellido_2= $Resultado_2["Apellido"];
                                        $Puntos_2= $Resultado_2["Puntos"];
                                        //Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
                                        if($Resultado_2["Iglesia"]== "Otro"){
                                            $Iglesia_2= $Resultado_2["Otra_Iglesia"];
                                        }
                                        else{
                                            $Iglesia_2= $Resultado_2["Iglesia"];
                                        }
                                        $SubRegion_2= $Resultado_2["SubRegion"];
                                        $Pais_2= $Resultado_2["Pais"];

                                        //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                        $Decimal_2 = str_replace('.', ',',  $Puntos_2);
                                ?>
                                        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                        <?php
                                            if($Apellido_2 == "NoEspecifico"){ ?>
                                                <label class="Inicio_10"><?php echo $Nombre_2;?></label> <?php
                                            }
                                            else{     ?>
                                                <label class="Inicio_10"><?php echo $Nombre_2 . " " . $Apellido_2;?></label> <?php
                                            }
                                        ?>
                                        <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                        <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2 . "-" . $Pais_2;?></label>
                                        <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                    <?php } ?>
                            </div>
                            <div class="contenedor_13_c">
                                <?php
                                    //Se busca el tercer lugar del dia
                                    $Consulta_2 = "SELECT participante.Nombre, participante.Apellido, participante.Fotografia, participante.Iglesia, participante.Otra_Iglesia, participante.Pais, participante.SubRegion, participantes_pruebas.Puntos FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos  DESC LIMIT 2,1";
                                    $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                                    while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                        $Fotografia= $Resultado_2["Fotografia"];
                                        $Nombre_2= $Resultado_2["Nombre"];
                                        $Apellido_2= $Resultado_2["Apellido"];
                                        $Puntos_2= $Resultado_2["Puntos"];
                                        //Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
                                        if($Resultado_2["Iglesia"]== "Otro"){
                                            $Iglesia_2= $Resultado_2["Otra_Iglesia"];
                                        }
                                        else{
                                            $Iglesia_2= $Resultado_2["Iglesia"];
                                        }
                                        $SubRegion_2= $Resultado_2["SubRegion"];
                                        $Pais_2= $Resultado_2["Pais"];

                                        //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                        $Decimal_2 = str_replace('.', ',',  $Puntos_2);
                                ?>
                                        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                        <?php
                                            if($Apellido_2 == "NoEspecifico"){ ?>
                                                <label class="Inicio_10"><?php echo $Nombre_2;?></label> <?php
                                            }
                                            else{     ?>
                                                <label class="Inicio_10"><?php echo $Nombre_2 . " " . $Apellido_2;?></label> <?php
                                            }
                                        ?>
                                        <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                        <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2 . "-" . $Pais_2;?></label>
                                        <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                    <?php } ?>
                            </div>
                        </div>

                            <!-- De la semana -->
                        <div class="contenedor_18" id="Contenedor_18">
                            <h2 class="h_1" id="Contenedor_12_a1">Los tres más sabios de esta semana</h2>
                        </div>
                        <div class="contenedor_12_a" id="Contenedor_12_a">
                            <div class="contenedor_13_a">
                                <?php
                                    //Se busca el primer lugar de la semana
                                    $Consulta_1 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participante.Fotografia, participantes_pruebas.Fecha_pago FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1";
                                    $Recordset_1 = mysqli_query($conexion, $Consulta_1);
                                    while($Resultado_1 =mysqli_fetch_array($Recordset_1)){
                                        $ID_Participante= $Resultado_1["ID_Participante"];
                                        $Fotografia_1= $Resultado_1["Fotografia"];
                                        $Nombre_1= $Resultado_1["Nombre"];
                                        $Apellido_1= $Resultado_1["Apellido"];
                                        $Puntos_1= $Resultado_1["acumulado"];
                                        //Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
                                        if($Resultado_1["Iglesia"]== "Otro"){
                                            $Iglesia_1= $Resultado_1["Otra_Iglesia"];
                                        }
                                        else{
                                            $Iglesia_1= $Resultado_1["Iglesia"];
                                        }
                                        $SubRegion_1= $Resultado_1["SubRegion"];
                                        $Pais_1= $Resultado_1["Pais"];

                                        //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                        $Decimal_1 = str_replace('.', ',',  $Puntos_1);
                                            ?>
                                        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_1;?>">
                                        <label class="Inicio_10"><?php echo $Nombre_1 . " " . $Apellido_1;?></label>
                                        <label class="Inicio_11"><?php echo $Decimal_1;?> Puntos</label>
                                        <label class="Inicio_11"><?php echo $Iglesia_1 . "-" . $SubRegion_1 . "-" . $Pais_1?></label>
                                        <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                        <?php 
                                    } 
                                    //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                    $Consulta_5 = "SELECT participantes_pruebas.Fecha_pago FROM participantes_pruebas WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Participante= '$ID_Participante'";
                                    $Recordset_5=  mysqli_query($conexion, $Consulta_5);
                                    $Resultado_5 =mysqli_fetch_array($Recordset_5);

                                    date_default_timezone_set('America/Bogota');
                                    $FechaServidorPHP =date("Y-m-d");
                                    $Fecha_Participacion_5=date("Y-m-d",strtotime($Resultado_5["Fecha_pago"]));
                                    // echo "<br>";
                                    // echo $Resultado_1["Fecha_pago"] . "<br>";
                                    // echo $Fecha_Participacion_5 . "<br>";
                                    // echo $FechaServidorPHP;
                                    if($Fecha_Participacion_5 == $FechaServidorPHP){
                                        echo "<label class='Inicio_22'>Hoy: <span class='icon icon-checkmark'></span></label>";
                                    } 
                                    else{
                                        echo "<label class='Inicio_22'>Hoy: Sin responder</label>";
                                    }
                                    ?>
                            </div>
                            <div class="contenedor_13_b">
                                <?php
                                    //Se busca el segundo lugar
                                    $Consulta_2 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participante.Fotografia, participantes_pruebas.Fecha_pago FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1,1";
                                    $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                                    while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                        $ID_Participante= $Resultado_2["ID_Participante"];
                                        $Fotografia_2= $Resultado_2["Fotografia"];
                                        $Nombre_2= $Resultado_2["Nombre"];
                                        $Apellido_2= $Resultado_2["Apellido"];
                                        $Puntos_2= $Resultado_2["acumulado"];
                                        //Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
                                        if($Resultado_2["Iglesia"]== "Otro"){
                                            $Iglesia_2= $Resultado_2["Otra_Iglesia"];
                                        }
                                        else{
                                            $Iglesia_2= $Resultado_2["Iglesia"];
                                        }
                                        $SubRegion_2= $Resultado_2["SubRegion"];
                                        $Pais_2= $Resultado_2["Pais"];
                                        //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                        date_default_timezone_set('America/Bogota');
                                        $FechaServidorPHP =date("Y-m-d");
                                        $Fecha_Participacion_2=date("Y-m-d",strtotime($Resultado_2["Fecha_pago"]));

                                        //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                        $Decimal_2 = str_replace('.', ',',  $Puntos_2);
                                        ?>
                                        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_2;?>">
                                        <label class="Inicio_10"><?php echo $Nombre_2 . " " . $Apellido_2;?></label>
                                        <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                        <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2 . "-" . $Pais_2?></label>
                                        <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                        <?php 
                                    }
                                    //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                    $Consulta_6 = "SELECT participantes_pruebas.Fecha_pago FROM participantes_pruebas WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Participante= '$ID_Participante'";
                                    $Recordset_6=  mysqli_query($conexion, $Consulta_6);
                                    $Resultado_6 =mysqli_fetch_array($Recordset_6);

                                    date_default_timezone_set('America/Bogota');
                                    $FechaServidorPHP =date("Y-m-d");
                                    $Fecha_Participacion_6=date("Y-m-d",strtotime($Resultado_6["Fecha_pago"]));
                                    // echo "<br>";
                                    // echo $Resultado_1["Fecha_pago"] . "<br>";
                                    // echo $Fecha_Participacion_5 . "<br>";
                                    // echo $FechaServidorPHP;
                                    if($Fecha_Participacion_6 == $FechaServidorPHP){
                                        echo "<label class='Inicio_22'>Hoy: <span class='icon icon-checkmark'></span></label>";
                                    } 
                                    else{
                                        echo "<label class='Inicio_22'>Hoy: Sin responder</label>";
                                    }
                                    ?>
                            </div>
                            <div class="contenedor_13_c"">
                                <?php
                                    //Se busca el tercer lugar
                                    $Consulta_3 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participante.Fotografia, participantes_pruebas.Fecha_pago FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 2,1";
                                    $Recordset_3 = mysqli_query($conexion, $Consulta_3);
                                    while($Resultado_3 =mysqli_fetch_array($Recordset_3)){
                                        $ID_Participante= $Resultado_3["ID_Participante"];
                                        $Fotografia_3= $Resultado_3["Fotografia"];
                                        $Nombre_3= $Resultado_3["Nombre"];
                                        $Apellido_3= $Resultado_3["Apellido"];
                                        $Puntos_3= $Resultado_3["acumulado"];
                                        //Si el nombre de la iglesia es "Otro" se cambia la información a mostrar
                                        if($Resultado_3["Iglesia"]== "Otro"){
                                            $Iglesia_3= $Resultado_3["Otra_Iglesia"];
                                        }
                                        else{
                                            $Iglesia_3= $Resultado_3["Iglesia"];
                                        }
                                        $SubRegion_3= $Resultado_3["SubRegion"];
                                        $Pais_3= $Resultado_3["Pais"];
                                        //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                        date_default_timezone_set('America/Bogota');
                                        $FechaServidorPHP =date("Y-m-d");
                                        $Fecha_Participacion_3=date("Y-m-d",strtotime($Resultado_3["Fecha_pago"]));

                                        //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                        $Decimal_3 = str_replace('.', ',',  $Puntos_3);
                                            ?>
                                        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_3;?>">
                                        <label class="Inicio_10"><?php echo $Nombre_3 . " " . $Apellido_3;?></label>
                                        <label class="Inicio_11"><?php echo $Decimal_3;?> Puntos</label>
                                        <label class="Inicio_11"><?php echo $Iglesia_3 . "-" . $SubRegion_3 . "-" . $Pais_3?></label>
                                        <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                        <?php 
                                    } 
                                    //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                    $Consulta_7 = "SELECT participantes_pruebas.Fecha_pago FROM participantes_pruebas WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Participante= '$ID_Participante'";
                                    $Recordset_7=  mysqli_query($conexion, $Consulta_7);
                                    $Resultado_7 =mysqli_fetch_array($Recordset_7);

                                    date_default_timezone_set('America/Bogota');
                                    $FechaServidorPHP =date("Y-m-d");
                                    $Fecha_Participacion_7=date("Y-m-d",strtotime($Resultado_7["Fecha_pago"]));
                                    // echo "<br>";
                                    // echo $Resultado_1["Fecha_pago"] . "<br>";
                                    // echo $Fecha_Participacion_5 . "<br>";
                                    // echo $FechaServidorPHP;
                                    if($Fecha_Participacion_7 == $FechaServidorPHP){
                                        echo "<label class='Inicio_22'>Hoy: <span class='icon icon-checkmark'></span></label>";
                                    } 
                                    else{
                                        echo "<label class='Inicio_22'>Hoy: Sin responder</label>";
                                    }
                                    ?>
                            </div>
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
                            <div class="contenedor_24" id="Contenedor_24"><!--Contiene los participantes con mayor puntaje en una semana -->                                     
                                <hr>
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
                            <div class="contenedor_25" id="Contenedor_25"><!--Contiene los participantes con una insignias -->
                                <p class="Inicio_21 Inicio_24">Aún ningún miembro de nuestra comunidad ha obtenido una insignia</p>
                            </div>
			            </div> 
		<footer>
            <img class="imagen_3" alt="Logotipo horebi.com" src="../images/logo.png">
            <label class="Inicio_23">horebi.com</label>
            <!-- <span class="span_7">Reavivados</span>  -->
            <p class="p_8">El propósito de esta plataforma es incentivar la lectura bíblica y exaltar el sábado como día especial de dedicación a Jehová.</p>
			<?php include("../vista/modulos/footer.php");?>
		</footer>
	</body>
</html>