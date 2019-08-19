<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Quién aniquiló la familia de Basá, cumpliendose la palabra que Dios había anunciado por medio del profeta Jehú?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Abías rey de Judá</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()"></p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Zimrí rey de Israel</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Elá rey de Israel</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 16:11
// 15 de agosto de 2019
    
    ?>