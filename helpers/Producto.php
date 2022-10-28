<?php
declare (strict_types=1);
namespace Com\Daw2\Helpers;
class Producto {

    private $codigo;
    private $nombre;
    private $descripcion;
    private $proveedor;
    private $categoria;
    private $coste;
    private $margen;
    private $stock;
    private $iva;
    private $relacionados;
    private static $IVAS = [0, 4, 10, 21];

    public function __construct($codigo, $nombre, $descripcion, $proveedor, $categoria, $coste, $margen, $stock, $iva) {
        self::check(preg_match('/^.{1-10}$/', $codigo), "Código debe tener una longitud entre 1 y 10 caracteres");
        self::check(empty($nombre), "Nombre no puede estar vacío");
        self::check(empty($descripcion), "Descripcion no puede estar vacía");
        self::check($coste <= 0, "Coste debe ser mayor que cero");
        self::check($margen <= 0, "Margen debe ser mayor que cero");
        self::check($stock <= 0, "El stock no puede ser menor que 0");
        self::check(!in_array($iva, self::$IVAS), "El IVA '$iva' no está permitido. Valores permitidos: " . implode(",", self::$IVAS));

        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->proveedor = $proveedor;
        $this->categoria = $categoria;
        $this->coste = $coste;
        $this->margen = $margen;
        $this->stock = $stock;
        $this->iva = $iva;
    }

    public static function check(bool $condicion, string $txt) {
        if ($condicion) {
            throw new InvalidArgumentException($txt);
        }
    }

    public function agregarProductoRelacionado(Producto $p) {
        if (!in_array($p, $this->productosRelacionados)) {
            $this->productosRelacionados[] = $p;
        }
    }

    public function descontarStock(int $stock) {
        if ($this->stock < $stock) {
            throw new SinStockException();
        }
        $this->stock -= $stock;
    }

    public function agregarProductoRelacionado(Producto $p) {
        if (!in_array($p, $this->productosRelacionados)) {
            $this->productosRelacionados[] = $p;
        }
    }

    public function getPrecioVenta(bool $conIva = true): float {
        if ($conIva) {
            return $this->coste * $this->margen * ((100 + $this->iva) / 100);
        } else {
            return $this->coste * $this->margen;
        }
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
        if ($property == 'precioVenta') {
            return $this->getPrecioVenta();
        }
    }

}

class SinStockException extends Exception {
    
}
