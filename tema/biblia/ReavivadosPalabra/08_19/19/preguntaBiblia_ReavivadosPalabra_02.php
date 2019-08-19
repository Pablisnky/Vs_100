<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Una expresión muy conocida en nuestros tiempos tiene origenes biblicos; fue pronunciada por los profetas al rey Acab:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Quien duerme mucho, poco aprende</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Chivo que se devuelve se esnuca</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">No se duerma en los laureles</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Barriga llena, corazon contento.</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 20:22
// 19 de agosto de 2019
    ?>