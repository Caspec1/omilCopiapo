<?php

namespace Model;

class Vacante extends ActiveRecord{

    protected static $tabla = 'vacantes';
    protected static $columnasDB = ['id', 'cargo', 'cupos', 'requerimiento', 'sueldo', 'turno', 'horario', 'ciudad', 'experiencia', 'inclusivoId', 'expira', 'funcionarioId', 'categoriaId', 'creado'];

    public $id;
    public $cargo;
    public $cupos;
    public $requerimiento;
    public $sueldo;
    public $turno;
    public $horario;
    public $ciudad;
    public $experiencia;
    public $inclusivoId;
    public $expira;
    public $funcionarioId;
    public $categoriaId;
    public $creado;

    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->cargo = $args['cargo'] ?? '';
        $this->cupos = $args['cupos'] ?? '';
        $this->requerimiento = $args['requerimiento'] ?? '';
        $this->sueldo = $args['sueldo'] ?? '';
        $this->turno = $args['turno'] ?? '';
        $this->horario = $args['horario'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->experiencia = $args['experiencia'] ?? '';
        $this->inclusivoId = $args['inclusivoId'] ?? '';
        $this->expira = $args['expira'] ?? '';
        $this->funcionarioId = $args['funcionarioId'] ?? '';
        $this->categoriaId = $args['categoriaId'] ?? '';
        $this->creado = date('Y/m/d');
    }
    public function validar() {
        if (!$this->cargo) {
            self::$errores[] = 'Ingrese el cargo solicitado';
        }
        if (!$this->requerimiento) {
            self::$errores[] = 'El requerimiento y requisitos de la empresa son necesarios';
        }
        if (!$this->turno) {
            self::$errores[] = 'Es necesario ingresar el turno';
        }
        if (!$this->ciudad) {
            self::$errores[] =  'Indique la ciudad en la que se deba realizar el trabajo';
        }
        if (!$this->expira) {
            self::$errores[] = 'Ingrese la fecha de expiración de la vacante laboral';
        }
        if (!$this->funcionarioId) {
            self::$errores[] = 'Seleccione un responsable de ingreso';
        }
        if (!$this->categoriaId) {
            self::$errores[] = 'Seleccione una categoria';
        }

        return self::$errores;
    }
    public static function queryCargo() {
        
    }
}