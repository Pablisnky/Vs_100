<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	
    if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
  		header("location:../principal.php");
  		// echo "La sesion no fue creada";			
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
		include("../conexion/Conexion_BD.php");

		$participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
        // echo "ID_Participante:" .  $participante . "<br>";

        $ParticipanteNombre=$_SESSION["Nombre_Participante"];//en esta sesion se tiene guardado el nombre del participante, sesion creada en validarSesion.php
        // echo "Nombre Participante:" .  $ParticipanteNombre . "<br>";
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Vs_100 Inicio</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas para ganar dinero."/>
				<meta name="keywords" content="juego, preguntas, dinero"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
			   	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
			</head>	
			<body>
				<div class="Secundario">
					<header>
				   		<h1 style="cursor: default;">Vs_100.com</h1>
				   		<input class="input_1" type="text" name="nombre" value="<?php echo $ParticipanteNombre;?>">		   		
					</header>
					<section>
						<p class="Inicio_3">Toma una prueba ahora mismo, ganar no es cuestión de azar, es cuestión de saber.</p>	<?php
						//Se verifica si el participante tiene pruebas pendientes por responder
						$Consulta_0="SELECT Tema, ID_PP FROM participantes_pruebas WHERE ID_Participante='$participante' AND (Prueba_Activa = 1 AND Prueba_Pagada = 1 AND Prueba_Cerrada = 0 )";
						$Recordset_0 = mysqli_query($conexion, $Consulta_0); 
						if(mysqli_num_rows($Recordset_0) != 0){  ?>
							<div id="EntradaParticipante_1" class="nueva_Prueba">
								<p class="Inicio_4">Tienes una prueba pendiente por responder sobre el tema:</p>

								<?php
								// Se busca que pruebas tiene pendiente el participante
								while($Registro_2= mysqli_fetch_array($Recordset_0)){ 
									// echo "el tema de la prueba es: " . $Registro_2['Tema'] . "<br>"; 
									$Tema= $Registro_2['Tema'];
									// echo "el codigo de la prueba es: " . $Registro_2['ID_PP'] . "<br>";
									$Codigo= $Registro_2["ID_PP"];
									//se verifica que pruebas tiene pendientes o pruebas activas
									// $Pendiente= $Registro_2[0]; //campo "ID_PP" en tabla participantes_pruebas 
									// $Activa= $Participante[14]; //campo "activa" en tabla participantes_pruebas 
									// echo "Prueva pendiente= " . $Pendiente 
									// echo "Prueva Activa= " . $Activa ."<br>";   ?>
									<div style="background-color: ; text-align: center; margin-top: 3%;">
										<a href="seleccionTema.php?seleccion=<?php echo $Tema?>&codigo=<?php echo $Codigo?>"><?php echo $Registro_2["Tema"];?></a>
										<p style="display: inline-block;"> | Código</p>
										<a style="color: black" href="seleccionTema.php?seleccion=<?php echo $Tema?>&codigo=<?php echo $Codigo?>"><?php echo $Registro_2["ID_PP"];?></a>
									</div>
									<?php
								}	?>
							</div>	
							<?php
						}   
						  ?>
							<div id="EntradaParticipante" class="entradaParticipante">			
								<div class="entrada">
									<p class="entrada_1">Participación por 3.000 $</p>
									<p class="entrada_2">Premio minimo 50.000 $ al inscribirse 20 participantes</p>
									<p class="entrada_2">Premio maximo 260.000 $ al inscribirse 100 participantes</p>
								</div>
								<div class="entrada">
									<p class="entrada_1">Participación por 10.000 $</p>
									<p class="entrada_2">Premio minimo 170.000 $ al inscribirse 20 participantes</p>
									<p class="entrada_2">Premio maximo 800.000 $ al inscribirse 100 participantes</p>
								</div>
							</div>
							<br>
							<a class="nav_7" href="../vista/informacion_Pago.php">Datos bancarios para depositos.</a>
							<br>
							<p class="nav_2" >Seleccione un tema para su prueba.</p>
							<div class="entrada_5">
								<div class="entrada_4 ">
									<p class="nav_7">Ingenieria civil</p>
									<p class="nav_7">Ingenieria Mecánica</p>
									<p class="nav_7">Salud</p>
									<p class="nav_7">Matematica</p>
									<p class="nav_7">Geografia</p>
									<p class="nav_7">Cultura general</p>
								</div>
								<div class="entrada_4">
									<p class="nav_7">Arte</p>
									<p class="nav_7">Musica clasica</p>	
									<p class="nav_7">Musica general</p>	
									<p class="nav_7" href="registro_Pago.php?Tema=Programacion">Programación</p>
									<a class="nav_7" href="registro_Pago.php?Tema=Cristianismo">Cristianismo</a>
									<a class="nav_7" href="registro_Pago.php?Tema=Venezuela">Venezuela</a>
								</div>
							</div>
							<a class="nav_7" href="cerrarSesion.php" >Cerrar Sesión</a>
					</section>
				</div>
			</body>
		</html>   <?php
	}  ?>
