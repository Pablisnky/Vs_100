<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">En el grupo Peniel de la Iglesia Adventista, decidieron llamar a la persona que dirige a un nuevo hermano en la palabra de Dios como:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Padrino de Dios</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">Mentor en cristo</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)";>Guia espiritual</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Concejero espiritual</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 22:11 -->