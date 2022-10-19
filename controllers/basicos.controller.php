<?php

/*
 * Aquí hacemos los ejercicios y rellenamos el array de datos.
 */
$data['titulo'] = "Básicos";

$numeroEj01 = 133;
$resultadoEj01 = $numeroEj01 ** 2;
$data['ejercicio01_resultado'] = "El cuadrado del número $numeroEj01 es $resultadoEj01";

$precioHoraEj02 = 10;
$numeroHorasEj02 = 8;
$resultadoEj02 = $precioHoraEj02 * $numeroHorasEj02;
$data['ejercicio02_resultado'] = "El precio hora es $precioHoraEj02 €, se han trabajado $numeroHorasEj02 horas por lo que se pagarán $resultadoEj02 €";

$base = $_POST['base'] ?? 0;
$altura = $_POST['altura'] ?? 0;
$area = $base * $altura;
$perimetro = 2 * $base + 2 * $altura;
$data['ejercicio03_resultado'] = "Base: $base | Altura: $altura<br>Area: $area | Perímetro: $perimetro";

$nombre = "Juan";
$edad = 34;
$notaMedia = 3.6;
$data['nombre'] = $nombre;
$data['edad'] = $edad;
$data['notaMedia'] = $notaMedia;
$data['ejercicio04_resultado'] = "Nombre: $nombre | Edad: $edad | Media: $notaMedia";

$precioAlta = 180;
$precioBaja = 120;
$nochesAlta = 10;
$nochesBaja = 0;
$data['precioAlta'] = $precioAlta;
$data['precioBaja'] = $precioBaja;
$data['nochesAlta'] = $nochesAlta;
$data['nochesBaja'] = $nochesBaja;
$data['ejercicio05_resultado'] = $precioAlta * $nochesAlta + $precioBaja * $nochesBaja;

$radio = $_GET['radio'] ?? 0;
$area06 = pi() * $radio * $radio;
$perimetro06 = 2 * pi() * $radio;
$data['radio'] = $radio;
$data['area06'] = $area06;
$data['perimetro06'] = $perimetro06;

$velocidad = $_POST['velocidad'] ?? 0;
$resultado07 = $velocidad / 3.6;
$data['velocidad'] = $velocidad;
$data['resultado07'] = $resultado07;
$data['ejercicio07_resultado'] = "TBA";

$numero08 = 367;
$centena = intval($numero08 / 100);
$decena = intval(($numero08 - $centena * 100) / 10);
$unidad = $numero08 - $centena * 100 - $decena * 10;
$data['ejercicio08_resultado'] = "El número $numero08 está formado por $centena centenas, $decena decenas y $unidad unidades";

$cadena = "";
$letras = strlen(str_replace(" ", "", $cadena));
$palabras = str_word_count($cadena);

$texto1 = "letras";
$texto2 = "palabras";
if($letras==1){
    $texto1 = "letra";
}
if($palabras==1){
    $texto2 = "palabra";
}
$data['ejercicio09_resultado'] = "La cadena de texto '$cadena' está formada por $letras $texto1 y $palabras $texto2";

/*
 * Llamamos a las vistas
 */
include 'views/templates/header.php';
include 'views/basicos.view.php';
include 'views/templates/footer.php';
