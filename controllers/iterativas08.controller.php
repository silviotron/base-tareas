<?php

declare(strict_types=1);

if (isset($_POST['enviar'])) {
    $data['errores'] = checkForm($_POST);
    $data['input'] = filter_var_array($_POST);
    if (count($data['errores']) === 0) {
        //hago la lógica
        $jsonArray = json_decode($_POST['json_notas'], true);
        //var_dump($jsonArray);
        $data['resultado'] = datosAsignaturas($jsonArray);
        //var_dump($data['resultado']);
    }
}

function checkForm(array $post): array {
    $errores = [];
    if (empty($post['json_notas'])) {
        $errores['json_notas'] = 'Este campo es obligatorio';
    } else {
        $json = json_decode($post['json_notas'], true);
        var_dump($post['json_notas']);

        if (json_last_error() !== JSON_ERROR_NONE) {
            $errores['json_notas'] = 'El formato no es correcto';
        } else {
            foreach ($json as $modulo => $valorModulo) {
                if (is_array($valorModulo)) {
                    if (empty($modulo)) {
                        $errores['json_notas'] = 'El módulo no puede estar vacio';
                    } else {
                        foreach ($valorModulo as $nombre => $nota) {                            
                            if (empty($nombre)) {
                        $errores['json_notas'] = 'El nombre del alumno no puede estar vacio';
                                
                            }else{
                              if (!is_numeric($nota) || $nota > 10 || $nota < 0) {
                                    $errores['json_notas'] = 'Las notas deben ser numeros entre cero y diez, inclusive';
                                }  
                            }
                            for ($index = 0; $index < count($errores); $index++) {
                                
                            }
                        }
                    }
                }
            }
        }
    }
    return $errores;
}

function datosAsignaturas(array $materias): array {
    $resultado = [];
    $alumnos = [];
    foreach ($materias as $nombreMateria => $notas) {
        $resultado[$nombreMateria] = [];
        $suspensos = 0;
        $aprobados = 0;
        $max = [
            'alumno' => '',
            'nota' => -1
        ];
        $min = [
            'alumno' => '',
            'nota' => 11
        ];
        $notaAcumulada = 0;
        $contarAlumnos = 0;

        foreach ($notas as $alumno => $nota) {
            if (!isset($alumnos[$alumno])) {
                $alumnos[$alumno] = ['suspensos' => 0, 'aprobados' => 0];
            }
            $contarAlumnos++;
            $notaAcumulada += $nota;
            if ($nota < 5) {
                $suspensos++;
                $alumnos[$alumno]['suspensos']++;
            } else {
                $aprobados++;
                $alumnos[$alumno]['aprobados']++;
            }
            if ($nota > $max['nota']) {
                $max['alumno'] = $alumno;
                $max['nota'] = $nota;
            }
            if ($nota < $min['nota']) {
                $min['alumno'] = $alumno;
                $min['nota'] = $nota;
            }
        }
        if ($contarAlumnos > 0) {
            $resultado[$nombreMateria]['media'] = $notaAcumulada / $contarAlumnos;
            $resultado[$nombreMateria]['max'] = $max;
            $resultado[$nombreMateria]['min'] = $min;
        } else {
            $resultado[$nombreMateria]['media'] = 0;
        }
        $resultado[$nombreMateria]['suspensos'] = $suspensos;
        $resultado[$nombreMateria]['aprobados'] = $aprobados;
    }
    return array('modulos' => $resultado, 'alumnos' => $alumnos);
}

include 'views/templates/header.php';
include 'views/iterativas08.view.php';
include 'views/templates/footer.php';

