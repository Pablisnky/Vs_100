<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

    //Muestra los errores en local e impide mostrarlos en remoto
	include("../modulos/muestraError.php");

 	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a principal.php
    	//con esto se garantiza que el usuario entro por login

  		header("location:principal.php");
	}
	else{//se entra en esta seccion porque se tiene almacenado el ID_Participante en una variable SESSION
		
		include("../conexion/Conexion_BD.php");

		$Tema= $_GET["tema"]; //Se recibe desde entrada.php
		//  echo "Tema: " . $Tema . "<br>";

		$ID_PP = $_GET["ID_PP"]; //Se recibe desde entrada.php
		//  echo "ID_PP: " . $ID_PP . "<br>";

		$Fecha = $_GET["fecha"]; //Se recibe desde entrada.php
		//  echo "Fecha: " . $Fecha . "<br>";

		// Se consulta si es una prueba libre o una de pago
		$Consulta_7= "SELECT Deposito FROM participantes_pruebas WHERE Deposito= 'Exonerado' AND Tema = '$Tema'";
		$Recordset_7 = mysqli_query($conexion, $Consulta_7);
		$Prueba= mysqli_fetch_array($Recordset_7);
		if($Prueba["Deposito"] == "Exonerado"){
			$ID_Prueba = 1;
		}
		else{
			$ID_Prueba= $_GET["ID_Prueba"]; //Se recibe desde entrada.php
			// echo "ID_Prueba: " . $ID_Prueba . "<br>";
		}
		$_SESSION["Tema"]= $Tema;//se crea una nueva sesion, en esta sesion se guardará el tema de la prueba
		// echo "Sesion con el tema: " . $_SESSION["Tema"] . "<br>";

		$_SESSION["codigoPrueba"]= $ID_PP;//se crea una nueva sesion, en esta sesion se guardará el codigo de la prueba
		// echo "Sesion con ID_PP: " . $_SESSION["codigoPrueba"] . "<br>";

		$_SESSION["ID_Prueba"]= $ID_Prueba;//se crea una nueva sesion, en esta sesion se guardará el ID_Prueba
		// echo "Sesion con el ID_Prueba: " . $_SESSION["ID_Prueba"] . "<br>";

	    $participante= $_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
		// echo "ID_Participante: " . $participante . "<br>";
		
		$CapituloHoy = $_SESSION["Capitulo"];//en esta sesion se tiene guardado el nombre del capitulo estudiado, sesion creada en index.php
		// echo "Capitulo de hoy: " . $CapituloHoy . "<br>"; 

		//Se consulta en la BD que preguntas a respondido para saber el Nº de la pregunta a responder
		//Consulta realizada para obtener la cantidad de respuestas correctas y posicionar al participante en la que le corresponde
		$Consulta="SELECT * FROM respuestas WHERE ID_Participante='$participante' AND Correcto='1' AND Tema='$Tema' AND ID_PP ='$ID_PP'";
		$Recordset = mysqli_query($conexion, $Consulta) or die (mysqli_error($conexion));
		$Puntaje= mysqli_num_rows($Recordset);//se suman los registros que tiene la consulta realizada.
		//   echo "Puntos: " . $Puntaje;
		if($Tema == "Reavivados"){
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
		}
		else{
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
			else if ($Puntaje==5){
				$Num_Pregunta= 6;// definiendo una variable para identificar el número de la pregunta;
			}
			else if ($Puntaje==6){
				$Num_Pregunta= 7;// definiendo una variable para identificar el número de la pregunta;
			}
			else if ($Puntaje==7){
				$Num_Pregunta= 8;// definiendo una variable para identificar el número de la pregunta;
			}
			else if ($Puntaje==8){
				$Num_Pregunta= 9;// definiendo una variable para identificar el número de la pregunta;
			}
			else if ($Puntaje==9){
				$Num_Pregunta= 10;// definiendo una variable para identificar el número de la pregunta;
			}
			else{
				$Num_Pregunta= "Resultados";// definiendo una variable para identificar el número de la pregunta;
			}
		}

	    $_SESSION["Pregunta"] = $Num_Pregunta;//se crea la SESION pregunta, necesaria en Temporizador_2
	    // echo "Pregunta Nº " . $_SESSION["Pregunta"];
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Reavivados - Pregunta Nº <?php echo $Num_Pregunta;?></title>

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
				<link rel="stylesheet" type="text/css" href="../iconos/icono_siguiente/style_siguiente.css"/> <!--galeria icomoon.io  -->
				<link rel="stylesheet" type="text/css" href="../iconos/icono_repetir/style_repetir.css"/> <!--galeria icomoon.io  -->
		
				<script src="../javascript/puntaje.js"></script>
				<script src="../javascript/bloqueo.js"></script>
				<script src="../javascript/Funciones_varias.js"></script>
				<script src="../javascript/Funciones_Ajax.js"></script>
				<script language="JavaScript">//impide regresar a esta pagina nuevamente con el boton de atras
					javascript:window.history.forward(1)
				</script>
			</head>
			<body onload="llamar_puntaje()"><!--funcion Ajax en puntaje.js que accede a BD para sumar el puntaje del participante -->
				<input type="text" class="ocultar" id="Tema" value="<?php echo $Tema;?>"><!-- se utiliza para enviar a puntaje.js-->
				<input type="text" class="ocultar" id="ID_Pregunta" value= "<?php echo $Num_Pregunta;?>">
				<input type="text" class="ocultar" id="ID_Participante" value="<?php echo $participante;?>"><!-- se utiliza para enviar a puntaje.js-->
				<input type="text" class="ocultar" id="ID_PP" value="<?php echo $ID_PP;?>"><!-- se utiliza para enviar a puntaje.js-->
				<input type="text" class="ocultar" id="Pregunta_Num" value="<?php echo $Num_Pregunta;?>"><!-- se utiliza para enviar a puntaje.js-->

				<div class="Secundario">
					<div class="encabezado">
						<h1 class="anula">Reavivados</h1>
					</div>
					<?php
						if($Tema == "Reavivados"){
							echo "<span class='Inicio_14 Inicio_17'>$CapituloHoy</span>";
							echo "<hr class='hr_1'>";
							if($Puntaje<5){ //No se muestra si se encuentra en la ultima pregunta  ?>
								<h4>Pregunta Nº <?php echo $Num_Pregunta;?></h4> <?php
							}
						}
						else{
							echo "<span class='Inicio_14  Inicio_17'>$Tema</span>";
							echo "<hr class='hr_1'>";
							if($Puntaje<10){ //No se muestra si se encuentra en la ultima pregunta  ?>
								<h4>Pregunta Nº <?php echo $Num_Pregunta;?></h4> <?php
							}
						}
					?>
					<div class="encabezado_2">
						<div id="mostrarPuntos"></div><!-- recibe el puntaje y el nombre del participante por medio de llamar_puntaje() llamada al cargar el documento desde sumaPuntaje.php-->
					</div>
					<div>
						<?php
							switch($Tema){
			                    case "Exodo":
									include("../tema/biblia/exodo/posicionExodo.php");
									if($Puntaje<10){
										include("../audio/FondoBiblia_1.php");
									}
			                    break;
			                    case "Genesis":
			                       	include("../tema/biblia/genesis/posicionGenesis.php");
									if($Puntaje<10){
										include("../audio/FondoBiblia_1.php");
								    }
			                    break; 
			                    case "Jeremias":
			                       	include("../tema/biblia/jeremias/posicionJeremias.php");
									if($Puntaje<10){
										include("../audio/FondoBiblia_1.php");
								    }
			                    break;
			                    case "Doctrina":
			                       	include("../tema/biblia/doctrina/posicionDoctrina.php");
									if($Puntaje<10){
										include("../audio/FondoBiblia_1.php");
								    }
			                    break;
			                    case "Reavivados":
			                        include("../tema/biblia/ReavivadosPalabra/fecha.php");
									
			                    break;
							}	
						?>
					</div>
					<?php
					if($Tema == "Reavivados"){
						if($Puntaje<5){//No se muestra si se encuentra en la ultima pregunta de reavivados ?>
							<div class="respuestaPreguntas" id="RespuestaPreguntas"><!--con el id recibe informacion desde ajax-->
								<div id="Temporizador_2">
									<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta, el tiempo maximo para responder y se muestra un temporizador en pantalla-->
										<?php include("../controlador/Temporizador_2.php");?>
								</div>
							</div>
							<div class="contenedor_7">
								<a style="color:white !important;" href="../controlador/entrada.php">Inicio</a>
							</div>
							<div class="contenedor_6" id="Flecha">
								<a href='javascript:history.go(0)'><span class="icon-arrow-right parpadea"  title="Siguiente"></span></a>
							</div>
							<?php
						}
					}
					else{
						if($Puntaje<10){ //No se muestra si se encuentra en la ultima pregunta  ?>
							<div class="respuestaPreguntas" id="RespuestaPreguntas"><!--con el id recibe informacion desde ajax-->
								<div id="Temporizador_2">
									<!--con este include se inserta la hora en la BD a la cual se abrio la pregunta, el tiempo maximo para responder y se muestra un temporizador en pantalla-->
										<?php include("../controlador/Temporizador_2.php");?>
								</div>
							</div>
							<div class="contenedor_7">
								<a style="color:white !important;" href="../controlador/entrada.php">Inicio</a>
							</div>
							<div class="contenedor_6" id="Flecha">
								<a  href='javascript:history.go(0)'><span class="icon-arrow-right parpadea" title="Siguiente"></span></a>
							</div>
							<?php
						}
					}  ?>
				</div>
			</body>
		</html>			
		<?php
	}	?>