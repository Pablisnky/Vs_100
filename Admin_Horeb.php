<?php
    if(!isset($_POST['enviar'])){//sino se a pulsado el boton enviar significa que no se ha declarado el indice "enviar"de este archivo y se entra en el formulario    ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label>Pregunta Nº 1</label>
            <textarea name="pregunta_1"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 2</label>
            <textarea name="pregunta_2"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 3</label>
            <textarea name="pregunta_3"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 4</label>
            <textarea name="pregunta_4"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 5</label>
            <textarea name="pregunta_5"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 6</label>
            <textarea name="pregunta_6"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 7</label>
            <textarea name="pregunta_7"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 8</label>
            <textarea name="pregunta_8"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 9</label>
            <textarea name="pregunta_9"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 10</label>
            <textarea name="pregunta_10"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 11</label>
            <textarea name="pregunta_11"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <label>Pregunta Nº 12</label>
            <textarea name="pregunta_12"></textarea>
            <br>
            <ul>
                <li>Opcion A<textarea></textarea></li>
                <li>Opcion B<textarea></textarea></li>
                <li>Opcion C<textarea></textarea></li>
                <li>Opcion D<textarea></textarea></li>
            </ul>
            <hr>
            <input type="submit" value="Guardar" name="enviar">
        </form>
        <?php
    }
    else{
        $Pregunta_1 = $_POST["pregunta_1"];
        $Pregunta_2 = $_POST["pregunta_2"];
        $Pregunta_3 = $_POST["pregunta_3"];
        $Pregunta_4 = $_POST["pregunta_4"];
        $Pregunta_5 = $_POST["pregunta_5"];
        $Pregunta_6 = $_POST["pregunta_6"];
        $Pregunta_7 = $_POST["pregunta_7"];
        $Pregunta_8 = $_POST["pregunta_8"];
        $Pregunta_9 = $_POST["pregunta_9"];
        $Pregunta_10 = $_POST["pregunta_10"];
        $Pregunta_11 = $_POST["pregunta_11"];
        $Pregunta_12 = $_POST["pregunta_12"];

        echo $Pregunta_1;
        echo $Pregunta_2;
        echo $Pregunta_3;
        echo $Pregunta_4;
        echo $Pregunta_5;
        echo $Pregunta_6;
        echo $Pregunta_7;
        echo $Pregunta_8;
        echo $Pregunta_9;
        echo $Pregunta_10;
        echo $Pregunta_11;
        echo $Pregunta_12;

        //Se conexta con la BD
		include("conexion/Conexion_BD.php");
        

        //Se insertan las preguntas redactadas en la BD
        $Insertar_1= "INSERT INTO texto_preguntas(Pregunta_1, Pregunta_2, Pregunta_3, Fecha) VALUE('$Pregunta_1','$Pregunta_2','$Pregunta_3', CURDATE())";
        mysqli_query($conexion,$Insertar_1) or DIE ('Falló la inserción de preguntas');

    }   ?>