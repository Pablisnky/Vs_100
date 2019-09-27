<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
	$_SESSION["verifica"] = $verifica; 
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
		<link rel="stylesheet" type="text/css" media="(min-width: 1500px)" href="../css/MediaQuery_EstilosVs_100_Grande.css">
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>
		<link rel="shortcut icon" type="image/png" href="../images/logo.png">

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
		<script type="text/javascript" src="../javascript/validarFormularios.js" ></script>
		<script type="text/javascript" src="../javascript/Funciones_Ajax.js" ></script>	
		<script type="text/javascript" src="../javascript/Regiones.js" ></script>	
        <script type="text/javascript" src="../javascript/Municipios.js"></script> 
        <script type="text/javascript" src="../javascript/Municipios_Colombia.js"></script>  	
	</head>	
	<body onload= "autofocusRegistroGratis()">
		<div class="Secundario">
			<header>
				<?php include("modulos/header.html");?>
			</header>
			<div onclick="ocultarMenu()""><!--ocultarMenu()-->
				<div class="Inicio_2">
					<h2>Registro de participantes</h2> 
					<br>
					<form action="registrarse.php" method="POST" name="registroGratis" onsubmit="return validar_01()">
                        <fieldset class="Afiliacion_4">
                        	<legend>Datos personales</legend> 
							<input type="text" name="nombre" id="Nombre" placeholder="Nombre" onchange="return literal()" autocomplete="off"><!-- literal() se encuentra en validarFormulario.js -->
							<input type="text" name="apellido" id="Apellido" placeholder="Apellido" onchange="return literal()" autocomplete="off"><!-- literal() se encuentra en validarFormulario.js -->
							<input type="text" name="correo" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200);" onclick="validarFormatoCorreo()"; autocomplete="off">
                        	<div class="contenedor_11" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax llamar_verificaCorreo()-->
						</fieldset>        
                        <fieldset class="Afiliacion_4">
                        	<legend>Datos de congregación</legend>
							<!-- <label>Pais:</label> -->
							<select class="etiqueta_24" name="pais" id="Pais" onchange="SeleccionarRegiones(this.form)"> 
								<option>Pais</option>
								<option>Colombia</option>
								<option>Venezuela</option>
							</select>  
							<div id="Region_1B" style="display: none;"><!--Aplica solo a Colombia-->
								<!-- <label>Departamento:</label> -->
									<select class="etiqueta_24" name="departamento" id="Departamento" onchange="SeleccionarMunicipio_Colombia(this.form)">
										<option></option>                            
									</select>                  
								<!-- <label>Municipio:</label> -->
									<select class="etiqueta_24" name="municipio_Col" id="Municipio_Col"> 
										<option></option>
									</select>     
							</div> 
							<div id="Region_1C" style="display: none;"><!--Aplica solo a Venezuela-->
								<!-- <label>Estado:</label> -->
									<select class="etiqueta_24" name="estado" id="Estado" onchange="SeleccionarMunicipio(this.form)">
										<option></option>                            
									</select>                  
									
								<!-- <label>Municipio:</label> -->
									<select class="etiqueta_24" name="municipio" id="Municipio"> 
										<option></option>
									</select>  
							</div>   
							<input type="text" name="iglesia" id="Iglesia" placeholder="Iglesia o grupo" onchange="return literal()" autocomplete="off"><!-- literal() se encuentra en validarFormulario.js -->
						</fieldset>       
						<fieldset class="Afiliacion_4">
							<legend>Datos de accceso a la plataforma</legend>  
							<div>
								<input type="password" name="clave" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">
								<div class="contenedor_11" id="Mostrar_verificaClave"></div><!-- recibe respuesta de ajax llamar_verificaClave()-->
								<input type="password" name="confirmarClave" id="ConfirmarClave" placeholder="Repetir contraseña">
							</div>                               
                        	<input type="submit" name="Registrarse" value="Registrarse" style=" display: block; width: 120px;">
                    	</fieldset> 
					</form>
				</div>
			</div>
		</div>
    	<footer>
        	<?php include("modulos/footer.php");?>
    	</footer>
	</body>
</html>