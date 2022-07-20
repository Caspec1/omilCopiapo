<?php

require_once __DIR__ . '/../includes/app.php';
use MVC\Router;
use Controllers\VacanteController;
use Controllers\FuncionarioController;
use Controllers\PaginasController;
use Controllers\LoginController;

$router = new Router();

$router->get('/admin', [VacanteController::class, 'index']);
$router->post('/admin', [VacanteController::class, 'index']);
$router->get('/vacantes/crear', [VacanteController::class, 'crear']);
$router->post('/vacantes/crear', [VacanteController::class, 'crear']);
$router->get('/vacantes/actualizar', [VacanteController::class, 'actualizar']);
$router->post('/vacantes/actualizar', [VacanteController::class, 'actualizar']);
$router->post('/vacantes/eliminar', [VacanteController::class, 'eliminar']);

$router->get('/funcionarios/crear', [FuncionarioController::class, 'crear']);
$router->post('/funcionarios/crear', [FuncionarioController::class, 'crear']);
$router->get('/funcionarios/actualizar', [FuncionarioController::class, 'actualizar']);
$router->post('/funcionarios/actualizar', [FuncionarioController::class, 'actualizar']);
$router->post('/funcionarios/eliminar', [FuncionarioController::class, 'eliminar']);

$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/vacantes', [PaginasController::class, 'vacantes']);
$router->post('/vacantes', [PaginasController::class, 'vacantes']);
$router->get('/vacante', [PaginasController::class, 'vacante']);
$router->get('/servicios', [PaginasController::class, 'servicios']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);



$router->comprobarRutas();