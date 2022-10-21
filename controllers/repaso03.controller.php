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
    $nombre = $datos['nombre'];
    if (empty($nombre) || preg_match("/^ +$/", $nombre)) {
        $errres['nombre'] = "El nombre es obligatorio";
    } else {
        if (preg_match('/.*[^a-zA-Z\s].*/', $nombre) || strlen(preg_replace("/[^a-zA-Z]/", "", $nombre)) <= 5) {
            $errores['nombre'] = '';
            if (preg_match('/.*[^a-zA-Z\s].*/', $nombre)) {
                $errores['nombre'] .= "El nombre debe estar formado por letras y espacos<br>";
            }
            if (strlen(preg_replace("/[^a-zA-Z]/", "", $nombre)) <= 5) {
                $errores['nombre'] .= "El nombre debe estar formado por mas de 5 caracteres <br>";
            }
        }
    }
    
    $ip = trim($datos['ip']);
    if (empty($ip) || preg_match("/^\s+$/", $ip)) {
        $errores['ip'] = "La ip es obligatoria";
    } else {
        if (!filter_var($ip,FILTER_VALIDATE_IP)) {
            $errores['ip'] = "La ip no es valida";
        }
    }
    if (isset($datos['opcions']) && (in_array('tarjeta',$datos['opcions']) && !in_array('socio',$datos['opcions']))) {
        $errores['opcions'] = "para ser socio debes poner tarjeta";
    }
    return $errores;
}

function checkNombre($nombre) {
    
}

function checkIp($ip) {

    return "";
}

function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

include 'views/templates/header.php';
include 'views/repaso02.view.php';
include 'views/templates/footer.php';
