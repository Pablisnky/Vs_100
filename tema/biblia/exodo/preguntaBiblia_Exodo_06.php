<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando llego al poder un nuevo rey egipcio que no conocio a Jose, al pueblo de Israel se le ordeno:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_06a" class="efecto" onclick="llamar_bloqueo()">Abandonar Egipto.</p>
				<p id="principiantes_06b" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Trabajar forzosamente.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_06c" class="efecto" onclick="llamar_bloqueo()">Adorar a Isis.</p>
				<p id="principiantes_06d" class="efecto" onclick="llamar_bloqueo()">Cruzar el desierto.</p>
			</div>
		</div>
		<?php
	}  ?>