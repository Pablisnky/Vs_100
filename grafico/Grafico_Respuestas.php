<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.
  $participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
  // echo "ID_Participante: " . $participante . "<br>";

  $ID_Prueba= $_SESSION["ID_Prueba"];//
  //  echo "ID_Prueba: " . $_SESSION["ID_Prueba"] . "<br>";

  $ID_PP = $_SESSION["codigoPrueba"]; //Se recibe desde entrada.php
  // echo "ID_PP: " . $ID_PP . "<br>";

  $Tema = $_SESSION["Tema"]; //Se recibe desde entrada.php
  // echo "Tema: " . $Tema . "<br>";

  include("../conexion/Conexion_BD.php");
?>

<!-- Se inserta la libreria highcharts utilizada para realizar el grafico -->
<script src="https://code.highcharts.com/highcharts.js"></script>


<div id="container"></div>

<script type="text/javascript">
Highcharts.chart('container', {
  chart:{    
    height: 290,
    backgroundColor: '#F4FCFB',
  },
  title: {
    text: 'Tu versus el líder de hoy'
  },
  // subtitle: {
  //   text: 'Tu actuación versus al lider de la prueba'
  // }, 
  legend: {
    align: 'left',
    verticalAlign: 'center',
    // layout: 'vertical',
  },
  yAxis: {
    title: {
      text: 'Puntos',
    },
    max:5,
  }, 
  xAxis:[{  
    title: {
     text: 'Preguntas',
    },
    min:1,
    categories: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
  }],
    tooltip: {
        enabled: true,
    },
  plotOptions: {
    series: {
      label: {
        connectorAllowed: false
      },
      pointStart: 1
    }
  },

 // series: [{
 //    name: 'Pablo',
 //    data: [6,7,8,7,7,6,5,4,2,3]},],

  series: [{
    color:'#040652',
    name:
        <?php
        //consulta para buscar el nombre del participante
        $Consulta_1="SELECT Nombre FROM participante WHERE ID_Participante= $participante";
        $Recordset_1= mysqli_query($conexion, $Consulta_1);
        $Resultado_1= mysqli_fetch_array($Recordset_1);
        ?>//se cierra php porque los datos que recibe name son cadenas de texto

      '<?php echo $Resultado_1["Nombre"] ;?>',//esta cadena es la que aparece en el grafico
    data: [<?php 
        //consulta para buscar los puntos ganados en cada pregunta
        // $Consulta_2="SELECT puntoGanado FROM respuestas WHERE ID_Participante= $participante AND ID_PP =$ID_PP AND Correcto = 1";
        $Consulta_2="SELECT SUM(puntoGanado) AS puntoGanado FROM respuestas WHERE ID_Participante= $participante AND ID_PP =$ID_PP  GROUP BY ID_Pregunta";
        $Recordset_2= mysqli_query($conexion, $Consulta_2);
        while($Resultado_2= mysqli_fetch_array($Recordset_2)){
          echo $Resultado_2["puntoGanado"] . ",";
        }?>]},
        {
    color:'rgba(8,21,205,0.4)',
    name:<?php 
        //Consulta que selecciona al participante lider
        if($Tema == "Reavivados"){
          $Consulta_3= "SELECT participantes_pruebas.ID_Participante, participante.Nombre, ID_PP FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE ID_Prueba=  '$ID_Prueba' AND DATE_FORMAT(Fecha_pago, '%Y/%m/%d')=CURDATE() ORDER BY Puntos DESC LIMIT 1";
          $Recordset_3= mysqli_query($conexion, $Consulta_3);
          $Resultado_3= mysqli_fetch_array($Recordset_3);
          $Participante_3= $Resultado_3["ID_Participante"];
          $Participante_4= $Resultado_3["ID_PP"];
          $Participante_5= $Resultado_3["Nombre"];
        }
        else{   
          $Consulta_3= "SELECT participantes_pruebas.ID_Participante, participante.Nombre, ID_PP FROM participantes_pruebas INNER JOIN participante ON participantes_pruebas.ID_Participante=participante.ID_Participante WHERE ID_Prueba=  '$ID_Prueba' ORDER BY Puntos DESC LIMIT 1";
          $Recordset_3= mysqli_query($conexion, $Consulta_3);
          $Resultado_3= mysqli_fetch_array($Recordset_3);
          $Participante_3= $Resultado_3["ID_Participante"];
          $Participante_4= $Resultado_3["ID_PP"];
          $Participante_5= $Resultado_3["Nombre"];
        }?>         
        '<?php echo "Lider: " . $Participante_5;?>', 
    data: [<?php
        //consulta para buscar los puntos ganados en cada pregunta por el participante lider
        // $Consulta_4="SELECT puntoGanado FROM respuestas WHERE ID_Participante= $Participante_3 AND ID_PP =$Participante_4 AND Correcto = 1";
        $Consulta_4="SELECT SUM(puntoGanado) AS puntoGanado FROM respuestas WHERE ID_Participante= $Participante_3 AND ID_PP =$Participante_4 GROUP BY ID_Pregunta";
        $Recordset_4= mysqli_query($conexion, $Consulta_4);
        while($Resultado_4= mysqli_fetch_array($Recordset_4)){
          echo $Resultado_4["puntoGanado"] . ",";
        }?>]},
    ],  
  responsive: {
    rules: [{
      condition: {
        maxWidth: 500
      },
      chartOptions: {
        legend: {
          layout: 'horizontal',
          align: 'center',
          verticalAlign: 'bottom'
        }
      }
    }]
  }

});
</script>