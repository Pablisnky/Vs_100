<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando Moises estaba en Madián, ¿Quien le dijo que regresara a Egipto porque ya habían muerto todos los que querían matarle?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_05a" class="efecto" onclick="llamar_bloqueo()">Sefora.</p>
				<p id="principiantes_05b" class="efecto" onclick="llamar_bloqueo()">Aaron.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_05c" class="efecto" onclick="llamar_bloqueo()">Un egipcio.</p>
				<p id="principiantes_05d" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Dios.</p>
			</div>
		</div>
		<?php
	}  ?>