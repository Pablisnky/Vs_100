<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

    // //Muestra los errores en local e impide mostrarlos en remoto
    // include("../modulos/muestraError.php");

 	if(!isset($_SESSION["ID_ParticipanteTrivia"])){//sino hay nada almacenado en la variable superglobal devuelve a principal.php
     	//con esto se garantiza que el usuario entro por login

  		header("location:principal.php");			
	}
	else{//se entra en esta seccion porque se tiene almacenado el ID_Participante en una variable SESSION

		include("../conexion/Conexion_BD.php");

		$ID_ParticipanteTrivia = $_SESSION["ID_ParticipanteTrivia"];//en esta sesion se tiene guardado el ID del participante, sesion creada en recibe_Trivia.php.php
		// echo "ID_ParticipanteTrivia= " . $ID_ParticipanteTrivia . "<br>";

        //en esta sesion se tiene guardado el ID_PTD (PruebaTriviaDiaria) sesion creada en recibe_Trivia.php.php
		$ID_PruebaTrivia= $_SESSION["ID_PTD"];
		// echo "ID_PTD= " . $ID_PruebaTrivia . "<br>";
		
		//Se consulta en la BD que preguntas a respondido para saber el Nº de la pregunta a responder
		//Consulta realizada para obtener la cantidad de respuestas correctas y posicionar al participante en la que le corresponde
		$Consulta="SELECT * FROM respuestas_trivias WHERE ID_ParticipanteTrivia= '$ID_ParticipanteTrivia' AND Correcto= '1' AND ID_PTD ='$ID_PruebaTrivia'";
		$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion)); 
		$Puntaje= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
		//echo "Puntos: " . $Puntaje;
		if ($Puntaje==0){
			$Num_Pregunta= 1;// definiendo una variable para identificar el número de la pregunta;
		}
		else if ($Puntaje==1){
			$Num_Pregunta= 2;// definiendo una variable para identificar el número de la pregunta;
		}
		else if ($Puntaje==2){
			$Num_Pregunta= 3;// definiendo una variable para identificar el número de la pregunta;
		}
		else if ($Puntaje==3){
			$Num_Pregunta= 4;// definiendo una variable para identificar el número de la pregunta;
		}
		else if ($Puntaje==4){
			$Num_Pregunta= 5;// definiendo una variable para identificar el número de la pregunta;
		}
		else{
			$Num_Pregunta= "Resultados";// definiendo una variable para identificar el número de la pregunta;
		}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Versus_20 - <?php echo $Num_Pregunta;?></title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas biblicas."/>
		<meta name="keywords" content="citas biblicas, biblia"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="
        ../css/MediaQuery_EstilosVs_100.css">
   		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

		<script src="../javascript/puntaje.js"></script>
		<script src="../javascript/bloqueo.js"></script>
		<script src="../javascript/Funciones_varias.js"></script>
		<script src="../javascript/Funciones_Ajax.js"></script>
		<script language="JavaScript">
			//impide regresar a esta pagina nuevamente con el boton de atras 
			javascript:window.history.forward(1)
		</script>
   	</head>	
	<body onload="llamar_puntaje_trivia()">
		<input type="text" class="ocultar" id="ID_Par_Tri" value="<?php echo $ID_ParticipanteTrivia;?>"><!-- se utiliza para enviar a Funciones_Ajax.js-->
		<input type="text" class="ocultar" id="ID_PTD" value="<?php echo $ID_PruebaTrivia;?>"><!-- se utiliza para enviar a Funciones_Ajax.js-->
		<input type="text" class="ocultar" id="ID_Pregunta" value="<?php echo $Num_Pregunta;?>"><!-- se utiliza para enviar a Funciones_Ajax.js-->
		
		<div class="Secundario">
			<div class="encabezado">
	    		<h1 class="anula">Versus_20</h1>
	    	</div>
	    		<?php
					if($Puntaje<5){//No se muestra si se encuentra en la ultima pregunta?>
						<h4>Pregunta Nº <?php echo $Num_Pregunta;?>/5</h4> <?php
					}
				?>
	    	<div class="encabezado_2">
			    <div id="mostrarPuntosTrivia"></div><!-- recibe el puntaje y el nombre del participante por medio de llamar_puntajeTrivia() llamada al cargar el documento desde sumaPuntajeTrivia.php-->
			</div>
			<div>
				<?php
					//se posiciona segun la pregunta que corresponda
                    include("../tema/trivia/t_1/posicionTrivia_01.php"); 
                ?>
			</div>		
			<?php
				if($Puntaje<5){ //No se muestra si se encuentra en la ultima pregunta  ?>	
					<div class="respuestaPreguntas" id="RespuestaPreguntas">
						<div id="Temporizador_Trivia">
							<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta, el tiempo maximo para responder y se muestra un temporizador en pantalla-->
							<?php include("../controlador/Temporizador_Trivia.php");?>
						</div>
					</div>	
					<nav class="navegacion_1">
						<div><a class="nav_10" href="../controlador/entrada.php">Inicio</a></div>
						<div><a class="nav_10" href="../controlador/cerrarSesion.php">Cerrar Sesión</a></div>
						<div><a class="nav_10" href='javascript:history.go(0)'>Siguiente</a></div>
					</nav>  <?php
				}  ?>
		</div>		
	</body>
</html>

	<?php
		}
	?>