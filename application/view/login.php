<?php
echo '<section>
    <h2>Вход</h2>
    <form action="/login" method="POST">
        <input type="hidden" id="action" name="action" value="login">
        <label for="phone">Номер телефона</label>
        <input type="text" id="phone" name="phone" placeholder="+8999999" required>
        <label for="password">Пароль</label>
        <input type="text" id="password" name="password" placeholder="password" required><br>
        <button class="btn">Войти</button>
    </form>
</section>';
