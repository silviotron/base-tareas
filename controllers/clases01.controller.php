<?php
declare (strict_types=1);

use Com\Daw2\Helpers\Provedor;
use Com\Daw2\Helpers\Categoria;
use Com\Daw2\Helpers\Producto;


 
$planeta = new Categoria("planeta");
$continente = new Categoria("continente", $planeta);
$pais = new Categoria("pais", $continente);

echo Provedor::check($pais, true);