<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Que rey de Israel gobernó en Tirsá y se suicido al ver la ciudad estabá sitiada por Omrí el jefe del ejercito</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Omrí</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Elá</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Basá</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Zimrí</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 16:18
// 15 de agosto de 2019
    
    ?>