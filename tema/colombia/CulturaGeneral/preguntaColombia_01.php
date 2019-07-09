<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Colombia esta dividia administrativamente por Departamentos ¿Cuantos Departamentos conforman el territorio colombiano?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">32.</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">15.</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">22.</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">33.</p>
			</div>
		</div>
		<?php
	}  ?>