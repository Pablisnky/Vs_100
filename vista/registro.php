<!--Formulario de registro de usuarios, aqui se cargan los datos de los nuevos participantes.-->
<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
	$_SESSION["verifica"] = $verifica; 
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Vs_100 Registro</title>

		<meta http-equiv="content-type"  content="text/html; charset=utf-8"/>
		<meta name="description" content="Juego de preguntas sobre suramerica."/>
		<meta name="keywords" content="suramerica, latinoamerica"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="expires" content="07 de mayo de 2018"><!--Inicio de construcción de la página-->

		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/>
        <link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=RLato|Raleway:400|Montserrat|Indie+Flower|Caveat'>

		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
		<script type="text/javascript" src="../javascript/validarFormularios.js" ></script>		
	</head>	
	<body onload= "autofocusRegistroGratis()">
		<div class="Secundario">
            <!--titulo y menu principal-->
			<?php include("modulos/header.html");?>
			<div onclick="ocultarMenu()""><!--ocultarMenu()-->
				<div class="Inicio_2">
					<h2>Registro de participantes</h2> 
					<form action="registrarse.php" method="POST" name="registroGratis" onsubmit="return validar_01()">
                        <fieldset class="Afiliacion_4">
						<input type="text" name="nombre" id="Nombre" placeholder="Nombre" onchange="return literal()" autocomplete="off"><!-- literal() se encuentra en validarFormulario.js -->
						<input type="text" name="apellido" id="Apellido" placeholder="Apellido"  onchange="return literal_2()" autocomplete="off"><!-- literal_2() se encuentra en validarFormulario.js -->
						<input type="text" name="cedula" id="Cedula" placeholder="Cedula"  onchange="" autocomplete="off">
						<input type="text" name="telefono" id="Telefono" placeholder="Teléfono"  onchange="" autocomplete="off">
					<!--	<select name="departamento" id="Departamento" onclick="">
							<option>Departamento</option>
                                    <option>Amazonas</option> 
                                    <option>Antioquia</option> 
                                    <option>Arauca</option>
                                    <option>Atlántico</option>
                                    <option>Bolívar</option>   
                                    <option>Boyacá</option>
                                    <option>Caldas</option> 
                                    <option>Caquetá</option> 
                                    <option>Casanare</option> 
                                    <option>Cauca</option>
                                    <option>Cesar</option>
                                    <option>Chocó</option> 
                                    <option>Córdoba</option>
                                    <option>Cundinamarca</option>
                                    <option>Distrito Capital</option>
                                    <option>Guainía</option> 
                                    <option>Guaviare</option>
                                    <option>Huila</option> 
                                    <option>La Guajira</option>
                                    <option>Magdalena</option>
                                    <option>Meta</option>
                                    <option>Nariño</option>
                                    <option>Norte de Santander</option> 
                                    <option>Putumayo</option>
                                    <option>Quindio</option> 
                                    <option>Risaralda</option> 
                                    <option>San Andres y Providencia</option> 
                                    <option>Santander</option> 
                                    <option>Sucre</option> 
                                    <option>Tolima</option> 
                                    <option>Valle del Cauca</option> 
                                    <option>Vaupés</option> 
                                    <option>Vichada</option>
						</select> -->
						<input type="email" name="correo" id="Correo" placeholder="e-mail" autocomplete="off" onchange="llamarCorreo();"><!--this.value hace referencia al texto que se escribio en el input-->
							
						<div id="recibir"></div><!--recibe por medio de ajax la respuesta de verificarCorreo.php-->				
							
						<input type="password" name="clave" id="Clave" placeholder="Contraseña" onchange="return literal_3()" autocomplete='off' onblur="quitarAnuncio()">
					</fieldset>
						<input type="submit" value="Enviar" style="margin-top: 6%;">
					</form>
				</div>
			</div>
		</div>
	</body>
</html>