<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  ?>
		<div>
			<p class="pregunta">Josafat tenía un sincero interés en que hubiera una administración imparcial y jueces que entendieran su solemne responsabilidad; por eso les dijo:
</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">.     
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Resuélvanme los problemas a toda costa</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Busquen soluciones sin pensar mucho</p>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">Esforzaos pues, para hacerlo </p>
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">No se preocupen y sin afán</p>
			</div>
		</div
		<?php
		$_SESSION["Versiculo"] = "2 Crónicas 19:11";
	}  
	//02 de noviembre de 2019
    ?>