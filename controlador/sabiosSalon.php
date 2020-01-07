<?php
    // // Se buscan los participantes que han liderado una semana
    // $Consulta_6="SELECT participante.ID_Participante, Nombre, Apellido, Iglesia, SubRegion, Pais, Fotografia, PuntosTotales, WEEK(fecha) AS semana, YEAR(fecha) AS año FROM posicion_general_rea INNER JOIN participante ON posicion_general_rea.ID_Participante=participante.ID_Participante WHERE PuntosTotales IN (SELECT MAX(`PuntosTotales`) FROM `posicion_general_rea` GROUP BY WEEK(fecha) HAVING MAX(`PuntosTotales`)) ORDER BY WEEK(fecha) DESC ";
    // $Recordset_6 = mysqli_query($conexion, $Consulta_6);
    // while($Resultado_6 =mysqli_fetch_array($Recordset_6)){ 
    //     $Semana= $Resultado_6['semana']; ?>
    <!-- //     <div class="contenedor_36"> -->
    <!-- //         <div><?php                
    //             // if($Resultado_6['Puntos']== 25.000 || $Resultado_6['Puntos']==26.000){
    //             //     $InsigniasGanadas =$Resultado_6['Total'];
    //             //     // echo 
    //             //     include("marcarInsignia.php");     
    //             // }   ?>
    //         </div>
    //         <div>                    
    //             <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Resultado_6['Fotografia'];?>"> 
    //         </div>  
    //         <div class="contenedor_37">
    //             <label class="Inicio_10">
    //                     <?php 
    //                 $Nombre= new NombreApellido();
                                                                
    //                 $Nombre->DosNombre($Resultado_6['Nombre']);
    //                 $Nombre->PrimerApellido($Resultado_6['Apellido']);
    //                 ?>
    //             </label> 
    //             <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> <?php echo $Resultado_6['semana'] . " - " . $Resultado_6['año'];?></label>
    //             <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> <?php echo $Resultado_6['PuntosTotales']?></label>
    //             <label class='Inicio_11  b_1'>Iglesia Adventista del Séptimo día</label>
    //             <label class="Inicio_11 b_1"><?php echo $Resultado_6['Iglesia'] . " - " . $Resultado_6['SubRegion'] . " - " . $Resultado_6['Pais']?></label><label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
    //             <?php
    //             // Se buscan los capitulos correspondiente a cada semana
    //             $Consulta_7="SELECT WEEK(fecha), capitulo FROM reavi_capitulo WHERE WEEK(fecha)= $Semana ";
    //             $Recordset_7 = mysqli_query($conexion, $Consulta_7);
    //             while($Resultado_7 =mysqli_fetch_array($Recordset_7)){  ?>
    //                 <label class="Inicio_11 b_1"><?php echo $Resultado_7["capitulo"];?></label> <?php
    //             }   ?>
               
    //         </div>
    //     </div>  <?php
    // }   ?>
                
-->

<p class="Inicio_21">Participantes lideres por semana</p>
<div class="contenedor_36">
    <div>
        <label class="label_4">+6</label>
        <img class="imagen_13" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
    </div>
    <div>
        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "5d698b2ea79cb483690e106cc7776e6f.jpg";?>">
    </div>
    <div class="contenedor_37"> 
        <label class="Inicio_10"><?php echo "Alexandra Martinez";?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 01-2020</label>
        <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 70,317</label>
        <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
        <label class="Inicio_11 b_1"><?php echo "Filadelfia - Bucaramanga"?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
        <label class="Inicio_11 b_1"><?php echo "Job 7"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 8"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 9"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 10"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 11"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 12"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 13"?></label>
        <label class="Inicio_11">sábado 04 de enero de 2020</label>
    </div>
</div>
<!-- *******************************************************************************************  -->
<div class="contenedor_36">
    <div>
        <label class="label_4">+6</label>
        <img class="imagen_13" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
    </div>
    <div>
        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "5d698b2ea79cb483690e106cc7776e6f.jpg";?>">
    </div>
    <div class="contenedor_37"> 
        <label class="Inicio_10"><?php echo "Alexandra Martinez";?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 52-2019</label>
        <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 139,821</label>
        <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
        <label class="Inicio_11 b_1"><?php echo "Filadelfia - Bucaramanga"?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 10"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 1"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 2"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 3"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 4"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 5"?></label>
        <label class="Inicio_11 b_1"><?php echo "Job 6"?></label>
        <label class="Inicio_11">sábado 28 de diciembre de 2019</label>
    </div>
</div>
<!-- *******************************************************************************************  -->
<div class="contenedor_36">
    <div></div>
    <div>
        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
    </div>
    <div class="contenedor_37"> 
        <label class="Inicio_10"><?php echo "Elisabeth Contreras";?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 51-2019</label>
        <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 142,077</label>
        <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
        <label class="Inicio_11 b_1"><?php echo "Peniel - Pamplonita"?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 3"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 4"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 5"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 6"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 7"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 8"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 9"?></label>
        <label class="Inicio_11">sábado 21 de diciembre de 2019</label>
    </div>
</div>
<!-- ********************************************************************************************* -->
<div class="contenedor_36">
    <div>
        <label class="label_4">+6</label>
        <img class="imagen_13" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
    </div>
    <div>
        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "5d698b2ea79cb483690e106cc7776e6f.jpg";?>">
    </div>
    <div class="contenedor_37"> 
        <label class="Inicio_10"><?php echo "Alexandra Martinez";?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 50-2019</label>
        <label class="Inicio_11 b_1"><b class="b_1">Puntos:</b> 145,889</label>
        <label class="Inicio_11 b_1">Iglesia Adventista del Séptimo día</label>
        <label class="Inicio_11 b_1"><?php echo "Filadelfia - Bucaramanga"?></label>
        <label class="Inicio_11 b_1"><b class="b_1">Capitulos estudiados:</b></label>
        <label class="Inicio_11 b_1"><?php echo "Nehemías 9"?></label>
        <label class="Inicio_11 b_1"><?php echo "Nehemías 10"?></label>
        <label class="Inicio_11 b_1"><?php echo "Nehemías 11"?></label>
        <label class="Inicio_11 b_1"><?php echo "Nehemías 12"?></label>
        <label class="Inicio_11 b_1"><?php echo "Nehemías 13"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 1"?></label>
        <label class="Inicio_11 b_1"><?php echo "Ester 2"?></label>
        <label class="Inicio_11">sábado 14 de diciembre de 2019</label>
    </div>
</div>
<!-- ********************************************************************************************* -->
<div class="contenedor_36">
    <div>
        <label class="label_4">+6</label>
        <img class="imagen_13" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
    </div>
    <div>
        <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "5d698b2ea79cb483690e106cc7776e6f.jpg";?>">
    </div>
    <div class="contenedor_37"> 
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
<!-- ********************************************************************************************* -->
                            <div class="contenedor_36">
                                <div>
                                    <label class="label_4">+3</label> 
                                    <img class="imagen_13" alt="Insignia" src="../images/In_Maestro.png" onclick="mostrarInsignia()">
                                </div>
                                <div>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                                </div>
                                <div class="contenedor_37"> 
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
<!-- ********************************************************************************************* -->
                            <div class="contenedor_36">
                                <div></div>
                                <div>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                                </div>
                                <div class="contenedor_37">
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
                                </div>
                            </div>
<!-- ********************************************************************************************* -->
                            <div class="contenedor_36">
                                <div></div>
                                <div></div>
                                <div class="contenedor_37">
                                    <label class="Inicio_10"><?php echo "Declarado desierto";?></label>
                                    <label class="Inicio_11 b_1"><b class="b_1">Semana:</b> 46-2019</label>
                                    <label class="Inicio_11">sábado 16 de noviembre de 2019</label>
                                    <label class="Inicio_11">Fallas tecnicas no permitieron realizar el reto semanal</label>
                                </div>
                            </div>
<!-- ********************************************************************************************* -->
                            <div class="contenedor_36">
                                <div></div>
                                <div>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "Perfil.jpg";?>">
                                </div>
                                <div class="contenedor_37">
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
                                </div>
                            </div>
<!-- ********************************************************************************************* -->
                            <div class="contenedor_36">
                                <div></div>
                                <div>
                                    <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo "IMG-20190602-WA0002.jpg";?>">
                                </div>
                                <div class="contenedor_37">
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
                            </div>	