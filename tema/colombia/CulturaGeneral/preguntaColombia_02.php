<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Las unidades de medida que se emplean en Colombia para especificar el peso de los alimentos y el volumen de la gasolina, son unidades del sistema:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Internacional.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Colombiano.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Métrico.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Ingles.</p>
			</div>
		</div>
		<?php
	}  ?>