<?php
	include("../clases/imagenComentada.php");
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" type="text/css" media="(max-width: 800px)" href="../css/MediaQuery_EstilosVs_100.css">
		<link rel="stylesheet" type="text/css" href="../css/EstilosVs_100.css"/> 
		
		<script type="text/javascript" src="../javascript/Funciones_varias.js" ></script>
		<script type="text/javascript" src="../javascript/Funciones_Ajax.js" ></script>
        <script type="text/javascript">
            document.addEventListener("keydown", contar_1, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", contar_1, false);//contar() se encuentra en Funciones_varias.js 
            document.addEventListener("keydown", valida_Longitud_1, false);//valida_Longitud() se encuentra en Funciones_varias.js 
            document.addEventListener("keyup", valida_Longitud_1, false);//valida_Longitud() se encuentra en 
        </script>	 
	</head>
	<body>
		<h1 class="cursor">Reavivados</h1>
		<p class="Inicio_13 Inicio_29">¿Que describe la imagen?</p>
		<div style="display: flex; align-items: center; width: 100%">
			<?php
				$ImagenComentar= new imagenComentada();

				$ImagenComentar->ImagenComentario();
			?>
		</div>
		<div class="contenedor_30">
			<input class="etiqueta_34" type="text" id="Usuario" placeholder="Nombre usuario">
			<textarea class="textarea_1"  id="Contenido" placeholder="Deja tu comentario"></textarea>
			<input class="contador_1" type="text" name="contador" id="Contador" value="100">
			<label class="Inicio_3  buttonCuatro" onclick="llamar_comentarios()">Enviar</label>
		</div>
		<hr class="hr_6">

		<!-- Recibe la respuesta desde recibeComentarios.php -->
		<div class="contenedor_31" id="RespuestaComentarios"></div>
		<?php
			//conexion a la BD
			include("../conexion/Conexion_BD.php");

			//Se consultan los comentarios de los participantes para el dia actual
			$Consulta_1="SELECT * FROM comentarios_capitulos WHERE DATE_FORMAT(fecha_comentario, '%Y/%m/%d') = CURDATE() ORDER BY ID_C DESC";
			$Recordset_1= mysqli_query($conexion, $Consulta_1); 
			while($Comentarios_2= mysqli_fetch_array($Recordset_1)){	?>
				<input class="etiqueta_36" type="text" value="<?php echo $Comentarios_2["usuario"]?>" readonly="readonly">
				<textarea class="textarea_1" readonly="readonly"><?php echo $Comentarios_2["comentario"]?></textarea>	
				<br>
				<?php
			}
		?>

		<label class="nav_13" onclick ="window.close()">Cerrar</label>
		<footer>
			<?php include("modulos/footer.php");?>
		</footer> 
   	</body>
</html>

<script>
	var getid= document.getElementById("RespuestaComentarios").hasChildNodes();
	if(getid){ 
		document.getElementById("RespuestaComentarios").innerHTML="No hay comentarios aun, se el primero en hacerlo";
	}
</script>