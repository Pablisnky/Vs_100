<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Que estrategia utilizó Jeroboán para que el pueblo de Israel no fuera al templo de Jerusalen a adorar al Señor</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Hizo un templo más majestuoso que el de Salomón</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Construyo un muro que impedia el paso.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Fortificó  la ciudad de Siquén y Peniél</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Construyo dos becerros de oro</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 12:28
// 11 de agosto de 2019
    
    ?>