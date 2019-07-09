<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Dios le dijo a Jeremías: "Yo dictaré sentencia contra mi pueblo por que:"</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Han adorado las obras de sus manos</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Han creado un becerro de oro.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_bloqueo()">Adoran a Baal.</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">No guardan el sabado.</p>
			</div>
		</div>
		<?php
	}  ?>

	<!-- Jeremías 1:16 -->