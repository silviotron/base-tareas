<?php

//var_dump($_POST);
//var_dump($_GET);
$data = array();
//var_dump($data);


if (isset($_POST['enviar'])) {
    $data['errores'] = checkForm($_POST);
    $data['input'] = sanitizarInput($_POST);
}

function checkForm(array $datos): array {
    $errores = [];
    $texto = str_split(preg_replace('^?','',preg_replace('/[^0-9?]/','',$datos['texto'])));
    $primero = $texto[0];
    foreach ($texto as $key => $value) {
        if(is_numeric($value)){
            $primero = intval($value);
            $contador = 0;
        }
        if($value === "?"){
            $contador++;
        }

        
    }
    
    return $errores;
}


function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

include 'views/templates/header.php';
include 'views/repaso02.view.php';
include 'views/templates/footer.php';
