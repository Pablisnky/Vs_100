<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Dios le ordenó a Abraham que ofreciera como holocausto a:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_08a" class="efecto" onclick="llamar_bloqueo()">Su esposa.</p>
				<p id="principiantes_08b" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Su unico hijo.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_08c" class="efecto" onclick="llamar_bloqueo()">Al hijo mayor</p>
				<p id="principiantes_08d" class="efecto" onclick="llamar_bloqueo()">Un macho cabrío.</p>
			</div>
		</div>
		<?php
	}  ?>