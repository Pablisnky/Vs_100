//coloca el foco autotmaticamente en el primer input de los formularios
function foco(id){
    document.getElementById(id).focus();   
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
function autofocusRegistroGratis(){
	document.getElementById('Nombre').focus();
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------

function autofocusRegistroInscripcion(){
	document.getElementById('comprobantePago').focus();
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------

function autofocusContacto(){
	document.getElementById('Nombre').focus();
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------

function autofocusInicioSesion(){
    document.getElementById('Correo').focus();
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------

function quitarAnuncio(){
    document.getElementById("recibir").innerHTML="";
    setTimeout('llamarCorreo()',500);        
    setTimeout('autofocusInicioSesion()',1000);
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------

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

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------

function recargaInput(){
    document.getElementById("Correo").reload();
    return false;
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
     //No hace nada
        function mostrar() {
            div = document.getElementById('Temporizador_2');
            div.style.display = '';
        }

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
        //Quita el temporizador en cada pregunta al seleccionar una respuesta
        function cerrar() {
            div = document.getElementById('Temporizador_2');
            div.style.display = 'none';
        }


// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------   

        function mostrarMenu(){//menu responsive
            var A= document.getElementById("MenuResponsive");//nav
            if(A.style.marginLeft < "0%"){
                    //alert("hola");
                    A.style.marginLeft = "0%";
                }
            else if(A.style.marginLeft = "0%"){
                    //alert("hola");
                    A.style.marginLeft = "-48%";
                }
        }

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//menu responsive, llamado desde todas las paginas.
function ocultarMenu(){
    if(window.screen.width<=800){//solo funciona si la pantalla es menor a 800px          
        var A= document.getElementById("MenuResponsive");
        if(A.style.marginLeft = "0%"){
            A.style.marginLeft = "-48%";
        }
    }
}   

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//indica la cantidad de caracteres que quedan mientra se escribe, llamada desde contacto.php
    function contar(){
         var max = 500; 
         var cadena = document.getElementById("Contenido").value; 
         var longitud = cadena.length; 

             if(longitud <= max) { 
                  document.getElementById("Contador").value = max-longitud; 
             } else { 
                  document.getElementById("Contenido").value = cadena.subtring(0, max);
             } 
    } 
        
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//indica la cantidad de caracteres que quedan mientra se escribe, llamada desde index.php
    function contar_1(){
        var max = 100; 
        var cadena = document.getElementById("Contenido").value; 
        var longitud = cadena.length; 

            if(longitud <= max) { 
                 document.getElementById("Contador").value = max-longitud; 
            } else { 
                 document.getElementById("Contenido").value = cadena.subtring(0, max);
            } 
   } 
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Impide que se sigan introduciendo caracteres al alcanzar el limite maximo, llamada desde index.php 
    var contenido_textarea = "";    
    function valida_Longitud_1(){  
        var num_caracteres_permitidos = 100;

        //se averigua la cantidad de caracteres escritos
        num_caracteres = document.forms[0].comentario.value.length; 

        if(num_caracteres > num_caracteres_permitidos){ 
            document.forms[0].comentario.value = contenido_textarea; 
        }
        else{ 
            contenido_textarea = document.forms[0].comentario.value; 
        } 
    } 

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Cierra la ventana window.open(); es llamada desde temas.php
function cerrar(){
    // Se recarga la ventana padre
    window.opener.location.reload();
    //se cierrar la ventana hijo
    window.close();
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Al recargar la página siempre se coloca al inicio de esta, funcion llamada desde entrada.php
function toTop(){
    window.scrollTo(0, 0)
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Aparece la flecha de siguiente pregunta, función invocada Funciones_Ajax.s por medio de la funcion llamar_sombrear() en cada pregunta 
function flecha(){
    document.getElementById("Flecha").style.display="block";
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Reproduce el sonido de respuesta correcta y oculta el cronometro, llamada desde cada pregunta
function sonidoCorrecto() {
  var A = document.getElementById("Resp_Correc");
  var B = document.getElementById("Temporizador_2");
    A.play();
    B.style.display="none";
 }

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Reproduce el sonido de respuesta incorrecta y oculta el cronometro, llamada desde cada pregunta
function sonidoInCorrecto(){
    var A = document.getElementById("Resp_InCorrec");
    var B = document.getElementById("Temporizador_2");
    A.play();
    B.style.display="none";
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Pausa el sonido de fondo, llamada desde cada pregunta
function pauseAudio(){ 
    var B = document.getElementById("FondoComercial_1");
    B.pause(); 
}

// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Pausa el sonido de fondo, llamada desde cada pregunta
function pauseAudioBiblia(){ 
    var C = document.getElementById("FondoBiblia_1");
    C.pause(); 
} 
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//llamada desde participacionHoy.php
function Lideres_D(){
    if(document.getElementById("Diario").checked == true){
        document.getElementById("Contenedor_12_a").style.display="none";
        document.getElementById("Contenedor_12_a1").style.display="none";
        document.getElementById("Contenedor_12").style.display="grid";
        document.getElementById("Contenedor_12_b").style.display="grid";
        document.getElementById("Contenedor_12_c").style.display="none";
        document.getElementById("Contenedor_18").style.display="none";
        document.getElementById("Contenedor_24").style.display="none";
    }
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//llamada desde participacionHoy.php
function Lideres_S(){
    if(document.getElementById("Semanal").checked == true){
        document.getElementById("Contenedor_12").style.display="none";
        document.getElementById("Contenedor_12_b").style.display="none";
        document.getElementById("Contenedor_12_c").style.display="none";
        document.getElementById("Contenedor_12_a").style.display="grid";
        document.getElementById("Contenedor_12_a1").style.display="grid";
        document.getElementById("Contenedor_18").style.display="block";
        document.getElementById("Contenedor_24").style.display="block";
        document.getElementById("Contenedor_25").style.display="none";
    }
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//llamada desde participacionHoy.php
function Salon(){
    if(document.getElementById("Salon").checked == true){
        document.getElementById("Contenedor_12_b").style.display="block";
        document.getElementById("Contenedor_12").style.display="none";
        document.getElementById("Contenedor_12_b").style.display="none";
        document.getElementById("Contenedor_12_c").style.display="block";
        document.getElementById("Contenedor_12_a").style.display="none";
        document.getElementById("Contenedor_12_a1").style.display="none";
        document.getElementById("Contenedor_18").style.display="none";
        document.getElementById("Contenedor_50").style.display="none";
        // document.getElementById("Contenedor_25").style.display="none";
    }
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//llamada desde participacionHoy.php
function Insignia(){
    if(document.getElementById("Insignias").checked == true){
        document.getElementById("Contenedor_12").style.display="none";
        document.getElementById("Contenedor_12_b").style.display="none";
        document.getElementById("Contenedor_12_c").style.display="block";
        document.getElementById("Contenedor_12_a").style.display="none";
        document.getElementById("Contenedor_12_a1").style.display="none";
        document.getElementById("Contenedor_18").style.display="none";
        document.getElementById("Contenedor_50").style.display="block";
        document.getElementById("Contenedor_51").style.display="block";
        document.getElementById("Contenedor_52").style.display="none";
    }
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//llamada desde participacionHoy.php
function Lideres_Sem(){
    if(document.getElementById("Semanal_2").checked == true){
        document.getElementById("Contenedor_12").style.display="none";
        document.getElementById("Contenedor_12_b").style.display="none";
        document.getElementById("Contenedor_12_c").style.display="block";
        document.getElementById("Contenedor_12_a").style.display="none";
        document.getElementById("Contenedor_12_a1").style.display="none";
        document.getElementById("Contenedor_18").style.display="none";
        document.getElementById("Contenedor_50").style.display="block";
        document.getElementById("Contenedor_51").style.display="none";
        document.getElementById("Contenedor_52").style.display="block";
    }
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//llamada desde principal.php 
function NotificarContrasena(){
    var A= document.getElementById("Contenedor_16");
    var B= document.getElementById("Tapa_2");

    if(A.style.display = "none"){
        A.style.display = "block";

        B.style.display = "block";
    }
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Muestra texto en instruccion.php
function mostrar(id){
    var A= document.getElementById(id); 
    A.className += "mostrarTexto";
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Abre ventana con contenido sobre los bonos e insignias, es llamada en ultima.php
function verBonos(){
    window.open("../controlador/detalle_bono.php", "ventana1", "width=360,height=550,scrollbars=YES");
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Cierra la ventana window.open(); es llamada desde detalle_bono.php
function cerrarVentana(){
    //se cierrar la ventana hijo
    window.close();
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Abre ventana con contenido sobre los valores, es llamada en cultura.php
function verValor_Deuteronomio(){
    window.open("../controlador/Valor_Deuteronomio.php", "ventana1", "width=360,height=550,scrollbars=YES");
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Abre ventana con contenido sobre los valores, es llamada en cultura.php
function verValor_Colosenses(){
    window.open("../controlador/Valor_Colosenses.php", "ventana1", "width=360,height=550,scrollbars=YES");
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Abre ventana con contenido sobre los valores, es llamada en cultura.php
function verValor_Juan(){
    window.open("../controlador/Valor_Juan.php", "ventana1", "width=360,height=550,scrollbars=YES");
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Abre ventana mostrando la insignia, es llamada en participacionHoy.php
function mostrarInsignia(){
    window.open("../vista/InsigniaMaestro.php", "ventana1", "width=360,height=650,scrollbars=YES");
}
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------
//Oculta el contenedor de regiones en datos_Personales.php
    function ocultaRegion(){
        document.getElementById("Regiones").style.display = 'none';
    }
// -------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------