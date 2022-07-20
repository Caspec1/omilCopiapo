<?php

namespace Model;

class Admin extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'funcionarios';
    protected static $columnasDB = ['id', 'email', 'password', 'rol'];

    public $id;
    public $email;
    public $password;
    public $rol;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->rol = $args['rol'] ?? '';
    }
    public function validar() {
        if(!$this->email) {
            self::$errores[] = 'El email es obligatorio';
        }
        if(!$this->password) {
            self::$errores[] = 'El password es obligatorio';
        }

        return self::$errores;
    }
    public function existeFuncionario() {
        // Revisar si un usuario existe
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($query);

        if(!$resultado->num_rows) {
            self::$errores[] = 'El usuario no existe';
            return;
        }
        return $resultado;
    }
    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password, $usuario->password);

        if(!$autenticado) { 
            self::$errores[] = 'El password es incorrecto';
        }

        return $autenticado;
    }
    protected function obtenerRol() {
        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);
        $usuario = $resultado->fetch_object();
        $rol = $usuario->rol;

        return $rol;
    }
    public function autenticar() {
        session_start();

        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;
        $_SESSION['rol'] = $this->obtenerRol();

        header('Location: /admin');
    }
}