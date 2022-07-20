<?php

namespace Controllers;
use MVC\Router;
use Model\Funcionario;

class FuncionarioController {

    public static function crear(Router $router) {


        $funcionario = new Funcionario;
        $errores = Funcionario::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        
            $funcionario = new Funcionario($_POST['funcionario']);
            
            $errores = $funcionario->validar();
    
            if(empty($errores)) {
                $funcionario->password = password_hash($funcionario->password, PASSWORD_DEFAULT);
                $funcionario->rpassword = password_hash($funcionario->rpassword, PASSWORD_DEFAULT);
    
                $funcionario->guardar();
            }
        }

        $router->render('funcionarios/crear', [
            'funcionario' => $funcionario,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');
        $funcionario = Funcionario::find($id);
        $errores = Funcionario::getErrores();
        $funcionario->password = '';

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        

            $args = $_POST['funcionario'];

            $funcionario->sincronizar($args);
    
            $errores = $funcionario->validar();
    
            if(empty($errores)) {
                $funcionario->password = password_hash($funcionario->password, PASSWORD_DEFAULT);
                $funcionario->rpassword = password_hash($funcionario->rpassword, PASSWORD_DEFAULT);
    
                $funcionario->guardar();
            }
    
        }
        
        $router->render('funcionarios/actualizar', [
            'funcionario' => $funcionario,
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
                
                        $funcionario = Funcionario::find($id);
                        $funcionario->eliminar();
                }  
            }
        }
    }
}