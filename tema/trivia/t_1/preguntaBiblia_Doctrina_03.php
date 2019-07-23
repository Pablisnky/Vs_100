<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El día sábado es el día de reposo, este día debemos apartarlo para.</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">Dormir lo suficiente</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Adorar a los angeles.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)";>Recordar la creación de Dios.</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">No agobiarse y no preocuparse</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 10:5 -->