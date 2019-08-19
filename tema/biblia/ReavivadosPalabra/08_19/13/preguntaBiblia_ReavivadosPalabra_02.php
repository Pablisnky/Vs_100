<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Ahías, a pesar de estar ciego pudo reconocer a la esposa de Jeroboán por:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Al oir su voz</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Al sentir sus manos</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Dios ya le habia dicho que lo visitaría</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Sus discipulos le dijero que ella esta alli.</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 14:5
// 13 de agosto de 2019
    ?>