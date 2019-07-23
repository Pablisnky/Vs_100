<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿A quienes hizo Dios la promesa de dar una nueva tierra donde vivir?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_07a" class="efecto" onclick="llamar_bloqueo()">Noe y su familia.</p>
				<p id="principiantes_07b" class="efecto" onclick="llamar_bloqueo()">Adam y Eva.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_07c" class="efecto" onclick="llamar_bloqueo()">Cain y Abel.</p>
				<p id="principiantes_07d" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Abraham, Isaac y Jacob.</p>
			</div>
		</div>
		<?php
	}  ?>