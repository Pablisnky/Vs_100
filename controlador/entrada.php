<?php
session_start();//se inicia sesion para llamar a la $_SESSION que contiene el ID_Participante, creada en validarSesion.php 
	if(!isset($_SESSION["ID_Participante"])){//si la variable $_SESSION["Participante"] no esta declarada devuelve a principal.php porque el participante no ha realizado el login
  		// echo "La sesion no fue creada";
  		header("location:../vista/principal.php");		
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
				<title>Versus_20 Inicio</title>

				<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
				<meta name="description" content="Juego de preguntas para ganar dinero."/>
				<meta name="keywords" content="juego, preguntas, dinero"/>
				<meta name="author" content="Pablo Cabeza"/>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

				<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
				<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css"> 
			   	<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'> 

				<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
			</head>	
			<body onload="toTop()">
					<header style="position: fixed;  width: 100%; margin-top:; ">
				   		<input class="input_1" type="text" name="nombre" value="<?php echo $ParticipanteNombre;?>">
						<?php include("../vista/modulos/header_usuario.html");?>   		   		
					</header>
					<br><br><br><br><br><br>
				<div class="Secundario"  onclick="ocultarMenu()">
						<p class="Inicio_9">Tus conocimientos valen, ganar no es cuestión de suerte.</p>	
						<?php
						//Se verifica si el participante tiene pruebas pendientes por responder
						$Consulta_0="SELECT ID_PP,ID_Prueba,Categoria,Tema FROM participantes_pruebas WHERE ID_Participante='$participante' AND (Prueba_Activa = 1 AND Prueba_Pagada = 1 AND Prueba_Cerrada = 0 )";
						$Recordset_0 = mysqli_query($conexion, $Consulta_0); 
						if(mysqli_num_rows($Recordset_0) != 0){  ?>
							<div id="EntradaParticipante_1" class="nueva_Prueba">
								<p class="Inicio_4">Tienes pruebas pendientes por responder sobre el tema:</p>

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
									// echo "Prueva Activa= " . $Activa ."<br>";  
									$ID_Prueba= $Registro_2["ID_Prueba"]; 
									// echo "ID_Prueba= " . $ID_Prueba ."<br>"; 
									$Categoria= $Registro_2["Categoria"]; 
									// echo "ID_Prueba= " . $ID_Prueba ."<br>";

									 ?>
									<div style="background-color: ; text-align: center; margin-top: 3%;">
										<a href="../vista/pregunta.php?seleccion=<?php echo $Tema?>&codigo=<?php echo $Codigo?>&ID_Prueba=<?php echo $ID_Prueba;?>&Categoria=<?php echo $Categoria;?>"><?php echo $Registro_2["Categoria"] . "_" . $Registro_2["Tema"];?></a>
										<p class="entrada_6"> | Código</p>
										<p class="entrada_6"><?php echo $Registro_2["ID_PP"];?></p>
									</div>
									<?php
								}	?>
							</div>	
							<?php
						}   
						  ?>
							<p class="entrada_1">Participación: $ 3.000 (COP)</p>
							<div class="Premio" >
								<div id="EntradaParticipante" class="entradaParticipante">
									<p class="entrada_2">1<sup class="super_in">er</sup> Premio</p>  
									<p class="entrada_3">$ 40.000 (COP)</p>
								</div>
								<div id="EntradaParticipante" class="entradaParticipante">
									<p class="entrada_2">2<sup class="super_in">do</sup> Premio</p>  
									<p class="entrada_3">$ 7.000 (COP)</p>
								</div>
								<div id="EntradaParticipante" class="entradaParticipante">
									<p class="entrada_2">3<sup class="super_in">er</sup> Premio</p>  
									<p class="entrada_3">$ 3.000 (COP)</p>
								</div>
							</div>
							<p class="nav_2" >Seleccione una categoría para su prueba de 10 preguntas.</p>
							<div class="entrada_5">
								<div class="entrada_4 ">
									<input type="text" class="nav_7" readonly="readonly" value="Ingenieria civil" onclick="SeleccionarIngenieriaCivil()">
									<input type="text" class="nav_7" readonly="readonly" value="Ingenieria Mecánica" onclick="SeleccionarIngenieriaMecánica()">
									<input type="text" class="nav_7" readonly="readonly" value="Familia" onclick="SeleccionarFamilia()">
									<input type="text" class="nav_7" readonly="readonly" value="Matematica" onclick="SeleccionarMatematica()">
									<input type="text" class="nav_7" readonly="readonly" value="Geografia" onclick="SeleccionarGeografia()">
									<input type="text" class="nav_7" readonly="readonly" value="Cultura general" onclick="SeleccionarCulturaGeneral()">
									<input type="text" class="nav_7" readonly="readonly" value="Colombia" onclick="SeleccionarColombia()">
								</div>
								<div class="entrada_4">
									<input type="text" class="nav_7" readonly="readonly" value="Arte" onclick="SeleccionarArte()">
									<input type="text" class="nav_7" readonly="readonly" value="Deporte" onclick="SeleccionarDeporte()">
									<input type="text" class="nav_7" readonly="readonly" value="Musica" onclick="SeleccionarMusica()">
									<input type="text" class="nav_7" readonly="readonly" value="Programación" onclick="SeleccionarProgramación()">
									<input type="text" class="nav_7" readonly="readonly" value="Venezuela" onclick="SeleccionarVenezuela()">
									<input type="text" class="nav_9" readonly="readonly" value="Biblia" onclick="SeleccionarBiblia()"> <span class="small">libre</span> 
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
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
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

    function toTop(){//Al recargar la página siempre se coloca al inicio de esta, funcion llamada desde la etiqueta body
        window.scrollTo(0, 0)
    }
     
 
</script>