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
    <meta name="description" content="Sitio Web OMIL">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preload" href="build/css/app.css" as="style">
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>
    <header class="heading-crud contenedor">
        <div >
            <a href="/">
                <picture class="heading-crud__imagen">
                    <source class="heading-crud__imagen" srcset="/build/img/logoLetras.avif" type="image/avif">
                    <source class="heading-crud__imagen" srcset="/build/img/logoLetras.webp" type="image/webp">
                    <img class="heading-crud__imagen" loading="lazy" decoding="async" src="/build/img/logoLetras.png" alt="imagen logo">
                </picture>
            </a>
        </div>
        <div class="heading-crud__titulo">
            <h1 class="heading-crud__heading heading__heading">Omil Copiapó</h1>
        </div>
    </header>