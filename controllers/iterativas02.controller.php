<?php

//var_dump($_POST);
//var_dump($_GET);
$data = array();
        //var_dump($data);


if (isset($_POST['enviar'])) {
    $errores = checkForm($_POST);
    $data['errores'] = $errores;
    $data['input'] = sanitizarInput($_POST);
    if (count($errores) === 0) {
        $resultado = ordenar(explode(",", $_POST['datos']));
        $data['resultado'] = implode(",", $resultado);

    }
}




function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}


function checkForm(array $datos): array {
    $errores = array();
    if (empty($datos['datos'])) {
        $errores['datos'] = "Este campo es obligatorio";
    } else {
        $array = explode(",", $datos['datos']);
        $numErroneos = array();
        foreach ($array as $numero) {
            if (!is_numeric($numero)) {
                $numErroneos[] = filter_var($numero, FILTER_SANITIZE_SPECIAL_CHARS);
                //array_push($numErroneos, $numero);
            }
        }
        if (count($numErroneos) > 0) {
            $errores['datos'] = "Los siguientes valores no son válidos: " . implode(",", $numErroneos);
        }
    }
    return $errores;
}



function ordenar(array $array): array {
    for ($x = 0; $x < count($array); $x++) {
        for ($y = 0; $y < count($array) - 1; $y++) {
            if ($array[$y] > $array[$y + 1]) {
                $temp = $array[$y + 1];
                $array[$y + 1] = $array[$y];
                $array[$y] = $temp;
            }
        }
    }
    return $array;
}


include 'views/templates/header.php';
include 'views/iterativas02.view.php';
include 'views/templates/footer.php';
