<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OMIL Copiapó</title>
    <meta name="author" content="Javier Miranda Villegas">
    <meta name="keywords" content="trabajo, omil, copiapo, empleo">
    <meta name="description" content="Sitio Web OMIL">
    <link rel="shortcut icon" href="/build/img/logoCircular.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="prefetch" href="vacantes-laborales.php" as="document">
    <link rel="preload" href="/build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="heading">
        <div class="heading__contenido">
                <div class="heading__titulo">
                    <h1 class="heading__heading">Omil Copiapó</h1>
                    <p class="heading__texto">Oficina Municipal de Intermediación Laboral</p>
                </div>
                <div class="heading__imagen">
                    <a href="/">
                        <picture class="heading__imagen">
                            <source class="heading__imagen" loading="lazy" srcset="/build/img/logoLetras.avif" type="image/avif">
                            <source class="heading__imagen" loading="lazy" srcset="/build/img/logoLetras.webp" type="image/webp">
                            <img class="heading__imagen" loading="lazy" src="/build/img/logoLetras.png" alt="imagen vacante" class="heading__imagen">
                        </picture>
                    </a>
                </div>
                <div class="derecha">
                    <img src="/build/img/dark-mode.svg" alt="dark mode icon" class="dark-mode-boton">
                    <div class="heading__sociales">
                        <a class="heading__social" href="https://www.facebook.com/profile.php?id=100080714706755" target="_blank"><i class="fa-brands fa-facebook-square fa-2xl"></i></a>
                        <a class="heading__social" href="https://www.instagram.com/omil.copiapo/" target="_blank"><i class="fa-brands fa-instagram fa-2xl"></i></a>
                    </div>
                    <?php if($auth) : ?>
                        <a class="servicio__enlace" href="/admin">Crear Vacante</a>
                    <?php endif; ?>
                </div>
                
        </div>
    </header>
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
            <a class="navegacion__enlace" href="/">Inicio</a>
            <a class="navegacion__enlace" href="/nosotros">Sobre Nosotros</a>
            <a class="navegacion__enlace" href="/vacantes">Vacantes Laborales</a>
            <a class="navegacion__enlace" href="/servicios">Servicios OMIL</a>
            <a class="navegacion__enlace" href="/contacto">Contacto</a>
            <?php if($auth) : ?>
                <a class="navegacion__enlace" href="/logout">Cerrar Sesión</a>
            <?php endif; ?>
        </div>
    </nav>

    <?php echo $contenido ?>

    <footer class="footer">
        <img class="footer__imagen" src="/build/img/Footer.jpg" alt="banner muni">
        <p class="copyright">&copy; Todos los derechos reservados</p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/f0761fd379.js" crossorigin="anonymous"></script>
</body>
</html>