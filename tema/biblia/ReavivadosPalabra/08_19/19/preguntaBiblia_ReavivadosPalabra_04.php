<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Si Dios le entrego a Acáb a los sirios en combate, ¿Porque despues Acáb fue condenado por el Señor?</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Busco a la diosa Asera para adorarla</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Volvio la espalda al Señor despues del triunfo</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Dejo en libertad a un hombre condenado a muerte por Dios</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Ninguna de las anteriores</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 20:42
// 19 de agosto de 2019
    
    ?>