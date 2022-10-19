<?php

//var_dump($_POST);
//var_dump($_GET);
//var_dump($data);
define('MIN', 1);
define('MAX', 80);
define('CARTON', 15);
$data = array();

if (isset($_POST['enviar'])) {
    if (!isset($_POST['resultado_anterior']) || empty($_POST['resultado_anterior'])) {
        $resultado = array();
    } else {
        $resultado = json_decode(base64_decode($_POST['resultado_anterior']), true);
    }
    if (!isset($_POST['carton_anterior']) || empty($_POST['carton_anterior'])) {
        $carton = cartonFill();
        sort($carton);
    } else {
        $carton = json_decode(base64_decode($_POST['carton_anterior']), true);
    }
    if (!isset($_POST['bolas_anterior']) || empty($_POST['bolas_anterior'])) {
        $bolas = array_fill(MIN, MAX, 0);
    } else {

        $bolas = json_decode(base64_decode($_POST['bolas_anterior']), true);
    }

    $bola = sacarBola($bolas);
    unset($bolas[$bola]);
    $data['bolas'] = $bolas;
    if(isset($carton[$bola]) && in_array($carton[$bola], $carton)){
        $carton[$bola] = "<del>".$carton[$bola]."</del>";
        //meter bien el dato
    }
    $resultado[] = $bola;
    $data['resultado'] = $resultado;
    $data['carton'] = $carton;
}

function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

function sacarBola(array $bolas): int {
    $array = array_keys($bolas);
    $result = $array[rand(0, count($array) - 1)];
    //unset($bolas[$result]);
    return $result;
}

function cartonFill(): array {
    $total = array_fill(MIN, MAX, 0);
    for ($e = 0; $e < CARTON; $e++) {
        $bola = sacarBola($total);
        $result[] = $bola;
        unset($total[$bola]);
    }
    
    return $result;
}

include 'views/templates/header.php';
include 'views/iterativas07.view.php';
include 'views/templates/footer.php';
