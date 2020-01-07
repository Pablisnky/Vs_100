<?php
    require_once "constantesLocal.php";

    //se instancia un objeto para la clase (nativa) mysqli y se le envian parametro al metodo constructor
    $conexion = new mysqli(HOSTING, USUARIO, PASSWORD, NOMBRE_BD);

    //se verifica si la conexión y selección de la base de datos se efectuó en forma correcta
    if($conexion->connect_error){
      die('Problemas con la conexion a la base de datos de horebi.com');
    }

    mysqli_query($conexion,'SET NAMES "' . CHARSET . '"');//es importante esta linea para que los caracteres especiales funcionen, tanto graficamente como logicamente

//------------------------------------------------------------------------------
/*if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $query;
    }

    function ejecutarConsultaSimpleFila($sql) {
        global $conexion;
        $query = $conexion->query($sql);
        $row   = $query->fetch_assoc();

        return $row;
    }

    function ejecutarConsulta_retornarID($sql) {
        global $conexion;
        $query = $conexion->query($sql);

        return $conexion->insert_id;
    }

    function limpiarCadena($str) {
        global $conexion;
        $str = mysqli_real_escape_string($conexion, trim($str));

        return htmlspecialchars($str);
    }
}*/
?>