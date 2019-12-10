<?php
// session_start();
$ID_Participante=$_SESSION["ID_Participante"];//en esta sesion se tiene guardado el id del participante, sesion creada en validarSesion.php
// echo "ID_Participante:" .  $participante . "<br>";

include("../conexion/Conexion_BD.php");

//se realiza una consulta para obtener el nombre del participante
$Consulta="SELECT Nombre, Apellido FROM participante WHERE ID_Participante='$ID_Participante'";
$Recordset = mysqli_query($conexion,$Consulta);
$Participante= mysqli_fetch_array($Recordset);
$NombreCompleto= $Participante["Nombre"];
$ApellidoCompleto= $Participante["Apellido"];

//Se separa el nombre del participante si introdujo dos nombres al registrarse, para mostrar solo el primer nombre
    class NombreApellido{
        public $PrimerNombre;        
        public $PrimerApellido; 

        //este metodo entrega el primer nombre del participante
        function PrimerNombre($SeparaNombre){
            $this->PrimerNombre=$SeparaNombre;
            $this->PrimerNombre = explode(" ", $this->PrimerNombre);            
            echo  $this->PrimerNombre[0] . " "; 
        }

        //este metodo entrega los dos nombres del participante
        function DosNombre($SeparaNombre){
            $this->PrimerNombre=$SeparaNombre;            
            echo  $this->PrimerNombre . " "; 
        }

        //este metodo entrega el primer apellido del participante
        function PrimerApellido($SeparaApellido){
            $this->PrimerApellido=$SeparaApellido;
            $this->PrimerApellido = explode(" ", $this->PrimerApellido);
            echo $this->PrimerApellido[0];
        }
    }

    // $Nombre= new NombreApellido();
    // $Nombre->PrimerNombre("$NombreCompleto");

    // $Nombre= new NombreApellido();
    // $Nombre->PrimerApellido("$ApellidoCompleto");

//****************************************************************************************************
    // Instanciada en sabiosDia.php


?>