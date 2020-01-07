<?php
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
    // $Nombre->PrimerNombre("Pablo Cabeza");

    // $Nombre= new NombreApellido();
    // $Nombre->PrimerApellido("Pablo Cabeza");

//****************************************************************************************************
    // Instanciada en:
        //  sabiosDia.php
        //  sabiosConInsignias.php


?>