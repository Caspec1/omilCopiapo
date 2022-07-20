<?php

if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<div class="mobile-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="2.5" stroke="#e41616" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
              </svg>
        </div>
        <nav class="navegacion">
            <div class="navegacion__flex contenedor">
                <a class="navegacion__enlace" href="index.php">Inicio</a>
                <a class="navegacion__enlace" href="sobre-nosotros.php">Sobre Nosotros</a>
                <a class="navegacion__enlace" href="vacantes-laborales.php">Vacantes Laborales</a>
                <a class="navegacion__enlace" href="servicios-omil.php">Servicios OMIL</a>
                <a class="navegacion__enlace" href="contacto.php">Contacto</a>
                <?php if($auth) : ?>
                    <a class="navegacion__enlace" href="cerrar-sesion.php">Cerrar Sesión</a>
                <?php endif; ?>
            </div>
        </nav>