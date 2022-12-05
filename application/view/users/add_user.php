<?php include (ROOT . "/view/shared/header.php");
echo '<section>
    <h2>Найти пользователя</h2>
    <form action="." method="GET">
        <input type="hidden" name="action" value="select">
        <label for="phone">Номер телефона</label>
        <input type="text" id="phone" name="phone" required>
        <button>Submit</button>
    </form>
</section>
<section>
    <h2>Добавить пользователя</h2>
    <form action="." method="POST">
        <input type="hidden" name="action" value="insert">
        <label for="name">Имя</label>
        <input type="text" id="name" name="name" required>
        <label for="surname">Фамилия</label>
        <input type="text" id="surname" name="surname" required>
        <label for="phone">Номер телефона</label>
        <input type="text" id="phone" name="phone" required>
        <label for="email">Почта</label>
        <input type="text" id="email" name="email">
        <label for="password">Пароль</label>
        <input type="text" id="password" name="password">
        <button>Submit</button>
    </form>
</section>';
include(ROOT . "/view/shared/status.php");
include (ROOT . "/view/shared/footer.php");
?>