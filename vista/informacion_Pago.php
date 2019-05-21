<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	
    if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
    
  		header("location:../index.php");			
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
	//se crea la sesión verifica, para validar que el participante envio los datos desde este formulario
	$corroborar = 44;  
	$_SESSION["verifica"] = $corroborar;
?>
		
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Pagos</title>

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
		   		<h1 style="cursor: default;">Vs 100.com</h1>
			</header>
			<section style="background-color:;">
				<?php
					include("../conexion/Conexion_BD.php");

				    $participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
		            // echo "ID_Participante:" .  $participante . "<br>";
					   				
				   	//Consulta realizada para obtener el nombre del participante y mostrarlo en pantalla
				    $Consulta_0="SELECT * FROM participante WHERE ID_Participante='$participante'";
					$Recordset_0 = mysqli_query($conexion,$Consulta_0);
					$Participante= mysqli_fetch_row($Recordset_0);
					// echo "nombre Participante:" . $Participante[1];				 
				?>
						
				<div id="entrada_1">
					<!--Se muestra en pantalla el nombre del participante-->
					<?php echo "<span class='span_0'>$Participante[1]</span>" ?>
				</div>
			</section>
			<section class="entrada_5">
				<p>Información de pago.</p>
				<br>
				<div class="RegistroPago">
					<div style="background-color: ; margin: auto; width: 40%;">
						<p>Cuenta Nº:</p>
						<p>A nombre de:</p>
						<p>RUT:</p>
						<p></p>
						<a class="nav_7" href="javascript:history.go(-1)" style="margin-top: 6%;">Regresar</a>
					</div>
				</div>
				<a class="nav_7" href="cerrarSesion.php" >Cerrar Sesión</a>
			</section>
		</div>
	</body>
</html>
<?php } ?>