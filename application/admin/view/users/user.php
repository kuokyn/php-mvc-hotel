<?php
echo '<section>
    <h2>Пользователь №'.$user["id"].'</h2>
    <form action="." method="POST">
        <label for="phone">Номер телефона</label>
        <input disabled type="text" id="phone" name="phone" value="'.$user["phone"].'" required>
        <input type="hidden" name="action" value="update">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" value="'.$user["name"].'" required>
        <label for="surname">Фамилия</label>
        <input type="text" id="surname" name="surname" value="'.$user["surname"].'" required>
        <label for="email">Почта</label>
        <input type="text" id="email" name="email" value="'.$user["email"].'" required>
        <label for="password">Пароль</label>
        <input disabled type="password" id="password" name="password" value="'.$user["password"].'" required> <br>
        <button class="btn btn-alert">Обновить</button>
    </form>
    <form action="/admin/bookings" method="POST">
    <input type="hidden" id="id" name="id" value="'.$user["id"].'">
    <input type="hidden" name="action" value="delete">
        <button class="btn red">Удалить</button>
    </form>
    <a href="/admin/users">Назад</a>
</section>';
