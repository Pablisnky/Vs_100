<?php 
	session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	include("../conexion/Conexion_BD.php");

	$Tema= $_GET["Tema"];//recibe el tema de la prueba desde puntaje.js
    // echo "Tema= " . $Tema . "<br>";
    $Categoria= $_GET["Categoria"];//recibe el tema de la prueba desde puntaje.js
    // echo "Categoria= " . $Categoria . "<br>";

    $Participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el ID del participante, sesion creada en validarSesion.php
    // echo "ID_Participante= " . $Participante . "<br>";

    switch($Tema){
        case 'Genesis': 
        	  $ID_Prueba = 1;
       	break;
        case 'Exodo': 
        	  $ID_Prueba = 2;
       	break;
        case 'Jeremias': 
        	  $ID_Prueba = 3;
       	break;
    }
    //Se genera un numero aleatorio para insertarlo como Nº de deposito
    mt_srand (time());
    $Aleatorio = mt_rand(1000000,999999999);
    // echo "Aleatorio= " . $Aleatorio . "<br>";

	//Se activa la prueba en la BD 
    $Insertar= "INSERT INTO participantes_pruebas(ID_Participante, ID_Prueba, Categoria, Tema, Deposito, Prueba_Pagada, Prueba_Activa, Fecha_pago) VALUES('$Participante', '$ID_Prueba', '$Categoria', '$Tema', '$Aleatorio',1 ,1 , NOW())" ;
    mysqli_query($conexion, $Insertar) or DIE ('Falló conexión a la base de datos');	

    //Se consulta el codigo de la prueba
    $Consulta= "SELECT ID_PP FROM participantes_pruebas WHERE ID_Participante= '$Participante' AND Tema= '$Tema' AND Prueba_Cerrada= 0";
	$Recordset = mysqli_query($conexion, $Consulta);
	$Resultado= mysqli_fetch_array($Recordset); 
	$CodigoID_PP= $Resultado["ID_PP"];        
?>
<script type="text/javascript">
    // Se recarga la ventana padre
    window.opener.location.reload();
    // se cierra la vnetana POPUP
    this.window.close();
</script>