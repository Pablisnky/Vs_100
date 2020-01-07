<?php
	//se evita guardar memoria cache
    // include("../modulos/noCache.php");

    //Sino viene de entrada.php no recibe "fecha"
    if(empty($_GET["fecha"])){
        //Se consulta la fecha actual en Colombia
        date_default_timezone_set('America/Bogota');
        $Fecha =date("Y/m/d");
        // echo "Fecha PHP " . $Fecha . "<br>";
    }
    else{
        //Se reciben datos desde .php
        $Fecha = $_GET["fecha"];
        $ID_PP = $_GET["ID_PP"];

        //   echo "Fecha: " . $Fecha ."<br>";
        //  echo "ID_PP: " . $ID_PP . "<br>";

    }

    if($Fecha == "2020/01/07"){
       include("01_20/07/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2020/01/06"){
        include("01_20/06/posicionReavivadosPalabra.php");
    }
    else{
        
    }