<!-- Utilizado en perfil_comerciante.php  perfil_tatto.php   perfil_ingeniero.php-->
        <?php 
            $Consulta_1= "SELECT * FROM participante WHERE ID_Participante=  '$participante'";
            $Recordset_1 = mysqli_query($conexion,$Consulta_1);
            $Usuario= mysqli_fetch_array($Recordset_1);

        ?>
        <fieldset class="Afiliacion_4">
            <legend>Datos personales</legend>
            <label>Nombre:</label>
            <input class="etiqueta_32" type="text" name="nombre" id="Nombre" value="<?php echo $Usuario['Nombre'];?>" style="text-transform: capitalize;" />
            <label>Apellido:</label>
            <input class="etiqueta_32" type="text" name="apellido" id="Apellido" value="<?php echo $Usuario['Apellido'];?>" style="text-transform: capitalize;"/>
            <label>Cédula:</label>
            <input class="etiqueta_32" type="text" name="cedula" id="Cedula" value="<?php echo $Usuario['Cedula'];?>"/>
            <label>Teléfono:</label>
            <input class="etiqueta_32" type="text" name="telefonoMovil" id="TelefonoMovil" value="<?php echo $Usuario['Telefono'];?>"/> <!--  onclick="limpiarColorTelefonoMovil()"  onblur="validarFormatotelefonoMovil(this.value)"-->
            </select> 
            <label>Correo electronico:</label>
            <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Usuario['Correo'];?>" style="text-transform: lowercase;"/> 
    </fieldset>
    <fieldset class="Afiliacion_4"> 
        <legend>Datos de congregación</legend>
        <label>Pais:</label>
        <select style="width: 49% !important;" name="pais" id="Pais" onclick="SeleccionarRegiones(this.form); ocultaRegion();"> <!-- SeleccionarRegiones() se encuentra en Funciones_varias.js.js-->
            <option><?php echo $Usuario['Pais'];?></option>
            <option>Colombia</option>
            <option>Venezuela</option>
        </select>                    
        <div id="Region_1B" style="display: none;"><!--Aplica solo a Colombia-->
            <label>Departamento:</label>
            <select style="width: 49% !important;" class="etiqueta_24" name="departamento" id="Departamento" onclick="SeleccionarMunicipio_Colombia(this.form)">
                <option></option>                            
            </select>                     
            <label>Municipio:</label>
            <select style="width: 49% !important;" class="etiqueta_24" name="municipio_Col" id="Municipio_Col"> 
                <option></option>
            </select>           
        </div> 
        <div id="Region_1C" style="display: none;"><!--Aplica solo a Venezuela-->
            <label>Estado:</label>
            <select style="width: 49% !important;" class="etiqueta_24" name="estado" id="Estado" onclick="SeleccionarMunicipio(this.form)">
                <option></option>                            
            </select>                                   
            <label>Municipio:</label>
            <select style="width: 49% !important;" class="etiqueta_24" name="municipio" id="Municipio"> 
                <option></option>
            </select>                  
        </div>   
        <!-- Muestra la region y sub region que existe en la base de datos-->
        <div id="Regiones">
            <?php
            if($Usuario['Pais'] == "Venezuela"){ ?>
                <label>Estado:</label>
                <input class="etiqueta_32" type="text" name="estado_BD" readonly="readonly" value="<?php echo $Usuario['region_Afi']?>"> 
                <label>Municipio:</label>
                <input class="etiqueta_32" type="text" name="municipio_BD" readonly="readonly" value="<?php echo $Usuario['subRegion_Afi']?>">
                <?php       
            }  
            else if($Usuario['Pais'] == "Colombia"){ ?>
                <label>Departamento:</label>
                <input class="etiqueta_32"  type="text" name="departamento_BD" readonly="readonly" value="<?php echo $Usuario['Region']?>"> 
                <label>Municipio:</label>
                <input class="etiqueta_32" type="text" name="municipioCol_BD" readonly="readonly" value="<?php echo $Usuario['SubRegion']?>">   <?php       
            }   ?>
        </div>   
            <label>Iglesia o grupo:</label>
            <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Usuario['Iglesia'];?>" style="text-transform: lowercase;"/>                  
    </fieldset>

<script>
    function ocultaRegion(){
        document.getElementById("Regiones").style.display = 'none';
    }
</script>