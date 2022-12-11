<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC</title>
    <link rel='stylesheet' href="../main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <style>
        td , th{
            text-align: center;
        }
    </style>
</head>
<body>
<main style="display:flex;">
    <nav>
        <div class="sidebar-top">
    <span class="shrink-btn">
    <i class='bx bx-chevron-left'></i>
    </span>
            <h3 class="">ПАНЕЛЬ АДМИНА</h3>
        </div>
        <div class="sidebar-links">
            <ul>
                <li class="tooltip-element" data-tooltip="0">
                    <a href="/admin/bookings" class="active" data-active="0">
                        <div class="icon">
                            <i class='bx bx-tachometer'></i>
                            <i class='bx bxs-tachometer'></i>
                        </div>
                        <span class="link hide">Брони</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/admin/rooms" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Номера</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/admin/users" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Пользователи</span>
                    </a>
                </li>
                <li class="tooltip-element" data-tooltip="1">
                    <a href="/admin/payment" data-active="1">
                        <div class="icon">
                            <i class='bx bx-folder'></i>
                            <i class='bx bxs-folder'></i>
                        </div>
                        <span class="link hide">Учёт</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidebar-footer">
        </div>
    </nav>
    <section class="main-container">