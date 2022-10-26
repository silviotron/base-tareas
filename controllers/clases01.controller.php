<?php
declare (strict_types=1);

require 'helpers/Categoria.php';

 
$planeta = new Categoria("planeta");
$continente = new Categoria("continente", $planeta);
$pais = new Categoria("pais", $continente);

echo $pais->getFullNameR();