<?php
    //Sino viene de entrada.php no recibe "fecha"
    if(empty($_GET["fecha"])){
        //Se consulta la fecha actual en Colombia 
        date_default_timezone_set('America/Bogota');
        $Fecha =date("Y/m/d");
        // echo "Fecha PHP " . $Fecha . "<br>";
    }
    else{
        //Se reciben datos desde ultima.php
        $Fecha = $_GET["fecha"];
        $ID_PP = $_GET["ID_PP"];

        // echo "Fecha: " . $Fecha ."<br>";
        // echo "ID_PP: " . $ID_PP . "<br>";
    }

    if($Fecha == "2019/09/03"){
       include("09_19/03/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/09/02"){
        include("09_19/02/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/31"){
        include("08_19/31/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/30"){
        include("08_19/30/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/29"){
        include("08_19/29/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/21"){
        include("08_19/21/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/20"){
        include("08_19/20/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/19"){
        include("08_19/19/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/18"){
        include("08_19/18/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/17"){
        include("08_19/17/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/16"){
        include("08_19/16/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/15"){
        include("08_19/15/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/14"){
        include("08_19/14/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/13"){
        include("08_19/13/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/12"){
        include("08_19/12/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/11"){
        include("08_19/11/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/10"){
        include("08_19/10/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/09"){
        include("08_19/09/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/08"){
        include("08_19/08/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/07"){
        include("08_19/07/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/06"){
        include("08_19/06/posicionReavivadosPalabra.php");
    }
    else if($Fecha == "2019/08/05"){
        include("08_19/05/posicionReavivadosPalabra.php");
    }