<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">La escuela sabática dedica el tercer sábado de cada mes a:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)";>El fondo de inversión</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">Auditar diezmos y ofrendas</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">La santa cena</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Visitar hermanos enfermos</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 31:28 -->