<?php
    session_start();

    if(empty($_GET["fecha"])){
        $Participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
        echo "ID_Participante:" .  $Participante . "<br>";

        //Se genera un numero aleatorio para insertarlo como Nº de deposito
        mt_srand (time());
        $Aleatorio = mt_rand(1000000,999999999);
        // echo "Aleatorio= " . $Aleatorio . "<br>";

        //lo dificil es generar un deposito diferente por prueba y lograr insertar la fecha correspondiente a la prueba.
        
        include("../conexion/Conexion_BD.php");

        //Se consulta en que pruebas no esta inscrito el participante
            $Consulta_1= "SELECT ID_Participante, Fecha FROM pruebas_reavivados WHERE ID_Participante !='$Participante' ";
            $Recordset_1 = mysqli_query($conexion, $Consulta_1);
            $Resultado_1 = mysqli_fetch_array($Recordset_1);
            $Fecha= $Resultado_1['Fecha'];
            while($Fecha){
                echo "<a href='inscripcionRPSP.php?fecha=$Fecha'>$Fecha</a>"  . "<br>";
            }
    }
    else{

    }

echo "Excelente, tienes todo un reto biblico por delante, en la página de inicio de tu cuenta ya estan cargadas las pruebas seleccionadas del programa Reavivado por su palabra que tienes por responder" . "<br>";
echo "Anda con calma, disfruta y actua según lo aprendido en tus pruebas" . "<br>";

//Se inscribe al participante en la prueba que el selecciono
    // $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba', '$Categoria', '$Tema', '$Aleatorio',1 ,1 , NOW())" ;
    // mysqli_query($conexion, $Insertar) or DIE ('Falló conexión a la base de datos');

?>

<label class="bloqueo" onclick="cerrar()">Inicio</label> 

<script type="text/javascript">
    function cerrar(){
        // Se recarga la ventana padre
        window.opener.location.reload();
        // se cierra la ventana POPUP
        this.window.close();
    }
</script>