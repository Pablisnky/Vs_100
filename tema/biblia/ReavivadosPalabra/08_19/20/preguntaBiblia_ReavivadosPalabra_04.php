<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Inicialmente Acab fue sentenciado por Dios, por el asesinato de Nabot y por adueñarse de sus tierras; debido a esto Dios le mando a decir:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="principiantes_01a" class="efecto" onclick="llamar_bloqueo()">Devolveras el viñedo de Nabot</p>
				<p id="principiantes_01b" class="efecto" onclick="llamar_bloqueo()">Te enfrentaras a la esposa e hijos de Nabot.</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200)">Tu familia padecera lo mismo que hice con la de Jeroboán y Basá</p>
				<p id="principiantes_01d" class="efecto" onclick="llamar_bloqueo()">Enterraras a Nabot en tu palacio real</p>
			</div>
		</div
		<?php
    }  
    
// 1 Reyes 21:22
// 20 de agosto de 2019
    
    ?>