<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">En nuestro misionero de hoy, el pastor de la iglesia que Ricky habia abandonado para ser bautizado como adventista, reaccionó con:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Enojo</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Celos.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">Envidia</p>
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)";>Aceptación placentera</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 17:19-21 -->