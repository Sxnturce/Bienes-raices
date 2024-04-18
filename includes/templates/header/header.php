<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <!--Tittle -->
    <title>Bienes Raices</title>
    <!--Link-Icon -->
    <link rel="icon" type="image/x-icon" href="../build/img/icoBienes.webp">
    <!--Link-CSS -->
    <link rel="stylesheet" href="../build/css/app.css">
    <!--Link-Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!--Link-Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>


<body>
    <header class="header fixed">
        <div class="contenedor nav">
            <a href="../index.php">
                <h2>Bienes<span>Raices</span></h2>
            </a>
            <div class="container__checkbox">
                <input type="checkbox" id="checkbox">
                <label for="checkbox" class="toggle">
                    <div class="bars" id="bar1"></div>
                    <div class="bars" id="bar2"></div>
                    <div class="bars" id="bar3"></div>
                </label>
            </div>
            <div class="nav__links">
                <a href="./nosotros.php" class="nav__link">Nosotros</a>
                <a href="./anuncios.php" class="nav__link">Anuncios</a>
                <a href="./blog.php" class="nav__link">Blog</a>
                <a href="./contacto.php" class="nav__link">Contacto</a>
                <div class="toggle-switch mobile-switch">
                    <label class="switch-label">
                        <input type="checkbox" class="checkbox" id="mb-checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
            <div class="container_switch">
                <div class="toggle-switch desktop-switch">
                    <label class="switch-label">
                        <input type="checkbox" class="checkbox desk_checkbox">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>
        </div>
    </header>