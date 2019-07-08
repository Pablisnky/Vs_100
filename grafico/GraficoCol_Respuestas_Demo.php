<?php
session_start();
  // $ID_PD= $_SESSION["ID_PD"];
  // echo $ID_PD;
  include("../conexion/Conexion_BD.php");
?>

<!-- Se inserta la libreria highcharts utilizada para realizar el grafico -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<div id="container"></div>

<script type="text/javascript">
Highcharts.chart('container', {
  chart: {
    type: 'column',
    backgroundColor: '#F4FCFB',
  },
  title: {
    text: 'Tu Versus El Lider'
  },
  legend: {
        align: 'left',
        verticalAlign: 'center',
        // layout: 'vertical',
    },
  xAxis: {
    min:1,
    max:10,
    categories: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10']
  },
  yAxis: {
    title: {
      text: 'Puntos',
    },
    max:5,
  }, 
  credits: {
    enabled: true
  },



  series: [{
    color: '#40E0D0',
    name:
        <?php
        //consulta para buscar el nombre del participante 
        $Consulta_1="SELECT usuario FROM participante_demo WHERE ID_PD= 44";
        $Recordset_1= mysqli_query($conexion, $Consulta_1);
        $Resultado_1= mysqli_fetch_array($Recordset_1);
        ?>//se cierra php porque los datos que recibe name son cadenas de texto

      '<?php echo $Resultado_1["usuario"] ;?>',//esta cadena es la que aparece en el grafico
    data:[<?php 
        //consulta para buscar los puntos ganados por el participante
        $Consulta_2="SELECT puntoGanado FROM respuestas_demo WHERE ID_PD= 44 AND Correcto = 1";
        $Recordset_2= mysqli_query($conexion, $Consulta_2);
        while($Resultado_2= mysqli_fetch_array($Recordset_2)){
          echo $Resultado_2["puntoGanado"] . ",";
        }?>]
  },
      {
    color:'#040652',
    name: 'Lider de la prueba',
    data:[<?php 
        //Consulta que selecciona al participante lider
        $Consulta_3= "SELECT ID_PD FROM participante_demo ORDER BY Puntos DESC LIMIT 1";
        $Recordset_3= mysqli_query($conexion, $Consulta_3);
        $Resultado_3= mysqli_fetch_array($Recordset_3);
        $Participante_3= $Resultado_3["ID_PD"];

        //consulta para buscar los puntos ganados en cada pregunta por el participante lider
        $Consulta_4="SELECT SUM(puntoGanado) AS puntoGanado FROM respuestas_demo WHERE ID_PD= $Participante_3  GROUP BY ID_Pregunta";

        $Recordset_4= mysqli_query($conexion, $Consulta_4);
        while($Resultado_4= mysqli_fetch_array($Recordset_4)){
          echo $Resultado_4["puntoGanado"] . ",";
        }?>]
  },]
});
</script>