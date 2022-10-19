<?php

//var_dump($_POST);
//var_dump($_GET);
$data = array();
//var_dump($data);


if (isset($_POST['enviar'])) {
    $data['input'] = sanitizarInput($_POST);
    $max = $_POST['datos'];
    $data['resultado'] = FormatTabla(array_keys(primos($max)));
}


function sanitizarInput(array $datos): array {
    return filter_var_array($datos, FILTER_SANITIZE_SPECIAL_CHARS);
}

function primos($max) {
    $array = array_fill(0, $max, 0);
    for ($i = 2; $i*$i <= $max; $i++) {
        if(isset($array[$i])){
            for ($e = 2; $e*$i <= $max; $e++) {
                unset($array[$e*$i]);
            }
        }
    }
    if (isset($array[0])){
        unset($array[0]);
    }
    return $array;    
}
function formatTabla(array $array): string {
    $result = "</table>";
    $result = "</tr>".$result;  
    $raiz = pow(count($array), 1/2) > 18? 18:pow(count($array),1/2);
    while (count($array) > 0){
        if (count($array)% $raiz == 0) {
        $result = "</tr> <tr>".$result;    
        }
        $result = "<td>" . array_pop($array) . "</td>".$result;  
        
    }
        $result = "<tr>".$result;   
            $result = "<table>".$result;

    return $result;
}

include 'views/templates/header.php';
include 'views/iterativas06.view.php';
include 'views/templates/footer.php';
