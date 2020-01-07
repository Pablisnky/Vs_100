<?php
   include_once("../clases/nombreApellido.php");
   include_once("../modulos/muestraError.php");

   //Se utiliza la hora de Colombia
	date_default_timezone_set('America/Bogota');
    $Fecha_PHP =date("Y-m-d");
    // echo $Fecha_PHP;
?>
<div class="contenedor_13_a">  <?php
    //Se busca el primer lugar del dia de hoy
    $Consulta_1 = "SELECT participante.Nombre, participante.Apellido, participante.Iglesia, participante.Otra_Iglesia, participante.Pais, participante.SubRegion, participante.Fotografia,participantes_pruebas.Puntos, participantes_pruebas.ID_Participante  FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE Fecha_pago = '$Fecha_PHP' AND ID_Prueba=5 AND Prueba_Cerrada= 1 ORDER BY Puntos DESC LIMIT 0,1";
    $Recordset_1 = mysqli_query($conexion, $Consulta_1);
    while($Resultado_1 =mysqli_fetch_array($Recordset_1)){
        $ID_Participante_1= $Resultado_1["ID_Participante"];
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
        $Decimal_1 = str_replace('.', ',',  $Puntos);   ?>
        <div class="contenedor_25" id="Contenedor_25">
            <div style="width:100% !important">     <?php
                //Se busca si el participante a logrado una insignia de maestro
                $Consulta_20 = "SELECT ID_Participante, Puntos FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND ID_Participante= '$ID_Participante_1'";
                $Recordset_20 = mysqli_query($conexion, $Consulta_20);
                $Resultado_20 =mysqli_fetch_array($Recordset_20);
                $InsignioMaestro_20=$Resultado_20["Puntos"];
                $InsigniasGanadas =mysqli_num_rows($Recordset_20);
                if($InsignioMaestro_20== 25.000 || $InsignioMaestro_20==26.000){
                    include("marcarInsignia.php");     
                }   ?>
            </div>
            <div>
                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
            </div>
            <div class="contenedor_35">       <?php
                if($Apellido == "NoEspecifico"){ ?>
                    <label class="Inicio_10"><?php echo $Nombre;?></label> <?php
                }
                else{     ?>
                    <label class="Inicio_10">
                        <?php 
                        $NombreCompleto= new NombreApellido();
                                                            
                        $NombreCompleto->DosNombre($Nombre);
                        $NombreCompleto->PrimerApellido($Apellido);
                        ?>
                    </label> <?php
                }   ?>
                <label class="Inicio_11"><?php echo $Decimal_1;?> Puntos</label>
                <label class="Inicio_11"><?php echo $Iglesia . "-" . $SubRegion . "-" . $Pais;?></label>
            </div>
        </div>  <?php 
    } ?>
</div>
                            <div class="contenedor_13_b">
                                <?php
                                    //Se busca el segundo lugar del dia de hoy
                                    $Consulta_2 = "SELECT participante.Nombre, participante.Apellido, participante.Fotografia, participante.Iglesia, participante.Otra_Iglesia, participante.Pais,  participante.SubRegion, participantes_pruebas.Puntos,  participantes_pruebas.ID_Participante FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE Fecha_pago = '$Fecha_PHP' AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos  DESC LIMIT 1,1";
                                    $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                                    while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                        $ID_Participante_2= $Resultado_2["ID_Participante"];
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
                                        <div class="contenedor_25" id="Contenedor_25">
                                            <div style="width:100% !important"> 
                                                <?php
                                                //Se busca si el participante a logrado una insignia de maestro
                                                $Consulta_21 = "SELECT ID_PP, ID_Participante, Fecha_pago, Puntos FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND ID_Participante= '$ID_Participante_2'";
                                                $Recordset_21 = mysqli_query($conexion, $Consulta_21);
                                                $Resultado_21 =mysqli_fetch_array($Recordset_21);
                                                $InsignioMaestro_21=$Resultado_21["Puntos"];
                                                $InsigniasGanadas =mysqli_num_rows($Recordset_21);
                                                if($InsignioMaestro_21== 25.000 || $InsignioMaestro_21==26.000){ 
                                                    include("marcarInsignia.php");
                                                }   ?>
                                            </div>
                                            <div>
                                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                            </div>
                                            <div  class="contenedor_35">      
                                                <?php
                                                if($Apellido_2 == "NoEspecifico"){ ?>
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
                                                }
                                                ?>
                                                <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                                <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2 . "-" . $Pais_2;?></label>
                                            </div>
                                        </div> 
                                        <?php 
                                    } ?>
                            </div>


                            <div class="contenedor_13_c">
                                <?php
                                    //Se busca el tercer lugar del dia de hoy
                                    $Consulta_2 = "SELECT participante.Nombre, participante.Apellido, participante.Fotografia, participante.Iglesia, participante.Otra_Iglesia, participante.Pais, participante.SubRegion, participantes_pruebas.Puntos,  participantes_pruebas.ID_Participante FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE Fecha_pago = '$Fecha_PHP' AND ID_Prueba=5  AND Prueba_Cerrada= 1 ORDER BY Puntos  DESC LIMIT 2,1";
                                    $Recordset_2 = mysqli_query($conexion, $Consulta_2);
                                    while($Resultado_2 =mysqli_fetch_array($Recordset_2)){
                                        $ID_Participante_3= $Resultado_2["ID_Participante"];
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
                                        <div class="contenedor_25" id="Contenedor_25">
                                            <div style="width:100% !important"> 
                                                <?php
                                                //Se busca si el participante a logrado una insignia de maestro
                                                $Consulta_22 = "SELECT ID_PP, ID_Participante, Fecha_pago, Puntos FROM participantes_pruebas WHERE Puntos IN(25.000,26.000) AND ID_Participante= '$ID_Participante_3'";
                                                $Recordset_22 = mysqli_query($conexion, $Consulta_22);
                                                $Resultado_22 =mysqli_fetch_array($Recordset_22);
                                                $InsignioMaestro_22=$Resultado_22["Puntos"];
                                                $InsigniasGanadas =mysqli_num_rows($Recordset_22);
                                                if($InsignioMaestro_22== 25.000 || $InsignioMaestro_22==26.000){ 
                                                    include("marcarInsignia.php");  
                                                }   ?>
                                            </div>
                                            <div>
                                                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Fotografia;?>">
                                            </div>
                                            <div class="contenedor_35">      
                                                <?php
                                                if($Apellido_2 == "NoEspecifico"){ ?>
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
                                                }
                                                ?>
                                                <label class="Inicio_11"><?php echo $Decimal_2;?> Puntos</label>
                                                <label class="Inicio_11"><?php echo $Iglesia_2 . "-" . $SubRegion_2 . "-" . $Pais_2;?></label>
                                            </div>
                                        </div> 
                                        <?php 
                                    } ?>
                            </div>