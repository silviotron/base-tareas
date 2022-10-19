<?php

var_dump($_POST);
var_dump($_GET);

$data = array();
if (isset($_POST['enviar'])) {
    $errores = checkForm($_POST);
    $data['errores'] = $errores;
    $data['input'] = sanitizarInput($_POST);
    if (count($errores) === 0) {
        $resultado = getMinMax(explode(",", $_POST['datos']));
        $data['resultado'] = $resultado;
    }
}

function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

function getMinMax(array $numeros): array {
    $min = $numeros[0];
    $max = $numeros[0];
    foreach ($numeros as $num) {
        if ($min > $num) {
            $min = $num;
        }
        if ($max < $num) {
            $max = $num;
        }
    }
    return array(
        'min' => $min,
        'max' => $max
    );
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

//ej2
if (isset($_POST['enviar'])) {
    $errores = checkForm($_POST);
    $data['ej2_errores'] = $errores;
    $data['ej2_input'] = sanitizarInput($_POST);
    if (count($errores) === 0) {
        $resultado = ordenar(explode(",", $_POST['ej2_datos']));
        $data['ej2_resultado'] = $resultado;
    }
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
var_dump($data);


include 'views/templates/header.php';
include 'views/iterativas01.view.php';
include 'views/templates/footer.php';
