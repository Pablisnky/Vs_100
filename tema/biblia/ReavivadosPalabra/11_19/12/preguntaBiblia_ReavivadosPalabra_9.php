<?php
// session_start();//se inicia sesion para llamar las variables $_SESSION creadas en otros archivos, o para crear una.

	if(!isset($_SESSION["ID_Participante"])){//sino hay nada almacenado en la variable superglobal devuelve a la pagina de inicio
    	//con esto se garantiza que el usuario entro por login

  		header("location:../../index.php");			
	}
	else{  
		$_SESSION["Versiculo"] = "2 Crónicas 29:5-6";  ?>
		<div>
			<p class="pregunta">Debido a que sus padres habían hecho lo malo ante los ojos de Jehová, Ezequías mando a sacar del santuario:</p>
		</div>
		<div class="Quinto">
			<div class="Quinto_2">  
				<p id="principiantes_01a" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El arca del pacto</p>
				<?php
				if(empty($_GET["pregunta"])){	?>
					<p id="principiantes_01c" class="efecto" onclick="sonidoCorrecto(); pauseAudioBiblia();llamar_sombrear(); setTimeout(llamar_puntaje,100)">La inmundicia</p>   <?php
				}
				else{	?>
					<p id="principiantes_01c" class="efecto_2">La inmundicia</p> 
					<div style="background-color:yellow; position:absolute; top: 60%;"> <?php echo $_SESSION["Versiculo"];?></div>  <?php
				}	?>
			</div>
			<div class="Quinto_2">
				<p id="principiantes_01d" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">El pulpito</p>
				<p id="principiantes_01b" class="efecto" onclick="sonidoInCorrecto(); pauseAudioBiblia();llamar_bloqueo()">Las bancas</p>
			</div>
		</div
		<?php
	}  
	
	//12 de noviemmbre de 2019
    ?>