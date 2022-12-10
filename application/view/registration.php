<?php
echo '<section>
    <h2>Регистрация</h2>
    <form action="/registration" method="POST">
        <input type="hidden" name="action" value="create">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name"  required>
        <label for="surname">Фамилия</label>
        <input type="text" id="surname" name="surname"  required>
        <label for="phone">Номер телефона</label>
        <input type="text" id="phone" name="phone" required>
        <label for="email">Почта</label>
        <input type="text" id="email" name="email" required>
        <label for="password">Пароль</label>
        <input type="text" id="password" name="password" required>
        <button>Submit</button>
    </form>
</section>';
