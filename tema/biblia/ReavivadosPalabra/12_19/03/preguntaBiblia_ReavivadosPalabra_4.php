<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Debido a la amenaza de ataque, donde puso Nehemías a la gente por familias, con sus espadas, arcos y lanzas</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">    
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Las apartó de la posible zona de combate</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">En los cuarteles del ejercito</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">En la entrada de Jerusalén</p>
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Detrás del muro, y en los sitios abiertos </p>
			</div>
	</div>
		<?php
		$_SESSION["Versiculo"] = "Nehemías 4:13";
	}  
	//03 de diciembre de 2019
    ?>