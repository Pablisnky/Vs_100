<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Nabot el dueño del viñedo, fue asesinado injustamente por una petición de Jezabel, quien lo acusó de:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Apropiarse del viñedo de ella</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Blasfemar contra Baal</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Maldecir a Dios y al rey</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">No acatar la palabra de Dios</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 21:20
// 20 de agosto de 2019
    ?>