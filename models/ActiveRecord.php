<?php

namespace Model;

class ActiveRecord {
        // Base de datos
        protected static $db;
        protected static $columnasDB = [];
        protected static $tabla = '';

        protected static $errores = [];
    
        public static function setDB($database) {
            self::$db = $database;
        }
    
        public function guardar() {
            if(!is_null($this->id)) {
                $this->actualizar();
            } else {
                $this->crear();
            }
        }
        public function crear() {
    
            $atributos = $this->sanitizarDatos();
    
            $query = "INSERT INTO " . static::$tabla . " (" ;
            $query .= join(', ', array_keys($atributos));
            $query .= " ) VALUES (' " ;
            $query .= join("', '", array_values($atributos));
            $query .= " ')";
                
            $resultado = self::$db->query($query);
    
              
            if ($resultado) {
                header('Location: /admin?resultado=1');
            }
    
        }
        
        public function actualizar() {
    
            $atributos = $this->sanitizarDatos();
            $valores = [];
            foreach($atributos as $key => $value) {
                $valores[] = "{$key} = '{$value}'";
            }
    
            $query = " UPDATE " . static::$tabla ." SET ";
            $query .=  join(', ', $valores) ;
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= " LIMIT 1 ";
    
            $resultado = self::$db->query($query);
    
            if ($resultado) {
                header('Location: /admin?resultado=2');
            }
    
        }
    
        public function sanitizarDatos() {
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach($atributos as $key => $value) {
                $sanitizado[$key] = self::$db->escape_string($value);
            }
            return $sanitizado;
        }
        
        public function atributos() {
            $atributos = [];
            foreach(static::$columnasDB as $columna) {
                if($columna==='id') continue;
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }
        public static function getErrores() {
            return static::$errores;
        }
    
        public function validar() {
            static::$errores = [];
            return static::$errores;
        }
        // Busca por todos los valores de la tabla
        public static function all() {
            $query = "SELECT * FROM " . static::$tabla;
    
            $resultado = self::consultarSQL($query);
    
            return $resultado;
        }
    
        // Busca los valores de la tabla por id
        public static function find($id) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = ${id}";

            $resultado = self::consultarSQL($query);
            
            return array_shift($resultado);
        }
        public static function findFilter($column, $filter) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE ${column} = '${filter}'";

            $resultado = self::consultarSQL($query);
            
            return $resultado;
        }
        public static function findFilterAll($cargo, $categoriaId, $inclusivoId, $creado) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE creado = '${creado}' and categoriaId = '${inclusivoId}' and categoriaId = '${categoriaId}' and cargo LIKE '%${cargo}%'";

            $resultado = self::consultarSQL($query);
            
            return $resultado;
        }
        public static function findFilterCargo($cargo) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE cargo LIKE '%${cargo}%'";
            
            $resultado = self::consultarSQL($query);
    
            return $resultado;
        }
        public function eliminar() {
            // Elmina la propiedad
            $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";
            $resultado = self::$db->query($query);
            
            if($resultado) {
                header('Location: /admin?resultado=3');
            }
        }
    
        public function sincronizar($args = []) {
            
            foreach($args as $key => $value) {
                if(property_exists($this, $key) && !is_null($value)){
                    $this->$key = $value;
                }
            }
        }
    
        public static function consultarSQL($query) {
            // Consultar bd
            $resultado = self::$db->query($query);
    
            // Iterar
            $array = [];
            while($registro = $resultado->fetch_assoc()) {
                $array[] = static::crearObjeto($registro);
            } 
    
            // Liberar memoria
            $resultado->free();
    
            // Mostrar los resultados
            return $array;
    
        }
        protected static function crearObjeto($registro) {
            $objeto = new static;
            
            foreach($registro as $key => $value) {
                if(property_exists($objeto, $key)) {
                    $objeto->$key = $value;
                }
            }
            return $objeto;
        }
}