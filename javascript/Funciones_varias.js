//coloca el foco autotmaticamente en el primer input de los formularios
    function foco(id){
        document.getElementById(id).focus();   
    }

// ------------------------------------------------------------------------------------------------------------------------
// ------------------------------------------------------------------------------------------------------------------------
	function autofocusRegistroGratis(){
		document.getElementById('Nombre').focus();
	}

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

	function autofocusRegistroInscripcion(){
		document.getElementById('comprobantePago').focus();
	}

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

	function autofocusContacto(){
		document.getElementById('Nombre').focus();
	}

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

    function autofocusInicioSesion(){
        document.getElementById('Correo').focus();
    }

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

    function quitarAnuncio(){
        document.getElementById("recibir").innerHTML="";
        setTimeout('llamarCorreo()',500);        
        setTimeout('autofocusInicioSesion()',1000);
    }

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

    var http_request = false;
    var peticion= conexionAJAX();

        function conexionAJAX(){
            http_request = false;
            if (window.XMLHttpRequest){ // Mozilla, Safari,...
                http_request = new XMLHttpRequest();
                if (http_request.overrideMimeType){
                    http_request.overrideMimeType('text/xml');
                }
            } else if (window.ActiveXObject){ // IE
                try {
                    http_request = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (e){
                    try{
                        http_request = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (e) {}
                }
            }
            if (!http_request){
                alert('No es posible crear una instancia XMLHTTP');
                return false;
            }
          	/*else{
                alert("Instancia creada exitosamente ok");
            }*/
           return http_request;
        } 

function llamarCorreo(){
	var aleatorio = parseInt(Math.random()*999999999);
    A=document.getElementById("Correo").value;//se inserta la direccion de correo
   	var url="Sesiones_Cookies/verificarCorreo.php?val_1=" + A  + "&r=" + aleatorio;
    http_request.open('GET',url,true);     
    peticion.onreadystatechange = respuesta_llamarCorreo;
    peticion.setRequestHeader("content-type","application/x-www-form-urlencoded");
    peticion.send("null");
}                         

function respuesta_llamarCorreo(){
    if (peticion.readyState == 4){
         if (peticion.status == 200){
           document.getElementById('recibir').innerHTML=peticion.responseText;//se recoje el numero de pacientes
           return false;
        } 
        else{
            alert('Hubo problemas con la petición.');
        }
    }
}


<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

    function recargaInput(){
        document.getElementById("Correo").reload();
        return false;
    }

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->
     //No hace nada
        function mostrar() {
            div = document.getElementById('Temporizador_2');
            div.style.display = '';
        }
        //Quita el temporizador en cada pregunta al seleccionar una respuesta
        function cerrar() {
            div = document.getElementById('Temporizador_2');
            div.style.display = 'none';
        }

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->   

        function mostrarMenu(){//menu responsive
            var A= document.getElementById("MenuResponsive");//nav
            if(A.style.marginLeft < "0%"){
                    //alert("hola");
                    A.style.marginLeft = "0%";
                }
            else if(A.style.marginLeft = "0%"){
                    //alert("hola");
                    A.style.marginLeft = "-35%";
                }
        }

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->

        function ocultarMenu(){//menu responsive, llamado desde todas las paginas.
            if(window.screen.availWidth <= 800){//solo funciona si la pantalla es menor a 800px          
                var A= document.getElementById("MenuResponsive");
                    if(A.style.marginLeft = "0%"){
                    //alert("hola");
                    A.style.marginLeft = "-35%";
                }
            }
        }   

<!-- //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   //////  JAVASCRIPT   ////// -->




