<?php 
   //Se utiliza la hora de Colombia
	date_default_timezone_set('America/Bogota');
    $Fecha_PHP_1 =date("Y-m-d");
    // echo $Fecha_PHP_1;
?>

<div class="contenedor_13_a">
    <?php
    //Se busca el primer lugar de la semana
    $Consulta_1 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participante.Fotografia, participantes_pruebas.Fecha_pago FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK('$Fecha_PHP_1') GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1";
    $Recordset_1 = mysqli_query($conexion, $Consulta_1);
    while($Resultado_1 =mysqli_fetch_array($Recordset_1)){
        $ID_Participante_4= $Resultado_1["ID_Participante"];
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
        <div class="contenedor_25 contenedor_25a" id="Contenedor_25">
            <div style="width:100% !important">
                <?php
                //Se busca si el participante a logrado una insignia de maestro
                $Consulta_23 = "SELECT ID_PP, ID_Participante, Fecha_pago, Puntos FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND ID_Participante='$ID_Participante_4'";
                $Recordset_23 = mysqli_query($conexion, $Consulta_23);
                $Resultado_23 =mysqli_fetch_array($Recordset_23);
                $InsignioMaestro_23=$Resultado_23["Puntos"];
                $InsigniasGanadas =mysqli_num_rows($Recordset_23);
                if($InsignioMaestro_23== 25.000 || $InsignioMaestro_23==26.000){
                    include("marcarInsignia.php");  
                }   ?>
            </div>
            <div>
                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_1;?>">
            </div>
            <div class="contenedor_35">  
                <label class="Inicio_10">
                    <?php 
                    $NombreCompleto= new NombreApellido();
                                                                                            
                    $NombreCompleto->DosNombre($Nombre_1);
                    $NombreCompleto->PrimerApellido($Apellido_1);
                    ?>
                </label>
                <label class="Inicio_11"><?php echo $Decimal_1;?> Puntos</label>
                <label class="Inicio_11"><?php echo $Iglesia_1 . "-" . $SubRegion_1 . "-" . $Pais_1?></label>
                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
            </div>
        </div>
            <?php 
    } 
    //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
    $Consulta_5 = "SELECT participantes_pruebas.Fecha_pago FROM participantes_pruebas WHERE Fecha_pago = '$Fecha_PHP_1' AND ID_Participante= '$ID_Participante_4' AND ID_Prueba=5";
    $Recordset_5=  mysqli_query($conexion, $Consulta_5);
    $Resultado_5 =mysqli_fetch_array($Recordset_5);

    // date_default_timezone_set('America/Bogota');
    // $FechaServidorPHP =date("Y-m-d");
    $Fecha_Participacion_5=date("Y-m-d",strtotime($Resultado_5["Fecha_pago"]));
    // echo "<br>";
    // echo $Resultado_1["Fecha_pago"] . "<br>";
    // echo $Fecha_Participacion_5 . "<br>";
    //  echo $FechaServidorPHP;
    if($Fecha_Participacion_5 == $Fecha_PHP_1){
        echo "<label class='Inicio_22'>Hoy: <span class='icon icon-checkmark'></span></label>";
    } 
    else{
        echo "<label class='Inicio_22'>Hoy: Sin responder</label>";
    }   ?>
</div>

                            <div class="contenedor_13_b">
                                <?php
                                    //Se busca el segundo lugar de la semana
                                    $Consulta_2 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participante.Fotografia, participantes_pruebas.Fecha_pago FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK('$Fecha_PHP_1') GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 1,1";
                                    $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                                    while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                        $ID_Participante_5= $Resultado_2["ID_Participante"];
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
                                        <div class="contenedor_25 contenedor_25a" id="Contenedor_25">
                                            <div style="width:100% !important">
                                                <?php
                                                //Se busca si el participante a logrado una insignia de maestro
                                                $Consulta_24 = "SELECT ID_PP, ID_Participante, Fecha_pago, Puntos FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND ID_Participante='$ID_Participante_5'";
                                                $Recordset_24 = mysqli_query($conexion, $Consulta_24);
                                                $Resultado_24 =mysqli_fetch_array($Recordset_24);
                                                $InsignioMaestro_24=$Resultado_24["Puntos"];
                                                $InsigniasGanadas =mysqli_num_rows($Recordset_24);
                                                if($InsignioMaestro_24== 25.000 || $InsignioMaestro_24==26.000){
                                                    include("marcarInsignia.php");
                                                }   ?>
                                            </div>
                                            <div> 
                                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_2;?>">
                                            </div>
                                            <div class="contenedor_35">  <?php
                                                    if($Apellido == "NoEspecifico"){ ?>
                                                        <label class="Inicio_10"><?php echo $Nombre_2;?></label> <?php
                                                    }
                                                    else{     ?>
                                                        <label class="Inicio_10">
                                                            <?php 
                                                            $NombreCompleto= new NombreApellido();
                                                                                                
                                                            $NombreCompleto->DosNombre($Nombre_2);
                                                            $NombreCompleto->PrimerApellido($Apellido_2);
                                                            ?>
                                                        </label> <?php
                                                    }   ?>
                                                <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                                <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2 . "-" . $Pais_2?></label>
                                                <!-- <label class="Inicio_11">Iglesia Adventista del Séptimo dia</label> -->
                                            </div>
                                        </div>
                                                <?php 
                                    }
                                    //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                    $Consulta_6 = "SELECT participantes_pruebas.Fecha_pago FROM participantes_pruebas WHERE  Fecha_pago = '$Fecha_PHP_1' AND ID_Participante= '$ID_Participante_5'";
                                    $Recordset_6=  mysqli_query($conexion, $Consulta_6);
                                    $Resultado_6 =mysqli_fetch_array($Recordset_6);

                                    // date_default_timezone_set('America/Bogota');
                                    // $FechaServidorPHP =date("Y-m-d");
                                    $Fecha_Participacion_6=date("Y-m-d",strtotime($Resultado_6["Fecha_pago"]));
                                    // echo "<br>";
                                    // echo $Resultado_1["Fecha_pago"] . "<br>";
                                    // echo $Fecha_Participacion_5 . "<br>";
                                    // echo $FechaServidorPHP;
                                    if($Fecha_Participacion_6 ==  $Fecha_PHP_1){
                                        echo "<label class='Inicio_22'>Hoy: <span class='icon icon-checkmark'></span></label>";
                                    } 
                                    else{
                                        echo "<label class='Inicio_22'>Hoy: Sin responder</label>";
                                    }
                                    ?>
                            </div>

                            <div class="contenedor_13_c"">
                                <?php
                                    //Se busca el tercer lugar de la semana
                                    $Consulta_3 = "SELECT SUM(Puntos) AS acumulado, participante.ID_Participante, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participante.Fotografia, participantes_pruebas.Fecha_pago FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE Tema='Reavivados' AND WEEK(Fecha_pago)= (SELECT WEEK(Fecha_pago) AS Semana FROM participantes_pruebas WHERE WEEK(Fecha_pago)=WEEK('$Fecha_PHP_1') GROUP BY WEEK(Fecha_pago)) GROUP BY participante.ID_Participante ORDER BY acumulado DESC LIMIT 2,1";
                                    $Recordset_3 = mysqli_query($conexion, $Consulta_3);
                                    while($Resultado_3 =mysqli_fetch_array($Recordset_3)){
                                        $ID_Participante_6= $Resultado_3["ID_Participante"];
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
                                            <div class="contenedor_25 contenedor_25a" id="Contenedor_25">
                                                <div style="width:100% !important; ">
                                                    <?php
                                                    //Se busca si el participante a logrado una insignia de maestro
                                                    $Consulta_25 = "SELECT ID_PP, ID_Participante, Fecha_pago, Puntos FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND ID_Participante='$ID_Participante_6'";
                                                    $Recordset_25 = mysqli_query($conexion, $Consulta_25);
                                                    $Resultado_25 =mysqli_fetch_array($Recordset_25);
                                                    $InsignioMaestro_25=$Resultado_25["Puntos"];
                                                    $InsigniasGanadas =mysqli_num_rows($Recordset_25);
                                                    if($InsignioMaestro_25== 25.000 || $InsignioMaestro_25==26.000){ 
                                                        include("marcarInsignia.php");
                                                    }   ?>
                                                </div>
                                                <div>
                                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia_3;?>">
                                                </div>
                                                <div class="contenedor_35">  <?php
                                                    if($Apellido == "NoEspecifico"){ ?>
                                                        <label class="Inicio_10"><?php echo $Nombre_3;?></label> <?php
                                                    }
                                                    else{     ?>
                                                        <label class="Inicio_10">
                                                            <?php 
                                                            $NombreCompleto= new NombreApellido();
                                                                                                
                                                            $NombreCompleto->DosNombre($Nombre_3);
                                                            $NombreCompleto->PrimerApellido($Apellido_3);
                                                            ?>
                                                        </label> <?php
                                                    }   ?>
                                                    <label class="Inicio_11"><?php echo $Decimal_3;?> Puntos</label>
                                                    <label class="Inicio_11"><?php echo $Iglesia_3 . "-" . $SubRegion_3 . "-" . $Pais_3?></label>
                                                </div>
                                            </div>
                                        <?php 
                                    } 
                                    //Se verifica que el participante halla respondido hoy para mostrar el check en pantalla
                                    $Consulta_7 = "SELECT participantes_pruebas.Fecha_pago FROM participantes_pruebas WHERE  Fecha_pago = '$Fecha_PHP_1' AND ID_Participante= '$ID_Participante_6'";
                                    $Recordset_7=  mysqli_query($conexion, $Consulta_7);
                                    $Resultado_7 =mysqli_fetch_array($Recordset_7);

                                    // date_default_timezone_set('America/Bogota');
                                    // $FechaServidorPHP =date("Y-m-d");
                                    $Fecha_Participacion_7=date("Y-m-d",strtotime($Resultado_7["Fecha_pago"]));
                                    // echo "<br>";
                                    // echo $Resultado_1["Fecha_pago"] . "<br>";
                                    // echo $Fecha_Participacion_5 . "<br>";
                                    // echo $FechaServidorPHP;
                                    if($Fecha_Participacion_7 ==  $Fecha_PHP_1){
                                        echo "<label class='Inicio_22'>Hoy: <span class='icon icon-checkmark'></span></label>";
                                    } 
                                    else{
                                        echo "<label class='Inicio_22'>Hoy: Sin responder</label>";
                                    }
                                    ?>
                            </div>