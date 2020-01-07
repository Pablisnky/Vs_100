<p class="Inicio_21">Participantes con insignias</p> 
<?php
	include("../conexion/Conexion_BD.php");
    
    //Se busca el participante que ha logrado insignias de maestro
    $Consulta_30 = "SELECT  COUNT('participantes_pruebas.ID_Participante') AS Total,participantes_pruebas.ID_Participante, participantes_pruebas.Puntos, participante.Nombre, participante.Apellido, participante.Iglesia, participante.Region, participante.SubRegion, participante.Pais,participante.Fotografia FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE Puntos IN(25.000,26.000) AND Tema='Reavivados'  GROUP BY ID_Participante ORDER BY Total DESC, Nombre ASC ";
    $Recordset_30 = mysqli_query($conexion, $Consulta_30);
    while($Resultado_30 =mysqli_fetch_array($Recordset_30)){    ?>
        <div class="contenedor_36">
            <div><?php               
                if($Resultado_30['Puntos']== 25.000 || $Resultado_30['Puntos']==26.000){
                    $InsigniasGanadas =$Resultado_30['Total'];
                    // echo 
                    include("marcarInsignia.php");     
                }   ?>
            </div>
            <div>                    
                <img class="imagen_7" alt="Fotografia del usuario" src="../images/usuarios/<?php echo $Resultado_30['Fotografia'];?>"> 
            </div>  
            <div class="contenedor_37">
                <label class="Inicio_10">
                        <?php 
                    $Nombre= new NombreApellido();
                                                                
                    $Nombre->DosNombre($Resultado_30['Nombre']);
                    $Nombre->PrimerApellido($Resultado_30['Apellido']);
                    ?>
                </label> 
                <label class='Inicio_11  b_1'>Iglesia Adventista del Séptimo día</label>
                <?php
                echo "<label  class='Inicio_11  b_1'>" . $Resultado_30["Iglesia"] . " - " . $Resultado_30["SubRegion"] . " - " . $Resultado_30["Pais"] . "</label>" ."<br>";
                echo "<br>";  ?>   
            </div>  
        </div> <?php
    }  
   ?>