<?php

namespace Model;

class Funcionario extends ActiveRecord {
    protected static $tabla = 'funcionarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'correo', 'password'];

    public $id;
    public $nombre;
    public $apellido;
    public $correo;
    public $password;
    public $rpassword;

    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->rpassword = $args['rpassword'] ?? '';
    }
    public function validar() {
        if (!$this->nombre) {
            self::$errores[] = 'Ingrese un nombre';
        }
        if (!$this->apellido) {
            self::$errores[] = 'Ingrese un apellido';
        }
        if (filter_var(!$this->correo, FILTER_VALIDATE_EMAIL)) {
            self::$errores[] = 'Ingrese un correo';
        }
        if (!$this->password) {
            self::$errores[] = 'Ingrese una contraseña';
        }
        if (!$this->rpassword) {
            self::$errores[] = 'Repita la contraseña';
        } else if($this->rpassword !== $this->password) {
            self::$errores[] = 'Las contraseñas no coinciden';
        }
        return self::$errores;
    }
}