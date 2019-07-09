<?php
session_start();
  $ID_PD= $_SESSION["ID_PD"];
  // echo $ID_PD;
  include("../conexion/Conexion_BD.php");
?>

<!-- Se inserta la libreria highcharts utilizada para realizar el grafico -->
<script src="https://code.highcharts.com/highcharts.js"></script>


<div id="container"></div>

<script type="text/javascript">
Highcharts.chart('container', {
  chart:{    
    height: 260,
    backgroundColor: '#F4FCFB',
  },
  title: {
    text: 'Tu versus el lider'
  },
  // subtitle: {
  //   text: ''
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
      // text: 'Preguntas',
    },
    min:1,
    categories: ['0','1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
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
        $Consulta_1="SELECT usuario FROM participante_demo WHERE ID_PD= '$ID_PD'";
        $Recordset_1= mysqli_query($conexion, $Consulta_1);
        $Resultado_1= mysqli_fetch_array($Recordset_1);
        ?>//se cierra php porque los datos que recibe name son cadenas de texto

      '<?php echo $Resultado_1["usuario"] ;?>',//esta cadena es la que aparece en el grafico
    data: [<?php 
        //consulta para buscar los puntos ganados por el participante
        // $Consulta_2="SELECT puntoGanado FROM respuestas_demo WHERE ID_PD= '$ID_PD' AND Correcto = 1";
        $Consulta_2="SELECT SUM(puntoGanado) AS puntoGanado FROM respuestas_demo WHERE ID_PD= '$ID_PD' GROUP BY ID_Pregunta";
        $Recordset_2= mysqli_query($conexion, $Consulta_2);
        while($Resultado_2= mysqli_fetch_array($Recordset_2)){
          echo $Resultado_2["puntoGanado"] . ",";
         }?>]}, 
        {
    color:'#0815CD',
    name: <?php
        //Consulta que selecciona al participante lider
        $Consulta_3= "SELECT ID_PD, usuario FROM participante_demo ORDER BY Puntos DESC LIMIT 1";
        $Recordset_3= mysqli_query($conexion, $Consulta_3);
        $Resultado_3= mysqli_fetch_array($Recordset_3);  
        $Participante_3= $Resultado_3["ID_PD"];
        $Participante_4= $Resultado_3["usuario"]; ?>
        '<?php echo "Lider: " . $Participante_4;?>', 
    data: [<?php 
        //Consulta que selecciona al participante lider
        // $Consulta_3= "SELECT ID_PD FROM participante_demo ORDER BY Puntos DESC LIMIT 1";
        // $Recordset_3= mysqli_query($conexion, $Consulta_3);
        // $Resultado_3= mysqli_fetch_array($Recordset_3);
        // $Participante_3= $Resultado_3["ID_PD"];

        //consulta para buscar los puntos ganados en cada pregunta por el participante lider
        // $Consulta_4="SELECT puntoGanado FROM respuestas_demo WHERE ID_PD= $Participante_3 AND Correcto = 1";
        $Consulta_4="SELECT SUM(puntoGanado) AS puntoGanado FROM respuestas_demo WHERE ID_PD= '$Participante_3' GROUP BY ID_Pregunta";

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