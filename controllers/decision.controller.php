<?php

declare (strict_types=1);

/*
 * Aquí hacemos los ejercicios y rellenamos el array de datos.
 */
$data['titulo'] = "Básicos";

$ej1Dividendo = isset($_GET['dividendo']) && filter_var($_GET['divisor'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) !== false ? (int) $_GET['dividendo'] : 20;
$ej1Divisor = isset($_GET['divisor']) && filter_var($_GET['divisor'], FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE) !== false ? (int) $_GET['divisor'] : 4;

$data['ej1_dividendo'] = $ej1Dividendo;
$data['ej1_divisor'] = $ej1Divisor;
$data['ej1_resultado'] = esDivisible($ej1Dividendo, $ej1Divisor);

function esDivisible(int $dividendo, int $divisor): bool {
    if ($divisor === 0) {
        return false;
    } else {
        return $dividendo % $divisor == 0;
    }
}

//ej2

$ej2num1 = isset($_GET['ej2_num1']) && filter_var($_GET['ej2_num1'], FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE) !== false ? (float) $_GET['ej2_num1'] : 8.0;
$ej2num2 = isset($_GET['ej2_num2']) && filter_var($_GET['ej2_num2'], FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE) !== false ? (float) $_GET['ej2_num2'] : 6.7;
$ej2num3 = isset($_GET['ej2_num3']) && filter_var($_GET['ej2_num3'], FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE) !== false ? (float) $_GET['ej2_num3'] : 9.0;

$data['ej2_resultado'] = numeroMayorQ($ej2num3, $ej2num2, $ej2num1);
$data['ej2_num1'] = $ej2num1;
$data['ej2_num2'] = $ej2num2;
$data['ej2_num3'] = $ej2num3;

function numeroMayorQ(float $n1, float $n2, float $n3): float {
    if ($n1 >= $n2 && $n1 >= $n3) {
        return $n1;
    } elseif ($n2 >= $n1 && $n2 >= $n3) {
        return $n2;
    } else {
        return $n3;
    }
}

//ej3

$segundosTotal = 128372;
$data['ej3_sec'] = $segundosTotal % 60;
$minutosTotal = intval($segundosTotal / 60);
$data['ej3_min'] = $minutosTotal % 60;
$horasTotal = intval($minutosTotal / 60);
$data['ej3_hora'] = $horasTotal % 24;
$data['ej3_dia'] = intval($horasTotal / 24);

//ej4
$ano = 2003;
$data['ej4_ano'] = $ano;
$data['ej4_result'] = ($ano % 4 === 0 && $ano % 100 !== 0) || ($ano % 400 === 0);

//ej5
$data['ej5_num'] = 367;
$data['ej5_centena'] = intval($data['ej5_num'] / 100);
$data['ej5_decena'] = intval(($data['ej5_num'] - $data['ej5_centena'] * 100) / 10);
$data['ej5_unidad'] = $data['ej5_num'] - $data['ej5_centena'] * 100 - $data['ej5_decena'] * 10;

//ej6
$sueldo = 10000;
if ($sueldo <= 1000) {
    $neto = $sueldo * 0.9;
} elseif ($sueldo <= 2000) {
    $neto = 900 + ($sueldo - 1000) * 0.85;
} else {
    $neto = 900 + 850 + ($sueldo - 2000) * 0.82;
}

$descuento = calcTramo($sueldo, 0, 1000, 10) + calcTramo($sueldo, 1000, 2000, 15) + calcTramo($sueldo, 2000, INF, 18);

$data['ej6_neto'] = $neto;
$data['ej6_sueldo'] = $sueldo;
$data['ej6_descuento'] = $sueldo - $neto;

function calcTramo(float $sueldo, float $min, float $max, float $porcentaje): float {
    if ($sueldo < $min) {
        return 0;
    } elseif ($sueldo > $max) {
        return ($max - $min) * $porcentaje / 100;
    } else {
        return ($sueldo - $min) * $porcentaje / 100;
    }
}

//ej7
$ej7Num = 6;
$data['ej7_nota'] = $ej7Num;

if ($ej7Num < 5) {
    $data['ej7_texto'] = "Suspenso";
    $data['ej7_clase'] = "text-danger";
} elseif ($ej7Num < 6) {
    $data['ej7_texto'] = "Aprobado";
    $data['ej7_clase'] = "text-warning";
} elseif ($ej7Num < 7) {
    $data['ej7_texto'] = "Bien";
    $data['ej7_clase'] = "text-info";
} elseif ($ej7Num < 8.75) {
    $data['ej7_texto'] = "Notable";
    $data['ej7_clase'] = "text-info";
} elseif ($ej7Num < 10) {
    $data['ej7_texto'] = "Sobresaliente";
    $data['ej7_clase'] = "text-success";
} elseif ($ej7Num == 10) {
    $data['ej7_texto'] = "Matrícula";
    $data['ej7_clase'] = "text-success";
} else {
    $data['ej7_texto'] = "número no válido";
    $data['ej7_clase'] = "";
}

//ej8
$ej8Texto =  isset($_GET['texto']) && filter_var($_GET['texto'],FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE) !== false ? $_GET['texto'] : "Mondariz";
$data['ej8_texto'] = $ej8Texto;
switch (strtolower( $ej8Texto)) {
    case "mondariz":
    case "cabreiroa":
    case "cabreiroá":
    case "mondariz":
        $data['ej8_result'] = "agua";
        break;
    case "marcilla":
    case "bonka":
        $data['ej8_result'] = "café";
        break;
    case "kas":
    case "coca-cola":
    case "mondariz":
        $data['ej8_result'] = "refresco";
        break;

    default:
        $data['ej8_result'] = "error";
        break;
    
}




/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/decision.view.php';
include 'views/templates/footer.php';
