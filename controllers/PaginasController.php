<?php

namespace Controllers;

use MVC\Router;
use Model\Vacante;
use Model\Categoria;
use Model\Inclusivo;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {
    public static function index(Router $router) {
        $router->render('paginas/index');
    }
    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros');
    }
    public static function vacantes(Router $router) {
        
        $vacante = Vacante::all();
        $categorias = Categoria::all();
        $inclusivos = Inclusivo::all();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoriaId = $_POST['categoriaId'];
            $inclusivoId = $_POST['inclusivoId'];


            if(empty($inclusivoId)) {
                $vacante = Vacante::findFilter('categoriaId' ,$categoriaId);
            } else {
                $vacante = Vacante::findFilter('inclusivoId', $inclusivoId);
            }
            

            // debuguear($vacantes);

            // $vacantes->sincronizar();

        }
        
        $router->render('paginas/vacantes', [
            'vacante' => $vacante,
            'categorias' => $categorias,
            'inclusivos' => $inclusivos
        ]);
    }
    public static function vacante(Router $router) {

        $id = validarORedireccionar('/vacantes');
        $vacantes = Vacante::find($id);
        $router->render('paginas/vacante', [
            'vacantes' => $vacantes
        ]);
    }
    public static function servicios(Router $router) {
        $router->render('paginas/servicios');
    }
    public static function contacto(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            // Crear una nueva instancia de php mailer
            $mail = new PHPMailer();

            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '9b91ccbb2f0bec';
            $mail->Password = '113430209a1cce';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar contenido del email
            $mail->setFrom('omil@omil.com');
            $mail->addAddress('omil@omil.com', 'Omil.com');
            $mail->Subject = 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            
            // Definir contenido
            $contenido = '<html>';
            $contenido .= '<p> Tienes un nuevo mensaje </p>';
            $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
            $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
            $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if($mail->send()) {
                echo "Mensaje Enviado Correctamente";
            } else {
                echo "El mensaje no se pudo enviar...";
            }
        }

        $router->render('paginas/contacto');
    }
}