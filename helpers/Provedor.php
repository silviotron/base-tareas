<?php
declare (strict_types=1);

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Provedor
 *
 * @author snovmar
 */
namespace Com\Daw2\Helpers;
class Provedor {
    private $cif;
    private $codigo;
    private $nombre;
    private $direccion;
    private $web;
    private $pais;
    private $email;
    private $telefono;
    
    private const PATRON_CIF = "/^[ABCDEFGHKLMNPQS][0-9]{2}[0-9]{5}[0-9A-Z]$/";
    
    public function __construct($cif, $codigo, $nombre, $direccion, $web, $pais, $email, $telefono) {
        self::check(!preg_match(self::PATRON_CIF, $cif), "El CIF $cif no cumple el formato");
        self::check(empty($codigo), "El codigo $codigo no cumple el formato");
        self::check(empty($nombre), "El nombre $nombre no cumple el formato");        
        self::check(empty($direccion), "El nombre $direccion no cumple el formato");
        self::check(!filter_var($web, FILTER_VALIDATE_URL), "La web $web no cumple el formato");
        self::check(empty($pais), "El nombre $pais no cumple el formato");                    
        self::check(!filter_var($email,FILTER_VALIDATE_EMAIL), "El $email no cumple el formato");
        self::check(!preg_match("/^[0-9]{9}$/", $telefono), "El telefono $telefono no cumple el formato");



        $this->cif = $cif;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->web = $web;
        $this->pais = $pais;
        $this->email = $email;
        $this->telefono = $telefono;
    }
    public static function check(bool $condicion, string $txt = "Formato incorrecto") {
        if ($condicion) {
            throw new InvalidArgumentException($txt);
        }
    }

}
