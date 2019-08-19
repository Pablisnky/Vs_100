<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Roboán hijo de Salomón, fue proclamado rey sucesor ¿Cual fue la primera petición que le realizó el pueblo de Israel?.</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Ir a luchar contra los sidonios</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Continuar su reinado como lo hacia Salomón</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Permitir casarse con extranjeros</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Aliviarles el trabajo duro.</p>
			</div>
		</div
		<?php
	}  
	
// 1 Reyes 12:4
// 11 de agosto de 2019
	?>

	 