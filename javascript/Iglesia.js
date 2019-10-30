function SeleccionarIglesia_Col(form){  //Llamada al seleccionar un municipio colombiano  
    var Departamento = form.departamento.options;
    var municipio_Col = form.municipio_Col.options;//se captura el elemento select que contiene los 
    var Iglesia = form.iglesia.options;//se captura el elemento select que contiene los 
    Iglesia.length = null;

    if(Departamento[22].selected == true){//Norte de Santander
        if(municipio_Col[0].selected == true){//si la opcion cero del array select esta seleccionada, la opcion cero del array Municipio_Col valdra 
            var destino0 = new Option("espere");
            Iglesia[0] = destino0;
        }
        if(municipio_Col[26].selected == true){//Pamplona
            Iglesia[0] = new Option("");
            Iglesia[1] = new Option("Galilea "); 
            Iglesia[2] = new Option("Peniel"); 
            Iglesia[3] = new Option("San Pedro"); 
            Iglesia[4] = new Option("Otro"); 
        }
    }
    if(Departamento[27].selected == true){//Santander
        if(municipio_Col[0].selected == true){//si la opcion cero del array select esta seleccionada, la opcion cero del array Municipio_Col valdra 
            var destino0 = new Option("espere");
            Iglesia[0] = destino0;
        }
        if(municipio_Col[9].selected == true){//Bucaramanga
            Iglesia[0] = new Option("");
            Iglesia[1] = new Option("Canaán norte   "); 
            Iglesia[2] = new Option("Campo hermoso"); 
            Iglesia[3] = new Option("Central"); 
            Iglesia[4] = new Option("Cristo vive "); 
            Iglesia[5] = new Option("Filadelfia"); 
            Iglesia[6] = new Option("Jardín"); 
            Iglesia[7] = new Option("Kennedy"); 
            Iglesia[8] = new Option("La Victoria"); 
            Iglesia[9] = new Option("Libertad"); 
            Iglesia[10] = new Option("Miraflores"); 
            Iglesia[11] = new Option("Mutis"); 
            Iglesia[12] = new Option("Norte"); 
            Iglesia[13] = new Option("Redención"); 
            Iglesia[14] = new Option("Renuevame"); 
            Iglesia[15] = new Option("Sarón"); 
            Iglesia[16] = new Option("Sotomayor");
            Iglesia[17] = new Option("Otro"); 
        }
        if(municipio_Col[36].selected == true){//Girón
            Iglesia[0] = new Option("");
            Iglesia[1] = new Option("Emmanuel");  
            Iglesia[2] = new Option("Lebrija");
            Iglesia[3] = new Option("Palestina");
            Iglesia[4] = new Option("Peniel Girón");
            Iglesia[5] = new Option("Sión");
            Iglesia[6] = new Option("Otro");
        }
        if(municipio_Col[61].selected == true){//Piedecuesta
            Iglesia[0] = new Option("");
            Iglesia[1] = new Option("Betania");  
            Iglesia[2] = new Option("Central Piedecuesta");  
            Iglesia[3] = new Option("Cristales");
            Iglesia[4] = new Option("Otro");
        }
        if(municipio_Col[33].selected == true){//Floridablanca
            Iglesia[0] = new Option("");
            Iglesia[1] = new Option("Central Florida");  
            Iglesia[2] = new Option("Cumbre");
            Iglesia[3] = new Option("English Church Cañaveral");
            Iglesia[4] = new Option("Lagos");
            Iglesia[5] = new Option("Paraíso");
            Iglesia[6] = new Option("Otro");
        }
    }
}
