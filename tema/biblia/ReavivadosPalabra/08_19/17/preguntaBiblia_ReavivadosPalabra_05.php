<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Cuando el rey Acab se fue hacia Jezrel para resguardarse de la lluvia, Elías pudo llegar primero que el, porque Dios le permitio:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Teletrasportarse</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Usar los cuervos  nuevamente</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Usar un caballo especial.</p>
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Ajustarse el cinturon y correr</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 18:46
// 17 de agosto de 2019
    
    ?>