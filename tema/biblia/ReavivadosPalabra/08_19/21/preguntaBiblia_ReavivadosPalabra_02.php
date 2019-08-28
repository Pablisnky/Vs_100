<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Micaías el profeta, siempre profetizaba eventos para Acab en terminos de:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Le profetizaba cosas buenas.</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Le aconsejaba sobre su esposa</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,100)">Le anunciaba desastres</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Ninguna de las anteriores</p>
			</div>
		</div
		<?php
    }  
		//1 Reyes 22:8
		//21 de agosto de 2019

    ?>