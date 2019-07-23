<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quién fue engañado por su esposa e hijo para dar la bendición ante Dios al hijo menor en lugar de su hijo primogénito?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_05a" class="efecto" onclick="llamar_bloqueo()">Adam.</p>
				<p id="principiantes_05b" class="efecto" onclick="llamar_bloqueo()">Jacob.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_05c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Isaac>.</p>
				<p id="principiantes_05d" class="efecto" onclick="llamar_bloqueo()">Ananías.</p>
			</div>
		</div>
		<?php
	}  ?>