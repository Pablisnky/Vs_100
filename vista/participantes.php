<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Vs_100 Participantes</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Juego de preguntas sobre suramerica."/>
        <meta name="keywords" content="suramerica, latinoamerica"/>
        <meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

        <link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
        <link rel="stylesheet" type="text/css" href="../css/Modal.css">      

        <script type="text/javascript" src="javascript/Funciones_varias.js" ></script>

        <style>
            @import url('https://fonts.googleapis.com/css?family=Lato|Montserrat|Indie+Flower|Raleway:400|Caveat');
        </style> 
    </head>

    <body style="height: 120%">
        <!--Construcion de ventanan modal-->
        <input type="checkbox" id="Cerrar">
        <label for="Cerrar" id="btnCerrar">Cerrar</label>
        <div class="modal">
            <div id="Inicio" style="background-color: ; margin-top: 10%;" >
                <p class="Inicio_1"><span>Primeras 10 posiciones</span></p>
                 <table width="95%"  style="text-align: center; border-collapse: collapse; margin-bottom: 3%; margin-left: auto; margin-right: auto; " >
                    <thead >
                        <tr style="background-color: #040652; color: white;">
                            <th style="font-size: 12px;">POSICION</th>
                            <th style="font-size: 12px;">NOMBRE</th>
                            <th style="font-size: 12px;">PUNTOS</th>
                        </tr>
                    </thead>
                    <?php
                        include("../conexion/Conexion_BD.php");
                        mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente
                        $i = 1;

                        //se consulta el puntaje de los participantes y se muestra en una tabla en ventana modal
                        $Consulta= "SELECT participante.Nombre, participantes_pruebas.Puntos FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE participantes_pruebas.Tema='Demo'  ORDER BY participantes_pruebas.Puntos DESC ";
                        // GROUP BY Nombre ORDER BY Puntos DESC
                        $Recordset=mysqli_query($conexion,$Consulta);
                        For($size=1;$size<=10;$size++){                            
                             ($participantes= mysqli_fetch_array($Recordset));

                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><?php echo $participantes["Nombre"];?></td>
                                    <td><?php echo $participantes["Puntos"];?></td>           
                                </tr>
                            <?php $i++;   
                        } 
                        mysqli_free_result($Recordset); 
                        ?>  
                </tbody>
                </table> 
            <!--   
                <p class="Inicio_1"> Descarga tabla de posiciones.</p>
                <nav class="navegacion_1">  
                    <a style="color: blue" href="">PDF</a>
                    <a style="color: blue" href="">WORD</a>
                    <a style="color: blue" href="Generalidades/PHPExcel-1.8/Classes/PHPExcel.php">EXCEL</a>
                </nav>
            -->
            </div>
        </div>    
    <!--Termina ventana modal-->


    <div class="Secundario">
        
            <!--titulo y menu principal-->
            <?php include("modulos/header.html");?>
        <div onclick= "ocultarMenu()">
            <h2>Participantes</h2>      
        
        <div id="sesion_3"> 
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>PARTICIPANTE</th>
                            <th>PUNTOS</th>
                            <!--<th  style="font-size: 0.9vw; background-color: #040652; color: white;">ULTIMA PARTICIPACION</th>-->
                        </tr>
                    </thead>
                    <?php
                        mysqli_query($conexion,'SET NAMES "'. CHARSET .'"');//es importante esta linea para que los caracteres especiales funcione, tanto graficamente como logicamente
                        $i = 1;

                        //se consulta el puntaje de los participantes y se muestra en una tabla
                        $Consulta= "SELECT participante.Nombre, participantes_pruebas.Puntos FROM participante INNER JOIN participantes_pruebas ON participante.ID_Participante=participantes_pruebas.ID_Participante WHERE participantes_pruebas.Tema='Demo' ORDER BY participantes_pruebas.Puntos DESC";
                        $Recordset=mysqli_query($conexion,$Consulta); 
                        while($participantes= mysqli_fetch_array($Recordset)){
                    ?>
                    <tbody>
                        <tr>
                            <td class="tabla_3"><?php echo $i;?></td>
                            <td class="tabla_0"><?php echo $participantes["Nombre"];?></td>
                            <td class="tabla_1"><?php echo $participantes["Puntos"];?></td> 
                           <!-- <td class="tabla_1"><?php echo date("d-m-Y", strtotime($participantes[11])); ?></td>se cambia el formato de la fecha de registro-->
                            <!--<td><?php// echo date("d-m-Y", strtotime($participantes[0])); ?></td>se cambia el formato de la fecha de ultima participacion-->           
                        </tr>
                        <?php $i++; }   ?>  
                    </tbody>
                </table>       
        </div>
       
    </div>
</div>
</body>
</html>
