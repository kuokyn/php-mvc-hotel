<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel='stylesheet' href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
<main style="display:flex;">
    <nav>
        <div class="sidebar-top">
    <span class="shrink-btn">
    <i class='bx bx-chevron-left'></i>
    </span>
            <h3 class="">CROCUS HOTEL</h3>
        </div>
        <div class="sidebar-links">
            <ul>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="/book" class="active" data-active="0">
                        <div class="icon">
                            <i class='bx bx-tachometer'></i>
                            <i class='bx bxs-tachometer'></i>
                        </div>
                        <span class="link hide">Забронировать</span>
                    </a>
                </li>
                <?php
                if (isset($_SESSION["login"]))
                    echo '<li class="tooltip-element" data-tooltip="0">
                    <a href="/mybookings" class="active" data-active="0">
                        <div class="icon">
                            <i class="bx bx-tachometer"></i>
                            <i class="bx bxs-tachometer"></i>
                        </div>
                        <span class="link hide">Мои бронирования</span>
                    </a>
                </li>';
                ?>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/rooms" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Доступные Номера</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/services" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Услуги</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/about" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">О нас</span>
                    </a>
                </li>
                <?php
                if (!isset($_SESSION["login"]))
                echo '<li class="tooltip-element" data-tooltip="1">
                    <a href="/login" data-active="1">
                        <div class="icon">
                            <i class="bx bx-folder"></i>
                            <i class="bx bxs-folder"></i>
                        </div>
                        <span class="link hide">Вход</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/registration" data-active="1">
                        <div class="icon">
                            <i class="bx bx-folder"></i>
                            <i class="bx bxs-folder"></i>
                        </div>
                        <span class="link hide">Регистрация</span>
                    </a>
                </li>';
                if (isset($_SESSION["login"]))
                    echo '
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/logout" data-active="1">
                        <div class="icon">
                            <i class="bx bx-folder"></i>
                            <i class="bx bxs-folder"></i>
                        </div>
                        <span class="link hide">Выйти</span>
                    </a>
                </li>'
                ?>

            </ul>
        </div>
        <div class="sidebar-footer">
        </div>
    </nav>
    <section class="main-container">