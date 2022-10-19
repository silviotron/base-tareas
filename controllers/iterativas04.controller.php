<?php

//var_dump($_POST);
//var_dump($_GET);
$data = array();
//var_dump($data);


if (isset($_POST['enviar'])) {
    $data['input'] = sanitizarInput($_POST);
    if ($_POST['datos'] != "") {
        $remplazado = preg_replace('/[^a-z]/', '', strtolower($_POST['datos']));
        if (!empty($remplazado)) {
            $letras = str_split($remplazado);
            $contador = [];

            for ($i = 0; $i < count($letras); $i++) {
                if (isset($contador[$letras[$i]])) {
                    $contador[$letras[$i]]++;
                } else {
                    $contador[$letras[$i]] = 1;
                }
            }
            array_multisort($contador, SORT_DESC);
            $data['resultado'] = $contador;
        } else {
            $data['errores']['datos'] = "la cadena debe contener letras";
        }
    } else {
        $data['errores']['datos'] = "Campo requerido";
    }
}

function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}


include 'views/templates/header.php';
include 'views/iterativas04.view.php';
include 'views/templates/footer.php';
