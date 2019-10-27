<?php
    session_start();
    $CapituloHoy = $_SESSION["Capitulo"] 
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
                    <input type="radio" name="lideres" id="Diario" checked onclick="Lideres_D()">
                    <label class="radio"  for="Diario" onclick="Lideres_D()">Del día</label>
                    <input type="radio" name="lideres" id="Semanal" onclick="Lideres_S()">
                    <label class="radio"  for="Semanal" onclick="Lideres_S()">De la semana</label>
                </div>
                <div id="Contenedor_12_b">
                    <h2 class="h_1">Los tres más sabios estudiando</h2>
                    <span class="Inicio_14 Inicio_15 "><?php echo $CapituloHoy;?></span>	
                </div>
                <div class="contenedor_12" id="Contenedor_12">
                    <!-- //Del dia -->
                    <div class="contenedor_13_a">  <?php
                        include("../conexion/Conexion_BD.php");
            
                        //Se busca el primer lugar
                        $Consulta_1 = "SELECT participante.Nombre, participante.Apellido, participante.Iglesia, participante.SubRegion, participante.Fotografia,participantes_pruebas.Puntos FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos DESC LIMIT 0,1";
                        $Recordset_1 = mysqli_query($conexion, $Consulta_1);
                        while($Resultado_1 =mysqli_fetch_array($Recordset_1)){
                            $Fotografia= $Resultado_1["Fotografia"];
                            $Nombre= $Resultado_1["Nombre"];
                            $Apellido= $Resultado_1["Apellido"];
                            $Puntos= $Resultado_1["Puntos"];
                            $Iglesia= $Resultado_1["Iglesia"];
                            $SubRegion= $Resultado_1["SubRegion"];

                        	//Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
 		                    $Decimal_1 = str_replace('.', ',',  $Puntos);
                    ?>
                            <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                            <label class="Inicio_10"><?php echo $Nombre . " " . $Apellido;?></label>
                            <label class="Inicio_11"><?php echo $Decimal_1;?> Puntos</label>
                            <label class="Inicio_11"><?php echo $Iglesia . "-" . $SubRegion;?></label>
                            <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                        <?php } ?>
                    </div>
                    <div class="contenedor_13_b">
                        <?php
                            //Se busca el segundo lugar
                            $Consulta_2 = "SELECT participante.Nombre, participante.Apellido, participante.Fotografia, participante.Iglesia, participante.SubRegion, participantes_pruebas.Puntos FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos  DESC LIMIT 1,1";
                            $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                            while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                $Fotografia= $Resultado_2["Fotografia"];
                                $Nombre_2= $Resultado_2["Nombre"];
                                $Apellido_2= $Resultado_2["Apellido"];
                                $Puntos_2= $Resultado_2["Puntos"];
                                $Iglesia_2= $Resultado_2["Iglesia"];
                                $SubRegion_2= $Resultado_2["SubRegion"];

                                //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                 $Decimal_2 = str_replace('.', ',',  $Puntos_2);
                        ?>
                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                <label class="Inicio_10"><?php echo $Nombre_2 . " " . $Apellido_2;?></label>
                                <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2;?></label>
                                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                            <?php } ?>
                    </div>
                    <div class="contenedor_13_c">
                        <?php
                            //Se busca el segundo lugar
                            $Consulta_2 = "SELECT participante.Nombre, participante.Apellido, participante.Fotografia, participante.Iglesia, participante.SubRegion, participantes_pruebas.Puntos FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE DATE_FORMAT(Fecha_pago, '%Y/%m/%d') = CURDATE() AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos  DESC LIMIT 2,1";
                            $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                            while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                $Fotografia= $Resultado_2["Fotografia"];
                                $Nombre_2= $Resultado_2["Nombre"];
                                $Apellido_2= $Resultado_2["Apellido"];
                                $Puntos_2= $Resultado_2["Puntos"];
                                $Iglesia_2= $Resultado_2["Iglesia"];
                                $SubRegion_2= $Resultado_2["SubRegion"];

                                //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                 $Decimal_2 = str_replace('.', ',',  $Puntos_2);
                        ?>
                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                <label class="Inicio_10"><?php echo $Nombre_2 . " " . $Apellido_2;?></label>
                                <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2;?></label>
                                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                            <?php } ?>
                    </div>
                </div>
                    <!-- De la semana -->
                <div class="contenedor_18" id="Contenedor_18">
                    <h2 class="h_1" id="Contenedor_12_a1">Los tres más sabios de esta semana</h2>
                    <div class="contenedor_17">
                    <!-- <p class='nav_12'>Dom</p>
                    <p class='nav_11'>Lun</p>
                    <p class='nav_11'>Mar</p>
                    <p class='nav_11'>Mie</p>
                    <p class='nav_11'>Jue</p>
                    <p class='nav_11'>Vie</p>
                    <p class='nav_11'>Sab</p> -->
                    <?php
                        // setlocale(LC_ALL,"es_ES");
                        // $dias = array("domingo","lunes","martes","miercoles","jueves","viernes","sábado");
                        // $Hoy= $dias[date("w")];
                        // // echo "Buenos días, hoy es ". $Hoy . "<br>";
                        
                        // if($Hoy >= "domingo"){
                        //     echo "<p class='nav_12'>Dom</p>";
                        // }
                        // else{
                        //     echo "<p class='nav_11'>Dom</p>";
                        // }
                        // if($Hoy >= "lunes"){ 
                        //     echo "<p class='nav_12'>Lun</p>";
                        // }
                        // else{ 
                        //     echo "<p class='nav_11'</p>Lun</p>";
                        // }
                        // if($Hoy >= "martes"){ 
                        //     echo "<p class='nav_12'>Mar</p>";
                        // }
                        // else{ 
                        //     echo "<p class='nav_11'>Mar</p>";
                        // }
                        // if($Hoy >= "miercoles"){
                        //     echo "<p class='nav_12'>Mie</p>";
                        // }
                        // else{
                        //     echo "<p class='nav_11'>Mie</p>";
                        // }
                        // if($Hoy >= "jueves"){
                        //     echo "<p class='nav_11'>Jue</p>";
                        // }
                        // else{
                        //     echo "<p class='nav_11'>Jue</p>";
                        // }
                        // if($Hoy >= "viernes"){
                        //     echo "<p class='nav_12'>Vie</p>";
                        // }
                        // else{
                        //     echo "<p class='nav_11'>Vie</p>";
                        // }
                        // if($Hoy >= "sábado"){
                        //     echo "<p class='nav_12'>Sab</p>";
                        // }
                        // else{
                        //     echo "<p class='nav_11'>Sab</p>";
                        // }
                    ?>
                </div>
                </div>
                <div class="contenedor_12_a" id="Contenedor_12_a">
                    <div class="contenedor_13_a">
                        <?php
                            //Se busca el primer lugar de la semana
                            $Consulta_1 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.SubRegion, participante.Fotografia FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1";
                            $Recordset_1 = mysqli_query($conexion, $Consulta_1);
                            while($Resultado_1 =mysqli_fetch_array($Recordset_1)){
                                $Fotografia_1= $Resultado_1["Fotografia"];
                                $Nombre_1= $Resultado_1["Nombre"];
                                $Apellido_1= $Resultado_1["Apellido"];
                                $Puntos_1= $Resultado_1["acumulado"];
                                $Iglesia_1= $Resultado_1["Iglesia"];
                                $SubRegion_1= $Resultado_1["SubRegion"];

                                //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                 $Decimal_1 = str_replace('.', ',',  $Puntos_1);
                        ?>
                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_1;?>">
                                <label class="Inicio_10"><?php echo $Nombre_1 . " " . $Apellido_1;?></label>
                                <label class="Inicio_11"><?php echo $Decimal_1;?> Puntos</label>
                                <label class="Inicio_11"><?php echo $Iglesia_1 . "-" . $SubRegion_1;?></label>
                                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                            <?php } ?>
                    </div>
                    <div class="contenedor_13_b">
                        <?php
                            //Se busca el segundo lugar
                            $Consulta_2 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.SubRegion, participante.Fotografia FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1,1";
                            $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                            while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                $Fotografia_2= $Resultado_2["Fotografia"];
                                $Nombre_2= $Resultado_2["Nombre"];
                                $Apellido_2= $Resultado_2["Apellido"];
                                $Puntos_2= $Resultado_2["acumulado"];
                                $Iglesia_2= $Resultado_2["Iglesia"];
                                $SubRegion_2= $Resultado_2["SubRegion"];

                                //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                 $Decimal_2 = str_replace('.', ',',  $Puntos_2);
                        ?>
                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_2;?>">
                                <label class="Inicio_10"><?php echo $Nombre_2 . " " . $Apellido_2;?></label>
                                <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2;?></label>
                                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                            <?php } ?>
                    </div>
                    <div class="contenedor_13_c"">
                        <?php
                            //Se busca el tercer lugar
                            $Consulta_3 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.SubRegion, participante.Fotografia FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK(CURDATE()) GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 2,1";
                            $Recordset_3 = mysqli_query($conexion, $Consulta_3);
                            while($Resultado_3 =mysqli_fetch_array($Recordset_3)){
                                $Fotografia_3= $Resultado_3["Fotografia"];
                                $Nombre_3= $Resultado_3["Nombre"];
                                $Apellido_3= $Resultado_3["Apellido"];
                                $Puntos_3= $Resultado_3["acumulado"];
                                $Iglesia_3= $Resultado_3["Iglesia"];
                                $SubRegion_3= $Resultado_3["SubRegion"];

                                //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                 $Decimal_3 = str_replace('.', ',',  $Puntos_3);
                        ?>
                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_3;?>">
                                <label class="Inicio_10"><?php echo $Nombre_3 . " " . $Apellido_3;?></label>
                                <label class="Inicio_11"><?php echo $Decimal_3;?> Puntos</label>
                                <label class="Inicio_11"><?php echo $Iglesia_3 . "-" . $SubRegion_3;?></label>
                                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                            <?php } ?>
                    </div>
                </div>	
			</div> 
		<footer>
			<?php include("modulos/footer.php");?>
		</footer>
	</body>
</html>