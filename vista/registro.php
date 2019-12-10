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
		<meta name="description" content="registro de usuarios para el sitio web."/>
		<meta name="keywords" content="registro, usuarios"/>
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
        <script type="text/javascript" src="../javascript/canton.js"></script>  	
        <script type="text/javascript" src="../javascript/Municipios.js"></script> 
        <script type="text/javascript" src="../javascript/Municipios_Colombia.js"></script>  
        <script type="text/javascript" src="../javascript/Iglesia.js"></script> 	
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
							<input type="text" name="nombre" id="Nombre" placeholder="Nombre" onchange="" autocomplete="off"><!-- return literal() se encuentra en validarFormulario.js -->
							<input type="text" name="apellido" id="Apellido" placeholder="Apellido" onchange="" autocomplete="off"><!--  return literal() se encuentra en validarFormulario.js -->
							<input type="text" name="correo" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200);" onclick="ColorearCorreo()"; autocomplete="off">
                        	<div class="contenedor_11" id="Mostrar_verificaCorreo"></div><!-- recibe respuesta de ajax llamar_verificaCorreo()-->
						</fieldset>      						
                        <fieldset class="Afiliacion_4">
                        	<legend>Datos de congregación</legend>
							<!-- <label>Pais:</label> -->
							<label class="etiqueta_34">Pais:</label>
							<select class="etiqueta_33" name="pais" id="Pais" onchange="SeleccionarRegiones(this.form)"> 
								<option></option>
								<option>Colombia</option>
                                <option>Ecuador</option>
								<option>Venezuela</option>
								<option>Otro</option>
							</select>  
							<input type="text" name="otroPais" id="OtroPais" placeholder="Indique su pais sino esta en la lista" style="display:none">

							<div id="Region_1A" style="display: none;"><!--Aplica solo a Ecuador-->
								<!-- <label>Provincia:</label> -->
								
									<label class="etiqueta_34">Provincia:</label>
									<select class="etiqueta_33" name="provincia" id="Provincia" onchange="SeleccionarCanton(this.form)">
										<option></option>                            
									</select>                  
									
									<label class="etiqueta_34">Cantón:</label>
									<select class="etiqueta_33" name="canton" id="Canton"> 
										<option></option>
									</select>                  
								<br>
							</div>  
							<div id="Region_1B" style="display: none;"><!--Aplica solo a Colombia-->
								<!-- <label>Departamento:</label> -->
									<label class="etiqueta_34">Departamento:</label>
									<select class="etiqueta_33" name="departamento" id="Departamento" onchange="SeleccionarMunicipio_Colombia(this.form)">
										<option></option>                            
									</select>                  
								<!-- <label>Municipio:</label> -->
									<label class="etiqueta_34">Municipio:</label>
									<select class="etiqueta_33" name="municipio_Col" id="Municipio_Col" onchange="SeleccionarIglesia_Col(this.form)">  
										<option></option>
									</select>     
							</div> 
							<div id="Region_1C" style="display: none;"><!--Aplica solo a Venezuela-->
								<!-- <label>Estado:</label> -->
									<label class="etiqueta_34">Estado:</label>
									<select class="etiqueta_33" name="estado" id="Estado" onchange="SeleccionarMunicipio(this.form)">
										<option></option>                            
									</select>                  
									
									<label class="etiqueta_34">Municipio:</label>
									<select class="etiqueta_33" name="municipio" id="Municipio"  onchange="SeleccionarIglesia_Ven(this.form)"> 
										<option></option>
									</select>  
							</div>   
							<div id="Region_1D" style="display: none;">
									<label class="etiqueta_34">Iglesia de congregación:</label>
									<select class="etiqueta_33" name="iglesia" id="Iglesia" onchange="if(this.value=='Otro'){document.getElementById('Otra_Iglesia').style.display='block';}">
										<option></option>                            
									</select>    
									<input type="text" name="otraIglesia" id="Otra_Iglesia" style="display:none" placeholder="Indique nombre de grupo o iglesia">            
							</div>   
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
    	<footer class="piePagina_5">
            <img class="imagen_3" alt="Logotipo horebi.com" src="../images/logo.png">
            <label class="Inicio_23">horebi.com</label>
            <!-- <span class="span_7">Reavivados</span>  -->
            <p class="p_8">El propósito de esta plataforma es incentivar la lectura bíblica y exaltar el sábado como día especial de dedicación a Jehová.</p>
        	<?php include("modulos/footer.php");?>
    	</footer>
	</body>
</html>


<script type="text/javascript" src="../javascript/otraIglesia.js"></script> 