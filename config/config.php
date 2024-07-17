<?php

    $folderPath = dirname($_SERVER['SCRIPT_NAME']);
    $urlPath = $_SERVER['REQUEST_URI'];
    //substr() sirve para extraer una cadena de texto sobre 
    //otra cadena de texto
    $url = substr($urlPath,strlen($folderPath));

    define('URL',$url);

?>