<?php
define("CONTROLLERS_HOME", 'controllers/');

/**
 * Escaneamos en busca de controladores
 */
$allfiles = scandir('./'.CONTROLLERS_HOME);
$scripts = array();
foreach ($allfiles as $file) {
    $file_parts = pathinfo($file);
    //var_dump($file_parts);
    if(substr($file_parts['filename'], 0, 1) != "_" && substr($file_parts['filename'], -10) == 'controller' && $file_parts['extension'] == "php" ){
        array_push($scripts, substr($file_parts['filename'], 0, -11));        
    }
}
                        
require_once '_loader.php';