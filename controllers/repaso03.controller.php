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
    $remplazado1 = preg_replace('/[^0-9?]/','',$datos['texto']);
    $remplazado2 = preg_replace('/^\?+/','',$remplazado1);
    $texto = str_split($remplazado2);
    var_dump($texto);
    $primero = $texto[0];
    $contador = 0;
    for ($index = 1; $index < count($texto); $index++) {
        if(is_numeric($texto[$index])){
            if ($texto[$index] + $primero == 10) {
                if ($contador != 3) {
                    if (isset($errores['texto'])) {
                    $errores['texto'] .= "<br>Error. Entre el".$primero." y el ".$texto[$index]." , el numero de interrogaciones es: ".$contador;
                        
                    }else{
                        $errores['texto'] = "Error. Entre el".$primero." y el ".$texto[$index]." , el numero de interrogaciones es: ".$contador;

                    }
                    
                }
                
            }
            $contador = 0;                
            $primero = intval($texto[$index]);
        }
        if($texto[$index] === "?"){
            $contador++;
        }

        
    }
    
    return $errores;
}


function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

include 'views/templates/header.php';
include 'views/repaso03.view.php';
include 'views/templates/footer.php';
