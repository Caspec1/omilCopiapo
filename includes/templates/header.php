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
                    <a href="/index.php">
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