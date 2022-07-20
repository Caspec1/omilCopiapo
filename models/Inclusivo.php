<?php

namespace Model;

class Inclusivo extends ActiveRecord{

    protected static $tabla = 'inclusivo';
    protected static $columnasDB = ['id', 'estado'];

    public $id;
    public $estado;
  
    public function __construct($args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->estado = $args['estado'] ?? '';
    }
}