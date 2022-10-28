<?php
declare (strict_types=1);

/**
 * Description of Categoria
 *
 * @author snovmar
 */
namespace Com\Daw2\Helpers;
class Categoria {

    private $nombre;
    private $padre;

    public function __construct(string $nombre, ?Categoria $padre = null) {
        if (trim($nombre)=="") {
            throw InvalidArgumentException('El nombre esta vacio');
        }
        $this->nombre = $nombre;
        $this->padre = $padre;
    }
    
    public function __get($atributo){
        if (property_exists($this, $atributo)) {
            return $this->$atributo;
        }
    }

    public function getFullName(): String{
        $este = $this;
        $result = $este->nombre;
        while ( is_null($este->padre)) {
            $este = $este->padre;
            $result .= $este->nombre;
        }
    }
    
    public function getFullNameR(): String {
        if (!is_null($this->padre)) {
            return $this->padre->getFullNameR().' > '.$this->nombre;
        }else{
            return $this->nombre;
        }
        
    }

}
