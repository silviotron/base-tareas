<?php

//var_dump($_POST);
//var_dump($_GET);
$data = array();
//var_dump($data);


if (isset($_POST['enviar'])) {
    $data['input'] = sanitizarInput($_POST);
    if ($_POST['datos'] != "") {
        $remplazado = preg_replace('/ +/', ' ', preg_replace('/[^a-z ]/', '', strtolower($_POST['datos'])));
        if (!empty($remplazado)) {
            $letras = explode(" ",$remplazado);
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
include 'views/iterativas05.view.php';
include 'views/templates/footer.php';
