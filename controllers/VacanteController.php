<?php

namespace Controllers;
use MVC\Router;
use Model\Vacante;
use Model\Funcionario;
use Model\Categoria;
use Model\Inclusivo;

class VacanteController {
    public static function index(Router $router) {

        $vacantes = Vacante::all();
        $funcionarios = Funcionario::all();
        $categorias = Categoria::all();
        $inclusivos = Inclusivo::all();
        $resultado = $_GET['resultado'] ?? null;
        $mensaje = "";
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cargo = $_POST['cargo'];
            $categoriaId = $_POST['categoriaId'];
            $inclusivoId = $_POST['inclusivoId'];
            $creado = $_POST['creado'];


            if(empty($cargo) && empty($inclusivoId) && empty($creado)) {
                $vacantes = Vacante::findFilter('categoriaId' ,$categoriaId);
                if(!$vacantes) {
                    $mensaje = 'No existen vacantes en la categoría seleccionada';
                }
            } else if(empty($categoriaId) && empty($inclusivoId) && empty($creado)){
                $vacantes = Vacante::findFilterCargo($cargo);
                if(!$vacantes) {
                    $mensaje = 'No existen cargos relacionados';
                }
            } else if(empty($categoriaId) && empty($inclusivoId) && empty($cargo)) {
                $vacantes = Vacante::findFilter('creado', $creado);
                if(!$vacantes) {
                    $mensaje = 'No existen vacantes en la fecha seleccionada';
                }
            } else if(empty($categoriaId) && empty($creado) && empty($cargo)){
                $vacantes = Vacante::findFilter('inclusivoId', $inclusivoId);
                if(!$vacantes) {
                    $mensaje = 'No existen vacantes inclusivas';
                }
            } else {
                $vacantes = Vacante::findFilterAll($cargo, $categoriaId, $inclusivoId, $creado);
                if(!$vacantes) {
                    $mensaje = 'No existen resultados relacionados';
                }
            }

        }



        $router->render('vacantes/admin', [
            'vacantes' => $vacantes,
            'funcionarios' => $funcionarios,
            'categorias' => $categorias,
            'inclusivos' => $inclusivos,
            'resultado' => $resultado,
            'mensaje' => $mensaje
        ]);
    }
    public static function crear(Router $router) {

        $vacante = new Vacante;
        $funcionarios = Funcionario::all();
        $categorias = Categoria::all();
        $inclusivos = Inclusivo::all();
        $errores = Vacante::getErrores();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $vacante = new Vacante($_POST['vacante']);
    
            $errores = $vacante->validar();        
    
            if(empty($errores)) {
                $vacante->guardar();
            }
        }

        $router->render('vacantes/crear', [
            'vacante' => $vacante,
            'funcionarios' => $funcionarios,
            'categorias' => $categorias,
            'inclusivos' => $inclusivos,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router) {
        
        $id = validarORedireccionar('/admin');

        $vacante = Vacante::find($id);
        $funcionarios = Funcionario::all();
        $categorias = Categoria::all();
        $inclusivos = Inclusivo::all();
        $errores = Vacante::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        
            $args = $_POST['vacante'];
    
            $vacante->sincronizar($args);
            
            $errores = $vacante->validar();
            
    
            if(empty($errores)) {
    
                $vacante->guardar();
            }
    
        }

        $router->render('vacantes/actualizar', [
            'vacante' => $vacante,
            'funcionarios' => $funcionarios,
            'categorias' => $categorias,
            'inclusivos' => $inclusivos,
            'errores' => $errores
        ]);
    }
    public static function eliminar() {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
    
            if($id) {
    
                $tipo = $_POST["tipo"];
    
                if(validarTipoContenido($tipo)) {
                
                        $vacantes = Vacante::find($id);
                        $vacantes->eliminar();
                }  
            }
        }
    }
}