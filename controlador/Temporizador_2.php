<?php   
    // incluido en entrada.php
    //Este archivo calcula el tiempo de cada pregunta, que es de dos minutos.

    $Pregunta= $_SESSION["Pregunta"];//sesion creada en cada pregunta.
    $Participante= $_SESSION["ID_Participante"];
    $CodigoPrueba= $_SESSION["codigoPrueba"];// en esta sesion se tiene guardado el codigo de la prueba creada en
    // echo "ID_PP= " . $CodigoPrueba;

    if($CodigoPrueba != "demo"){
      $CodigoPrueba= $_SESSION["codigoPrueba"];// en esta sesion se tiene guardado el codigo de la prueba creada en
    }
    else{
      $CodigoPrueba= "demo";
    }

    if($Tema != "Demo"){
      $Tema= $_SESSION["Tema"];//sesion creada en pregunta.php
    }
    else{
      $Tema == "Demo";
    }
      
    // echo "ID_Pregunta= " . $Pregunta . "<br>";
    // echo "ID_Participante= " . $Participante . "<br>";
    // echo "Tema=" . $Tema . "<br>";
    // echo "ID_prueba=" . $CodigoPrueba . "<br>";

    //verifica si la pregunta ha sido respondida, en caso de no hallar un registro es que no se ha entrado a esa pregunta
    $Consulta="SELECT * FROM respuestas WHERE ID_Participante='$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
    $Recordset= mysqli_query($conexion,$Consulta);
    $VerificarPregunta= mysqli_num_rows($Recordset);
    //mysqli_free_result($conexion); //se libera memoria de la consulta
     // echo "Pregunta respondida= " . $VerificarPregunta . "<br>";
    
  // --------------------------------------------------------------------------------------------
  // --------------------------------------------------------------------------------------------
    //Se corrige la hora que entrega el sistema, para que trabaje con la hora nacional colombiana
    date_default_timezone_set('America/Bogota');
    $HoraServidorPHP =date("Y-m-d  H:i:s");
    // echo "Hora PHP de respuesta" . $HoraServidorPHP . "<br>";

    //se suman 2 minutos al tiempo que esta registrado en la BD como de apertura de una pregunta (HoraPregunta).
    $salto_horario_PHPLocal = +0.0345 * 60 * 60;//se restan 30 minutas, porque el servidor PHP esta adelantado
    $PHPlocal = date("Y-m-d  H:i:s", time()  + $salto_horario_PHPLocal);
    // $PHPlocal= date("Y-m-d  H:i:s");
     // echo "Hora PHP incrementada en 2 min" . $PHPlocal . "<br>";

  // ----------------------------------------------------------------------------------------------
  // ----------------------------------------------------------------------------------------------
  // Si la pregunta no ha sido respondida
    if($VerificarPregunta == 0){ 
        // se suman 2 minutos al tiempo que esta registrado en la BD como de apertura de una pregunta (HoraPregunta).
        //El servidor remoto MySQL tiene 2 horas de atrazo, por eso se añaden -58 minutos mas.
        //El servidor local MySQL tiene la hora correcta, por eso se añaden 2 minutos.    
       $Consulta_2= "SELECT DATE_ADD(NOW(),INTERVAL 2 minute) AS minutos";//este codigo  funciona para añadir tiempo , (6 hour - 3 minute)(en local 2 minutos, en remoto 122 minutos)
        $Recordset_2= mysqli_query($conexion,$Consulta_2);
        $Minutos=  mysqli_fetch_array($Recordset_2);
        $Incremento_2=$Minutos["minutos"];
        // echo $Incremento_2;
      
        //se inserta en la BD la hora en la que el participante entro a una pregunta.
        $insertar= "INSERT INTO respuestas(ID_Pregunta, ID_Participante, ID_PP, Tema, Hora_Pregunta, HoraMaximo) VALUES('$Pregunta', '$Participante', '$CodigoPrueba', '$Tema', '$HoraServidorPHP', '$PHPlocal')";
          mysqli_query($conexion,$insertar) or DIE ('Falló conexión a la base de datos (Temp_2)');
    
    }
    else{
      // echo "Pregunta respondida" , "<br>";
    }
//-----------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------
  //Se busca en la BD la fecha en la que termina el plazo para responder
  $Consulta_0= "SELECT DATE_FORMAT(HoraMaximo, '%Y/%m/%d') FROM respuestas WHERE ID_Participante= '$Participante' AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
  $Recordset_0= mysqli_query($conexion,$Consulta_0); 
  $Fecha= mysqli_fetch_array($Recordset_0);
  $FechaFinPlazo= $Fecha["DATE_FORMAT(HoraMaximo, '%Y/%m/%d')"];//la clave del array que devuelve $Fecha cambia al nombre del campo que devuele la consulta SQL.
  // echo "Fecha culminacion plazo para responder= " . "$FechaFinPlazo". "<br>";

  //Se busca en la BD la hora en la que termina el plazo para responder
  $Consulta_1= "SELECT DATE_FORMAT(HoraMaximo, '%H:%i:%s') FROM respuestas WHERE ID_Participante= '$Participante'AND ID_Pregunta='$Pregunta' AND Tema ='$Tema' AND ID_PP = '$CodigoPrueba'";
  $Recordset_1= mysqli_query($conexion,$Consulta_1); 
  $Hora= mysqli_fetch_array($Recordset_1);
  $HoraFinPlazo= $Hora["DATE_FORMAT(HoraMaximo, '%H:%i:%s')"];//la clave del array que devuelve $Tiempo cambia al nombre del campo que devuele la consulta SQL.
  // echo "Hora culminacion del plazo para responder= " . "$HoraFinPlazo". "<br>";

  //se obtuvo la fecha con el formato aa/mm/dd y se necesita en javascript con formato mm/dd/aa
  $Consulta_2= "SELECT DATE_FORMAT('$FechaFinPlazo', GET_FORMAT(DATE, 'USA'))";
  $Recordset_2= mysqli_query($conexion,$Consulta_2);
  $Formato= mysqli_fetch_array($Recordset_2);
  $FechaFormato= $Formato["DATE_FORMAT('$FechaFinPlazo', GET_FORMAT(DATE, 'USA'))"];//cambia desde formato aa/mm/dd a formato  mm.dd.aa; se necesta en mm/dd/aa

  //se cambian los puntos por barras
  $FechaBarras= str_replace(".", "/", $FechaFormato);
  //echo "Formato fecha deseado " . $FechaBarras . " " . $TiempoFinBloqueo . "<br>";

  $FormatoFinal= $FechaBarras . " " . $HoraFinPlazo;
  // echo "Formato final necesitado= " .  $FormatoFinal . "<br>";
  ?>

<!-- *********************************************************************************************** -->

<script language="JavaScript">
//se construye la funcion que hace el temporizador y lo muestra en pantalla

TargetDate= '<?php echo  $FormatoFinal;?>';//Se pasa la variable php que contiene la fecha y la hora maximo que puede tardar en responder antes de que la pregunta valga cero puntos
BackColor = "";//color de fondo
ForeColor = "";//color de fuente
CountActive = true;
CountStepper = -1;
LeadingZero = true;
//DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds."; Para cuando lleva los dias incluidos
DisplayFormat = "<b class='temp'>%%M%% min %%S%% seg</b>";
FinishMessage = "<p id='Temporizador_3'>Tiempo cumplido,<br> su respuesta no sumará puntos</p>";

//<script language="JavaScript" src="http://scripts.hashemian.com/js/countdown.js">


function calcage(secs, num1, num2) {
  s = ((Math.floor(secs/num1))%num2).toString();
  if (LeadingZero && s.length < 2)
    s = "0" + s;
  return "<b>" + s + "</b>";
}

function CountBack(secs) {
  if (secs < 0) {
    document.getElementById("cntdwn").innerHTML = FinishMessage;
    return;
  }
  DisplayStr = DisplayFormat.replace(/%%D%%/g, calcage(secs,86400,100000));
  DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs,3600,24));
  DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
  DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));

  document.getElementById("cntdwn").innerHTML = DisplayStr;
  if (CountActive)
    setTimeout("CountBack(" + (secs+CountStepper) + ")", SetTimeOutPeriod);
}

function putspan(backcolor, forecolor) {
 document.write("<span id='cntdwn' style='background-color:" + backcolor + 
                "; color:" + forecolor + "'></span>");
}

if (typeof(BackColor)=="undefined")
  BackColor = "white";
if (typeof(ForeColor)=="undefined")
  ForeColor= "black";
if (typeof(TargetDate)=="undefined")
  TargetDate = "12/31/2020 5:00 AM";
if (typeof(DisplayFormat)=="undefined")

  //DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds."; Para cuando lleva los dias incluidos
 DisplayFormat = '%%H%% Hr %%M%% min %%S%% seg';
if (typeof(CountActive)=="undefined")
  CountActive = true;
if (typeof(FinishMessage)=="undefined")
  FinishMessage = "";
if (typeof(CountStepper)!="number")
  CountStepper = -1;
if (typeof(LeadingZero)=="undefined")
  LeadingZero = true;


CountStepper = Math.ceil(CountStepper);
if (CountStepper == 0)
  CountActive = false;
var SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
putspan(BackColor, ForeColor);
var dthen = new Date(TargetDate);
var dnow = new Date();
if(CountStepper>0)
  ddiff = new Date(dnow-dthen);
else
  ddiff = new Date(dthen-dnow);
gsecs = Math.floor(ddiff.valueOf()/1000);
CountBack(gsecs);

</script>
