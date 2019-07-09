<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">¿Cuál de los siguientes lugares dentro del territorio continental de Colombia constituye el extremo con mayor latitud Norte del país?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Punta Gallinas</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Cabo Manglares</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">Isla de Malpelo</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_bloqueo()">Sierra Nevada</p>
			</div>
		</div>	
		<?php
	}  ?>