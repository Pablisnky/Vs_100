<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Versus_20 Participantes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Juego de preguntas sobre suramerica."/>
        <meta name="keywords" content="conocimiento, preguntas, juego"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
        <link rel="stylesheet" type="text/css" href="../css/Modal.css">   
        <link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>    

        <script type="text/javascript" src="../javascript/Funciones_varias.js"></script>
    </head>

    <body>
        <!--Construcion de ventanan modal-->
        <input type="checkbox" id="Cerrar">
        <label for="Cerrar" id="btnCerrar">Cerrar</label>
        <div class="modal">
            <div class="contenedor_modal modal_2">
                <p class="Inicio_1"><span>Primeras 10 posiciones</span></p>
                 <table width="95%"  style="text-align: center; border-collapse: collapse; margin-bottom: 3%; margin-left: auto; margin-right: auto; " >
                    <thead >
                        <tr style="background-color: #040652; color: white;">
                            <th>POSICION</th>
                            <th>PARTICIPANTE</th>
                            <th>PUNTOS</th>
                            <th>FECHA</th>
                        </tr>
                    </thead>
                    <?php
                        include("../conexion/Conexion_BD.php");
                        $i = 1;

                        //se consulta el puntaje de los participantes en el Demo y se muestra en una tabla en ventana modal
                        $Consulta= "SELECT usuario, puntos, fecha_Registro FROM participante_demo ORDER BY puntos DESC";
                        // GROUP BY Nombre ORDER BY Puntos DESC
                        $Recordset=mysqli_query($conexion,$Consulta);
                        For($size=1; $size<=10; $size++){                            
                             ($participantes= mysqli_fetch_array($Recordset));

                        //Se cambia el formato de la fecha del servidor MySQL a formato D-M-A
                        $fechaFormatoMySQL=$participantes["fecha_Registro"];
                        $fechaFormatoPHP = date("d-m-Y", strtotime($fechaFormatoMySQL));

                        //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                        $Decimal = str_replace('.', ',', $participantes["puntos"]); 

                            ?>
                            <tbody>
                                <tr>
                                    <td class="tabla_2"><?php echo $i;?></td>
                                    <td class="tabla_0"><?php echo $participantes["usuario"];?></td>
                                    <td class="tabla_1"><?php echo $Decimal;?></td>  
                                    <td class="tabla_1"><?php echo $fechaFormatoPHP;?></td>          
                                </tr>
                            <?php $i++;   
                        } 
                        mysqli_free_result($Recordset); 
                        ?>  
                </tbody>
                </table> 
            </div>
        </div>    
        <!--Termina ventana modal-->

        <div class="Secundario">        
            <header>
                <?php include("modulos/header.html");?>
            </header>
            <div onclick= "ocultarMenu()">
                <h2>Prueba demo</h2>      
                <div class="sesion_3"> 
                    <table>
                        <thead>
                            <tr>
                                <th>POSICION</th>
                                <th>PARTICIPANTE</th>
                                <th>PUNTOS</th>
                                <th>FECHA</th>
                            </tr>
                        </thead>
                            <?php
                                $i = 1;

                                //se consulta el puntaje de los participantes y se muestra en una tabla
                                $Consulta= "SELECT usuario, puntos, fecha_Registro FROM participante_demo ORDER BY puntos DESC";
                                $Recordset=mysqli_query($conexion,$Consulta); 
                                while($participantes= mysqli_fetch_array($Recordset)){

                                    
                                //Se cambia el formato de los puntos, la parte decimal es recibida con punto desde la BD y se cambia a coma
                                $Decimal = str_replace('.', ',', $participantes["puntos"]); 
                            ?>
                        <tbody>
                            <tr>
                                <td class="tabla_2"><?php echo $i;?></td>
                                <td class="tabla_0"><?php echo $participantes["usuario"];?></td>
                                <td class="tabla_1"><?php echo $Decimal;?></td> 
                                <td class="tabla_1"><?php echo date("d-m-Y", strtotime($participantes["fecha_Registro"])); ?></td><!--se cambia el formato de la fecha de registro-->
                                <!--<td><?php// echo date("d-m-Y", strtotime($participantes[0])); ?></td>se cambia el formato de la fecha de ultima participacion-->           
                            </tr>
                            <?php $i++; }   ?>  
                        </tbody>
                    </table>  
                    <a href="demo.php" class="botonDemo">Tomar prueba Demo</a>  
                </div>
            </div>  
        </div>
        <footer>
            <?php include("modulos/footer.php");?>
        </footer> 
    </body>
</html>