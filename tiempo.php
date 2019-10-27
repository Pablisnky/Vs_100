<?php
    echo "SERVIDOR PHP" . "<br>";
    echo "Hora= " . date("a") . "<br>";
    echo "Hora= " . date("G") . "<br>";
    echo "Hora= " . date("c") . "<br>";
    echo "Dia de la semana= " . date("w") . "<br>";
    echo "Dia de la semana= " . date("D") . "<br>";
    echo "Numero de semana= " . date("W") . "<br>";
    echo "Dia del mes= " . date("d") . "<br>";
    echo "<br>";
    //Se utiliza la hora de Colombia
	date_default_timezone_set('America/Bogota');
	$FechaServidorPHP =date("Y-m-d");
 	// echo $FechaServidorPHP . "<br>";
    $newFecha = date("d-m-Y", strtotime($FechaServidorPHP));
	echo $newFecha . "<br>";

    echo "<p>El servidor PHP lleva adelantado seis horas</p>";