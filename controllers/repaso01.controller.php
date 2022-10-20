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
            $palabras = explode(" ", $remplazado);
            $contador = [];
            foreach ($palabras as $palabra) {
                $letra = substr($palabra, 0, 1);
                if (!isset($contador[$letra])) {
                    $contador[$letra] = [];
                }
                if (!in_array($palabra, $contador[$letra])) {
                $contador[$letra][] = $palabra;
                    
                }
            }
            $letras = [];
            foreach ($contador as $key => $value) {
                sort($value);
                $contador[$key] = $value;
            }
            ksort($contador);
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
include 'views/repaso01.view.php';
include 'views/templates/footer.php';
