<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">"La ley de Dios es eterna e inmutable" es una frase de extrema importancia que se mencionó hoy en:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">La escuela sabatica</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)";>El segundo servicio</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Los anuncios</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">Ninguna de las anteriores</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 1:2,3 -->