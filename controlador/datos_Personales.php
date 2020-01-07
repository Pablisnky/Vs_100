<?php 
    $Consulta_1= "SELECT * FROM participante WHERE ID_Participante=  '$participante'";
    $Recordset_1 = mysqli_query($conexion,$Consulta_1);
    $Usuario= mysqli_fetch_array($Recordset_1);
?>
    <a id="marcador_02" class="ancla_2"></a>
    <fieldset class="Afiliacion_4">
        <legend>Datos personales</legend>
        <label>Nombre:</label>
        <input class="etiqueta_32" type="text" name="nombre" id="Nombre" value="<?php echo $Usuario['Nombre'];?>" style="text-transform: capitalize;" />
        <label>Apellido:</label>
        <input class="etiqueta_32" type="text" name="apellido" id="Apellido" value="<?php echo $Usuario['Apellido'];?>" style="text-transform: capitalize;"/>
        <label>Correo electronico:</label>
        <input class="etiqueta_32" type="text" name="correo" id="Correo" value="<?php echo $Usuario['Correo'];?>" style="text-transform: lowercase;"/> 
    </fieldset>
    <fieldset class="Afiliacion_4  Afiliacion_3"> 
        <legend>Datos de congregación</legend>
        <label class="etiqueta_34">Pais:</label>
        <select class="etiqueta_33" name="pais" id="Pais" onclick="ocultaRegion(); SeleccionarRegiones(this.form)"> <!--se encuentra en Funciones_varias.js.js-->
            <option><?php echo $Usuario['Pais'];?></option>
            <option>Colombia</option>
            <option>Ecuador</option>
			<option>Venezuela</option>
			<option>Otro</option>
        </select>    
		<input type="text" name="otroPais" id="OtroPais" placeholder="Indique su pais sino esta en la lista" style="display:none">   
            <!--Aplica solo a Ecuador-->
			<div id="Region_1A" style="display: none;">
			    <!-- <label>Provincia:</label> -->
			    <label class="etiqueta_34">Provincia:</label>
				<select class="etiqueta_33" name="provincia" id="Provincia" onchange="SeleccionarCanton(this.form)">
					<option></option>                            
				</select>                  
								
				<label class="etiqueta_34">Cantón:</label>
				<select class="etiqueta_33" name="canton" id="Canton"> 
					<option></option>
				</select>                  
				<br>
            </div> 

            <!--Aplica solo a Colombia-->
            <div id="Region_1B" style="display: none;">
			    <label class="etiqueta_34">Departamento:</label>
				<select class="etiqueta_33" name="departamento" id="Departamento" onchange="SeleccionarMunicipio_Colombia(this.form)">
					<option></option>                            
				</select>                  
				<label class="etiqueta_34">Municipio:</label>
					<select class="etiqueta_33" name="municipio_Col" id="Municipio_Col" onchange="SeleccionarIglesia_Col(this.form)">  
					<option></option>
				</select>    
            </div> 

            <!--Aplica solo a Venezuela-->
            <div id="Region_1C" style="display: none;">
                <label>Estado:</label>
                <select  class="etiqueta_33" name="estado" id="Estado" onclick="SeleccionarMunicipio(this.form)">
                    <option></option>                            
                </select>                                   
                <label>Municipio:</label>
                <select class="etiqueta_33" name="municipio" id="Municipio" onchange="SeleccionarIglesia_Ven(this.form)"> 
                    <option></option>
                </select>                  
            </div>  

			<div id="Region_1D" style="display: none;">
				<label class="etiqueta_34">Iglesia de congregación:</label>
				<select class="etiqueta_33" name="iglesia" id="Iglesia" onchange="if(this.value=='Otro'){document.getElementById('Otra_Iglesia').style.display='block';}">
					<option></option>                            
				</select>    
				<input type="text" name="otraIglesia" id="Otra_Iglesia" style="display:none" placeholder="Indique nombre de grupo o iglesia">       
			</div>   
        
        <!-- Muestra la region y sub region que estan guardadas en la base de datos-->
        <div id="Regiones">
            <?php
            if($Usuario['Pais'] == "Venezuela"){ ?>
                <label>Estado:</label>
                <input class="etiqueta_32" type="text" name="estado_BD" readonly="readonly" value="<?php echo $Usuario['Region']?>"> 
                <label>Municipio:</label>
                <input class="etiqueta_32" type="text" name="municipio_BD" readonly="readonly" value="<?php echo $Usuario['SubRegion']?>">
                <?php       
            }  
            else if($Usuario['Pais'] == "Colombia"){ ?>
                <label>Departamento:</label>
                <input class="etiqueta_32"  type="text" name="departamento_BD" readonly="readonly" value="<?php echo $Usuario['Region']?>"> 
                <label>Municipio:</label>
                <input class="etiqueta_32" type="text" name="municipioCol_BD" readonly="readonly" value="<?php echo $Usuario['SubRegion']?>">   <?php       
            }   ?> 
            <label>Iglesia o grupo:</label>
            <?php
                if($Usuario['Iglesia']=="Otro"){ ?>
                    <input class="etiqueta_32" type="text" name="otra_iglesia" id="Iglesia" value="<?php echo $Usuario['Otra_Iglesia'];?>"/>     <?php
                }
                else{   ?>
                    <input class="etiqueta_32" type="text" name="iglesia" id="Iglesia" value="<?php echo $Usuario['Iglesia'];?>"/>     <?php
                }  
            ?>
        </div>                  
    </fieldset>