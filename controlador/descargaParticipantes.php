<?php
header("Content-disposition: attachment; filename=nombre_del_archivo.extension");
header("Content-type: application/zip"); //MIME = “application/zip“
readfile("nombre_del_archivo.extension");
?>