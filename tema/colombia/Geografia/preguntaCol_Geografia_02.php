<?php
session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">El Municipio en el departamento Bolívar conocido como “La Capital de los ríos”, ya que allí el río Magdalena recibe las vertientes de los ríos Cauca y San Jorge, es:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">
				<p id="respuesta_a" class="efecto" onclick="llamar_bloqueo()">Cartagena</p>
				<p id="respuesta_b" class="efecto" onclick="llamar_bloqueo()">Turbaco</p>
			</div>
			<div class="Quinto_2">
				<p id="respuesta_c" class="efecto" onclick="llamar_bloqueo()">María La Baja	</p>
				<p id="respuesta_d" class="efecto" onclick="llamar_sombrear(); setTimeout(llamar_puntaje,200);">Magangué</p>
			</div>
		</div>
		<?php
	}  ?>