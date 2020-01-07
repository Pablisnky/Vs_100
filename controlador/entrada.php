<?php
session_start();
	if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
  		header("location:../vista/principal.php");		
	}
	else{//si la varible $_SESSION["Participante"] esta declarada se entra al archivo, con esto se garantiza que el usuario entro por login
		
		//se crea una sesion llamada verifica_pregunta, esta sesión es exigida cuando se entra en ultima.php que entrega el resultado del test, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD, sumando puntos a su cuenta
		$verifica = 2010;  
		$_SESSION["verifica_pregunta"] = $verifica; 
		// echo $_SESSION["verifica_pregunta"];

		include("../conexion/Conexion_BD.php");

		$participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
		// echo "ID_Participante:" .  $participante . "<br>";    
		
		// $Hoy=$_SESSION["FechaHoy"]; //En esta sesion se tiene guardado la fecha de hoy, creada en index.php, se utilizaba para insertar la imagen que se cambio al archivo index.php
		 
		//sesioon creada en Index.php
    	$CapituloHoy = $_SESSION["Capitulo"]; 
		?>
		<!DOCTYPE html>
		<html lang="es">
			<head>
				<title>Reavivados</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas para ganar dinero."/>
				<meta name="keywords" content="juego, preguntas, dinero"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
			   	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 
				<link rel="shortcut icon" type="image/png" href="../images/logo.png">

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
			</head>	
			<body onload="toTop()">
				<header style="position: fixed;  width: 100%; z-index:1">
					<?php include("../vista/modulos/header_usuario.php");?>   		   		
				</header>
				<br><br><br><br><br><br>
				<div>
					<label>Selecciona una categoria test</label>
					<label>El reto del capitulo diario</label>
					<label>El reto de un libro biblico</label>
					<label>Un estudio biblico</label>
				</div>
				<div class="Secundario" onclick="ocultarMenu()">	
					<p class="Inicio_9">¿Estudiaste el capítulo de hoy?</p>
					<p class="Inicio_14"><?php echo $CapituloHoy;?></p> 
					<a class="buttonCuatro a_3" href="registro_Libre.php?Tema=Reavivados">Iniciemos</a>   
					<hr style="border-color: #040652; border-style: solid; border-width: 2px;">
					<p class="Inicio_9 p_6">O si prefieres</p>
					<p class="Inicio_1">Seleccione una tema para un test de 10 preguntas.</p>
							<div class="entrada_5">
								<div class="entrada_4">
									<p class="p_5">Libros del pentateuco</p>
									<a class="nav_7" href="registro_Libre.php?Tema=Génesis">Génesis</a>
									<a class="nav_7" href="registro_Libre.php?Tema=Éxodo">Éxodo</a>
									<input type="text" class="nav_4" readonly="readonly" value="Levítico">
									<input type="text" class="nav_4" readonly="readonly" value="Números">
									<input type="text" class="nav_4" readonly="readonly" value="Deuteronomio">
								</div>
								<div class="entrada_4">
									<p class="p_5">Libros históricos</p>
									<input type="text" class="nav_4" readonly="readonly" value="Josué">
									<input type="text" class="nav_4" readonly="readonly" value="Jueces">
									<input type="text" class="nav_4" readonly="readonly" value="Rut">
									<input type="text" class="nav_4" readonly="readonly" value="1 Samuel">
									<input type="text" class="nav_4" readonly="readonly" value="2 Samuel">
									<input type="text" class="nav_4" readonly="readonly" value="1 Reyes">
									<input type="text" class="nav_4" readonly="readonly" value="2 Reyes">
									<input type="text" class="nav_4" readonly="readonly" value="1 Crónicas">
									<input type="text" class="nav_4" readonly="readonly" value="2 Crónicas">
									<input type="text" class="nav_4" readonly="readonly" value="Esdras">
									<input type="text" class="nav_4" readonly="readonly" value="Nehemías">
									<input type="text" class="nav_4" readonly="readonly" value="Ester">
								</div>
								<div class="entrada_4">
									<p class="p_5">Libros poéticos</p>
									<input type="text" class="nav_4" readonly="readonly" value="Job">
									<input type="text" class="nav_4" readonly="readonly" value="Salmos">
									<input type="text" class="nav_4" readonly="readonly" value="Proverbios">
									<input type="text" class="nav_4" readonly="readonly" value="Eclesiastés">
									<input type="text" class="nav_4" readonly="readonly" value="Venezuela">
									<input type="text" class="nav_4" readonly="readonly" value="Cantar de los cantares">
								</div>
								<div class="entrada_4">
									<p class="p_5">Libros de profetas mayores</p>
									<input type="text" class="nav_4" readonly="readonly" value="Isaías">
									<a class="nav_7" href="registro_Libre.php?Tema=Jeremías">Jeremías</a>
									<input type="text" class="nav_4" readonly="readonly" value="Lamentaciones">
									<input type="text" class="nav_4" readonly="readonly" value="Ezequiel">
									<input type="text" class="nav_4" readonly="readonly" value="Daniel">
								</div>
								<div class="entrada_4">
									<p class="p_5">Libros de profetas menores</p>
									<input type="text" class="nav_4" readonly="readonly" value="Oseas">
									<input type="text" class="nav_4" readonly="readonly" value="Joel">
									<input type="text" class="nav_4" readonly="readonly" value="Amós">
									<input type="text" class="nav_4" readonly="readonly" value="Abdías">
									<input type="text" class="nav_4" readonly="readonly" value="Jonás">
									<input type="text" class="nav_4" readonly="readonly" value="Miqueas">
									<input type="text" class="nav_4" readonly="readonly" value="Nahúm">
									<input type="text" class="nav_4" readonly="readonly" value="Habacuc">
									<input type="text" class="nav_4" readonly="readonly" value="Sofonías">
									<input type="text" class="nav_4" readonly="readonly" value="Hageo">
									<input type="text" class="nav_4" readonly="readonly" value="Zacarías">
									<input type="text" class="nav_4" readonly="readonly" value="Malaquías">
								</div>
								<div class="entrada_4 ocultar">
									<p class="p_5">Libros de evangelios</p>
									<input type="text" class="nav_4" readonly="readonly" value="Mateo">
									<input type="text" class="nav_4" readonly="readonly" value="Marcos">
									<input type="text" class="nav_4" readonly="readonly" value="Lucas">
									<input type="text" class="nav_4" readonly="readonly" value="Juan">
								</div>
								<div class="entrada_4 ocultar">
									<p class="p_5">Historia de la Iglesia Primitiva</p>
									<input type="text" class="nav_4" readonly="readonly" value="Hechos">
								</div>
								<div class="entrada_4 ocultar">
									<p class="p_5">Epístolas del apóstol Pablo</p>
									<input type="text" class="nav_4" readonly="readonly" value="Romanos">
									<input type="text" class="nav_4" readonly="readonly" value="1 Corintios">
									<input type="text" class="nav_4" readonly="readonly" value="2 Corintios">
									<input type="text" class="nav_4" readonly="readonly" value="Gálatas">
									<input type="text" class="nav_4" readonly="readonly" value="Éfesios">
									<input type="text" class="nav_4" readonly="readonly" value="Filipenses">
									<input type="text" class="nav_4" readonly="readonly" value="Colosenses">
									<input type="text" class="nav_4" readonly="readonly" value="1 Tesalonicenses">
									<input type="text" class="nav_4" readonly="readonly" value="2 Tesalonicenses">
									<input type="text" class="nav_4" readonly="readonly" value="1 Timoteo">
									<input type="text" class="nav_4" readonly="readonly" value="2 Timoteo">
									<input type="text" class="nav_4" readonly="readonly" value="Tito">
									<input type="text" class="nav_4" readonly="readonly" value="Filemón">
								</div>
								<div class="entrada_4 ocultar">
									<p class="p_5">Epístolas generales</p>
									<input type="text" class="nav_4" readonly="readonly" value="Hebreos">
									<input type="text" class="nav_4" readonly="readonly" value="Santiago">
									<input type="text" class="nav_4" readonly="readonly" value="1 Pedro">
									<input type="text" class="nav_4" readonly="readonly" value="2 Pedro">
									<input type="text" class="nav_4" readonly="readonly" value="1 Juan">
									<input type="text" class="nav_4" readonly="readonly" value="2 Juan">
									<input type="text" class="nav_4" readonly="readonly" value="3 Juan">
									<input type="text" class="nav_4" readonly="readonly" value="Judas">
								</div>
								<div class="entrada_4 ocultar">
									<p class="p_5">Apocalipsis</p>
									<input type="text" class="nav_4" readonly="readonly" value="Apocalipsis">
								</div>
							</div>
							<div class="entrada_5 ocultar_1">
								<div class="entrada_4">
									<p class="p_5">Libros de evangelios</p>
									<input type="text" class="nav_4" readonly="readonly" value="Mateo">
									<input type="text" class="nav_4" readonly="readonly" value="Marcos">
									<input type="text" class="nav_4" readonly="readonly" value="Lucas">
									<input type="text" class="nav_4" readonly="readonly" value="Juan">
								</div>
								<div class="entrada_4">
									<p class="p_5">Historia de la Iglesia Primitiva</p>
									<input type="text" class="nav_4" readonly="readonly" value="Hechos">
								</div>
								<div class="entrada_4">
									<p class="p_5">Epístolas del apóstol Pablo</p>
									<input type="text" class="nav_4" readonly="readonly" value="Romanos">
									<input type="text" class="nav_4" readonly="readonly" value="1 Corintios">
									<input type="text" class="nav_4" readonly="readonly" value="2 Corintios">
									<input type="text" class="nav_4" readonly="readonly" value="Gálatas">
									<input type="text" class="nav_4" readonly="readonly" value="Éfesios">
									<input type="text" class="nav_4" readonly="readonly" value="Filipenses">
									<input type="text" class="nav_4" readonly="readonly" value="Colosenses">
									<input type="text" class="nav_4" readonly="readonly" value="1 Tesalonicenses">
									<input type="text" class="nav_4" readonly="readonly" value="2 Tesalonicenses">
									<input type="text" class="nav_4" readonly="readonly" value="1 Timoteo">
									<input type="text" class="nav_4" readonly="readonly" value="2 Timoteo">
									<input type="text" class="nav_4" readonly="readonly" value="Tito">
									<input type="text" class="nav_4" readonly="readonly" value="Filemón">
								</div>
								<div class="entrada_4">
									<p class="p_5">Epístolas generales</p>
									<input type="text" class="nav_4" readonly="readonly" value="Hebreos">
									<input type="text" class="nav_4" readonly="readonly" value="Santiago">
									<input type="text" class="nav_4" readonly="readonly" value="1 Pedro">
									<input type="text" class="nav_4" readonly="readonly" value="2 Pedro">
									<input type="text" class="nav_4" readonly="readonly" value="1 Juan">
									<input type="text" class="nav_4" readonly="readonly" value="2 Juan">
									<input type="text" class="nav_4" readonly="readonly" value="3 Juan">
									<input type="text" class="nav_4" readonly="readonly" value="Judas">
								</div>
								<div class="entrada_4">
									<p class="p_5">Apocalipsis</p>
									<input type="text" class="nav_4" readonly="readonly" value="Apocalipsis">
								</div>
							</div>
							<a class="cerrar" href="cerrarSesion.php">Cerrar Sesión</a>
				</div>
			    <footer>
			        <?php include("../vista/modulos/footer.php");?>
			    </footer>
			</body>
		</html>   <?php
	}  ?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////// -->

<script type="text/javascript">
    function SeleccionarBiblia(){//esta funcion es llamada desde este archivo                        
        window.open("clasificacion_Tema.php?Categoria=biblia","anexo","width=800px,height=600px,left=300px");  
    }
    function SeleccionarColombia(){//esta funcion es llamada desde este archivo
        window.open("clasificacion_Tema.php?Categoria=colombia","anexo","width=800px,height=600px,left=300px");  
    }
    function SeleccionarFamilia(){//esta funcion es llamada desde este archivo
        window.open("clasificacion_Tema.php?Categoria=familia","anexo","width=800px,height=600px,left=300px");  
    }
    function SeleccionarVenezuela(){//esta funcion es llamada desde este archivo
        window.open("clasificacion_Tema.php?Categoria=venezuela","anexo","width=800px,height=600px,left=300px");  
    }
    function SeleccionarMusica(){//esta funcion es llamada desde este archivo
        window.open("clasificacion_Tema.php?Categoria=musica","anexo","width=800px,height=600px,left=300px");  
    }   
</script>