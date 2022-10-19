<?php

//var_dump($_POST);
//var_dump($_GET);
$data = array();

if (isset($_POST['enviar'])) {
    $errores = checkForm($_POST);
    $data['errores'] = $errores;
    $data['input'] = sanitizarInput($_POST);
    if (count($errores) === 0) {
        $array = toMatriz($_POST['datos']);

        $resultado = volver($array, ordenar(toArray($array)));
//        $data['resultado'] = implode(",", $resultado);
        $data['porcentaje'] = 1 / count($array[0]) * 100;

        //$data['resultado'] = $resultado;
        $data['resultado'] = formatMatriz($resultado);
        //$data['dara'] = toArray($array);
        $data['datos'] = formatMatriz($array);
    }
}

function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

function toMatriz(string $datos): array {
    $array1 = explode("|", $datos);
    for ($i = 0; $i < count($array1); $i++) {
        $array2[$i] = explode(",", $array1[$i]);
    }
    return $array2;
}

function toArray(array $matriz): array {
    $array = array();
    foreach ($matriz as $matriz2) {
        foreach ($matriz2 as $numero) {
            $array[] = $numero;
        }
    }
    return $array;
}

function volver(array $array1, array $array2): array {
    for ($x = 0; $x < count($array1); $x++) {
        for ($y = 0; $y < count($array1[$x]); $y++) {
            $array1[$x][$y] = $array2[$x * count($array1[$x]) + $y];
        }
    }
    return $array1;
}

//volver a matriz

function checkForm(array $datos): array {
    $errores = array();
    if (empty($datos['datos'])) {
        $errores['datos'] = "Este campo es obligatorio";
    } else {
        $array1 = explode("|", $datos['datos']);
        $numErroneos = array();
        foreach ($array1 as $string) {
            $array2 = explode(",", $string);
            foreach ($array2 as $numero) {
                if (!is_numeric($numero)) {
                    $numErroneos[] = filter_var($numero, FILTER_SANITIZE_SPECIAL_CHARS);
                    //array_push($numErroneos, $numero);
                }
            }
        }
        if (count($numErroneos) > 0) {
            $errores['datos'] = "Los siguientes valores no son válidos: " . implode(",", $numErroneos);
            //$errores['datos'] = "Los siguientes valores no son válidos: " . implode(",", $numErroneos);
        } else {
            if (!mismoTamano(toMatriz($datos['datos']))) {
                $errores['datos'] = "la matriz tiene que tener el mismo numero de columnas en cada fila";
            }
        }
    }
    return $errores;
}

function mismoTamano(array $array) {
    $resultado = true;
    $tam = count($array[0]);
    foreach ($array as $value) {
        $resultado = $resultado && $tam === count($value);
    }
    return $resultado;
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

function formatMatriz(array $array): string {
    $result = "<table>";
    foreach ($array as $subArray) {
        $result .= "<tr>";
        foreach ($subArray as $number) {
            $result .= "<td>" . $number . "</td>";
        }
        $result .= "</tr>";
    }
    $result .= "</table>";
    return $result;
}

include 'views/templates/header.php';
include 'views/iterativas03.view.php';
include 'views/templates/footer.php';
