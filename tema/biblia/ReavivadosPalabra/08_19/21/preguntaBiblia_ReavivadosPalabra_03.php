<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El rey Josafat hizo lo que agrada al Señor, siguiendo los pasos de su padre Asá, ¿Donde reino Josafat?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,100)">Judá</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Israel</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Siria</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Damasco</p>
			</div>
		</div
		<?php
    }  
	//1 Reyes 22:41
	//21 de agosto de 2019
    
    ?>