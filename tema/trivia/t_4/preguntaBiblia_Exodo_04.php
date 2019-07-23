<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando Moises huía del Faraón porque este trató de matarlo, se fue hacia:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_04a" class="efecto" onclick="llamar_bloqueo()">La tierra prometida.</p>
				<p id="principiantes_04b" class="efecto" onclick="llamar_bloqueo()">A Jerusalen.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_04c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">La tierra de Madián.</p>
				<p id="principiantes_04d" class="efecto" onclick="llamar_bloqueo()">Al Rio Nilo.</p>
			</div>
		</div>
		<?php
	}  ?>